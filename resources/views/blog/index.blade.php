@extends('blog.layouts.master')

@section('page-header')
    <header class="intro-header" style="background-image: url('{{page_image($page_image)}}}')"></header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{$title}}</h1>
                    <hr class="small">
                    <h2 class="subheading">{{$subtitle}}</h2>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                {{-- The Posts --}}
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{$post->url($tag)}}">
                            <h2 class="post-subtitle">{{$post->subtitle}}</h2>
                        </a>
                    </div>
                @endforeach

                {{-- The Pager --}}

            </div>
        </div>
    </div>
@stop