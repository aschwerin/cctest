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
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('blog/store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                    <label for="post_title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-8">
                        <input id="post_title" type="text" class="form-control" name="post_title" value="{{ old('post_title') }}">
                        @if ($errors->has('post_title'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('post_title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                    <label for="post_content" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-8">
                        <textarea id="post_content" class="form-control" name="post_content" ></textarea>
                        @if ($errors->has('post_content'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('post_content') }}</strong>
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
                </div>

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                        <select id="status" class="form-control" name="status" >
                            @foreach($status as $stat)
                                <option value="{{ $stat->id }}" {{ ($stat->name == 'draft')?'selected':'' }}>{{ $stat->display_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Save <i class="fa fa-btn fa-file-text"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection