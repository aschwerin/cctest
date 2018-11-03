@extends('layouts.alt')

@section('content')


            <!-- Styles -->
                <style>
                    html, body {
                        background-color: #fff;
                        color: #636b6f;
                        font-family: 'Raleway';
                        font-weight: 100;
                        height: 100vh;
                        margin: 0;
                    }

                    .full-height {
                        height: 100vh;
                    }

                    .flex-center {
                        align-items: center;
                        display: flex;
                        justify-content: center;
                    }

                    .position-ref {
                        position: relative;
                    }

                    .top-right {
                        position: absolute;
                        right: 10px;
                        top: 18px;
                    }

                    .content {
                        text-align: center;
                    }

                    .title {
                        font-size: 84px;
                    }

                    .links > a {
                        color: #636b6f;
                        padding: 0 25px;
                        font-size: 12px;
                        font-weight: 600;
                        letter-spacing: .1rem;
                        text-decoration: none;
                        text-transform: uppercase;
                    }

                    .m-b-md {
                        margin-bottom: 30px;
                    }
                </style>


            <div class="container">
                <div class="content">
                    <div style="text-align: center;">
                        {{ $ip_address }}
                        <br/>
                        {{ $browser }}
                        <br/>
                        {{ $host }}
                        <br/>
                        {{ $timestamp }}
                    </div>
                    <div class="title m-b-md">
                        Welcome to <br/>
                        <img src="{{ url('images/logo4.png') }}" alt="{{ config('app.name', 'Laravel') }}"/>
                    </div>

                    {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                    {{--</div>--}}
                </div>
            </div>


@endsection

