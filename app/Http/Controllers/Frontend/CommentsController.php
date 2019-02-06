<?php

namespace App\Http\Controllers\Frontend;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Post;
use Session;
use Log;
use Auth;
//use Request;

use App\Http\Requests\CreateCommentRequest;
//use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
        //Log::useFiles(storage_path().'/logs/comments.log');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(CreateCommentRequest $request, $post_id)
    // {
    //     $post = Post::find($post_id);

    //     $comment = new Comment();
    //         $comment->name = $request->name;
    //         $comment->email = $request->email;
    //         $comment->comment = $request->comment;
    //     $post->comments()->save($comment);
    //     //$comment->save();

    //     // Save entry to log file using built-in Monolog
    //     // if (Auth::check()) {
    //     //     Log::info(Auth::user()->username . " (" . Auth::user()->id . ") commented on post (" . $post->id . ")\r\n", [json_decode($comment, true)]);
    //     // } else {
    //     //     Log::info(Request::ip() . " commented on post " . $post->id);
    //     // }

    //     Session::flash('success', 'Comment added seccesfully.');
    //     return redirect()->route('blog.single', [$post->slug]);
    // }


    // public function show($id)
    // {
    //     //dd($id);

    //     $comment = Comment::find($id);
    //     //dd($comment);
    //     $nid = $comment->post_id;
    //     //dd($nid);
    //     // return view('backend.comments.show')->withComment($comment);
    //     //return view('backend.posts.show', compact('nid'));
    //     return redirect()->route('backend.posts.show', [$nid]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $comment = Comment::find($id);
    //     return view('backend.comments.edit')->withComment($comment);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateCommentRequest $request, $id)
    // {
    //     $comment = Comment::find($id);
    //         $comment->comment = $request->comment;
    //     $comment->save();

    //     // Save entry to log file using built-in Monolog
    //     // Log::info(Auth::user()->username . " (" . Auth::user()->id . ") UPDATED comment (" . $comment->id . ")\r\n", 
    //     //     [json_decode($comment, true)]
    //     // );

    //     Session::flash('success', 'Comment updated');
    //     return redirect()->route('backend.posts.show', $comment->post->id);
    // }

    // public function delete($id)
    // {
    //     $comment = Comment::find($id);
    //     return view('backend.comments.delete')->withComment($comment);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $comment = Comment::find($id);
    //     $post_id = $comment->post->id;
    //     $comment->delete();

    //     // Save entry to log file using built-in Monolog
    //     // Log::info(Auth::user()->username . " (" . Auth::user()->id . ") DELETED comment (" . $comment->id . ")\r\n", 
    //     //     [json_decode($comment, true)]
    //     // );

    //     Session::flash('success', 'Comment Deleted');
    //     return redirect()->route('backend.posts.show', $post_id);
    // }
}
