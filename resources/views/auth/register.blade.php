@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-6 col-lg-5">
            <form action="{{route('register.post')}}" method="post">
                @csrf
                <h3 class="text-center">Регистрация</h3>
                <div class="mb-3">
                    <label class="form-label">Имя</label>
                    <input type="text" class="form-control" name="name" placeholder="Иван" value="{{old('name')}}">
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Почта</label>
                    <input type="email" class="form-control" name="email" placeholder="ivanov@example.com" value="{{old('email')}}">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password">
                    @error('password') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Подтверждение пароля</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                <div class="d-flex justify-content-between mt-3">
                    <p class="text-muted">Уже зарегистрировались? <a href="{{route('login')}}">Войти</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection

