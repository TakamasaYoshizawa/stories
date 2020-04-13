<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Story;
use App\Profile;
use Auth;
use App\Posts;
use App\History;
use App\Attachment;
use Carbon\Carbon;
use Storage;

class StoriesController extends Controller
{

  public function __construct()
    {
      $this->middleware('auth');
    }

  public function index(Request $request)
      {
        $images = Attachment::all();
        $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }
         return view('stories.index2', compact('images','posts','cond_title'));
      }

  public function add()
    {
      return view('stories.create2');
    }

  public function store(Request $request)
  {
    $form = $request->all();
    $d = new \DateTime();
    $d->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
    $dir = $d->format('Y/m');
    $path = Storage::disk('s3')->putFile('/',$form['images'],'public');
    $data = $request->except('_token');

    foreach ($data['images'] as $k => $v) {
      $filename = '';
      $attachments = Attachment::take(1)->orderBy('id', 'desc')->get();
      foreach ($attachments as $attachment) {
        
        $filename = $attachment->id + 1 . '_' . $v->getClientOriginalName();
      }
      unset($attachment);

      if ($filename == false) {
        $filename = 1 . '_' . $v->getClientOriginalName();
      }
      $v->storeAs($path, $filename);
      $attachment_data = [
        'path' => Storage::disk('s3'),
        'name' => $filename
      ];   
      $a = new Attachment();
      $a->fill($attachment_data)->save();
    }
    unset($k, $v);
    return redirect('/');
  }

public function delete(Request $request)
  {
      $images = Attachment::find($request->id);
      $images->delete();
      return redirect('/');
  }  

  public function upload(Request $request)
    {
      $this->validate($request, [
        'file' => [
          'required',
          'file',
          'image',
          'mimes:jpeg,png',
        ]
      ]);

      if ($request->file('file')->isValid([])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        return view('stories.index2')->with('filename', basename($path));
      } else {
        return redirect('/')
          ->back()
          ->withInput()
          ->withErrors();
      }
    }
}
