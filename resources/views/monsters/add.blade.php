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
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('monster/create') }}">
            {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-sm-8">
                        <button class="btn btn-primary" id="gen_monster">Randomize <i class="fa fa-btn fa-magic"></i></button>
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

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                            <option value="Barbarian">Barbarian</option>
                            <option value="Bard">Bard</option>
                            <option value="Cleric">Cleric</option>
                            <option value="Druid">Druid</option>
                            <option value="Fighter">Fighter</option>
                            <option value="Monk">Monk</option>
                            <option value="Paladin">Paladin</option>
                            <option value="Ranger">Ranger</option>
                            <option value="Rogue">Rogue</option>
                            <option value="Sorcerer">Sorcerer</option>
                            <option value="Warlock">Warlock</option>
                            <option value="Wizard">Wizard</option>
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
                        <input id="level" type="number" class="form-control" name="level" value="{{ old('level') }}">
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
                            <option value="Dragonborn">Dragonborn</option>
                            <option value="Drow">Drow</option>
                            <option value="Dwarf">Dwarf</option>
                            <option value="Elf">Elf</option>
                            <option value="Gnome">Gnome</option>
                            <option value="Half-Elf">Half-Elf</option>
                            <option value="Half-Orc">Half-Orc</option>
                            <option value="Halfling">Halfling</option>
                            <option value="Human">Human</option>
                            <option value="Tiefling">Tiefling</option>
                            <option value="Orc">Orc</option>
                            <option value="Troll">Troll</option>
                            <option value="Ogre">Ogre</option>
                            <option value="Imp">Imp</option>
                            <option value="Demon">Demon</option>
                            <option value="Dragon">Dragon</option>
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
                            <option value="Lawful good">Lawful good</option>
                            <option value="Neutral good">Neutral good</option>
                            <option value="Chaotic good">Chaotic good</option>
                            <option value="Lawful neutral">Lawful neutral</option>
                            <option value="True neutral">True neutral</option>
                            <option value="Chaotic neutral">Chaotic neutral</option>
                            <option value="Lawful evil">Lawful evil</option>
                            <option value="Neutral evil">Neutral evil</option>
                            <option value="Chaotic evil">Chaotic evil</option>
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
                        <input id="exp" type="number" class="form-control" name="exp" value="{{ old('exp') }}">
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
                        <input id="str" type="number" class="form-control" name="str" value="{{ old('str') }}">
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
                        <input id="dex" type="number" class="form-control" name="dex" value="{{ old('dex') }}">
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
                        <input id="con" type="number" class="form-control" name="con" value="{{ old('con') }}">
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
                        <input id="int" type="number" class="form-control" name="int" value="{{ old('int') }}">
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
                        <input id="wis" type="number" class="form-control" name="wis" value="{{ old('wis') }}">
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
                        <input id="cha" type="number" class="form-control" name="cha" value="{{ old('cha') }}">
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
                        <input id="armor" type="number" class="form-control" name="armor" value="{{ old('armor') }}">
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
                        <input id="initiative" type="number" class="form-control" name="initiative" value="{{ old('initiative') }}">
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
                        <input id="speed" type="number" class="form-control" name="speed" value="{{ old('speed') }}">
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
                        <input id="hit_points" type="number" class="form-control" name="hit_points" value="{{ old('hit_points') }}">
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
                        <textarea id="equipment" class="form-control" name="equipment" ></textarea>
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
                        <textarea id="other_proficiencies_langs" class="form-control" name="other_proficiencies_langs" ></textarea>
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
                        <textarea id="notes" class="form-control" name="notes" ></textarea>
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
                            Create <i class="fa fa-btn fa-user-plus"></i>
                        </button>
                    </div>
                </div>


            </form>
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
                url: "{{ url('monsters/name_gen') }}",
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

        $('#gen_monster').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ url('monsters/mon_gen') }}",
                delay: 250,
                success: function(result){
                    $.each(result, function(key,value) {
                        var id = '#' + key;
                        $(id).val(value);
                    });
                }
            });
        });

        $('#gen_stat').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ url('monsters/stats_gen') }}",
                delay: 250,
                success: function(result){
                    $.each(result, function(key,value) {
                        var id = '#' + key;
                        $(id).val(value);
                    });
                }
            });
        });

    </script>
@endsection