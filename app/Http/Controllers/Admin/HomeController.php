<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;
use Validator;

class HomeController extends Controller
{
    public function list()
    {
        $list = Home::all();
        return view('/admin/home/list', ['list' => $list]);
    }

    public function addHomeForm()
    {
        return view('/admin/home/addHomeForm');
    }

    public function details($id)
    {
        $home = Home::find($id);
        return view('/admin/home/details', ['home' => $home]);
    }

    public function uploadCoverPhoto(Request $request)
    {
        $data = $request->all();
        $home = Home::find($data['id']);
        if ($home->cover_photo != null) {
            unlink(public_path($home->cover_photo));
        }
        $home->cover_photo = '/uploads/'.$request->file('cover_photo')->storeAs('/home/cover_photo', time().rand(100, 999).'.png');
        $home->save();
        return redirect()->back();
    }

    public function editBasicProfile(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $validatorRule = [
            'id' => 'required|exists:homes,id',
            'name' => 'required',
            'title' => 'required',
            'introduce' => 'required'
        ];
        $validator = Validator::make($data, $validatorRule);
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
        }

        $home = Home::find($data['id']);
        $home->name = $data['name'];
        $home->title = $data['title'];
        $home->introduce = $data['introduce'];
        $home->save();
        return redirect('/admin/home/details/'.$data['id']);
    }
}
