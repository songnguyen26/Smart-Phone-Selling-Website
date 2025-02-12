<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=User::where('status','!=',0)
        ->get();
        return view('backend.user.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->username=$request->username;
        $user->password=md5($request->password);
        $user->roles=$request->roles;
        $user->status=$request->status;
        $user->created_at=date('Y-m-d H:i:s');
        $user->created_by=Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::where('id','=',$id)
        ->first();
        if($user)
        {
            $userArray=$user->toArray();
        }
        else{
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.show',compact('userArray','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user=User::find($id);
        
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user=User::find($id);
        if($user==null){
            return redirect()->route('admin.user.index');
        }
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->status=$request->status;
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function trash()
    {
        
        $list = User::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.user.trash',compact('list'));
    }
    public function status(string $id)
    {
        $user=User::find($id);
        if($user==null){
            return redirect()->route('admin.user.index');
        }
        $user->status=($user->status==1)? 2: 1; 
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function delete(string $id)
    {
        $user=User::find($id);
        if($user==null){
            return redirect()->route('admin.user.index');
        }
        $user->status=0; 
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function restore(string $id)
    {
        $user=User::find($id);
        if($user==null){
            return redirect()->route('admin.user.trash');
        }
        $user->status=1; 
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.trash');
    }
    /**
     * Remove the specuserified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        if($user==null){
            return redirect()->route('admin.user.trash');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
}
