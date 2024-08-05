<style>
    button{
        border: 1px solid #2D3748;
        background: #2D3748;
        border-radius: 5px;
        padding: 10px;
    }
    button a{
        text-align: center;
        text-decoration: none;
        color: #fff;
    }
</style>

<x-mail::message>

<h1>User of post:</h1>
<p>{{ $post->user->name }}</p>

<h1>The body of your message:</h1>
<p>{{ $post->body }}</p>

<button>
    <a href="{{ route('user.posts', $post->user->id) }}">See my post</a>
</button> <br>

Thanks,<br>
{{ $post->user->name }} for your post!
</x-mail::message>
