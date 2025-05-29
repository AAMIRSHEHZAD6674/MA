@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')

<x-app-layout>
    <x-slot name="header">Users</x-slot>

    <div class="p-6 bg-white">

        <!-- Add User Button -->
        <a href="{{ route('users.create') }}" class="mb-4 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add User
        </a>

        <!-- Success Message -->
        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <!-- Users Table -->
        <table class="w-full table-auto border">
            <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">District</th>
                <th class="px-4 py-2">Tehsil</th>
                <th class="px-4 py-2">Union Council</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->role }}</td>
                    <td class="px-4 py-2">{{ $user->tehsil->district->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $user->tehsil->name?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $user->tehsil->union_councils ?? 'N/A' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:underline">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
@endsection
