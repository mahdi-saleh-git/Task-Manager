@extends('layouts.app')

@section('content')
<div>
    <h1>Task List</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}">+ Add New Task</a>

    @if($tasks->isEmpty())
        <p>No tasks found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->due_date ?? '-' }}</td>
                    <td>
                        @if($task->is_done)
                            <span>Done</span>
                        @else
                            <span>Pending</span>
                        @endif
                    </td>
                    {{-- <td>
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            <button class="btn btn-sm btn-secondary">
                                {{ $task->is_done ? 'Mark as Pending' : 'Mark as Done' }}
                            </button>
                        </form>

                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
