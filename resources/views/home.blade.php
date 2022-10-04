@extends('layouts.app')
@section('title')
    Main Page
@endsection
@section('content')
    <section class="container mx-auto mt-10">
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post )
                    <div>
                        <a href="{{route('posts.show',['post'=>$post,'user'=>$post->user])}}">
                            <img src="{{asset('uploads') . '/' . $post->image}}" alt="Post Image {{$post->title}}">
                        </a>

                    </div>
                @endforeach
            </div>
            <div class="">
                {{$posts->links('pagination::tailwind')}}

            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">There are no published Instagram, Follow
                someone to see their posts</p>
        @endif

    </section>
@endsection
