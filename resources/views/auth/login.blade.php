@extends('layouts.app')

@section('title', 'Вход')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-6 col-lg-5">
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <h3 class="text-center">Вход</h3>
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
                   <input type="checkbox" name="remember_me" class="rounded">
                   Запомнить меня
               </div>
                <button type="submit" class="btn btn-primary">Войти</button>
                <div class="d-flex justify-content-between mt-3">
                    <p class="text-muted">Ещё не зарегистрировались? <a href="{{route('register')}}">Зарегистрироваться</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection

