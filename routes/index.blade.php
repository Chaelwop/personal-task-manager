@extends('layout')

@section('content')

<h2>My Tasks</h2>

<a href="{{ route('tasks.create') }}" class="button">
    + Add Task
</a>

<br><br>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif