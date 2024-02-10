<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $userr = User::all();
        return view('admin.users', compact('userr'));

    }
    public function create()
    {
        return view('admin.addUser');
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        if ($request->has('active')) {
            //Checkbox checked
            $user->active = "yes";
        } else {
            $user->active = "no";
            //Checkbox not checked
        }
        $user->save();
        return redirect('/uos');
    }
    public function update(Request $request, string $id)
    {
        if ($request->has('active')) {
            //Checkbox checked
            $uactive = "yes";
        } else {
            $uactive = "no";
            //Checkbox not checked
        }
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'active' => $uactive,
        ]);

        return redirect('/uos');

    }



    public function edit(string $id)
    {
        $userr = User::findOrFail($id);
        return view('admin.editUser', compact('userr'));


    }
    public function show(string $id)
    {
        $userr = User::findOrFail($id);
        return view('admin.showuser', compact('userr'));
    }

    public function deleteuser(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect('/uos');

    }

}
