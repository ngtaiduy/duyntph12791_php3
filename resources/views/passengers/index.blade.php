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
                        <th>Tên</th>
                        <th>Biển số xe</th>
                        <th>Thời gian</th>
                        <th>Avatar</th>
                        <th>
                            <a href="{{route('passenger.add')}}">Add new</a>
                        </th>
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
                                <td>
                                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('passenger.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa chứ?');">Xóa</a>
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