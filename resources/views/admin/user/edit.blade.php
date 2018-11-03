@extends('layouts.alt')

@section('content')
    <div class="container">


    <div class="row">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/users/'.$user->id.'/update') }}">
                {{ method_field('patch')}}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>

                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<input id="password" type="password" class="form-control" name="password">--}}

                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

                        {{--@if ($errors->has('password_confirmation'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class="form-group{{ $errors->has('add_role') ? ' has-error' : '' }}">
                    <label for="add_role" class="col-md-4 control-label">Add Role</label>
                    <div class="col-md-6">
                        <select id="add_role" class="form-control" name="add_role" >
                            <option value="">Optional</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                {{--@if (!empty($user_roles))--}}
                                    {{--<option value="{{ $role->id }}" {{ ($role->id == $user_roles[0]->id)?'selected':'' }}>{{ $role->display_name }}</option>--}}
                                {{--@else--}}
                                    {{--<option value="{{ $role->id }}" {{ ($role->name == 'subscriber')?'selected':'' }}>{{ $role->display_name }}</option>--}}
                                {{--@endif--}}
                            @endforeach
                        </select>
                        @if ($errors->has('add_role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('add_role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('remove_role') ? ' has-error' : '' }}">
                    <label for="remove_role" class="col-md-4 control-label">Remove Role</label>
                    <div class="col-md-6">
                        <select id="remove_role" class="form-control" name="remove_role" >
                            <option value="">Optional</option>
                            @if (!empty($user->roles))
                                @foreach($user->roles as $role)
                                    <option value="{{ $role->id }}" {{ ($user->hasRole($role))?'selected':'' }}>{{ $role->display_name }}</option>
                                @endforeach
                            @endif

                        </select>
                        @if ($errors->has('remove_role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('remove_role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-md-4 control-label">Active</label>
                    <div class="col-md-6">
                        <select id="active" class="form-control" name="active" >
                            <option value="false">No</option>
                            <option value="true" {{ ($user->active)?'selected':'' }}>Yes</option>
                        </select>

                        @if ($errors->has('active'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>

@stop