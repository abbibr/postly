@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg">

                @if ($notifications->count())
                    <h1 class="text-2xl font-medium mb-1">@lang('post.new_post')</h1> <br>

                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">#ID</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">@lang('post.post_body')</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    @lang('post.created_post')
                                </th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                    @lang('post.read')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                                <tr class="bg-blue-50">
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $notification->data['id'] }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $notification->data['body'] }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.read', $notification->id) }}"
                                            class="p-2 text-xs font-medium uppercase trackling-wider text-green-900 bg-green-300 rounded-lg">@lang('post.read')</a>
                                        <span type="submit"
                                            class="p-2 text-md font-medium uppercase trackling-wider text-blue-900">@lang('post.new')</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-xl font-medium mb-1">@lang('post.no_post')</h1>
                @endif
            </div>
        </div>
    </div>
@endsection