<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 查询数据，并且让查询结果是一个可分页对象
//        $posts = Post::orderBy('created_at', 'desc') // 调用 Blog模型 的静态方法 orderBy('根据created_at字段', '倒叙排序')
//        ->paginate(6); // -> 链式操作：paginate(6) 即数据没页6条
//        // 跳转到视图并传值
//        return view('post.index', [ //第一个参数是说，视图模板是 /resources/views/blog/index.blade.php
//            'posts' => $posts, //这里是说，我们给视图传递一个叫 $'blogs'的变量，值是前面我们查询的数据，也叫$blogs。
//        ]); // view() 的第二参数也可以使用 view(..., compact('blogs'))
        $where =function($query)use ($request){
            if($request->has('keyword') and $request->keyword!=''){
                $search ="%".$request->keyword."%";
                $query->where('title','like',$search);
            }
        };
        $posts=Post::where($where)->paginate(10);
        return view('post.index',['posts' => $posts,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
//            session()->flash('danger', '抱歉，只有博主才可以新增文章！');
//            return redirect()->back();
//        }
        $categories = Category::all();
        return view('post.create', compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        // 我们只需要调用 Blog模型 的静态方法 create() 插入 $request->post() 数据即可
//        $post = Post::create($request->post()); //改方法的返回值是新插入的数据生成的对象
//        // redirect() 页面重定向
//        return redirect()->route('post.show', $post); // 这里我们将 $blog 作为参数请求 BlogController@show
//    }

    public function store(Request $request,Post $post)
    {
//        Post::create(request([
//            'user_id'=>auth()->id(),
//            'title'=>request('title'),
//            'content'=>request('content')
//        ]));
        // 我们只需要调用 Blog模型 的静态方法 create() 插入 $request->post() 数据即可
        //添加到数据库！！！！so important!!!!
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();
        //$post = Post::create(['user_id'=>$request]); //改方法的返回值是新插入的数据生成的对象
        // redirect() 页面重定向
        return redirect()->route('post.show', $post); // 这里我们将 $blog 作为参数请求 BlogController@show
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // 查询评论
        $comments = $post->comments;
        return view('post.show',[
                'post'=>$post,
                'comments'=>$comments,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
//        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
//            session()->flash('danger', '抱歉，只有博主才可以新增文章！');
//            return redirect()->back();
//        }
        return view('post.edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Post $post)
//    {
//        //
//        $post->update($request->post()); //调用 $blog对象->update(更新数据组成的数组) 更新
//        return redirect()->route('post.show', $post);
//    }
    public function update(Request $request, Post $post)
    {
        //
        $this->authorize('update',$post);
        if(Auth::user()->id!=$post->user_id){
            session()->flash('danger','抱歉，只有博主能修改！');
            return redirect()->route('post.index');
        }
        //$post->update($request->post()); //调用 $blog对象->update(更新数据组成的数组) 更新
        //return redirect()->route('post.show', $post);
        $post->update($request->all());
        //return redirect()->to($post->links())->with('success','更新成功');
        return redirect()->route('post.show',$post)->with('success','更新成功');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Post $post)
//    {
//        //
////        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
////    session()->flash('danger', '抱歉，只有博主才可以新增文章！');
////    return redirect()->back();
////}
//        $post->delete();
//        session()->flash('success', '删除文章成功！'); //装载session闪存
//        return redirect()->route('post.index'); //跳转到首页
//    }
    public function destroy(Post $post)
    {
        $this->authorize('destroy',$post);
        if(Auth::user()->id!=$post->user_id){
            session()->flash('danger','抱歉，只有博主能删除！');
            return redirect()->route('post.index');
        }
        //
//        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
//    session()->flash('danger', '抱歉，只有博主才可以新增文章！');
//    return redirect()->back();
//}
        $post->delete();
        session()->flash('success', '删除文章成功！'); //装载session闪存
        return redirect()->route('post.index'); //跳转到首页
    }
}
