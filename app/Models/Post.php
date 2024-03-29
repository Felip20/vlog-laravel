<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with=['category','user'];

    public function scopeFilter($query,$filter)//Post::lastest()->filter()
    {   

        $query->when($filter['search']??false,function($query,$search){
            $query->where(function($query)use($search){
                $query->where('title','LIKE','%'.$search.'%')
                    ->orWhere('body','LIKE','%'.$search.'%');
            });
        });
        $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function($query)use($slug){
                $query->where('slug',$slug);
            });
        });
        $query->when($filter['username']??false,function($query,$username){
            $query->whereHas('user',function($query)use($username){
                $query->where('username',$username);
            });
        });
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribers(){
        return $this->belongsToMany(User::class);
    }
    public function unSubscribe()
    {
         $this->subscribers()->detach(auth()->id());
    }
    public function subscribe()
    {
         $this->subscribers()->attach(auth()->id());
    }
}
