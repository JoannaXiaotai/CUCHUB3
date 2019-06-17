<?php

namespace App\Http\Controllers;
use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Comment::create($request->post());
        session()->flash('success', '评论成功！');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Comment $comment)
//    {
//        //
//    }
    public function destroy(Comment $comment)
    {
        //
        $this->authorize('destroy',$comment);
        if(Auth::user()->id!=$comment->user_id){
            session()->flash('danger','抱歉，只有评论的人才可删除！');
            return redirect()->route('post.index');
        }
        //
//        if(Auth::user()->id != 1) { // Auth::user() 获取当前用户信息 -> id获取属性id（主键）
//    session()->flash('danger', '抱歉，只有博主才可以新增文章！');
//    return redirect()->back();
//}
        $comment->delete();
        session()->flash('success', '删除评论成功！'); //装载session闪存
        return redirect()->back();
    }
}
