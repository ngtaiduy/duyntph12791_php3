@extends('admin.layouts.main')
@section('content')

<div>
    <div>
        <h2>THAY ĐỔI MẬT KHẨU</h2>
    </div>
    <div>
        <form action="" method="POST">
            @csrf
            <div>
                <label for="">Nhập mật khẩu của bạn</label>
                <input type="password" name="password" id="">
                @if (Session::has('message_password'))
                    <p class="text-danger">{{Session::get('message_password')}}</p>
                @endif
            </div>
            <div>
                <label for="">Nhập mật khẩu mới</label>
                <input type="password" name="newpassword" id="">
            </div>
            <div>
                <label for="">Nhập lại mật khẩu mới</label>
                <input type="password" name="newpassword2" id="">
            </div>

            <div>
                <button type="submit">Thay đổi mật khẩu</button>
            </div>
        </form>
    </div>
</div>

@endsection