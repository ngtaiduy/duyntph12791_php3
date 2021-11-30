@extends('admin.layouts.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Họ tên</label>
        <input type="text" name="name" value="{{$user->name}}" id="">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" name="email" value="{{$user->email}}" id="">
    </div>
    <div>
        <label for="">Avatar</label>
        <input type="file" name="avatar" id="">
        <img src="{{asset($user->avatar)}}" width="100">
    </div>
    <div>
        <label for="">Vai trò</label>
        <select name="role_id" class="form-control">
            @foreach ($roles as $item)
                <option @if($item->id == $user->role_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Lưu</button>
    </div>
</form>

@endsection