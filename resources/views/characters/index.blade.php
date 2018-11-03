@extends('layouts.alt')

@section('content')
    <div class="container">
        <h1>Character List</h1>
        <div class="row">
            <div class="col-xs-12">
                @if ($characters->isEmpty())
                    <p style="font-weight: bold; font-style: italic;">You currently have no characters!</p>
                    <a href="character/add">
                        <button class="btn btn-primary">Create Character <i class="fa fa-user-plus"></i></button>
                    </a>
                @else
                    <pre>
                        {{--{{ var_dump($characters) }}--}}
                    </pre>
                    <a href="character/add">
                        <button class="btn btn-primary">Add Character <i class="fa fa-user-plus"></i></button>
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
                        @foreach($characters as $character)
                            <div class="row">
                                <div class="col-sm-2">{{ $character->name }}</div>
                                <div class="col-sm-2">{{ $character->class }}</div>
                                <div class="col-sm-2">{{ $character->race }}</div>
                                <div class="col-sm-2">{{ $character->level }}</div>
                                <div class="col-sm-2">
                                    <a href="/character/{{ $character->id }}/edit">
                                        <button type="button" class="btn btn-primary">Edit <i class="fa fa-btn fa-edit"></i></button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ url ('character/'.$character->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" id="delete-task-{{$character->id}}" class="btn btn-danger">
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