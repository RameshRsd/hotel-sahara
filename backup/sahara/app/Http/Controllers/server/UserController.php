<?php

namespace App\Http\Controllers\server;

use App\Server;
use App\User;
use App\Customer;
use App\District;
use App\Floor;
use App\RoomBook;
use App\RoomType;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends ServerController
{

    public function AddUser(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->title('User Control'));
            $this->data('server', Server::all());
            $this->data('userData', User::where('user_validate','0')->orderBy('id')->get());
            return view($this->pagePath . 'addUser', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|unique:users,name|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|confirmed',
                'upload' => 'mimes:jpg,png,jpeg,gif'


            ]);


            if (($request->hasFile('image'))) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('images/userimages/');
                if ($image->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }


            }

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            if (User::create($data)) {
                $this->data('userData', User::All());
                return redirect()->route('addUser')->with('success', 'User was inserted successfully');
            }

        }

    }

    public function editUser($id)
    {
        $this->data('UpdateUserData', User::findOrFail($id));
        $this->data('server', Server::all());
        return view($this->pagePath.'editUser',$this->data);
    }
    public function updateUser(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->name = \request('name');
        $User->email = \request('email');

        if($request->hasFile('image')){
            if (is_file($User->image) && file_exists($User->image)){
                unlink($User->image);
            }
            $filename = time().'.'.request()->file('image')->getClientOriginalExtension();

            $filename = md5(microtime()) . '.' . $filename;

            request()->file('image')->move('public/images/userimages/',$filename);
            $User->image =$filename;
        }
        $User->save();
        return redirect()->route('addUser')->with('success', 'Record Updated');
    }
    public function updateUserSts(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->user_status = \request('user_status');

        $User->save();
        return redirect()->route('addUser')->with('success', 'Record Updated');
    }
    public function updateUserStatus(Request $request, $id)
    {
        $about = User::findOrFail($id);
        $requestData = \request()->all();
        $about->update($requestData);
        return redirect()->route('addUser')->with('success', 'Record Updated');
    }

    public function destroy($id)
    {
        $addUser = User::findOrFail($id);

        $addUser->delete();

        return redirect()->route('addUser')->with('success', 'Record Deleted');

    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
        if(\Illuminate\Support\Facades\Auth::user()){
        return redirect()->intended('admin');}
        else{
            return view($this->pagePath . 'login.login', $this->data);}

        }
        if ($request->isMethod('post')) {
            $userName = $request->name;
            $password = $request->password;
            if (Auth::attempt(['name' => $userName, 'password' => $password])) {
               return redirect()->intended('admin');
            } else {
                return redirect()->route('login')->with('error','username and password not match');
            }


        }

    }

    public function getPassword(){

        $this->data('userData', User::all());
        $this->data('RoomData', Room::orderBy('room_no')->get());
        $this->data('FloorData', Floor::all());
        $this->data('RoomTYpeData', RoomType::all());
        $this->data('customer', Customer::all());
        $this->data('booked', RoomBook::all());
        $this->data('server', Server::all());
        $this->data('district', District::all());
        return view($this->pagePath.'auth.password',$this->data);
    }

    public function postPassword()
    {
        $this->validate(request(),[
            'old_password' =>'required',
            'password' =>'required|confirmed|min:6'
        ]);
        if (Hash::check(request('old_password'), Auth::user()->getAuthPassword())) {
            Auth::user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return redirect()->route('password')->with('success', 'Password Change Successfully');
        } else {
            return redirect()->route('password')->with('error', 'Old password Incorrect');
        }
        return redirect()->back();
    }


    public function logout(){
       Auth::logout();
       return redirect(url('/'));
    }



}
