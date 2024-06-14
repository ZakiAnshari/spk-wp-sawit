<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        
        $users = User::all();
        $roles = Roles::all();
        $keyword = $request->keyword;
        $users = User::where('username','LIKE','%' .$keyword. '%')
            ->orWhere('email',$keyword)
            ->Paginate(5);
        return view('admin.user',['users' => $users ,'roles' => $roles ]);
    }

    public function add()
    {
        $roles = Roles::all();
        return view('admin.user-add',['roles' => $roles ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);


        $users = User::create([
            'password' => bcrypt( $request->password ),
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect('/user')->with('toast_success','User baru berhasil di ditambahkan');
    }

    public function destroy($id)
    { 
        $users = User::where('id',$id)->first();
        $users->delete();
        return redirect('/user')->with('toast_success','User berhasil di Hapus');
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('admin.user-detail',['users'=>$users]);
    }
    public function edit($slug)
    {
        $roles = Roles::all();
        $users = User::where('slug',$slug)->first();
        return view('admin.user-edit',['users'=>$users],['roles' => $roles ]);
    }

    public function update(Request $request,$slug)
    {       
        $users = User::where('slug',$slug)->first();
        $users->slug = null;
        $users->update($request->all());
        return redirect('/user')->with('toast_success','Data Karyawan berhasil di Edit');
    }
}
