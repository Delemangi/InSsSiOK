<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Author: {{$post->author->name}}</p>
                    <h1 style="font-size: 30px;margin-top: 40px">{{$post->title}}</h1>
                    <hr>
                    <p style="margin-top: 40px">{{$post->body}}</p>
                    <hr>
                    <h1 style="font-size: 20px;margin-top:40px">Comment Section</h1>
                    <hr>
                    @foreach ($comments as $comment)
                        <x-comment :comment="$comment"/>
                    @endforeach
                    @if (Auth::id() != null)
                        <div>
                            <form method="post" action='{{ url("/comments") }}'
                                  style="display: flex;flex-direction:column;margin-top:20px">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                <label for="body">Comment</label>
                                <input type="text" name="body"/>
                                <button
                                    type="submit"
                                    class="rounded-md mt-2 bg-red-500 text-white focus:ring-red-600 px-4 py-2 text-sm">
                                    Post
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
