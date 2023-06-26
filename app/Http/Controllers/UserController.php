<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $inputlevelUser = ["admin", "operator"];
    public function index()
    {
        $data_user = User::orderBy("id", "DESC")->get();
        return view("user.index", [
            "title" => "Data User",
            'data_user' => $data_user]);
    }
    public function show($id)
    {
        $data_user = User::find($id);

        return view("user.show", [
            "title" => "User",
            "data_user" => $data_user
        ]);

    }
    public function create()
    {
        $user = new User();
        $method = 'post';
        $action = route('user.store');

        return view('user.create',
        [   'title'=>'Tambah User',
            'user'=> $user,
            'method'=>$method,
            'action'=>$action,
            'input_level_user'=>$this->inputlevelUser
        ]);

    }
    public function store(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $level = $request->input('level');

        $user = new User();
        $user->username = $username;
        $user->password = $password;
        $user->level = $level;

        $user->save();

        return Redirect::route('user.index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $method = 'put';
        $action = route('user.update', ['id' => $user->id]);

        return view('user.edit', [
            'title' => "edit",
            'user' => $user,
            'method' => $method,
            'action' => $action,
            'input_level_user'=>$this->inputlevelUser
        ]);
        
    }
    public function update(Request $request, $id)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $level = $request->input('level');

        $user = User::find($id);
        $user->username = $username;
        if ($password != "") {
            $user->password = $password;
        }
        $user->level = $level;

        $user->save();

        return Redirect::route('user.index');
    }
        public function destroy($id)
        {
            User::destroy ($id);
            return Redirect::route('user.index');
        }

    //
}
