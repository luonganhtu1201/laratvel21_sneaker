<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('created_at','DESC')->paginate(5);
        return view('backend.comments.index',[
            'comments' => $comments,
        ]);
    }
    public function CommentSpam($id){
        $comments = Comment::find($id);
        $comments->delete();
        if (!$comments->delete()){
            return redirect()->route('backend.comments')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.comments')->with('error','Xóa thất bại !');
        }
    }
    public function CommentOk($id){
        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->update();
        if ($comment->save()){
            return redirect()->route('backend.comments')->with('success','Duyệt bình luận thành công !');
        }else{
            return redirect()->route('backend.comments')->with('error','Duyệt bình luận thất bại !');
        }
    }
}
