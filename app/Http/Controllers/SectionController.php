<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showsections=Section::get();
        return view('section.create_section',compact('showsections'));
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
            'section' => ['required', 'unique:sections,section', 'max:255'],
            'description' => ['required'],
        ],[
            'section.unique' => 'القسم موجود بالفعل',
            'section.required' => 'يرجي ادخال اسم القسم',
            'description.required' => 'يرجي ادخال الوصف',
        ]);

            $store=new Section();
            $store->section=$request->section;
            $store->description=$request->description;
            $store->created_by=(Auth::user()->name);
            $store->save();


            session()->flash('sucsses', 'Section was Created');
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // استرجاع القسم والمقالات المرتبطة به
        $section = Section::with('Blog')->findOrFail($id);
        return view('blogs.blogOFsetion', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $upd=Section::find($id);
        $upd->section=$request->section;
        $upd->description=$request->description;
        $upd->created_by=(Auth::user()->name);
        $upd->save();
        session()->flash('update', 'Section was updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Section::destroy($id);
        session()->flash('delete', 'Section was deleted');
        return redirect()->back();
    }
}
