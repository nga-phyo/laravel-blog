

@extends('layouts.master')




@section('title','My POst Title')


@section('text')

@foreach ($post as $post)

    <li>
        {{ $post->title }}
    </li>
    
@endforeach
    
@endsection