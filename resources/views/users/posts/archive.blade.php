@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg">

                @session('force_deleting')
                    <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('force_deleting') }}
                    </div>
                @endsession

                @session('restore')
                    <div class="bg-blue-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('restore') }}
                    </div>
                @endsession

                @session('forceDelete')
                    <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('forceDelete') }}
                    </div>
                @endsession

                <div style="padding-bottom: 15px">
                    <a href="{{ route('user.posts', $user_id) }}"
                        style="text-decoration: underline; color: blue; font-size: 20px;">@lang('post.back_post')</a>
                </div>

                @if ($posts->count())
                    <h1 class="text-2xl font-medium mb-1">{{ $posts->count() }} archive
                        {{ Str::plural('post', $posts->count()) }}:</h1> <br>

                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">#ID</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">@lang('post.post_body')</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    @lang('post.deleted_post')
                                </th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    @lang('post.restore')
                                </th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    @lang('post.delete_forever')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="bg-blue-50">
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $post->id }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $post->body }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $post->deleted_at->diffForHumans() }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        <form action="{{ route('user.restore', $post->id) }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="p-2 text-xs font-medium uppercase trackling-wider text-blue-800 bg-blue-200 rounded-lg">@lang('post.restore')</button>
                                        </form>
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        <form action="{{ route('user.deleteForever', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-xs font-medium uppercase trackling-wider text-red-800 bg-red-200 rounded-lg">
                                                @lang('post.delete_forever')</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-xl font-medium mb-1">@lang('post.no_archive')</h1> <br>
                @endif
            </div>
        </div>
    </div>
@endsection
