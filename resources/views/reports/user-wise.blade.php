@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800">User-wise Inspection Report</h2>
        </x-slot>

        <div class="container mx-auto p-4">

            <form method="GET" action="{{ route('reports.user-wise') }}" class="flex gap-4 mb-4">
                <div>
                    <label>Start Date:</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="border rounded p-1">
                </div>
                <div>
                    <label>End Date:</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="border rounded p-1">
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
                </div>
            </form>

            <div class="overflow-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">User</th>
                        <th class="border p-2">Office</th>
                        <th class="border p-2">Tehsil</th>
                        <th class="border p-2">Assigned Targets</th>
                        <th class="border p-2">Completed Inspections</th>
                        <th class="border p-2">Achievement (%)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="border p-2">{{ $user->name }}</td>
                            <td class="border p-2">{{ $user->office->name ?? 'N/A' }}</td>
                            <td class="border p-2">{{ $user->tehsil->name ?? 'N/A' }}</td>
                            <td class="border p-2">{{ $user->total_targets }}</td>
                            <td class="border p-2">{{ $user->total_inspections }}</td>
                            <td class="border p-2">
                                {{ $user->total_targets > 0 ? round(($user->total_inspections / $user->total_targets) * 100, 1) . '%' : '0%' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4">No data available for the selected period.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </x-app-layout>
@endsection
