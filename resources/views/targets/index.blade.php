@extends('layouts.admin')

@section('title', 'Targets')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Targets') }}
            </h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                    <button onclick="window.location='{{ route('targets.create') }}'" class="btn btn-primary mb-3">
                        Create Target
                    </button>


                @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">User</th>
                            <th class="border border-gray-300 px-4 py-2">Target</th>
                            <th class="border border-gray-300 px-4 py-2">Start</th>
                            <th class="border border-gray-300 px-4 py-2">End</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($targets as $target)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $target->user->name ?? 'N/A' }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $target->target_assign }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $target->start_date }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $target->end_date }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($target->status) }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('targets.edit', $target->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                    <form action="{{ route('targets.destroy', $target->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this target?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="mt-3">
                        {{ $targets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
