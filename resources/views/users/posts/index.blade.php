@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">

                <div class="post_image">
                    <div class="block1">
                        @if($user->photo)
                            <img src="{{ asset('storage/'. $user->photo) }}">
                        @else
                            <img src="{{ asset('storage/images/first_place3.jpg') }}">
                        @endif
                    </div>

                    <div class="block2">
                        <h2 class="text-2xl font-medium mb-1">
                            {{ $user->name }}
                        </h2>
                        <p>
                            Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg">
                <div style="padding-bottom: 25px;">
                    <a href="{{ route('user.archive', $user->id) }}" 
                        style="text-decoration: underline; color: blue; font-size: 20px;"
                    >@lang('post.my_archive')</a>
                </div>
                

                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <p class="mb-2">{{ $post->body }}</p>
                        </div>
                    @endforeach

                    {{ $posts->links('pagination::semantic-ui') }}
                @else
                    <p>{{ $user->name }} does not have any posts!</p>
                @endif
            </div>
        </div>
    </div>
@endsection