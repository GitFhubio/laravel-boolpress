<?php

namespace App\Http\Controllers\Api;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create($id=null){
    if($id==null || $id<0 || $id>count(Post::all())){
        abort(404);
    }
    else{
    $post=Post::find($id);
    $comment=new Comment();
    $comment->body=$_POST['body'];
    // $comment->likes= '1';
    $post->comments()->save($comment);
    // return response()->json($comment);
    return redirect()->route('posts.show',compact('post'));
    }
}
}
