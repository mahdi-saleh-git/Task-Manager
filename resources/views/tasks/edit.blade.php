@extends('layouts.app')

@section('content')
<div>
    <h1>Edit Task</h1>

    <form class="max-w-xl mx-auto" method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Task Title : </label>
        <input class="block w-full p-4 border-gray-300 rounded-lg bg-gray-200 text-base focus:ring-blue-500 focus:border-blue-500" type="text" name="title" id="title" required value="{{ old('title', $task->title) }}">

        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Task Description</label>
        <textarea class="block w-full p-4 border-gray-300 rounded-lg bg-gray-200 text-base focus:ring-blue-500 focus:border-blue-500" name="description" id="description">{{ old('description', $task->description) }}</textarea>

        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900">Due Date</label>
        <input class="block w-full p-4 border-gray-300 rounded-lg bg-gray-200 text-base focus:ring-blue-500 focus:border-blue-500" type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}">

        <button class="block text-white bg-green-500 rounded-lg px-5 py-2.5 my-10" type="submit">Save</button>
    </form>
</div>
@endsection