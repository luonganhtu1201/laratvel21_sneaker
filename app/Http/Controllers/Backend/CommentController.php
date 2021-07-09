<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('created_at','DESC')->paginate(5);
        return view('backend.comments.index',[
            'comments' => $comments,
        ]);
    }
    public function delete($id){
        $comments = Comment::find($id);
        $comments->delete();
        if (!$comments->delete()){
            return redirect()->route('backend.comments')->with('success','Xóa thành công !');
        }else{
            return redirect()->route('backend.comments')->with('error','Xóa thất bại !');
        }
    }
    public function edit(Comment $comment){
        return view('backend.comments.edit',[
            'comment' => $comment
        ]);
    }
    public function store(StoreCommentRequest $request, $id){
        $comments = Comment::find($id);
        $comments->content = $request->get('content');
        $comments->update();
        $update = 1;
        if ($update){
            return redirect()->route('backend.comments')->with('success','Cập nhật sản phẩm thành công !');
        }else{
            return redirect()->route('backend.comments')->with('error','Cập nhật sản phẩm thất bại !');
        }

    }
}
