<?php

namespace App\Http\Controllers;

use App\Content;
use App\Topic;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('pages.admin.index');
    }

    function home(){
        $contents = Content::all();
        $desc = Topic::all()->first();
        return view('pages.admin.home', ['contents' => $contents, 'desc' => $desc]);
    }

    function post(Request $request)
    {
        $topic = Topic::all()->first();
        if (count($topic) > 0){
            $topic = Topic::find($topic->id);
            $topic->update(['description' => $request['desc']]);
            return redirect()->back()->with('success', 'Updated !!');
        }
        else {
            Topic::create(['description' => $request->desc]);
            return redirect()->back()->with('success', 'Post Created !!');
        }
    }


    function updateHead(Request $request, $id) {
        $heading = Content::find($id);
        $heading->update(['heading' => $request['heading']]);
        if($heading){
            return redirect()->back();
        }
    }
}
