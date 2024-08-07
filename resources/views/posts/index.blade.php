@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf

                    @session('post')
                        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                            {{ session('post') }}
                        </div>
                    @endsession

                    @error('error')
                        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                            {{ $message }}
                        </div>
                    @enderror

                    @session('update')
                        <div class="bg-yellow-500 p-4 rounded-lg mb-6 text-white text-center">
                            {{ session('update') }}
                        </div>
                    @endsession

                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                            border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3
                        rounded font-medium">@lang('post.post')</button>
                    </div>
                </form>
            @endauth

             @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('user.posts', $post->user->id) }}" class="font-bold">{{ $post->user->name }}</a>
                        {{-- Soat(vaqt) ko`rsatadi <span class="text-gray-600 text-sm">{{ $post->created_at->toTimeString() }}</span> --}}
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    
                        <p class="mb-2">{{ $post->body }}</p>
                        
                        <!-- Old method -->
                        {{-- @if($post->ownedBy(auth()->user()))
                            <div>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                            </div>
                        @endif --}}

                        <div class="flex items-center">
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                            @endcan

                            @can('update', $post)
                                <form action="{{ route('post.edit', $post->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Update</button>
                                </form>
                            @endcan
                        </div>

                        <div class="flex items-center">
                            @auth
                                @if(!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" class="mr-2" method="post">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post->id) }}" class="mr-2" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unlike</button>
                                    </form>
                                @endif
                            @endauth

                            <span class="text-red-500">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links('pagination::semantic-ui') }}
            @else
                <p>There are no posts!</p>
            @endif
        </div>
    </div>
@endsection