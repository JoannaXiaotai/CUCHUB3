<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class CategoriesController extends Controller
{
    //
    public function show(Category $category)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $posts = Post::where('category_id', $category->id)->paginate(20);
        // 传参变量话题和分类到模板中
//        return view('posts.index', compact('posts', 'category'));
        return view('post.index', compact('posts', 'category'));
    }
}
