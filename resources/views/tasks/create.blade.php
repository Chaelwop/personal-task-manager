@extends('layout')

@section('content')

<div class="page-header">
    <div>
        <h2>Add New Task</h2>
        <p>Create a new task for your task list.</p>
    </div>

    <a href="{{ route('tasks.index') }}" class="button">
        ← Back to Tasks
    </a>
</div>

<div class="form-card">

    @if($errors->any())

        <div class="error">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="task_name">
            Task Name
        </label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            placeholder="Example: Finish Laravel Project"
            value="{{ old('task_name') }}"
            required
        >

        <label for="description">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="6"
            placeholder="Describe your task..."
        >{{ old('description') }}</textarea>

        <label for="due_date">
            Due Date
        </label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date') }}"
        >

        <div style="display:flex; gap:10px;">

            <button type="submit" class="button">
                Save Task
            </button>

            <a
                href="{{ route('tasks.index') }}"
                class="button"
                style="background:#6b7280;"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
