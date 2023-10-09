<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index', ['category' => Category::all()]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required | max:100',
            'icon' => 'image',
        ], [
            'name.required' => 'please give a Name'
        ]);

        $category = new Category();
        $category->name = $r->name;
        $category->desc = $r->desc;
        $icon = $r->icon;
        if ($icon) {
            $iconName = 'category-icon' . time() . rand() . '.' . $icon->extension();
            $path = 'category-icons/';
            $icon->move($path, $iconName);
            $category->icon = $path . $iconName;
        }
        $category->save();

        return back()->with('message', 'Category Added Successfully!');
    }
    public function edit($id)
    {
        return view('backend.category.edit', [
            'category' => Category::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $icon = $request->icon;
        if ($icon) {
            if (file_exists($category->$icon)) {
                unlink($category->$icon);
            }
            $iconName = 'category-icon' . time() . rand() . '.' . $icon->extension();
            $path = 'category-icons/';
            $icon->move($path, $iconName);
            $category->icon = $path . $iconName;
        }
        $category->save();

        return redirect('admin/category/manage');
    }
    public function delete($id)
    {

        $category = Category::find($id);
        if($category->icon){
            if(file_exists(($category->icon))){
                unlink($category->icon);
            }
        }
        $category->delete();
        return back();

    }
}
