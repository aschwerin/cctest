<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\PostStatus;
use App\Comment;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Event;
use App\Events\BlogView;

class PostController extends Controller
{
    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth');
        $this->middleware('active');
        $this->posts = $posts;
    }

    public function index()
    {
        $approved_status = PostStatus::where('name', '=', 'approve')->first();

//        $posts = Post::all();
        $posts = Post::where('post_status_id', '=', $approved_status->id)->orderBy('created_at', 'desc')->get();
//        echo '<pre>';
//        var_dump($posts);
//        echo '</pre>';
//        exit();
        return view('blog.index',
            [
                'posts' => $posts,
            ]
        );
    }

    public function view(Request $request, Post $post)
    {
        $status = PostStatus::all();
        $approved = PostStatus::where('name', '=', 'approve')->first();
//        Event::fire('blog.view', $post);
        event(new BlogView($post));
        $session = $request->session()->all();
        return view('blog.view', [
            'status' => $status,
            'post' => $post,
            'approve_status' => $approved,
            'session' => $session,
        ]);
    }

    public function my_posts(Request $request)
    {
        $session = $request->session()->all();
        $pending = PostStatus::where('name', '=', 'pending')->first();
        return view('blog.my_posts', [
            'posts' => $this->posts->forUser($request->user()),
            'pending_status' => $pending,
            'session' => $session,
        ]);
    }

    public function add()
    {
        $status = PostStatus::all();
        return view('blog.add', [ 'status' => $status ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'max:255',
            'post_content' => 'required|',
            'status' => 'required|int',
            'image' => ['max:255', 'mimes:png,jpg,jpeg,gif']
        ] );

//        echo '<pre>';
//        var_dump($request->all());
//        echo '</pre>';
//        exit();

        $post = new Post();

        $post->user_id = $request->user()->id;
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_status_id = $request->status;

        $post->save();


        $destinationPath = public_path(). '/images/posts/'. $post->id;

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );

            $post->image_name = $request->file('image')->getClientOriginalName();
            $post->image_path = $destinationPath;

            $post->update();
        }

        return redirect('/blog/my_posts');
    }

    public function edit(Post $post)
    {
//        echo '<pre>';
//        var_dump($post);
//        echo '</pre>';
//        exit();
        $this->authorize('edit', $post);
        $status = PostStatus::all();
        return view('blog.edit', [
            'status' => $status,
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'post_title' => 'max:255',
            'post_content' => 'required|',
            'status' => 'required|int',
            'image' => ['max:255','mimes:png,jpg,jpeg,gif']
        ] );

        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_status_id = $request->status;

        if (!empty($request->file('image'))) {

            $destinationPath = public_path(). '/images/posts/'. $post->id;
            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );
            $post->image_name = $request->file('image')->getClientOriginalName();
            $post->image_path = $destinationPath;
        }

        $post->update();

        return redirect('/blog/my_posts');
    }

    /**
     * Destroy the given post.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return redirect('/blog/my_posts');
    }

}
