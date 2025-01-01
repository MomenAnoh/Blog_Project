<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
   
        return view('index');
        
    }
    public function test()
    {
        
        // return view ('testphoto');
    }
}
