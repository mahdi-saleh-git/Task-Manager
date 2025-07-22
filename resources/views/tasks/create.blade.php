@extends('layouts.app')

@section('content')
<div>
    <h1>Add New Task</h1>

    <form method="POST" action="{{ route('tasks.store')}}">
        @csrf

        <label>Task Title: </label>
        <input type="text" name="title" id="title" required>

        <label>Task Description: </label>
        <textarea name="description" id="description" required></textarea>

        <label>Due Date</label>
        <input type="date" name="due_date" id="due_date" required>

        <button type="submit">Save</button>
    </form>
</div>

@endsection