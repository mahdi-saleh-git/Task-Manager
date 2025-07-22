@extends('layouts.app')

@section('content')
<div>
    <h1>Task List</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="py-2.5">
        <a class="text-white bg-blue-500 rounded-lg px-5 py-2.5 " href="{{ route('tasks.create') }}">+ Add New Task</a>
    </div>

    @if($tasks->isEmpty())
        <p class="text-red-700 italic">No tasks found</p>
    @else
        <div class="relative overflow-x-auto shadow-md rounded-lg my-2.5 p-2.5 bg-blue-100">
        <table class="w-full text-sm text-left p-2.5">
            <thead class="text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Due Date</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td scope="col" class="px-6 py-3">{{ $task->title }}</td>
                    <td scope="col" class="px-6 py-3">{{ $task->due_date ?? '-' }}</td>
                    <td scope="col" class="px-6 py-3">
                        @if($task->is_done)
                            <span>Done</span>
                        @else
                            <span>Pending</span>
                        @endif
                    </td>
                    <td scope="col" class="px-6 py-3">
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            <button class="text-white bg-green-500 rounded-lg px-5 py-2.5">
                                {{ $task->is_done ? 'Pending' : 'Done' }}
                            </button>
                        </form>

                        <a class="text-white bg-amber-400 rounded-lg px-5 py-2.5" href="{{ route('tasks.edit', $task->id) }}">Edit</a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-red-500 rounded-lg px-5 py-2.5" onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>
@endsection
