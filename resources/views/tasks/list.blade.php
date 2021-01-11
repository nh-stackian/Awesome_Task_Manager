@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="float-left">{{ __('Task List') }}</p>
                        <a class="float-right" href="{{ route('task.create') }}">+</a>
                    </div>

                    <div class="card-body">
                        @include('includes.tasks.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
