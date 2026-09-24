@extends('layout')

@section('content')

<div class="page-header">

    <div>
        <h2>My Tasks</h2>
        <p>Manage your tasks and stay organized.</p>
    </div>

    <a href="{{ route('tasks.create') }}" class="button">
        + Add Task
    </a>

</div>


@if(session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif


@if($tasks->count() == 0)

    <div class="empty">

        <h3>No tasks yet</h3>

        <p>
            You don't have any tasks yet.
            Create your first task to get started.
        </p>

        <a href="{{ route('tasks.create') }}" class="button">
            + Create Task
        </a>

    </div>

@else

    <div class="task-grid">

        @foreach($tasks as $task)

            <div class="task-card">

                <h3>
                    {{ $task->task_name }}
                </h3>

                <p class="task-description">

                    @if($task->description)

                        {{ $task->description }}

                    @else

                        No description available.

                    @endif

                </p>


                @if($task->status == 'Completed')

                    <span class="status completed">
                        ✓ Completed
                    </span>

                @else

                    <span class="status pending">
                        ● Pending
                    </span>

                @endif


                <p class="due-date">

                    📅

                    @if($task->due_date)

                        Due: {{ $task->due_date }}

                    @else

                        No due date

                    @endif

                </p>


                <div class="task-actions">

                <div class="task-actions">

    @if($task->status != 'Completed')

        <form
            action="{{ route('tasks.complete', $task->id) }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="button button-done"
            >
                ✓ Done
            </button>

        </form>

    @endif


    <a
        href="{{ route('tasks.edit', $task->id) }}"
        class="button button-edit"
    >
        Edit
    </a>


    <form
        action="{{ route('tasks.destroy', $task->id) }}"
        method="POST"
    >

        @csrf

        @method('DELETE')

        <button
            type="submit"
            class="button button-danger"
            onclick="return confirm('Are you sure you want to delete this task?')"
        >
            Delete
        </button>

    </form>

</div>

                </div>

            </div>

        @endforeach

    </div>

@endif

@endsection
