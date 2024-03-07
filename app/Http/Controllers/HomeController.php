<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $home = DB::table('home_page')->first();
        if ($home) {
            return view('website.home', compact('home'));
        }
        return view('website.home');
    }

    public function create()
    {
        return view('dashboard.admin.home-page');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'banner_text' => 'required',
            'banner_image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $filename = 'banner-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/pages/');
            $image->move($destinationPath, $filename);
            $request->banner_image = $filename;
        }
        DB::table('home_page')->insert([
            'banner_text' => $request->banner_text,
            'banner_image' => $request->banner_image,
        ]);

        return redirect()->back()->with('success', 'Banner added successfully');
    }
}
