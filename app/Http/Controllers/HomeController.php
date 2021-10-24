<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food1;
use App\Models\Chef;
use App\Models\reservation;

class HomeController extends Controller
{
    public function index()
    {   $data=Food1::all();
        $data2=Chef::all();
        return view('home', compact('data', 'data2'));

    }
    public function redirects()
    {
        $data=Food1::all();
        $usertype = Auth::user()-> usertype;

        if($usertype=='1')
         {
            return view('admin.admin', compact('data'));

        } 
        else {
            return view('home', compact('data'));
        }
    }
    public function reserve( Request $request)

    {   $data= new reservation;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->guests=$request->guests;
        $data->save();
        return redirect()->back();
        //Sometimes you may need to redirect to a domain outside of your application. You may do so by calling the away 
        
        //return redirect()->away('https://www.google.com');

    }
}
