<?php

namespace App\Http\Controllers;
use App\Models\PostMark;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostMarksController extends Controller
{
    public function store(Request $request)
    {

        $postmark = new PostMark;
        dd($postmark);
        $postmark->post_id = $request->post_id;
        $postmark->user_id = Auth::user()->id;
        $postmark->save();


        return redirect()->route('posts.show',[$request->post_id]);
    }

    public function destroy(Request $request, $id) {
        $post=Post::findOrFail($id);

        $post->postmarks()->delete();

        return redirect()->route('posts.show',[$request->post_id]);
    }
}
