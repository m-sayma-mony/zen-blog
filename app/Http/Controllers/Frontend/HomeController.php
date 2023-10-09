<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->get();
       return view('frontend.home.index',['categories' => $categories]);
    }
}
