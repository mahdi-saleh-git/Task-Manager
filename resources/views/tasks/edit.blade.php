@extends('layouts.app')

@section('content')
<div>
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <label>Task Title : </label>
        <input type="text" name="title" id="title" required value="{{ old('title', $task->title) }}">

        <label>Task Description</label>
        <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>

        <label>Due Date</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">

        <button type="submit">Save</button>
    </form>
</div>
@endsection