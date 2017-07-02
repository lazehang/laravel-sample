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
            $topic->desc = $request->desc;
            $topic->save();
            if ($topic->save())
            {
                return redirect()->back()->with('success', 'Updated !!');
            }
        }
        else {
            $topic = new Topic();
            $topic->desc = $request->desc;
            $topic->save();
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

    function addHeading(Request $request)
    {
        $heading = new Content();
        $heading->heading = $request['heading'];
        $heading->save();

        if ($heading) {
            return redirect()->back()->with('success', 'Headings Added');
        }

    }

    public function delete($id)
    {
        $heading = Content::find($id);
        $heading->delete();

        return redirect()->back();
    }
}
