<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Cloudinary;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post'=> $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function store(Request $request, Post $post)
    {   
        $input = $request['post'];
        if($request->file('move')){ //画像ファイルが送られた時だけ処理が実行される
            $move_url = Cloudinary::uploadVideo($request->file('move')->getRealPath())->getSecurePath();
            $input += ['move_url' => $move_url];
        }
        
        $post->title = $input["title"];
        $post->body = $input["body"];
        $post->user_id = Auth::id();
        $post->move_url = $input["move_url"];
        $post->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function good(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
}
?>
