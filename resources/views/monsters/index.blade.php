@extends('layouts.alt')

@section('content')
    <div class="container">
        <h1>Character List</h1>
        <div class="row">
            <div class="col-xs-12">
                @if ($monsters->isEmpty())
                    <p style="font-weight: bold; font-style: italic;">You currently have no monsters!</p>
                    <a href="monster/add">
                        <button class="btn btn-primary">Create Monster <i class="fa fa-user-plus"></i></button>
                    </a>
                @else
                    <pre>
                        {{--{{ var_dump($characters) }}--}}
                    </pre>
                    <a href="monster/add">
                        <button class="btn btn-primary">Add Monster <i class="fa fa-user-plus"></i></button>
                    </a>
                    <div class="character-container">
                        <div class="row">
                            <div class="col-sm-2"><h4>Name</h4></div>
                            <div class="col-sm-2"><h4>Class</h4></div>
                            <div class="col-sm-2"><h4>Race</h4></div>
                            <div class="col-sm-2"><h4>Level</h4></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                        </div>
                        @foreach($monsters as $monster)
                            <div class="row">
                                <div class="col-sm-2">{{ $monster->name }}</div>
                                <div class="col-sm-2">{{ $monster->class }}</div>
                                <div class="col-sm-2">{{ $monster->race }}</div>
                                <div class="col-sm-2">{{ $monster->level }}</div>
                                <div class="col-sm-2">
                                    <a href="/monster/{{ $monster->id }}/edit">
                                        <button type="button" class="btn btn-primary">Edit <i class="fa fa-btn fa-edit"></i></button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ url ('monster/'.$monster->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" id="delete-task-{{$monster->id}}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection