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
                                <label for="">Từ khóa</label>
                                <input type="text" class="form-control" name="keyword" value="{{$searchData['keyword']}}" placeholder="Tìm theo tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="car_id" class="form-control">
                                    <option value="">Tất cả</option>
                                    @foreach ($cars as $item)
                                        <option @if($item->id == $searchData['car_id']) selected @endif value="{{$item->id}}">{{$item->plate_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                        <th>Tên</th>
                        <th>Biển số xe</th>
                        <th>Thời gian</th>
                        <th>Avatar</th>

                        @if (isset(Auth::user()->id) && Auth::user()->id < 3)
                        <th>
                            <a href="{{route('passenger.add')}}">Add new</a>
                        </th>
                        @else
                        @endif
                        
                    </thead>
                    <tbody>
                        @foreach ($passengers as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->car->plate_number}}</td>
                                <td>{{$item->travel_time}}</td>
                                <td>
                                    <img src="{{ asset($item->avatar) }}" width="50px;" alt="">
                                </td>

                                @if (isset(Auth::user()->id) && Auth::user()->id < 3)
                                <td>
                                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('passenger.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa hành khách tên {{$item->name}} chứ?');">Xóa</a>
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