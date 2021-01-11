@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div> <h1>Recent Tasks: </h1></div>

                        @include('includes.tasks.list')

                        <br/>

                        <a href="{{ route('task.all') }}">Show all tasks.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
