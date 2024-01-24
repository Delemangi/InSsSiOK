<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action='{{ url("posts/update") }}'>
                        @csrf
                        <label
                                for="title"
                                class="inline-block text-lg mb-2"
                        >Title</label
                        >
                        <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                value="{{$post->title}}"
                        />
                        <label
                                for="slug"
                                class="inline-block text-lg mb-2"
                        >Slug</label
                        >
                        <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="slug"
                                value="{{$post->slug}}"
                        />
                        <label
                                for="body"
                                class="inline-block text-lg mb-2"
                        >Content</label>
                        <textarea
                                rows="5" cols="50"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="body"
                        >{{$post->body}}</textarea>
                        <button
                        type="submit"
                        class="rounded-md mt-2 bg-red-500 text-white focus:ring-red-600 px-4 py-2 text-sm">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
