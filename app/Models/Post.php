<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post 
{   
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;

    public function __construct($title, $slug, $intro, $body, $date)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
        $this->date=$date;
    }

    public static function all()
    {   
        
        return collect(File::files(resource_path("posts")))
            ->map(function($file){
                $obj = YamlFrontMatter::parseFile($file);
                return new Post($obj->title, $obj->slug, $obj->intro, $obj->body(), $obj->date);
            })
            ->sortByDesc('date');
            

        // return array_map(function($file){

        //     $obj = YamlFrontMatter::parseFile($file);
        //     return new Post($obj->title, $obj->slug, $obj->intro, $obj->body());

        // },$files);
        
    }

    public static function find($slug)
    {
        $posts=static :: all();
        return $posts->firstWhere('slug',$slug);
    }
}