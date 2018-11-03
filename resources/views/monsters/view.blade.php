@extends('layouts.alt')

@section('content')

    <style>
        .character-body {
            border:3px solid black;
            padding: 10px;
            position: relative;
            display: block;
        }
        .character-body::after {
            content: "";
            background-image: url({{ url('images/monsters/' . $monster->id . '/' . $monster->image_name) }});
            background-repeat: no-repeat;
            background-size: 100% auto;
            opacity: 0.1;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
        }
    </style>

    <div class="container">
        <div class="row">
            @if (!empty($monster))
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        @if (!empty($monster->image_name))
                            <img style="width: 100%; margin-bottom: -60px;" src="{{ url('images/monsters/' . $monster->id . '/' . $monster->image_name) }}" >
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <h2 style="text-align: center; vertical-align: baseline;">
                            {{ $monster->name }} - Level {{ $monster->level }}
                        </h2>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="character-body">
                    <div class="row" style="border-bottom:1px solid gray;">
                        <div class="col-sm-2">
                            <h4>Race</h4>
                        </div>
                        <div class="col-sm-2" style="border-right:1px solid gray;">
                            <h3>{{ $monster->race }}</h3>
                        </div>
                        <div class="col-sm-2">
                            <h4>Class</h4>
                        </div>
                        <div class="col-sm-2" style="border-right:1px solid gray;">
                            <h3>{{ $monster->class }}</h3>
                        </div>
                        <div class="col-sm-2">
                            <h4>Alignment</h4>
                        </div>
                        <div class="col-sm-2">
                            <h3>{{ $monster->alignment }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2" style="border-right:1px solid gray;">

                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Stats</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>STR</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->str }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>DEX</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->dex }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>CON</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->con }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>INT</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->int}}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>WIS</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->wis }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>CHA</h4></div>
                                <div class="col-sm-6"><h4>{{ $monster->cha }}</h4></div>
                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>Initiative</h4>
                                    {{ $monster->initiative }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>AC</h4>
                                    {{ $monster->armor }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>Speed</h4>
                                    {{ $monster->speed }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>Experience</h4>
                                    {{ $monster->exp }}
                                </div>
                            </div>
                            <div class="row" style="border-top: 1px solid gray;">
                                <div class="col-sm-4">
                                    <div class="row">Str: {{ (int)(($monster->str - 10)/2) }}</div>
                                    <div class="row">Dex: {{ (int)(($monster->dex - 10)/2) }}</div>
                                    <div class="row">Con: {{ (int)(($monster->con - 10)/2) }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">Int: {{ (int)(($monster->int - 10)/2) }}</div>
                                    <div class="row">Wis: {{ (int)(($monster->wis - 10)/2) }}</div>
                                    <div class="row">Cha: {{ (int)(($monster->cha - 10)/2) }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <h4>Hit Points</h4>
                                    {{ $monster->hit_points }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="border-top:1px solid gray;">
                                    <h4>Other Proficiencies & Languages</h4>
                                    {!! $monster->other_proficiencies_langs !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6" style="border-top:1px solid gray; border-right: 1px solid gray;">
                            <h4>Equipment</h4>
                            {!! $monster->equipment !!}
                        </div>
                        <div class="col-sm-6" style="border-top:1px solid gray;">
                            <h4>Notes</h4>
                            {!! $monster->notes !!}
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
@endsection