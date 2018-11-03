@extends('layouts.alt')

@section('add_top')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: [
                "code", "link", "image"
            ],
            menubar:false,
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
        });</script>
@endsection

@section('content')
    <div class="container">
        <div class="panel-body">
            <pre>
                {{--{{ var_dump($post) }}--}}
            </pre>
            <h1>Add Comment</h1>
            <p style="font-style: italic; font-weight: bold; color:red;">Editing a comment will require re-approval by the thread owner.</p>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('blog/comment/'.$comment->id.'/update') }}">
                {{ method_field('patch')}}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('comment_content') ? ' has-error' : '' }}">
                    <label for="comment_content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-8">
                        <textarea id="comment_content" class="form-control" name="comment_content" >
                            {!! $comment->comment_content !!}
                        </textarea>
                        @if ($errors->has('comment_content'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('comment_content') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                        <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($comment->image_name))
                            <img style="width: 100%; height: 100%;" src="{{ url('images/comments/' . $comments->id . '/' . $comments->image_name) }}" />
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Update <i class="fa fa-btn fa-file-text"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection