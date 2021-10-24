<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food1;
use App\Models\Chef;

class AdminController extends Controller
{
    public function user()
    {
        return view('admin.user');
    }
    public function foodmenu()
    {
        return view('admin.foodmenu');
    }
    public function upload(Request $request)
    {
        $data = new food1;

        $image = $request->image;

        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }
    public function viewchef()
    {
        $data=chef::all();
        return view('admin.adminchef', compact("data"));
    }

    public function chef(Request $request)
    {
        $data2 = new Chef;
        $image = $request->image;
        $imagename =time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data2->image=$imagename;
        $data2->name=$request->name;
        $data2->speciality=$request->speciality;
        $data2->save();
        return redirect()->back();
    }

    public function updatechef($id)
    {
        $data=chef::find($id);
        return view ('admin.updatechef', compact("data"));

    }

}
