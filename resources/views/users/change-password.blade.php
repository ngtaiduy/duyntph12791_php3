@extends('admin.layouts.main')
@section('content')

<form action="" method="POST">
    @csrf
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Nhập mật khẩu hiện tại</label>
        <input type="password" name="password" class="form-control" />
        @if (Session::has('message_password'))
            <p class="text-danger">{{Session::get('message_password')}}</p>
        @endif
        {{-- @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror --}}
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Nhập mật khẩu mới</label>
        <input type="password" name="newpassword" class="form-control" />
        @error('newpassword')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Nhập lại mật khẩu mới</label>
        <input type="password" name="newpassword2" class="form-control" />
        @error('newpassword2')
            <p class="text-danger">{{$message}}</p>
        @enderror
        @if (Session::has('message_password2'))
            <p class="text-danger">{{Session::get('message_password2')}}</p>
        @endif
    </div>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Lưu</button>
  </form>



@endsection