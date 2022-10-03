@extends('layouts.app')
@section('title')

    {{ $post->title }}

@endsection
@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Image of the post{{ $post->title }}">
            <div class="p-3">
                <p>0 likes</p>
            </div>
            <div class="">
                <p class="font-bold">
                    {{$post->user->username}}
                </p>
                <p class="text-sm text-gray-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>
            <!-------Form to delete a publication------------------------->
            @auth()
                @if ($post->user_id ===auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE') <!--Method spoofing-->
                        @csrf
                        <input
                            type="submit"
                            value="Delete Publication"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
            <!-------END Form to delete a publication------------------------->

        </div>
        <div class="md:w-1/2 p-5">

            <div class="shadow  bg-white p-5 mb-5">

                @auth
                    <p class="text-xl font-bold text-center mb-4">Add a New Comment</p>

                    @if(session('message'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('message')}}
                        </div>
                    @endif


                    <form action="{{route('comments.store', ['post' => $post, 'user' => $user ] )}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                                Add a comment
                            </label>
                            <textarea
                                id="comment"
                                name="comment"
                                placeholder="Add un comment"
                                class="border p-3 w-full rounded-lg @error('comment') border-red-500 @enderror"
                            ></textarea>

                            @error('comment')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>

                        <input
                            type="submit"
                            value="Comment"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                        />
                    </form>

                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comments->count())
                        @foreach ( $post->comments as $comment )
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comment->user ) }} " class="font-bold">
                                    {{$comment->user->username}}
                                </a>
                                <p>{{ $comment->comment }}
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Comments Yet</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
