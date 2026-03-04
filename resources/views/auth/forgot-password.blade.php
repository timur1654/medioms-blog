@extends('layouts.app')

@section('title', 'Забыли пароль')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-6 col-lg-5">
            <form action="{{route('password.email')}}" method="post">
                @csrf
                <h3 class="text-center">Сброс пароля</h3>
                <div class="mb-3">
                    <label class="form-label">Почта</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required autofocus>
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <button class="btn btn-primary">Отправить ссылку</button>
            </form>
        </div>
    </div>
@endsection
