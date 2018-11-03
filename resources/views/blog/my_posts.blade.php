@extends('layouts.alt')

@section('content')
    <style>
        .post-wrapper {
            border: 2px solid black;
        }

    </style>
    <div class="container">
        <h1>Posts</h1>
        <pre>
{{--            {{ var_dump($session) }}--}}
        </pre>
        @if(!empty($posts))
            @foreach($posts as $post)
                <div class="row post-wrapper">
                    <div class="col-sm-2" style="border-right: 1px solid gray;">
                        <p style="font-weight:bold;">{{ $post->user->name }}</p>
                        <p style="font-style: italic;">{{ $post->created_at->format('d M Y - H:i:s') }}</p>
                    </div>
                    <div class="col-sm-4">
                        @if (!empty($post->post_title))
                            <h4>{{ $post->post_title }}</h4>
                        @endif
                        <p>
                            {{ substr(strip_tags($post->post_content), 0, 255) . ' ...' }}
                        </p>
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($post->image_name))
                            <h4>Image</h4>
                            <img style="width: 100%; height: 100%;" src="{{ url('images/posts/' . $post->id . '/' . $post->image_name) }}">
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <h4>Status</h4>
                        {{ $post->post_status->display_name }}
                    </div>
                    <div class="col-sm-2">
                        <br/>
                        <a href="/blog/{{ $post->id }}/edit">
                            <button type="button" class="btn btn-primary">Edit <i class="fa fa-btn fa-edit"></i></button>
                        </a>
                        <br/>
                        <br/>
                        <form action="{{ url ('blog/'.$post->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" id="delete-task-{{$post->id}}" class="btn btn-danger">
                                Delete <i class="fa fa-btn fa-trash"></i>
                            </button>
                        </form>
                        <br/>
                        @if (!$post->comments->isEmpty())
                            <a href="{{ url('/blog/'.$post->id.'/comments') }}">
                                <button type="button" class="btn btn-primary">
                                    Comment(s) <i class="fa fa-btn fa-comments"></i>
                                </button>
                            </a>
                        @endif
                        <br/>
                    </div>
                </div>
            @endforeach
        @else
            <p style="font-style: italic; font-weight: bold;">You currently have no posts.</p>
        @endif
    </div>
@endsection