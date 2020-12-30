<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact; 
use App\Model\communicate;
use Auth;
class ContactController extends Controller
{
    public function view(){
    	$data['Contact_count'] = Contact::count();
    	$data['alldata'] = Contact::all();
    	return view('backend.contacts.view-contact',$data);
    }

    public function add(){
    	return view('backend.contacts.add-contact');
    }
    
    public function store(Request $request){

        $data = new Contact();
        $data->create_by = Auth::user()->id;

        $data->address      = $request->address;
        $data->mobile       = $request->mobile;
        $data->email        = $request->email;
        $data->facebook     = $request->facebook;
        $data->twiter       = $request->twiter;
        $data->youtube      = $request->youtube;
        $data->google_plus  = $request->google_plus;
        $data->save();
    	return redirect()->route('contacts.view')->with('success','Contact Data Inserted Successful');
    }

    public function edit($id){
    	$editContact = Contact::find($id);
    	return view('backend.contacts.edit-contact',compact('editContact'));
    }

    public function update(Request $request,$id){
        $data = Contact::find($id);
        $data->update_by = Auth::user()->id;
        
        $data->address      = $request->address;
        $data->mobile       = $request->mobile;
        $data->email        = $request->email;
        $data->facebook     = $request->facebook;
        $data->twiter       = $request->twiter;
        $data->youtube      = $request->youtube;
        $data->google_plus  = $request->google_plus;
        $data->save();
        return redirect()->route('contacts.view')->with('success','Contact Update Successful');
    }

    public function delete(Request $request){
    	$contact = contact::find($request->id);
        $contact->delete();
    	return redirect()->back()->with('success','Data Delete Successful');
    }


// communiaction data

    public function communication(){
        $data['commu_data'] = communicate::all();
       return view('backend.contacts.communication',$data);
    }

    public function communicationDelete(Request $request){
        $delete_communation = communicate::find($request->id);
        $delete_communation->delete();
        return redirect()->back()->with('success','Data Delete Successful');
    }

}
