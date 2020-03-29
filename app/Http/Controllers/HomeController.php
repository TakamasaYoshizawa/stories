<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Attachment::all();
        return view('stories.index2',compact('images'));
    }
}
