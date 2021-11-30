@extends('admin.layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" placeholder="">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="image" class="form-control" placeholder="">
                                @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng:</label>
                                <input type="text" name="quantity" class="form-control" placeholder="">
                                @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="cate_id" class="form-control">
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" name="price" class="form-control" placeholder="">
                                @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">                
                            <div class="form-group">
                                <label for="">Chi tiết:</label>
                                <textarea name="detail" rows="10" class="form-control"></textarea>
                              </div>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end">
                            <br>
                            <a href="{{route('product.index')}}" class="btn btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection