<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'))->with('Category List');
    }



    public function create()
    {
        return view('category.create')->with('title','Create New Category');
    }



    public function store(Request $request)
    {
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_meta_data = str_slug($request->cat_name).time().'.html';
        if($category->save()){
            return redirect()->back()->with('success', 'New Category Added Successfully.');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }

    }


    public function edit($cat_meta_data)
    {
         $category = Category::where('cat_,eta_data',$cat_meta_data)->first();
         return view('category.edit', compact('category'))->with('title', 'Edit Category');
    }




    public function update(Request $request, $cat_meta_data)
    {
        $category = Category::where('cat_,eta_data',$cat_meta_data)->first();
        $category->cat_name = $request->cat_name;
        if($category->save()){
            return redirect()->back()->with('success', 'Category Updated Successfully.');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }


    public function delete($cat_meta_data)
    {
        $category = Category::where('cat_,eta_data',$cat_meta_data)->first();
        if($category->delete()){
           return redirect()->back()->with('success', 'Category Deleted Successfully.');
        }else{
           return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }


}
