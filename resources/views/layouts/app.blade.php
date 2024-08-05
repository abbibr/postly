<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    @vite('resources/css/app.css')
    <style>
        .profile{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .profile img{
            width: 50px;
            height: 50px;
            border-radius: 100%;
        }
        .post_image{
            display: flex;
            align-items: center;
        }
        .post_image img{
            margin-right: 15px;
            width: 75px;
            height: 75px;
            border-radius: 100%;
        }
    </style>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">@lang('post.home')</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">@lang('post.dashboard')</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">@lang('post.posts')</a>
            </li>

            <li>
                @foreach ($all_locales as $lang)
                    {{-- <a href="{{ route('change_lang', ['lang' => $lang]) }}" style="margin-left: 12px;">{{ $lang }}</a> --}}
                    <a href="{{ route('change_lang', $lang) }}" style="margin-left: 12px;">{{ $lang }}</a>
                @endforeach
            </li>
        </ul>   

        <ul class="flex items-center">
            @if(auth()->user())
                <li style="margin-right: 35px; margin-top: 5px;">
                    <a href="{{ route('user.notification', auth()->user()->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 48 48">
                            <linearGradient id="McOMTfiYL3bOztJQDCSGka_z8yqcMdq4T2h_gr1" x1="24" x2="24" y1="1.993" y2="7.005" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fede00"></stop><stop offset="1" stop-color="#ffd000"></stop></linearGradient><path fill="url(#McOMTfiYL3bOztJQDCSGka_z8yqcMdq4T2h_gr1)" d="M27,7h-6V5c0-1.657,1.343-3,3-3h0c1.657,0,3,1.343,3,3V7z"></path><path fill="#f5be00" d="M39,21c0-8.284-6.716-15-15-15S9,12.716,9,21c0,0.39,0,13,0,13h30C39,34,39,21.39,39,21z"></path><linearGradient id="McOMTfiYL3bOztJQDCSGkb_z8yqcMdq4T2h_gr2" x1="24" x2="24" y1="33.993" y2="39.005" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fede00"></stop><stop offset="1" stop-color="#ffd000"></stop></linearGradient><path fill="url(#McOMTfiYL3bOztJQDCSGkb_z8yqcMdq4T2h_gr2)" d="M39,34H9l-3.875,1.55C4.445,35.822,4,36.48,4,37.211v0C4,38.199,4.801,39,5.789,39h36.422	C43.199,39,44,38.199,44,37.211v0c0-0.731-0.445-1.389-1.125-1.661L39,34z"></path><linearGradient id="McOMTfiYL3bOztJQDCSGkc_z8yqcMdq4T2h_gr3" x1="24" x2="24" y1="42.919" y2="38.859" gradientUnits="userSpaceOnUse"><stop offset=".486" stop-color="#fbc300"></stop><stop offset="1" stop-color="#dbaa00"></stop></linearGradient><path fill="url(#McOMTfiYL3bOztJQDCSGkc_z8yqcMdq4T2h_gr3)" d="M28,39c0,2.209-1.791,4-4,4s-4-1.791-4-4H28z"></path>
                        </svg>
                    </a>
                    @if(auth()->user()->notifications()->unread()->count())
                        <span style="margin-left: 12px;">
                            {{ auth()->user()->notifications()->unread()->count() }}
                        </span>
                    @endif
                </li>
                <li class="profile">
                    @if(auth()->user()->photo)
                        <img src="{{ asset('storage/'. auth()->user()->photo) }}">
                    @else
                        <img src="{{ asset('storage/images/first_place3.jpg') }}">
                    @endif
                    <a href="{{ route('user.posts', auth()->user()->id) }}" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">@lang('post.logout')</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>
</html>