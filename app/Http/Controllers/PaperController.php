<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPaper;
use App\Paper;
use App\PaperUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaperController extends Controller
{


    public function allPaperList(){
        $categories = Category::pluck( 'cat_name', 'id');
        $papers = Paper::orderBY('created_at','desc')->paginate(12);
        return view('paper.index', compact( 'papers','categories'))->with('title', 'Papers (Conference/Journal)');
    }


    public function conferencePaper()
    {
        $categories = Category::pluck( 'cat_name', 'id');
        $papers = Paper::where('paper_type','=','CONFERENCE')->orderBY('created_at','desc')->paginate(12);
        return view('paper.index', compact( 'papers','categories'))->with('title', 'Conference Paper');

    }


    public function journalPaper()
    {
        $categories = Category::pluck( 'cat_name', 'id');
        $papers = Paper::where('paper_type','=','JOURNAL')->orderBY('created_at','desc')->paginate(12);
        return view('paper.index', compact( 'papers','categories'))->with('title', 'Journal Paper');

    }



    public function paperSearch(Request $request){

        $titleSearch = '%'.$request->paper_title.'%';

        if($request->paper_title&& $request->paper_category){
            $paperIds = CategoryPaper::where('cat_id',$request->paper_category)->pluck('paper_id');
            $papers = Paper::where('paper_title', 'LIKE',$titleSearch)->orWhereIn('id',$paperIds)->orderBY('created_at','desc')->paginate(12);
        }elseif($request->paper_title){
            $papers = Paper::where('paper_title', 'LIKE',$titleSearch)->orderBY('created_at','desc')->paginate(12);
        }elseif($request->paper_category){
            $paperIds = CategoryPaper::where('cat_id',$request->paper_category)->pluck('paper_id');
            $papers = Paper::whereIn('id', $paperIds)->orderBY('created_at','desc')->paginate(12);
        }else{
            $papers = Paper::orderBY('created_at','desc')->paginate(12);
        }


        $categories = Category::pluck( 'cat_name', 'id');


        return view('paper.index', compact( 'papers','categories'))->with('title', 'Papers (Conference/Journal)');
    }





    public function categoryWisePaper($cat_meta_data){
        $category = Category::where('cat_meta_data',$cat_meta_data)->first();
        $paperIds = CategoryPaper::where('cat_id',$category->id)->pluck('paper_id');
        $papers = Paper::whereIn('id', $paperIds)->orderBY('created_at','desc')->paginate(12);
        $categories = Category::pluck( 'cat_name', 'id');
        return view('paper.index', compact( 'papers','categories'));
    }




    public function userWisePaper($user_meta_data){
        $user = User::where('user_meta_data',$user_meta_data)->first();
        $paperIds = PaperUser::where('user_id',$user->id)->pluck('paper_id');
        $papers = Paper::whereIn('id', $paperIds)->orderBY('created_at','desc')->paginate(12);
        $categories = Category::pluck( 'cat_name', 'id');
        return view('paper.index', compact( 'papers','categories'));
    }



    public function paperDetails($paper_meta_data){
        $archives = Paper::selectRaw(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) paper_count'))
            ->groupBy('year')
            ->groupBy('month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        $categories = Category::all();
        $paper = Paper::where('paper_meta_data', $paper_meta_data)->first();
        return view('paper.details', compact( 'paper','categories','archives'))->with('title',str_limit($paper->paper_title, 30,'...'));

    }


    public function archivedPaper($month,$year)
    {
        $categories = Category::pluck( 'cat_name', 'id');
        $papers = Paper::orderBY('created_at','desc')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->paginate(12);
        return view('paper.index', compact( 'papers','categories'))
                        ->with('title', 'Archived Paper-'.$month.' /'.$year);
    }

}
