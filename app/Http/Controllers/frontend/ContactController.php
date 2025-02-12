<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function index(){
        return view("frontend.Contact");
    }
    public function saveContact(Request $request)
    {
        $user=Auth::user();
        $contact=new Contact();
        if($user !=null){
            $contact->user_id=$user->id;
        }
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->title=$request->title;
        $contact->content=$request->content;
        $contact->created_at=date('Y-m-d H:i:s');
        $contact->save();
        return redirect()->route('site.home');
    }
}
