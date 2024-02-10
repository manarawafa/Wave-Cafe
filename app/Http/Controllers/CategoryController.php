<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $Category = Category::all();
        return view('admin.categories', compact('Category'));

    }
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->beverages()->count() > 0) {
            // Category has associated beverages, prevent deletion
            //return "error";
            return redirect()->back()->withErrors(['error' => 'Cannot delete category with associated beverages.']);
        }

        $category->delete();

        return redirect('/category')->with('success', 'Category deleted successfully.');
    }
    public function create()
    {
        return view('admin.addCategory');
    }
    public function store(Request $request)
    {
        $Category = new Category();
        $Category->categoryname = $request->categoryname;
        $Category->save();
        return redirect('/category');
    }
    public function update(Request $request, string $id)
    {
        Category::where('id', $id)->update([
            'categoryname' => $request->categoryname,
        ]);
        return redirect('/category');
    }
    public function edit(string $id)
    {
        $Category = Category::findOrFail($id);
        return view('admin.editCategory', compact('Category'));
    }

    public function deletecategory(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/category');

    }
    //
}
