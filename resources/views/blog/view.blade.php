@extends('layouts.alt')

@section('content')
    <style>
        .post-wrapper {
            border: 2px solid black;
        }

    </style>

    <div class="container">
        @if (session()->has('flash_message'))
            <div class="notify notify--{{ session()->get('flash_message_type') }}">
                {{ session()->get('flash_message') }}
            </div>
        @endif
        <pre>
            {{--{{ var_dump($session) }}--}}
        </pre>

        @if(!empty($post))

            <div class="row post-wrapper">
                <div class="col-sm-2">
                    <p style="font-weight:bold;">{{ $post->user->name }}</p>
                    <p style="font-style: italic;">{{ $post->created_at->format('d M Y - H:i:s') }}</p>
                    <p style="font-style: italic;">Views: {{ (int)$post->view_count }}</p>
                </div>
                <div class="col-sm-7" style="border-left: 1px solid gray;">
                    @if (!empty($post->post_title))
                        <h4>{{ $post->post_title }}</h4>
                    @endif
                    @if (!empty($post->image_name))
                        <img style="width: 100%; height: 100%; padding: 10px 5px;" src="{{ url('images/posts/' . $post->id . '/' . $post->image_name) }}">
                    @endif
                    <p>
                        {!! $post->post_content !!}
                    </p>
                    @if (Entrust::hasRole('admin')||Entrust::hasRole('dm')||Entrust::hasRole('player'))
                        <p>
                            <a href="{{ url('blog/' . $post->id . '/comment/add') }}">
                                <button type="button" class="btn btn-primary">
                                    Comment <i class="fa fa-btn fa-comment"></i>
                                </button>
                            </a>
                        </p>
                    @endif
                </div>
                <div class="col-sm-3"></div>
            </div>
            @if (!$post->comments->isEmpty())
                @foreach($post->comments as $comment)
                    @if ($comment->post_status_id == $approve_status->id)
                        <div class="row" style="border-bottom: 1px solid grey;">
                            <div class="col-sm-2 col-sm-offset-1" style="border-right: 1px solid grey;">
                                <p style="font-weight:bold;">{{ $comment->user->name }}</p>
                                <p style="font-style: italic;">{{ $comment->created_at->format('d M Y - H:i:s') }}</p>
                            </div>
                            <div class="col-sm-6">
                                {!! $comment->comment_content !!}
                            </div>
                            <div class="col-sm-2">
                                @if (!empty($comment->image_name))
                                    <img style="width: 100%; height: 100%" src="{{ url('images/comments/' . $comment->id . '/' . $comment->image_name) }}"/>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif


        @else
            <p style="font-style: italic; font-weight: bold;">There are no content for this post.</p>
        @endif
     </div>

@endsection