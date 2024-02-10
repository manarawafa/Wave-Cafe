<?php
namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\Category;
use Illuminate\Http\Request;

class BeverageController extends Controller
{
    public function index()
    {
        $Beveragee = Beverage::all();
        return view('admin.beverages', compact('Beveragee'));

    }
    public function create()
    {
        $categ = Category::all();
        return view('admin.addBeverage', compact('categ'));
    }
    public function store(Request $request)
    {
        $Beverage = new Beverage();
        $Beverage->title = $request->title;
        $Beverage->content = $request->content;
        $Beverage->price = $request->pricce;
        $Beverage->category_id = $request->category;

        //////////////////////////////add image////////////////////////////////
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // Public Folder
        $request->image->move(public_path('beverageee'), $imageName);
        $Beverage->image = $imageName;
        /////////////////////////////////////////////////////////////
        if ($request->has('published')) {
            //Checkbox checked
            $Beverage->published = "yes";
        } else {
            $Beverage->published = "no";
            //Checkbox not checked
        }

        if ($request->has('special')) {
            //Checkbox checked
            $Beverage->special = "yes";
        } else {
            $Beverage->special = "no";
            //Checkbox not checked
        }
        $Beverage->save();
        return redirect('/beverage');
    }
    public function update(Request $request, string $id)
    {


        if ($request->has('special')) {
            //Checkbox checked
            $Bspecial = "yes";
        } else {
            $Bspecial = "no";
            //Checkbox not checked
        }
        if ($request->has('publish')) {
            //Checkbox checked
            $Bpublish = "yes";
        } else {
            $Bpublish = "no";
            //Checkbox not checked
        }

        //////////////////////////////add image////////////////////////////////
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            // Public Folder
            $request->image->move(public_path('beverageee'), $imageName);
        } else {
            $imageName = $request->img;
        }

        /////////////////////////////////////////////////////////////
        Beverage::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category,
            'special' => $Bspecial,
            'image' => $imageName,
            'published' => $Bpublish,


        ]);

        return redirect('/beverage');

    }
    public function edit(string $id)
    {
        $Beverage = Beverage::findOrFail($id);
        $categ = Category::all();
        return view('admin.editBeverage', compact('Beverage'), compact('categ'));
    }

    public function deleteBeverage(string $id)
    {
        Beverage::findOrFail($id)->delete();
        return redirect('/beverage');

    }
    //
    //
}
