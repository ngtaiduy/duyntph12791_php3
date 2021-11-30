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
                                <select name="cate_id" class="form-control">
                                    <option value="">Tất cả</option>
                                    @foreach ($categories as $item)
                                        <option @if($item->id == $searchData['cate_id']) selected @endif value="{{$item->id}}">{{$item->name}}</option>
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
                <table class="table table-stripped">
                    <thead>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Đã bán</th>
                        <th>
                            <a href="{{route('product.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{($products->currentPage()-1)*$products->perPage() + $loop->iteration}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <a href="{{Route('category.detail', ['id' => $item->category->id])}}">{{$item->category->name}}</a>
                                </td>
                                <td>
                                    <img src="{{asset($item->image)}}" width="100">
                                </td>
                                <td>
                                    {{count($item->orders)}}
                                </td>
                                <td>
                                    <a href="{{route('product.edit', ['id' => $item->id])}}">Edit</a>
                                    <a href="{{route('product.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa chứ?');">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                {{$products->links()}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection