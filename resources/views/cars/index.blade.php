@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Biển số xe</th>
                        <th>Ảnh biển số</th>
                        <th>Chủ sở hữu</th>
                        <th>Phí</th>
                        <th>
                            <a href="{{route('car.add')}}">Add new</a>
                        </th>
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
                                <td>
                                    <a href="{{route('car.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('car.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa chứ?');">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection