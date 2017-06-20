<?php

namespace App\Http\Controllers;

use App\Content;
use App\Topic;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    function index(){
        $contents = Content::all();
        $desc = Topic::all()->first();
        return view('pages.front.index', ['desc' => $desc, 'contents' => $contents]);
    }

    function contact(){
        return view('pages.front.contact');
    }
}
