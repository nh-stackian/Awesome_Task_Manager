@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                        <h1>Tasks</h1><span class="text-info" ><i>All tasks</i></span>
                        </div>
                        <a class="float-right" href="{{ route('task.create') }}"><span><strong><h1>+</h1></strong></span></a>
                    </div>

                    <div class="card-body">
                        @include('includes.tasks.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
