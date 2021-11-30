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
                                <label for="">Tên</label>
                                <input type="text" name="name" value="{{$passenger->name}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <select name="car_id" class="form-control">
                                        @foreach ($cars as $item)
                                            <option @if($item->id == $passenger->car_id) selected @endif value="{{$item->id}}">{{$item->plate_number}} - {{number_format($item->travel_fee, 0, ',', '.')}} VNĐ</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Thời gian</label>
                                <input type="datetime-local" name="travel_time" value="{{$year}}-{{$month}}-{{$day}}T{{$hour}}:{{$minute}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('passenger.index')}}" class="btn btn-danger">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- <img src="{{asset($passenger->avatar)}}" width="100px;" alt=""> --}}