@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" name="name" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" id="">
                                @if (Session::has('message_email'))
                                    <p class="text-danger">{{Session::get('message_email')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" name="password2" class="form-control" id="">
                                @if (Session::has('message_password'))
                                    <p class="text-danger">{{Session::get('message_password')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="">Avatar</label>
                        <input type="file" name="avatar">
                    </div>
                
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{route('user.index')}}" class="btn btn-danger">Hủy</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection