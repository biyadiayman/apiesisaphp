<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\News;

class NewsController extends Controller
{
    public function all(Request $request)
    {
        if($request->header("key") == "ESISAAPIACCESS"){
            return News::all();
        }
        return response(401, 401);
    }

    public function add(Request $request)
    {
        if($request->header("key") == "ESISANEWSADMIN"){
            
            $news = new News;
            if (isset($request->title) && isset($request->content)) {
                $news->title = $request->title;
                $news->content = $request->content;
                $news->postDate = date('Y-m-d');
                if(isset($request->file)){
                    $f = $request->file('file');
                    $resFile = basename($f->getClientOriginalName(), '.' . $f->getClientOriginalExtension()) . '_' .date('Y_m_d_H_i_s') . '.' . $f->getClientOriginalExtension();
                    $newPath = $f->storeAs("public/newsFiles", $resFile);
                    $newPath;
                    $news->filePath = $resFile;
                }
                $news->save();
                //$news = News::create($request->all());
                return response()->json($news, 201);            
            }else{
                return 'error';
            }
        }
        return response(401, 401);
    }

    public function remove(Request $request, $id)
    {
        if($request->header("key") == "ESISANEWSADMIN"){
            $news = News::findOrFail($id);
	    if($news->file != null){
            	Storage::delete("public/newsFiles/" . $news->filePath);
	    }
	    $news->delete();

            return 204;
        }
        return response(401, 401);
    }
}
