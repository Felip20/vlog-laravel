<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Post $post)
    {
       request()->validate([
        'body'=>'required | min:10' 
       ]);
    
       $post->comments()->create([
           'body'=>request('body'),
           'user_id'=>auth()->id()
       ]);

       $subscribers=$post->subscribers->filter(fn($subscriber)=>$subscriber->id != auth()->id());

       $subscribers->each(function($subscriber) use($post){
        Mail::to($subscriber->email)->queue(new SubscriberMail($post));
       });
        return redirect('/posts/'.$post->slug);
    }
}
