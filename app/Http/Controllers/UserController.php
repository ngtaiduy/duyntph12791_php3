<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){
        $column_names = [
            'name' => 'Name',
            'email' => 'Email'
        ];
        $order_by = [
            'asc' => 'A-Z',
            'desc' => 'Z-A'
        ];

        $keyword = $request->has('keyword') ? $request->keyword : "";
        $role_id = $request->has('role_id') ? $request->role_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        $query = User::where('name', 'like', "%$keyword%");

        if ($request->name_email == 1) {
            $query = User::where('email', 'like', "%$keyword%");
        }
        
        if($rq_order_by == 'asc'){
            $query->orderBy($rq_column_names);
        }else{
            $query->orderByDesc($rq_column_names);
        }
        if(!empty($role_id)){
            $query->where('role_id', $role_id);
        }

        // $users = User::all();
        $users = $query->get();
        $roles = Role::all();
        $users->load('role');
        $searchData = compact('keyword', 'role_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        $searchData['name_email'] = $request->name_email;

        return view('users.index', compact('users', 'roles', 'column_names', 'order_by', 'searchData'));
    }

    public function detail($id){
        $user = User::find($id);
        if(!$user){
            return redirect(route('admin-dashboard'));
        }
        $user->load('role');
        return view('users.detail', compact('user'));
    }

    public function changePassword($id){
        return view('users.change-password');
    }

    public function saveChange($id, Request $request){
        $user = User::find($id);

        $password = $request->password;
        $newP = $request->newpassword;
        $newP2 = $request->newpassword2;

        // dd($password);
        // dd(password_verify($password, $user->password));

        if (password_verify($password, $user->password)){
            if ($newP == $newP2){
                $newPasswordHash = Hash::make($newP);
                $user->password = $newPasswordHash;
                $user->save();
                return redirect(route('user.detail', ['id' => $id]))->with('message_success', 'B???n ???? thay ?????i m???t kh???u th??nh c??ng');
            } else {
                return redirect(route('change-password', ['id' => $id]))->with('message_password2', 'M???t kh???u m???i nh???p l???i kh??ng tr??ng');
            }
        } else {
            return redirect(route('change-password', ['id' => $id]))->with('message_password', 'B???n nh???p sai m???t kh???u hi???n t???i');
        }
    }

    public function addForm(){
        return view('users.add');
    }

    public function saveAdd(Request $request){
        $count_user = User::where('email', $request->email)->count();
        if ($count_user > 0){
            return redirect(route('user.add'))->with('message_email', 'Email ???? c?? ng?????i d??ng');
        } 
        if ($request->password == $request->password2){
            $model = new User();

            if($request->hasFile('avatar')){
                $imgPath = $request->file('avatar')->store('users');
                $imgPath = str_replace('public/', '', $imgPath);
                $model->avatar = $imgPath;
            }

            $passwordHash = Hash::make($request->password);
            $model->fill($request->all());
            $model->password = $passwordHash;
            $model->save();
            return redirect(route('user.index'));
        } else {
            return redirect(route('user.add'))->with('message_password', 'M???t kh???u kh??ng tr??ng kh???p, m???i nh???p l???i');
        }
    }
    

    public function register(){
        return view('auth.register');
    }

    public function saveRegister(Request $request){
        $count_user = User::where('email', $request->email)->count();
        if ($count_user > 0){
            return redirect(route('register'))->with('message_email', 'Email ???? c?? ng?????i d??ng');
        } 
        if ($request->password == $request->password2){
            $model = new User();

            if($request->hasFile('avatar')){
                $imgPath = $request->file('avatar')->store('users');
                $imgPath = str_replace('public/', '', $imgPath);
                $model->avatar = $imgPath;
            }

            $passwordHash = Hash::make($request->password);
            $model->fill($request->all());
            $model->password = $passwordHash;
            $model->save();
            return redirect(route('login'))->with('message_register_success', 'B???n ???? ????ng k?? th??nh c??ng, m???i ????ng nh???p');
        } else {
            return redirect(route('register'))->with('message_password', 'M???t kh???u kh??ng tr??ng kh???p, m???i nh???p l???i');
        }
    }

    public function editForm($id){
        $user = User::find($id);
        $roles = Role::all();
        if (!$user){
            return redirect()->back();
        }
        return view('users.edit', compact('user', 'roles'));
    }

    public function saveEdit($id, Request $request){
        $model = User::find($id);
        if(!$model){
            return redirect(route('user.index'));
        }
        $users_except = User::all()->except($id);
        $count_user = $users_except->whereIn('email', $request->email)->count();
        if ($count_user > 0){
            return redirect(route('user.edit', ['id' => $id]))->with('message_email', 'Email ???? c?? ng?????i d??ng');
        }
        if($request->hasFile('avatar')){
            Storage::delete($model->avatar);
            
            $imgPath = $request->file('avatar')->store('users');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.detail', ['id' => $id]))->with('message_success', 'B???n ???? thay ?????i th??ng tin th??nh c??ng');
    }

    public function editRole($id){
        $user = User::find($id);
        $roles = Role::all();
        if (!$user){
            return redirect()->back();
        }
        return view('users.edit-role', compact('user', 'roles'));
    }

    public function saveRole($id, Request $request){
        $model = User::find($id);
        if(!$model){
            return redirect(route('user.index'));
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.index'));
    }

    public function remove($id){
        $model = User::find($id);
        if(Auth::user()->id == $id) {
            return redirect(route('user.index'))->with('message_delete', 'Kh??ng ???????c x??a t??i kho???n admin b???n ??ang ????ng nh???p');
        }
        if(!empty($model->image)){
            // $imgPath = str_replace('storage/', 'public/', $model->image);
            Storage::delete($model->image);
        }
        $model->delete();
        return redirect(route('user.index'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $user->load('staff_info', 'customer_info');
        return response()->json($user);
        // if($user->role_id == 1){
        //     dd($user->customer_info);
        // }
        // dd($user->staff_info);
    }
}
