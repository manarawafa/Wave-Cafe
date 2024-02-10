<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
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
        $Beverage = Beverage::where('special', 'no')->get();
        $Category = Category::latest()->limit(3)->get();
        return view('drink', compact('Beverage'), compact('Category'));
        // return view('drink');
    }


}
