<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showsections=Section::get();
        return view('blogs.create_blog',compact('showsections'));
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
        $validatedData = $request->validate([
        
            'article' => ['required'],
            'section_id' => ['required'],
            
        ]);
        $store=new Blog;
        $store->user_name=auth::user()->name;
        $store->country=$request->country;
        $store->city=$request->city;
        $store->article=$request->article;
        $store->blog_title=$request->blog_title;
        $store->section_id=$request->section_id;
        
        if($request->image='null')
        {
            
            $store->image=$request->image;
        }
        else{
            $store->image=$request->image;
            $image=$request->file('image');
        $name_image=$image->getClientOriginalName();
        $image->storeAs("public/images",$name_image);
        }
      
        
        $store->save();
        session()->flash('sucsses', 'Article was Created');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $showBlog=Blog::find($id);
        $comments=Comment::where('blog_id',$id)->get();
        $sections=Section::all();
        return view('blogs.show_blog',compact('showBlog','comments','sections'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit=Blog::find($id);
        $sections=Section::all();
        return view('blogs.edit',compact('edit','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $validatedData = $request->validate([
        
        'article' => ['required'],
        'section_id' => ['required'],
        
    ]);
    $id = $request->blog_id;
    $upd = Blog::find($id);

    $upd->user_name = auth::user()->name;
    $upd->country = $request->country;
    $upd->city = $request->city;
    $upd->article = $request->article;
    $upd->blog_title = $request->blog_title;

    // تأكد من استخدام section_id بدلاً من section
    $upd->section_id = $request->section_id;

    if($request->image='null')
    {
        
        $upd->image=$request->image;
    }
    else{
        $upd->image=$request->image;
        $image=$request->file('image');
    $name_image=$image->getClientOriginalName();
    $image->storeAs("public/storage/images",$name_image);
    }
  

    $upd->save();
    session()->flash('update');
    $showBlog=Blog::find($id);
    $comments=Comment::where('blog_id',$id)->get();
    return view('blogs.show_blog',compact('showBlog','comments'));}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $delete=Blog::find($id);
    if($delete)
    {

        $delete->delete();
    }
     session()->flash('delete', 'Article was Deleted');
    return view("index");

    }

}
