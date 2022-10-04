@extends('layouts.app')
@section('title')
    Main Page
@endsection
@section('content')
    <x-listar-post :posts="$posts"/>

@endsection
