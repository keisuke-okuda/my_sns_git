@extends('layouts.app')

@section('title', 'User List')

@section('content')
<div class="container">
<div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">User List</h6>
        @foreach ($users as $user)  
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded"> 
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">            
              <strong class="text-gray-dark">Full Name</strong>
              @if ($login_user_id == $user->follow_user_id && $user->user_table_id == $user->follow_id && $user->follow_flag == 1)
              <button type="button" class="btn follow_btn btn-danger btn-sm" id = "remove" value = "{{ $user->follow_table_id }}">REMOVE</button> 
              @else
              <button type="button" class="btn follow_btn btn-primary btn-sm" id = "follow" value = "{{ $user->user_table_id }}">FOLLOW</button> 
              @endif
            </div>
            <span class="d-block">{{ $user->name }}</span>
          </div>
        </div>
        @endforeach
        <small class="d-block text-right mt-3">
          <a href="#">All suggestions</a>
        </small>
      </div>   
    </div>
</div>

@endsection
