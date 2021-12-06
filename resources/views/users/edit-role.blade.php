@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="">Vai trò</label>
                            <select name="role_id" class="form-control">
                                @foreach ($roles as $item)
                                    <option @if($item->id == $user->role_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-start">
                        <a href="{{route('user.index')}}" class="btn btn-danger">Hủy</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection