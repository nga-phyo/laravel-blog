
@extends('layouts.master')


@section('title','Show Page')

@section('text')


<h2>Show Data (one title on one post)</h2>



    <h4> {{ $post->title }}</h4>
    <i>{{ $post->created_at->diffForHumans() }} </i>/<b>{{ $post->author}}</b>
    
    <p> {{ $post->body }}</p>


    <a href="/posts">Go Home</a>


    @stop