@extends('layouts.alt')

@section('content')
    <div class="container">
        <h1>Character List</h1>
        <div class="row">
            <div class="col-xs-12">
                @if ($characters->isEmpty())
                    <p style="font-weight: bold; font-style: italic;">There are no characters!</p>
                @else
                    <pre>
                        {{--{{ var_dump($characters) }}--}}
                    </pre>
                    <div class="character-container">
                        <div class="row">
                            <div class="col-sm-2"><h4>Name</h4></div>
                            <div class="col-sm-2"><h4>Class</h4></div>
                            <div class="col-sm-2"><h4>Race</h4></div>
                            <div class="col-sm-2"><h4>Level</h4></div>
                            <div class="col-sm-2"></div>
                        </div>
                        @foreach($characters as $character)
                            <div class="row">
                                <div class="col-sm-3">{{ $character->name }}</div>
                                <div class="col-sm-2">{{ $character->class }}</div>
                                <div class="col-sm-2">{{ $character->race }}</div>
                                <div class="col-sm-2">{{ $character->level }}</div>
                                <div class="col-sm-2">
                                    <a href="/character/{{ $character->id }}/view">
                                        <button type="button" class="btn btn-primary">View <i class="fa fa-btn fa-eye"></i></button>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection