@extends('layouts.alt')

@section('content')
    <div class="container">
        <h1>Monster List</h1>
        <div class="row">
            <div class="col-xs-12">
                @if ($monsters->isEmpty())
                    <p style="font-weight: bold; font-style: italic;">There are no monsters!</p>
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
                        @foreach($monsters as $monster)
                            <div class="row">
                                <div class="col-sm-3">{{ $monster->name }}</div>
                                <div class="col-sm-2">{{ $monster->class }}</div>
                                <div class="col-sm-2">{{ $monster->race }}</div>
                                <div class="col-sm-2">{{ $monster->level }}</div>
                                <div class="col-sm-2">
                                    <a href="/monster/{{ $monster->id }}/view">
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