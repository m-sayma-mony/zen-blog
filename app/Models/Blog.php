<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    public static $blog, $image, $imageName, $imgUrl, $directory, $slug;
    public static function saveBlog($request){
        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeSlug($request);
        self::$blog->category_id = $request->category_id;
        self::$blog->description = $request->description;
        self::$blog->image = self::getImage($request);
        self::$blog->save();
    }

    private static function getImage($request){
        self::$image = $request->file('image');
        self::$imageName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'blog-image/';
        self::$imgUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imgUrl;
    }

    public static function makeSlug($request){
        if($request->slug){
            self::$slug = Str::slug($request->slug, '-');
        }else{
            self::$slug = Str::slug($request->title, '-');
        }
        return self::$slug;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
