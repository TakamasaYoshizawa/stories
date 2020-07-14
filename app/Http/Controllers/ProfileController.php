<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stories;
use App\History;
use App\Posts;
use App\Profile;
use Carbon\Carbon;
use Storage;

class ProfileController extends Controller
{

  public function index(Request $request) 
    {
      $cond_title = $request -> cond_title;
      if ($cond_title != ''){
        $profile = Profile::where('title', $cond_title)->get();
      } else {
        $profile = Profile::all();
      }

      return view('stories.index2', ['profile' => $profile, 'cond_title' => $cond_title]);
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
          $path = $request->file->store('public');
          return view('stories.index2')->with(compact('filename','plus'));
        } else {
          return redirect()
            ->back()
            ->withInput()
            ->withErrors();
        }
    }
    
  public function store(Request $request)
    {

      $d = new \DateTime();
      $d->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
      $dir = $d->format('Y/m');
      $path = sprintf('public/posts/%s', $dir);
      $data = $request->except('_token');

      foreach ($data['plus'] as $k => $v) {

        $filename = '';
        $posts = Posts::take(1)->orderBy('id', 'desc')->get();

        foreach ($posts as $post) {
          $filename = $post->id + 1 . '_' . $v->getClientOriginalName();
        }
        unset($post);

        if ($filename == false) {
          $filename = 1 . '_' . $v->getClientOriginalName();
        }

        $v->storeAs($path, $filename);

        $post_data = [
          'path' => sprintf('posts/%s/', $dir),
          'name' => $filename
        ];
        $a = new Posts();
        $a->fill($post_data)->save();
      }

      unset($k, $v);

      return redirect('/');
    }

    
  public function create(Request $request)
    {

   $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form)->save();
        return redirect('/');
      }

  public function add()
    {
        return view('profile.create2');
      }
      
  public function index3()
    {
          return view('profile.create3');
        }

  public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('profile.create4', ['profile_form' => $profile]);
  }  


  public function delete(Request $request)
  {
      
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('/');
  }
    
  public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();

      return redirect('/');
  }
}
