<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\News;

class NewsController extends Controller
{
    public function all()
    {
        return News::all();
    }

    public function add(Request $request)
    {
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

    public function remove(Request $request, $id)
    {
        $news = News::findOrFail($id);
        Storage::delete("public/newsFiles/" . $news->filePath);
        $news->delete();

        return 204;
    }
}
