<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCarRequest;
use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request){
        $column_names = [
            'id' => 'ID',
            'plate_number' => 'Biển số xe',
            'owner' => 'Chủ sở hữu',
            'travel_fee' => "Phí"
        ];
        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];

        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";
        
        $query = Car::where('plate_number', 'like', '%%');
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }
        $cars = $query->get();
        $cars->load('passengers');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;

        return view('cars.index', compact('cars', 'column_names', 'order_by', 'searchData'));
    }

    public function addForm(){
        return view('cars.add');
    }

    public function saveAdd(SaveCarRequest $request){
        $model = new Car();

        if (10 > substr($request->plate_number, 0, 2) | substr($request->plate_number, 0, 2) > 100){
            return redirect(route('car.add'))->with('message_plate_number', 'Nhập lại biển số xe, 2 ký tự đầu là số từ 10 đến 99');
        }

        if ($request->travel_fee <= 0){
            return redirect(route('car.add'))->with('message_travel_fee', 'Bạn đã nhập sai phí, mời nhập phí lớn hơn 0');
        } else {
            if ($request->hasFile('plate_image')){
                $imgPath = $request->file('plate_image')->store('cars');
                $imgPath = str_replace('public/', '', $imgPath);
                $model->plate_image = $imgPath;
            }
            $model->fill($request->all());
            $model->save();
            return redirect(route('car.index'));
        }
    }

    public function editForm($id){
        $car = Car::find($id);
        if(!$car){
            return redirect()->back();
        }
        return view('cars.edit', compact('car'));
    }

    public function saveEdit($id, SaveCarRequest $request){
        $model = Car::find($id);
        if(!$model){
            return redirect(route('car.index'));
        }

        if (10 > substr($request->plate_number, 0, 2) | substr($request->plate_number, 0, 2) > 100){
            return redirect(route('car.edit', ['id' => $id]))->with('message_plate_number', 'Nhập lại biển số xe, 2 ký tự đầu là số từ 10 đến 99');
        }

        if ($request->travel_fee <= 0){
            return redirect(route('car.edit', ['id' => $id]))->with('message_travel_fee', 'Bạn đã nhập sai phí, mời nhập phí lớn hơn 0');
        } else {
            if($request->hasFile('plate_image')){
                // $oldImg = str_replace('storage/', 'public/', $model->plate_image);
                Storage::delete($model->plate_image);
                
                $imgPath = $request->file('plate_image')->store('cars');
                $imgPath = str_replace('public/', '', $imgPath);
                $model->plate_image = $imgPath;
            }
            $model->fill($request->all());
            $model->save();
            return redirect(route('car.index'));
        }
    }

    public function remove($id){
        $passengers = Passenger::where('car_id', $id)->delete();
        Car::destroy($id);
        return redirect(route('car.index'));
    }
}
