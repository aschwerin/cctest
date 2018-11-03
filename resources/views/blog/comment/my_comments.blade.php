@extends('layouts.alt')

@section('content')
    <style>
        .post-wrapper {
            border: 2px solid black;
        }

    </style>
    <div class="container">
        <h1>My Comments</h1>
        @if (session()->has('flash_message'))
            <div class="notify notify--{{ session()->get('flash_message_type') }}">
                {{ session()->get('flash_message') }}
            </div>
        @endif
        <pre>
{{--            {{ var_dump($session) }}--}}
        </pre>
        @if(!$comments->isEmpty())
            @foreach($comments as $comment)
                <div class="row post-wrapper">
                    <div class="col-sm-2" style="border-right: 1px solid gray;">
                        <p style="font-weight:bold;">{{ $comment->user->name }}</p>
                        <p style="font-style: italic;">{{ $comment->created_at->format('d M Y - H:i:s') }}</p>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            {{ substr(strip_tags($comment->comment_content), 0, 255) . ' ...' }}
                        </p>
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($comment->image_name))
                            <h4>Image</h4>
                            <img style="width: 100%; height: 100%;" src="{{ url('images/comments/' . $comment->id . '/' . $comment->image_name) }}">
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <h4>Status</h4>
                        {{ $comment->post_status->display_name }}
                    </div>
                    <div class="col-sm-2">
                        <br/>
                        <a href="/blog/comment/{{ $comment->id }}/edit">
                            <button type="button" class="btn btn-primary">Edit <i class="fa fa-btn fa-edit"></i></button>
                        </a>
                        <br/>
                        <br/>
                        <form action="{{ url ('blog/comment/'.$comment->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" id="delete-task-{{$comment->id}}" class="btn btn-danger">
                                Delete <i class="fa fa-btn fa-trash"></i>
                            </button>
                        </form>
                        <br/>
                    </div>
                </div>
            @endforeach
        @else
            <p style="font-style: italic; font-weight: bold;">You currently have no comments.</p>
        @endif
    </div>
@endsection