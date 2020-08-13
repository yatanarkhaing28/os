<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	$items=Item::orderBy('id','desc')->take(6)->get();
    	// dd($items);
    	return view('frontend.home',compact('items'));
    }

    public function item1()
    {
        $items=Item::orderBy('id','desc')->take(6)->get();
        return view('frontend.item1',compact('items'));
    }

    public function detail($id)
    {
        return view('frontend.detail');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function profile()
    {
        return view('frontend.profile');
    }


}
