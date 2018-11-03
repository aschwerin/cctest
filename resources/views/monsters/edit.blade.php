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
            {{--{!! Form::open([--}}
        {{--'url' => 'character/'.$character->id.'/update',--}}
        {{--'class' => 'form-horizontal',--}}
        {{--'files' => true--}}
        {{--]) !!}--}}
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('monster/'.$monster->id.'/update') }}">

                {{ method_field('patch')}}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                        <input id="image" type="file" class="form-control" name="image" value="{{ $monster->image_name }}">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        @if (!empty($monster->image_name))
                            <img style="width: 100%;" src="{{ url('images/monsters/' . $monster->id . '/' . $monster->image_name) }}" >
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $monster->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary" id="gen_name">Generate <i class="fa fa-btn fa-magic"></i></button>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                    <label for="class" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-8">
                        <select id="class" class="form-control" name="class" >
                            <option value="">Please select</option>
                            <option value="Barbarian" {{ ($monster->class == "Barbarian")?"selected":"" }}>Barbarian</option>
                            <option value="Bard" {{ ($monster->class == "Bard")?"selected":"" }}>Bard</option>
                            <option value="Cleric" {{ ($monster->class == "Cleric")?"selected":"" }}>Cleric</option>
                            <option value="Druid" {{ ($monster->class == "Druid")?"selected":"" }}>Druid</option>
                            <option value="Fighter" {{ ($monster->class == "Fighter")?"selected":"" }}>Fighter</option>
                            <option value="Monk" {{ ($monster->class == "Monk")?"selected":"" }}>Monk</option>
                            <option value="Paladin" {{ ($monster->class == "Paladin")?"selected":"" }}>Paladin</option>
                            <option value="Ranger" {{ ($monster->class == "Ranger")?"selected":"" }}>Ranger</option>
                            <option value="Rogue" {{ ($monster->class == "Rogue")?"selected":"" }}>Rogue</option>
                            <option value="Sorcerer" {{ ($monster->class == "Sorcerer")?"selected":"" }}>Sorcerer</option>
                            <option value="Warlock" {{ ($monster->class == "Warlock")?"selected":"" }}>Warlock</option>
                            <option value="Wizard" {{ ($monster->class == "Wizard")?"selected":"" }}>Wizard</option>
                        </select>
                        @if ($errors->has('class'))
                            <span class="help-block">
                                <strong>{{ $errors->first('class') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                    <label for="level" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-8">
                        <input id="level" type="number" class="form-control" name="level" value="{{ $monster->level }}">
                        @if ($errors->has('level'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('level') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('race') ? ' has-error' : '' }}">
                    <label for="race" class="col-sm-2 control-label">Race</label>
                    <div class="col-sm-8">
                        <select id="race" class="form-control" name="race" >
                            <option value="">Please select</option>
                            <option value="Dragonborn" {{ ($monster->race == "Dragonborn")?"selected":"" }}>Dragonborn</option>
                            <option value="Drow" {{ ($monster->race == "Drow")?"selected":"" }}>Drow</option>
                            <option value="Dwarf" {{ ($monster->race == "Dwarf")?"selected":"" }}>Dwarf</option>
                            <option value="Elf" {{ ($monster->race == "Elf")?"selected":"" }}>Elf</option>
                            <option value="Gnome" {{ ($monster->race == "Gnome")?"selected":"" }}>Gnome</option>
                            <option value="Half-Elf" {{ ($monster->race == "Half-Elf")?"selected":"" }}>Half-Elf</option>
                            <option value="Half-Orc" {{ ($monster->race == "Half-Orc")?"selected":"" }}>Half-Orc</option>
                            <option value="Halfling" {{ ($monster->race == "Halfling")?"selected":"" }}>Halfling</option>
                            <option value="Human" {{ ($monster->race == "Human")?"selected":"" }}>Human</option>
                            <option value="Tiefling" {{ ($monster->race == "Tiefling")?"selected":"" }}>Tiefling</option>
                            <option value="Orc" {{ ($monster->race == "Orc")?"selected":"" }}>Orc</option>
                            <option value="Troll" {{ ($monster->race == "Troll")?"selected":"" }}>Troll</option>
                            <option value="Ogre" {{ ($monster->race == "Ogre")?"selected":"" }}>Ogre</option>
                            <option value="Imp" {{ ($monster->race == "Imp")?"selected":"" }}>Imp</option>
                            <option value="Demon" {{ ($monster->race == "Demon")?"selected":"" }}>Demon</option>
                            <option value="Dragon" {{ ($monster->race == "Dragon")?"selected":"" }}>Dragon</option>
                        </select>
                        @if ($errors->has('race'))
                            <span class="help-block">
                                <strong>{{ $errors->first('race') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('alignment') ? ' has-error' : '' }}">
                    <label for="alignment" class="col-sm-2 control-label">Alignment</label>
                    <div class="col-sm-8">
                        <select id="alignment" class="form-control" name="alignment" >
                            <option value="">Please select</option>
                            <option value="Lawful good" {{ ($monster->alignment == "Lawful good")?"selected":"" }}>Lawful good</option>
                            <option value="Neutral good" {{ ($monster->alignment == "Neutral good")?"selected":"" }}>Neutral good</option>
                            <option value="Chaotic good" {{ ($monster->alignment == "Chaotic good")?"selected":"" }}>Chaotic good</option>
                            <option value="Lawful neutral" {{ ($monster->alignment == "Lawful neutral")?"selected":"" }}>Lawful neutral</option>
                            <option value="True neutral" {{ ($monster->alignment == "True neutral")?"selected":"" }}>True neutral</option>
                            <option value="Chaotic neutral" {{ ($monster->alignment == "Chaotic neutral")?"selected":"" }}>Chaotic neutral</option>
                            <option value="Lawful evil" {{ ($monster->alignment == "Lawful evil")?"selected":"" }}>Lawful evil</option>
                            <option value="Neutral evil" {{ ($monster->alignment == "Neutral evil")?"selected":"" }}>Neutral evil</option>
                            <option value="Chaotic evil" {{ ($monster->alignment == "")?"selected":"Chaotic evil" }}>Chaotic evil</option>
                        </select>
                        @if ($errors->has('alignment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alignment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('exp') ? ' has-error' : '' }}">
                    <label for="exp" class="col-sm-2 control-label">Experience Points</label>
                    <div class="col-sm-8">
                        <input id="exp" type="number" class="form-control" name="exp" value="{{ $monster->exp }}">
                        @if ($errors->has('exp'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('exp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('str') ? ' has-error' : '' }}">
                    <label for="str" class="col-sm-2 control-label">Strength</label>
                    <div class="col-sm-8">
                        <input id="str" type="number" class="form-control" name="str" value="{{ $monster->str }}">
                        @if ($errors->has('str'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('str') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('dex') ? ' has-error' : '' }}">
                    <label for="dex" class="col-sm-2 control-label">Dexterity</label>
                    <div class="col-sm-8">
                        <input id="dex" type="number" class="form-control" name="dex" value="{{ $monster->dex }}">
                        @if ($errors->has('dex'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('dex') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('con') ? ' has-error' : '' }}">
                    <label for="con" class="col-sm-2 control-label">Constitution</label>
                    <div class="col-sm-8">
                        <input id="con" type="number" class="form-control" name="con" value="{{ $monster->con }}">
                        @if ($errors->has('con'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('con') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('int') ? ' has-error' : '' }}">
                    <label for="int" class="col-sm-2 control-label">Intelligence</label>
                    <div class="col-sm-8">
                        <input id="int" type="number" class="form-control" name="int" value="{{ $monster->int }}">
                        @if ($errors->has('int'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('int') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('wis') ? ' has-error' : '' }}">
                    <label for="wis" class="col-sm-2 control-label">Wisdom</label>
                    <div class="col-sm-8">
                        <input id="wis" type="number" class="form-control" name="wis" value="{{ $monster->wis }}">
                        @if ($errors->has('wis'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('wis') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cha') ? ' has-error' : '' }}">
                    <label for="cha" class="col-sm-2 control-label">Charisma</label>
                    <div class="col-sm-8">
                        <input id="cha" type="number" class="form-control" name="cha" value="{{ $monster->cha }}">
                        @if ($errors->has('cha'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('cha') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('armor') ? ' has-error' : '' }}">
                    <label for="armor" class="col-sm-2 control-label">Armor Class</label>
                    <div class="col-sm-8">
                        <input id="armor" type="number" class="form-control" name="armor" value="{{ $monster->armor }}">
                        @if ($errors->has('armor'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('armor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('initiative') ? ' has-error' : '' }}">
                    <label for="initiative" class="col-sm-2 control-label">Initiative</label>
                    <div class="col-sm-8">
                        <input id="initiative" type="number" class="form-control" name="initiative" value="{{ $monster->initiative }}">
                        @if ($errors->has('initiative'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('initiative') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('speed') ? ' has-error' : '' }}">
                    <label for="speed" class="col-sm-2 control-label">Speed</label>
                    <div class="col-sm-8">
                        <input id="speed" type="number" class="form-control" name="speed" value="{{ $monster->speed }}">
                        @if ($errors->has('speed'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('speed') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('hit_points') ? ' has-error' : '' }}">
                    <label for="hit_points" class="col-sm-2 control-label">Hit Points</label>
                    <div class="col-sm-8">
                        <input id="hit_points" type="number" class="form-control" name="hit_points" value="{{ $monster->hit_points }}">
                        @if ($errors->has('hit_points'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('hit_points') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('equipment') ? ' has-error' : '' }}">
                    <label for="equipment" class="col-sm-2 control-label">Equipment</label>
                    <div class="col-sm-8">
                        <textarea id="equipment" class="form-control" name="equipment" >
                            {{ $monster->equipment }}
                        </textarea>
                        @if ($errors->has('equipment'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('equipment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('other_proficiencies_langs') ? ' has-error' : '' }}">
                    <label for="other_proficiencies_langs" class="col-sm-2 control-label">Other Proficiencies<br/>and Languages</label>
                    <div class="col-sm-8">
                        <textarea id="other_proficiencies_langs" class="form-control" name="other_proficiencies_langs" >
                            {{ $monster->other_proficiencies_langs }}
                        </textarea>
                        @if ($errors->has('other_proficiencies_langs'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('other_proficiencies_langs') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                    <label for="notes" class="col-sm-2 control-label">Notes</label>
                    <div class="col-sm-8">
                        <textarea id="notes" class="form-control" name="notes" >
                            {{ $monster->notes }}
                        </textarea>
                        @if ($errors->has('notes'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('notes') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Update <i class="fa fa-btn fa-user"></i>
                        </button>
                    </div>
                </div>


            </form>
            {{--{!! Form::close() !!}--}}
        </div>
    </div>

@endsection

@section('add_js')
    <script type="text/javascript">
        {{--function genName() {--}}
            {{--event.preventDefault();--}}
            {{--var new_name = '{{ new \App\Helpers\NameGen() }}';--}}
            {{--console.log(new_name);--}}
            {{--var name = $('#name');--}}
            {{--name.val();--}}
            {{--name.val(new_name);--}}
        {{--}--}}

        $('#gen_name').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ url('characters/name_gen') }}",
                delay: 250,
                success: function(result){
//                    $("#div1").html(result);
                    $('#name').val(result);
                }
            });
            {{--var new_name = '{{ new \App\Helpers\NameGen() }}';--}}
            {{--console.log(new_name);--}}
            {{--var name = $('#name');--}}
            {{--name.val();--}}
            {{--name.val(new_name);--}}
        });

    </script>
@endsection