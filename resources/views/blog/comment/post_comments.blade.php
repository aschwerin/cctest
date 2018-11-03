@extends('layouts.alt')

@section('content')
    <style>
        .post-wrapper {
            border: 2px solid black;
        }

    </style>
    <div class="container">
        <h1>Post</h1>
        <pre>
            {{--{{ var_dump($pending_status) }}--}}
        </pre>
        @if(!empty($post))
            <div class="row post-wrapper">
                <div class="col-sm-2" style="border-right: 1px solid gray;">
                    <p style="font-weight:bold;">{{ $post->user->name }}</p>
                    <p style="font-style: italic;">{{ $post->created_at->format('d M Y - H:i:s') }}</p>
                </div>
                <div class="col-sm-7">
                    @if (!empty($post->post_title))
                        <h4>{{ $post->post_title }}</h4>
                    @endif
                    <p>
                        {{ substr(strip_tags($post->post_content), 0, 255) . ' ...' }}
                    </p>
                </div>
                <div class="col-sm-3">
                    @if (!empty($post->image_name))
                        <h4>Image</h4>
                        <img style="width: 100%; height: 100%;" src="{{ url('images/posts/' . $post->id . '/' . $post->image_name) }}">
                    @endif
                </div>
                {{--<div class="col-sm-2">--}}
                    {{--<br/>--}}
                    {{--<a href="/blog/{{ $post->id }}/edit">--}}
                        {{--<button type="button" class="btn btn-primary">Edit <i class="fa fa-btn fa-edit"></i></button>--}}
                    {{--</a>--}}
                    {{--<br/>--}}
                    {{--<br/>--}}
                    {{--<form action="{{ url ('blog/'.$post->id) }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<button type="submit" id="delete-task-{{$post->id}}" class="btn btn-danger">--}}
                            {{--Delete <i class="fa fa-btn fa-trash"></i>--}}
                        {{--</button>--}}
                    {{--</form>--}}
                    {{--<br/>--}}
                {{--</div>--}}
            </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>Comments</h2>
            </div>
        </div>
            @foreach($post->comments as $comment)
                <div class="row post-wrapper">
                    {{--{{ var_dump($comment) }}--}}
                    <div class="col-sm-2" style="border-right: 1px solid gray;">
                        <p style="font-weight:bold;">{{ $comment->user->name }}</p>
                        <p style="font-style: italic;">{{ $comment->created_at->format('d M Y - H:i:s') }}</p>
                    </div>
                    <div class="col-sm-5">
                        {!! strip_tags($comment->comment_content) !!}
                    </div>
                    <div class="col-sm-3">
                        @if (!empty($comment->image_name))
                            <h4>Image</h4>
                            <img style="width: 100%; height: 100%;" src="{{ url('images/comments/' . $comment->id . '/' . $comment->image_name) }}">
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <br/>
                        @if ($comment->post_status == $denied_status || $comment->post_status == $pending_status)
                            <form action="{{ url ('blog/comment/'.$comment->id.'/approve') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <button type="submit" id="approve-comment-{{$comment->id}}" class="btn btn-success">
                                    Approve <i class="fa fa-btn fa-check"></i>
                                </button>
                            </form>
                        @endif
                        {{--<a href="">--}}
                            {{--<button type="button" class="btn btn-success" onclick="approveComment({{ $comment->id }})">--}}
                                {{--Approve <i class="fa fa-btn fa-check"></i>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                        <br/>
                        <br/>
                        @if ($comment->post_status == $approved_status || $comment->post_status == $pending_status)
                            <form action="{{ url ('blog/comment/'.$comment->id.'/deny') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <button type="submit" id="deny-comment-{{$comment->id}}" class="btn btn-danger">
                                    Deny <i class="fa fa-btn fa-remove"></i>
                                </button>
                            </form>
                        @endif
                        {{--<a href="">--}}
                            {{--<button type="button" class="btn btn-danger" onclick="denyComment({{ $comment->id }})">--}}
                                {{--Deny <i class="fa fa-btn fa-remove"></i>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                        <br/>
                        <br/>
                    </div>
                </div>
            @endforeach
        @else
            <p style="font-style: italic; font-weight: bold;">You currently have no posts.</p>
        @endif
    </div>
@endsection
@section('add_js')
    <script type="text/javascript">
        function approveComment(id) {
            console.log(id);
        }
        function denyComment(id) {
            console.log(id);
        }
    </script>
@endsection