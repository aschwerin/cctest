@extends('layouts.alt')

@section('content')
    <div class="container">



        <h1>Registered Users</h1>
        <div class="row">
            <div class="col-xs-12">
                <pre>
{{--                    {{ var_dump($roles) }}--}}
                </pre>
            </div>
        </div>
        <table style="width:90%;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Name</th>
                <th>Role(s)</th>
                <th>Active</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if(!empty($user_roles[$user->id]))
                            {{ implode(', ', $user_roles[$user->id]) }}
                        @else
                            <span style="color: red; text-transform: uppercase; font-weight: bold;">No Role Set</span>
                        @endif
                    </td>
                    <td>{{ ($user->active)?'Yes':'No' }}</td>
                    <td>
                        <a href="users/{{$user->id}}/edit">Edit</a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>



        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/users/store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role" class="col-md-4 control-label">Role</label>
                    <div class="col-md-6">
                        <select id="role" class="form-control" name="role" >
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ ($role->name == 'subscriber')?'selected':'' }}>{{ $role->display_name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



                <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active" class="col-md-4 control-label">Active</label>
                    <div class="col-md-6">
                        <select id="active" class="form-control" name="active" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
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
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>


@stop