<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\category;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
          'posts'=>Post::latest()->paginate(3)
        ]);
    }
    public function create()
    {
      return view('admin.posts.create',[
        'categories'=>category::all()
      ]);
    }
    
    public function store(){

      $photo = request()->file('thumbnail')->store('thumbnails');
      $formdata=request()->validate([
        "title" => ['required'],
        "slug" => ['required',Rule::unique('posts','slug')],
        "intro" => ['required'],
        "body" => ['required'],
        "category_id" => ['required',Rule::exists('categories','id')],
      ]);
      $formdata['user_id'] = auth()->id();
      $formdata['thumbnail'] = $photo;
      Post::create($formdata);

      return redirect('/');
    }

    public function edit(Post $post)
    {
      return view('admin.posts.edit',[
        'post'=>$post,
        'categories'=>category::all()
      ]);
    }

    public function update(Post $post){
      
      $formdata=request()->validate([
        "title" => ['required'],
        "slug" => ['required',Rule::unique('posts','slug')->ignore($post->id)],
        "intro" => ['required'],
        "body" => ['required'],
        "category_id" => ['required',Rule::exists('categories','id')],
      ]);
      $formdata['user_id'] = auth()->id();
      $formdata['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnails'): $post->thumbnail;
      $post->update($formdata);
      return redirect('/');
      
    }


    public function destory(Post $post){
      $post->delete();

      return back();
    }
}
