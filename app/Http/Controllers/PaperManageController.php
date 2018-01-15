<?php

namespace App\Http\Controllers;

use App\Category;
use App\Paper;
use App\User;
use Illuminate\Http\Request;

class PaperManageController extends Controller
{

    protected $uploadFilePath = '/upload/paper/pdf/file-';


    public function index()
    {
        $papers = Paper::all();
        return view('paper.index',compact('papers'))->with('Papers List');
    }


    public function create()
    {
        $paperType =[
            'journal' => 'Journal',
            'conference' => 'Conference',
        ];
        $category = Category::pluck('id','cat_name');
        $users    = User::pluck('id','name');
        return view('paper.create', compact('category','users','paperType'))
            ->with('title','Create New Paper');
    }


    public function store(Request $request)
    {
        $paper = new Paper();
        $paper->paper_title = $request->paper_title;
        $paper->paper_abstract = $request->paper_abstract;
        $paper->paper_published_url = $request->paper_published_url;
        $paper->paper_published_at = $request->paper_published_at;
        $paper->paper_type = $request->paper_type;
        $paper->paper_publish_date =  $request->paper_publish_date;
        $paper->paper_cite = $request->paper_cite;
        $paper->paper_meta_data = str_slug($request->paper_title).time().'.html';
        if( $request->hasFile('file')) {
            $file = $request->file;
            $destinationPath = public_path().$this->uploadFilePath;
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            $paper->paper_pdf = $this->uploadFilePath.$fileName;
        }

        if($paper->save()){
            //author many to many
            $authors = $request->author;
            $paper->users()->attach($authors->toArray());

            $categories = $request->category;
            $paper->categories()->attach($categories->toArray());

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }





    public function edit($paper_meta_data)
    {
        $paper = Paper::where('paper_meta_data',$paper_meta_data)->first();
        $paperType =[
            'journal' => 'Journal',
            'conference' => 'Conference',
        ];
        $category = Category::pluck('id','cat_name');
        $users    = User::pluck('id','name');
        return view('paper.create', compact('category','users','paper','paperType'))
            ->with('title','Edit Paper');
    }


    public function update(Request $request, $paper_meta_data)
    {
        $paper = Paper::where('paper_meta_data',$paper_meta_data)->first();
        $paper->paper_title = $request->paper_title;
        $paper->paper_abstract = $request->paper_abstract;
        $paper->paper_published_url = $request->paper_published_url;
        $paper->paper_published_at = $request->paper_published_at;
        $paper->paper_type = $request->paper_type;
        $paper->paper_publish_date =  $request->paper_publish_date;
        $paper->paper_cite = $request->paper_cite;
        #$paper->paper_meta_data = str_slug($request->paper_title).time().'.html';
        if( $request->hasFile('file')) {
            $file = $request->file;
            $destinationPath = public_path().$this->uploadFilePath;
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            $paper->paper_pdf = $this->uploadFilePath.$fileName;
        }

        if($paper->save()){
            //author many to many
            $authors = $request->author;
            $paper->users()->sync($authors->toArray());

            $categories = $request->category;
            $paper->categories()->sync($categories->toArray());

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }



    public function delete($paper_meta_data)
    {
        $paper = Paper::where('paper_meta_data',$paper_meta_data)->first();
        if($paper->delete()){
            return redirect()->back()->with('success', 'Paper Deleted Successfully.');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }


}
