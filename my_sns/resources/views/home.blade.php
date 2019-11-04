@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card text-white bg-dark mb-8" >
            <div class="card-header">TimeLine</div>
            {{Form::open(['url' => 'post', 'files' => true])}}
            {{Form::text('text', null, ['placeholder' => 'post', 'class' => 'form-control'])}}
            {{Form::close()}}
            @foreach ($user_posts as $user_post)
                <div class="card-body"> 
                    <p></p>              
                    <p>{{ $user_post->text }}</p>            
                </div>
            @endforeach
            </div>
        </div>
        
    </div>
</div>

@endsection
