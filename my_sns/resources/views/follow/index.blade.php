@extends('layouts.app')

@section('title', 'User List')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card text-white bg-dark mb-8" >
            <div class="card-header">User List</div> 
            <div class="card-body">         
            @foreach ($users as $user)                        
                    <p>{{ $user->name }}</p>
                    <button type="button" class="btn btn-default" id = "follow{{ $user->id }}" value = "{{ $user->id }}">FOLLOW</button>                      
            @endforeach
            </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
