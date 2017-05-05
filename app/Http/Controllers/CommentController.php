<?php

namespace App\Http\Controllers;

use App\PostStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Post;
use App\Comment;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $comments;

    public function __construct(CommentRepository $comments)
    {
        $this->middleware('auth');
        $this->middleware('active');
        $this->comments = $comments;
    }

    public function add(Post $post)
    {
        return view('blog.comment.add', ['post' => $post]);
    }

    public function store(Request $request, Post $post)
    {

        $this->validate($request, [
            'comment_content' => 'required',
            'image' => ['max:255', 'mimes:png,jpg,jpeg,gif']
        ] );



        $comment = new Comment();

        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->comment_content = $request->comment_content;
        $pending = PostStatus::where('name', '=', 'pending')->first();
        $comment->post_status_id = $pending->id;
        //$comment->post = $post;

        $comment->save();


        $destinationPath = public_path(). '/images/comments/'. $comment->id;

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );

            $comment->image_name = $request->file('image')->getClientOriginalName();
            $comment->image_path = $destinationPath;

            $comment->update();
        }

        @include ('flash');
//        session()->flash('flash_message', 'Your comment has been submitted. The post moderator will approve or deny its publication.');
//        session()->flash('flash_message_type', 'success');
        flash('Your comment has been submitted. The post moderator will approve or deny its publication.', 'success');

        return redirect('/blog/'.$post->id.'/view');
    }

    public function post_comments(Post $post)
    {
//        echo '<pre>';
//        var_dump($post);
//        echo '</pre>';
//        exit();
        $denied = PostStatus::where('name', '=', 'deny')->first();
        $approved = PostStatus::where('name', '=', 'approve')->first();
        $pending = PostStatus::where('name', '=', 'pending')->first();
        return view('blog.comment.post_comments',
            [
                'post' => $post,
                'approved_status' => $approved,
                'denied_status' => $denied,
                'pending_status' => $pending,
            ]);
    }

    public function approve_comment(Comment $comment)
    {
//        echo '<pre>';
//        var_dump($comment->post_status);
//        echo '</pre>';
//        exit();
        $approved = PostStatus::where('name', '=', 'approve')->first();
        $comment->post_status_id = $approved->id;
//        echo '<pre>';
//        var_dump($comment->post_status);
//        echo '</pre>';
//        exit();
        $comment->save();
        $denied = PostStatus::where('name', '=', 'deny')->first();
        $pending = PostStatus::where('name', '=', 'pending')->first();
        return view('blog.comment.post_comments',
            [
                'post' => $comment->post,
                'approved_status' => $approved,
                'denied_status' => $denied,
                'pending_status' => $pending,
            ]);

    }

    public function deny_comment(Comment $comment)
    {
        $denied = PostStatus::where('name', '=', 'deny')->first();
        $comment->post_status_id = $denied->id;
        $comment->save();
        $approved = PostStatus::where('name', '=', 'approve')->first();
        $pending = PostStatus::where('name', '=', 'pending')->first();
        return view('blog.comment.post_comments',
            [
                'post' => $comment->post,
                'approved_status' => $approved,
                'denied_status' => $denied,
                'pending_status' => $pending,
            ]);
    }

    public function my_comments(Request $request)
    {
        return view('blog.comment.my_comments', [
            'comments' => $this->comments->forUser($request->user()),
        ]);
    }

    /**
     * Destroy the given post.
     *
     * @param Request $request
     * @param Comment $comment
     * @return Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('destroy', $comment);

        $comment->delete();

        return redirect('/blog/comment/my_comments');
    }

    public function edit(Comment $comment)
    {
        $this->authorize('edit', $comment);
        return view('blog.comment.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {

        $this->validate($request, [
            'comment_content' => 'required',
            'image' => ['max:255', 'mimes:png,jpg,jpeg,gif']
        ] );


        $comment->comment_content = $request->comment_content;
        $pending = PostStatus::where('name', '=', 'pending')->first();
        $comment->post_status_id = $pending->id;
        //$comment->post = $post;

        $comment->save();


        $destinationPath = public_path(). '/images/comments/'. $comment->id;

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );

            $comment->image_name = $request->file('image')->getClientOriginalName();
            $comment->image_path = $destinationPath;

            $comment->update();
        }

        @include ('flash');
//        session()->flash('flash_message', 'Your comment has been submitted. The post moderator will approve or deny its publication.');
//        session()->flash('flash_message_type', 'success');
        flash('Your comment has been updated. The post moderator will approve or deny its publication.', 'success');

        return redirect('/blog/comment/my_comments');
    }
}
