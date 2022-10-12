<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        

        return view('posts.index',[
            'posts'=>Post::latest()
                        ->filter(request(['search','category','username']))
                        ->paginate(6)
                        ->withQuerystring()
        ]);
    }

    public function show(Post $post){

        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function handler(Post $post)
    {
      if (User::find(auth()->id())->isSubscribed($post)) {
        $post->unSubscribe();
      }
      else {
        $post->subscribe();
      }
        return back();

    }
    
}
