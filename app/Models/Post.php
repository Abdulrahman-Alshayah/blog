<?php

namespace App\Models;

class Post 
{
    public static function find($slug)
    {
        //base_path();   //مسار الملف الموجود في    also   app_path();
        if(!file_exists($path = resource_path("posts/{$slug}.html"))) {
        throw new ModelNOtFoundException();
        }
    Cache::remember("posts.{$slug}", 1200, function () use ($path) {
        return file_get_contents($path);
    });
    }
}
