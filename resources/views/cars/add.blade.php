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
                                <label for="">Biển số xe</label>
                                <input type="text" class="form-control" name="plate_number" id="">
                                @if (session('message_plate_number')) <div class="text-danger"> {{ session('message_plate_number') }} </div> @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Ảnh biển số</label>
                                <input type="file" class="form-control" name="plate_image" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Chủ sở hữu</label>
                                <input type="text" class="form-control" name="owner" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phí</label>
                                <input type="number" class="form-control" name="travel_fee" id="">
                                @if (session('message_travel_fee')) <div class="text-danger"> {{ session('message_travel_fee') }} </div> @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection