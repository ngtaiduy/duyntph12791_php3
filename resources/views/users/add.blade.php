@extends('admin.layouts.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Họ tên</label>
        <input type="text" name="name" id="">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" name="email" id="">
        @if (Session::has('message_email'))
            <p class="text-danger">{{Session::get('message_email')}}</p>
        @endif
    </div>
    <div>
        <label for="">Mật khẩu</label>
        <input type="password" name="password" id="">
    </div>
    <div>
        <label for="">Mật khẩu 2</label>
        <input type="password" name="password2" id="">
        @if (Session::has('message_password'))
            <p class="text-danger">{{Session::get('message_password')}}</p>
        @endif
    </div>
    <div>
        <label for="">Avatar</label>
        <input type="file" name="avatar">
    </div>

    <div>
        <button type="submit">Lưu</button>
    </div>
</form>

@endsection