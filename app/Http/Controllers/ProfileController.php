<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\stories;
use App\History;
use Carbon\Carbon;
use Storage;

class ProfileController extends Controller
{
    public function index() {
      return view('profile.index');
    }


    public function add(){
      return view('profile.create');
    }
    
}
