@extends('layouts.alt')

@section('content')
    <style>
        .post-wrapper {
            border: 2px solid black;
        }

    </style>
    <div class="container">
        <h1>Posts</h1>
        @if(!empty($posts))
            @foreach($posts as $post)
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
                            <a href="{{ url('/blog/' . $post->id . '/view') }}"><span style="font-style: italic;"> >>Read More </span> </a>
                        </p>
                    </div>
                    <div class="col-sm-3">
                        @if (!empty($post->image_name))
                            <img style="width: 100%; height: 100%;" src="{{ url('images/posts/' . $post->id . '/' . $post->image_name) }}">
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p style="font-style: italic; font-weight: bold;">There are no current posts.</p>
        @endif
    </div>
@endsection