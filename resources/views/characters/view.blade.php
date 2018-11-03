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
            background-image: url({{ url('images/characters/' . $character->id . '/' . $character->image_name) }});
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
            @if (!empty($character))
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        @if (!empty($character->image_name))
                            <img style="width: 100%; margin-bottom: -60px;" src="{{ url('images/characters/' . $character->id . '/' . $character->image_name) }}" >
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <h2 style="text-align: center; vertical-align: baseline;">
                            {{ $character->name }} - Level {{ $character->level }}
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
                            <h3>{{ $character->race }}</h3>
                        </div>
                        <div class="col-sm-2">
                            <h4>Class</h4>
                        </div>
                        <div class="col-sm-2" style="border-right:1px solid gray;">
                            <h3>{{ $character->class }}</h3>
                        </div>
                        <div class="col-sm-2">
                            <h4>Alignment</h4>
                        </div>
                        <div class="col-sm-2">
                            <h3>{{ $character->alignment }}</h3>
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
                                <div class="col-sm-6"><h4>{{ $character->str }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>DEX</h4></div>
                                <div class="col-sm-6"><h4>{{ $character->dex }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>CON</h4></div>
                                <div class="col-sm-6"><h4>{{ $character->con }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>INT</h4></div>
                                <div class="col-sm-6"><h4>{{ $character->int}}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>WIS</h4></div>
                                <div class="col-sm-6"><h4>{{ $character->wis }}</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><h4>CHA</h4></div>
                                <div class="col-sm-6"><h4>{{ $character->cha }}</h4></div>
                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>Initiative</h4>
                                    {{ $character->initiative }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>AC</h4>
                                    {{ $character->armor }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>Speed</h4>
                                    {{ $character->speed }}
                                </div>
                                <div class="col-sm-3">
                                    <h4>Experience</h4>
                                    {{ $character->exp }}
                                </div>
                            </div>
                            <div class="row" style="border-top: 1px solid gray;">
                                <div class="col-sm-4">
                                    <div class="row">Str: {{ (int)(($character->str - 10)/2) }}</div>
                                    <div class="row">Dex: {{ (int)(($character->dex - 10)/2) }}</div>
                                    <div class="row">Con: {{ (int)(($character->con - 10)/2) }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">Int: {{ (int)(($character->int - 10)/2) }}</div>
                                    <div class="row">Wis: {{ (int)(($character->wis - 10)/2) }}</div>
                                    <div class="row">Cha: {{ (int)(($character->cha - 10)/2) }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <h4>Hit Points</h4>
                                    {{ $character->hit_points }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="border-top:1px solid gray;">
                                    <h4>Background</h4>
                                    {!! $character->background !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="border-top:1px solid gray;">
                                    <h4>Other Proficiencies & Languages</h4>
                                    {!! $character->other_proficiencies_langs !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" style="border-left: 1px solid gray;">
                            <div class="row">
                                <div class="col-sm-12" style="border-bottom: 1px solid gray;">
                                    <h4>Personality Traits</h4>
                                    <p>{{ strip_tags($character->personality_traits) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="border-bottom: 1px solid gray;">
                                    <h4>Ideals</h4>
                                    <p>{{ strip_tags($character->ideals) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="border-bottom: 1px solid gray;">
                                    <h4>Bonds</h4>
                                    <p>{{ strip_tags($character->bonds) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Flaws</h4>
                                    <p>{{ strip_tags($character->flaws) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6" style="border-top:1px solid gray; border-right: 1px solid gray;">
                            <h4>Equipment</h4>
                            {!! $character->equipment !!}
                        </div>
                        <div class="col-sm-6" style="border-top:1px solid gray;">
                            <h4>Notes</h4>
                            {!! $character->notes !!}
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
@endsection