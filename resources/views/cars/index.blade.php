@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên cột</label>
                                <select name="column_names" class="form-control">
                                    @foreach ($column_names as $key => $item)
                                        <option  @if($key == $searchData['column_names']) selected @endif value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sắp xếp theo</label>
                                <select name="order_by" class="form-control">
                                    @foreach ($order_by as $key => $item)
                                        <option @if($key == $searchData['order_by']) selected @endif value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                    </div>               
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Biển số xe</th>
                        <th>Ảnh biển số</th>
                        <th>Chủ sở hữu</th>
                        <th>Phí</th>
                        <th>Số lượng hành khách</th>

                        @if (isset(Auth::user()->id) && Auth::user()->id < 3)
                        <th>
                            <a href="{{route('car.add')}}">Add new</a>
                        </th>
                        @else
                        @endif

                    </thead>
                    <tbody>
                        @foreach ($cars as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->plate_number}}</td>
                                <td>
                                    <img src="{{ asset($item->plate_image) }}" width="50px;" alt="">
                                </td>
                                <td>{{$item->owner}}</td>
                                <td>{{number_format($item->travel_fee, 0, ',', '.')}} VNĐ</td>
                                <td>{{count($item->passengers)}}</td>

                                @if (isset(Auth::user()->id) && Auth::user()->id < 3)
                                <td>
                                    <a href="{{route('car.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('car.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa xe có biển số {{$item->plate_number}} chứ?');">Xóa</a>
                                </td>
                                @else
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection