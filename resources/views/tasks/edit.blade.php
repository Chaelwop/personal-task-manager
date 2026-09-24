@extends('layout')

@section('title', 'Edit Task')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Task</h2>
        <p>Update the details of your task.</p>
    </div>

    <a
        href="{{ route('tasks.index') }}"
        class="button"
    >
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


    <form
        action="{{ route('tasks.update', $task->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <label for="task_name">
            Task Name
        </label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >


        <label for="description">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="6"
        >{{ old('description', $task->description) }}</textarea>


        <label for="status">
            Status
        </label>

        <select
            id="status"
            name="status"
            required
        >

            <option
                value="Pending"
                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Completed"
                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>

        </select>


        <label for="due_date">
            Due Date
        </label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}"
        >


        <div
            style="
                display:flex;
                gap:10px;
                margin-top:25px;
            "
        >

            <button
                type="submit"
                class="button"
            >
                Save Changes
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