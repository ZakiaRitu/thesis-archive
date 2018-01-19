<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categoryList()
    {
        $categories = Category::paginate(12);
        return view('category',compact('categories'))->with('title','Choose a Category');

    }


    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index',compact('categories'))->with('title','Category List');
    }



    public function create()
    {
        return view('category.create')->with('title','Create New Category');
    }



    public function store(Request $request)
    {
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_meta_data = str_slug($request->cat_name).time();
        if($category->save()){
            return redirect()->back()->with('success', 'New Category Added Successfully.');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }

    }


    public function edit($cat_meta_data)
    {
         $categories = Category::paginate(20);
         $category = Category::where('cat_meta_data',$cat_meta_data)->first();
         return view('category.edit', compact('category','categories'))->with('title', 'Edit Category');
    }




    public function update(Request $request, $cat_meta_data)
    {
        $category = Category::where('cat_meta_data',$cat_meta_data)->first();
        $category->cat_name = $request->cat_name;
        if($category->save()){
            return redirect()->route('category.index')->with('success', 'Category Updated Successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function destroy($cat_meta_data)
    {
        $category = Category::where('cat_meta_data',$cat_meta_data)->first();
        if($category->delete()){
           return redirect()->back()->with('success', 'Category Deleted Successfully.');
        }else{
           return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }


}
