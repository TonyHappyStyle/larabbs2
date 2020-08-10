<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Topic;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $topics =   Topic::with('user','category')
                    ->where('category_id',$category->id)->paginate(30);
        return view('topics.index',compact('topics','category'));
    }
}
