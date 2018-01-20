<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPaper;
use App\Paper;
use App\PaperUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaperManageController extends Controller
{

    protected $uploadFilePath = '/uploads/paper/pdf';


    public function checkCategory( array $data){
        //for adding unknown Category
        foreach ($data as $cat) {
            $categoryTag = Category::where('cat_name','=',$cat)->first();
            if(empty($categoryTag)){
                $author = new Category();
                $author->cat_name = $cat;
                $author->cat_meta_data = str_slug($cat).time();;
                $author->save();
            }
        }
        return $categoryIds = Category::whereIn('cat_name', $data)->pluck('id');
    }





    public function index()
    {
        $paperIds = PaperUser::where('user_id', \Auth::user()->id)->pluck('paper_id');
        $papers = Paper::whereIn('id',$paperIds)->paginate(30);
        return view('paper.mypapers',compact('papers'))->with('title','My Papers List');
    }


    public function allPaper(){
        $papers = Paper::paginate(30);
        return view('paper.mypapers',compact('papers'))->with('title','All Papers List');
    }



    public function create()
    {
        $paperType =[
            'JOURNAL' => 'JOURNAL',
            'CONFERENCE' => 'CONFERENCE',
        ];
        $category = Category::pluck('cat_name','cat_name');
        $users    = User::where('is_approved','YES')->pluck('name','id');
        return view('paper.create', compact('category','users','paperType'))
            ->with('title','Add New Paper');
    }







    public function store(Request $request)
    {

        #return $request->all();
        $paper = new Paper();
        $paper->paper_title = $request->paper_title;
        $paper->paper_abstract = $request->paper_abstract;
        $paper->paper_published_url = $request->paper_published_url;
        $paper->paper_published_at = $request->paper_published_at;
        $paper->paper_type = $request->paper_type;
        $paper->paper_publish_date =  Carbon::parse($request->paper_publish_date);
        $paper->paper_cite = $request->paper_cite;
        $paper->paper_meta_data = str_slug($request->paper_title).time();
        if( $request->hasFile('file')) {
            #if (!is_dir($this->uploadFilePath)) {  mkdir($this->uploadFilePath,0777,true);  }
            $file = $request->file;
            $destinationPath = public_path().$this->uploadFilePath;
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            $paper->paper_pdf = $this->uploadFilePath.'/'.$fileName;
        }

        if($paper->save()){
            //author many to many
            $authors = $request->author;
            $paper->users()->attach($authors);
            //category many to many
            $categories = $this->checkCategory($request->category)->toArray();
            $paper->categories()->attach($categories);

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }





    public function edit($paper_meta_data)
    {
        $paper = Paper::where('paper_meta_data',$paper_meta_data)->first();
        $paperType =[
            'JOURNAL' => 'JOURNAL',
            'CONFERENCE' => 'CONFERENCE',
        ];
        $category = Category::pluck('cat_name','id');
        $users    = User::where('is_approved','YES')->pluck('name','id');


        return view('paper.edit', compact('category','users','paper','paperType'))
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
        $paper->paper_publish_date =  Carbon::parse($request->paper_publish_date);
        $paper->paper_cite = $request->paper_cite;
        #$paper->paper_meta_data = str_slug($request->paper_title).time();
        if( $request->hasFile('file')) {
           # if (!is_dir($this->uploadFilePath)) {  mkdir($this->uploadFilePath,0777,true);  }
            $file = $request->file;
            $destinationPath = public_path().$this->uploadFilePath;
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(rand(11111, 99999)) . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            $paper->paper_pdf = $this->uploadFilePath.'/'.$fileName;
        }

        if($paper->save()){
            //author many to many
            $authors = $request->author;
            $paper->users()->sync($authors);

            //category many to many
            #$categories = $this->checkCategory($request->category)->toArray();
            $categories = $request->category;
            $paper->categories()->attach($categories);

            return redirect()->route('paper.index')->with('success', 'Paper Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }



    public function destroy($paper_meta_data)
    {
        $paper = Paper::where('paper_meta_data',$paper_meta_data)->first();
        if($paper->delete()){
            return redirect()->back()->with('success', 'Paper Deleted Successfully.');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
    }


}
