<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function welcomepage()
    {
        $Beverage = Beverage::where('special', 'no')->get();
        $Category = Category::latest()->limit(3)->get();
        return view('drink', compact('Beverage'), compact('Category'));
    }

    public function special()
    {

        $Beveragee = Beverage::where('special', 'yes')->get();
        return view('special', compact('Beveragee'));
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function linkcategory(string $id)
    {
        $Beverage = Category::find($id)->beverages;
        $Category = Category::latest()->limit(3)->get();
        return view('linkcategory', compact('Beverage'), compact('Category'));

    }

    public function tru(string $id)
    {

        $Beveragee = Category::find($id)->beverages;
        return view('tru', compact('Beveragee'));
    }

    //
}
