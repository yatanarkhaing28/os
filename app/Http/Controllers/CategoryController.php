<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validation
        $request->validate([
            'name'=>'required',
            'photo'=>'required',
        ]);
        // If include file, upload
        // file upload
        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/categoryimg'),$imageName);

        $myfile='backend/categoryimg/'.$imageName;
        // Data insert
        $category=new Category;
        $category->name=$request->name;
        $category->photo=$myfile;
        $category->save();
        // Redirect
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catagory=Category::find($id);

        return view('backend.categories.show',compact('catagory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('backend.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'sometimes',
        ]);

        // If include file, upload
        // file upload
        if ($request->hasFile('photo')) {

        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/categoryimg'),$imageName);

        $myfile='backend/categoryimg/'.$imageName;
        }else{
            $myfile=$request->oldphoto;
        }
        // Data insert
        $category=Category::find($id);
        $category->name=$request->name;
        $category->photo=$myfile;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category=Category::find($id);
        $category->delete();
        // redirect
        return redirect()->route('categories.index'); 
    }
}
