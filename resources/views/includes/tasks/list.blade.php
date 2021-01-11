@if(count($tasks) <= 0)
    You don't have any task created yet!!
    Maybe, <a href="{{ route('task.create') }}">Create</a> one?
@else
    <div class="row">
        @foreach($tasks as $task)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <span class="text-primary">
                            Created By:
                            <br/>
                            {{ $task->user->name }}
                        </span> <br/><br/>
                        <span class="text-primary">
                            Ends at:
                            <br/>
                            {{ date('H:i a, d-m-Y', strtotime($task->end_time)) }}
                        </span>
                        <br/><br/>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
