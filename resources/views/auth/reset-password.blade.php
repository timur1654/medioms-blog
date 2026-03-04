@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-6 col-lg-5">
            <form action="{{route('password.update')}}" method="post">
                @csrf
                <h3 class="text-center">Новый пароль</h3>
                <input type="hidden" name="token" value="{{$token}}">
                <div class="mb-3">
                    <label class="form-label">Почта</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Новый пароль</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Подверждение пароля</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <button class="btn btn-primary">Сохранить пароль</button>
            </form>
        </div>
    </div>
@endsection
