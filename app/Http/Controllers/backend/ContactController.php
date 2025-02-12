<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{   $list=Contact::where('contact.status','!=',0)
        ->join('user','contact.user_id','=','user.id')
        ->select('contact.id as id','contact.name as name','contact.email as email','contact.phone as phone','title','contact.status as status')
        ->get();
        return view('backend.contact.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact=Contact::where('id','=',$id)
        ->first();
        if($contact)
        {
            $contactArray=$contact->toArray();
        }
        else{
            return redirect()->route('admin.contact.index');
        }
        return view('backend.contact.show',compact('contactArray','contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $contact=contact::find($id);

        return view('backend.contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact=contact::find($id);
        if($contact==null){
            return redirect()->route('admin.contact.index');
        }
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->title=$request->title;
        $contact->content=$request->content;
        $contact->status=$request->status;
        $contact->reply_id=Auth::id() ?? 1;
        $contact->updated_at=date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function trash()
    {
        
        $list = Contact::where('status','=',0)->orderBy('created_at','desc')->get();
        return view('backend.contact.trash',compact('list'));
    }
    public function status(string $id)
    {
        $contact=contact::find($id);
        if($contact==null){
            return redirect()->route('admin.contact.index');
        }
        $contact->status=($contact->status==1)? 2: 1; 
        $contact->updated_at=date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function delete(string $id)
    {
        $contact=contact::find($id);
        if($contact==null){
            return redirect()->route('admin.contact.index');
        }
        $contact->status=0; 
        $contact->updated_at=date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function restore(string $id)
    {
        $contact=contact::find($id);
        if($contact==null){
            return redirect()->route('admin.contact.trash');
        }
        $contact->status=1; 
        $contact->updated_at=date('Y-m-d H:i:s');
        $contact->updated_by=Auth::id() ?? 1;
        $contact->save();
        return redirect()->route('admin.contact.trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact=contact::find($id);
        if($contact==null){
            return redirect()->route('admin.contact.trash');
        }
        $contact->delete();
        return redirect()->route('admin.contact.trash');
    }

}
