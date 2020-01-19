@extends('layouts.app')

@section('title', 'HOME')

@section('content')


<div class="container">
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Posts</h6>
        @foreach ($posts as $post)
            @if($post->user_id == $login_user_id)
            <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">         
            <strong class="d-block text-danger">{{ $post->username }}</strong>
            {{ $post->text }}        
            </p>
            </div>
            @else
            <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">         
            <strong class="d-block text-primary">{{ $post->username }}</strong>
            {{ $post->text }}        
            </p>
            </div>
           @endif
        @endforeach
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
    </div>
</div>

@endsection




