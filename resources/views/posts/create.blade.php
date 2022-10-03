@extends('layouts.app')
@section('title')
    Create a new Post:
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

@endpush
@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('images.store')}}" enctype="multipart/form-data" method="POST" id="dropzone"
                  class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <!-------------------------------------TITLE OF PUBLICATION------------------------------------>
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Title</label>
                    <input id="title" name="title" type="text" placeholder="Title of publication"
                           class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror"
                           value="{{ old('title') }}"/>
                    @error('title')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <!-----------------------------------DESCRIPTION OF THE PUBLICATION------------------------------------>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Description</label>
                    <textarea id="description" name="description" placeholder="Description of the publication"
                              class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
                    >{{ old('description')}}</textarea>
                    @error('description')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>

                    @enderror
                </div>
                <!-----------------------------------IMAGE SAVE------------------------------------>
                <div class="mb-5">
                    <input name="image" type="hidden" value="{{old('image')}}"/>
                    @error('image')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <!-----------------------------------SEND BUTTON------------------------------------>
                <input type="submit" value="create post"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg "/>
            </form>
        </div>
    </div>

@endsection
