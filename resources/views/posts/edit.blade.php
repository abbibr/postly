@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl font-medium mb-2">
                Edit Page!
            </h1>

            <form action="{{ route('post.update', $post->id) }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                        border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="Update post!">{{ $post->body }}</textarea>
                </div>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-3
                    rounded font-medium">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection