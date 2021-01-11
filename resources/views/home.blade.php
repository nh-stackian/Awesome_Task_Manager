@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Tasks</h1><span class="text-danger" ><i>Closed to Deadline</i></span>
                    </div>
                    <div class="card-body">


                        @include('includes.tasks.list')

                        <br/>

                        <a href="{{ route('task.all') }}">Show all tasks.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
