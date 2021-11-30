@extends('admin.layouts.main')
@section('content')

<div>
    <div>
        <h2>THÔNG TIN TÀI KHOẢN</h2>
    </div>
    @if (Session::has('message_success'))
        <p class="text-primary">{{Session::get('message_success')}}</p>
    @endif
    <div>
        <label for="">Tên tài khoản: {{$user->name}}</label>
        <p>Địa chỉ Email: {{$user->email}}</p>
        <img src="{{asset($user->avatar)}}" width="200">
        <p>Vai trò: {{$user->role->name}}</p>
        <a href="{{route('change-password', ['id' => $user->id])}}">Thay đổi mật khẩu</a>
    </div>
</div>

@endsection