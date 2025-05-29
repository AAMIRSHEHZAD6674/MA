@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ isset($target) ? 'Edit' : 'Create' }} Target
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ isset($target) ? route('targets.update', $target->id) : route('targets.store') }}"
                  method="POST" class="space-y-4">
                @csrf
                @if(isset($target))
                    @method('PUT')
                @endif

                <div>
                    <label class="block font-medium mb-1">User</label>
                    <select name="user_id" class="form-control w-full rounded border-gray-300" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ (isset($target) && $target->user_id == $user->id) ? 'selected' : '' }}>
                                {{ $user->name }} — {{ $user->office->name ?? 'No Office' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Target Assign</label>
                    <input type="number" name="target_assign" class="form-control w-full rounded border-gray-300"
                           value="{{ $target->target_assign ?? old('target_assign') }}" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Start Date</label>
                    <input type="date" name="start_date" class="form-control w-full rounded border-gray-300"
                           value="{{ $target->start_date ?? old('start_date') }}" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">End Date</label>
                    <input type="date" name="end_date" class="form-control w-full rounded border-gray-300"
                           value="{{ $target->end_date ?? old('end_date') }}" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Status</label>
                    <select name="status" class="form-control w-full rounded border-gray-300">
                        <option value="active" {{ (isset($target) && $target->status === 'active') ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ (isset($target) && $target->status === 'inactive') ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div>
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        {{ isset($target) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
@endsection
