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
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <div class="row">
                                    <div class="col-4 offset-4">
                                        <img src="{{asset($product->image)}}" class="img-thumbnail">
                                    </div>
                                </div>
                                <input type="file" name="image" class="form-control" placeholder="">
                                @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng:</label>
                                <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="">
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
                                        <option @if($item->id == $product->cate_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="">
                                @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-12 mb-4">                
                            <div class="form-group">
                                <label for="">Chi tiết:</label>
                                <textarea name="detail" rows="10" class="form-control">{{$product->detail}}</textarea>
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