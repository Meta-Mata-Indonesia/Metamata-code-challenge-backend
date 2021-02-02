@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary" >
                <a href="{{route('tulisCerita')}}">Tulis Cerita</a>
            </button>
        </div>
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
                {{ __('You are logged in!') }}
            </div>
            @endif

            @foreach($storyList as $stories)
            <div class="card">

                <div class="card-header bg-light">
                    <div class="float-left">
                        <h2>{{ $stories->title }}</h2>
                        <h6>Posted By {{ $stories->name }} at {{$stories->created_at}}</h6>
                    </div>

                    {{-- <div class="float-md-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown button
                            </button>

                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                              <li><a class="dropdown-item active" href="#">Edit</a></li>
                              <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>

                <div class="card-body">
                    <p>{{ $stories->story }}</p><br>
                    <div>
                        <button type="button" class="btn btn-light">
                            <i class="icon-heart"></i>
                        </button>
                        <p>likes!</p>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
