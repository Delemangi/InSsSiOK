@props(['post'])

<div style="margin-left:50px">
    <div class="flex"><a href="/posts/{{$post->slug}}">
        <div style="border: 1px solid black">
            <h2 class="text-2xl">
                {{$post->title}}
            </h2>
            <div class=" font-bold mb-4">author:{{$post->author->name}}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$post->created_at}}
            </div>
            @if ($post->author->id == Auth::id())
                <a href="/posts/edit/{{$post->slug}}">Edit</a>
            @endif
        </div>
    </div></a>
</div>