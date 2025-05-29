@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tehsil-wise Inspection Report</h2>
        </x-slot>

        <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('reports.tehsil') }}" class="mb-4 bg-white p-4 rounded shadow">
                <div class="flex flex-wrap gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $start_date) }}"
                               class="form-input mt-1 block w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $end_date) }}"
                               class="form-input mt-1 block w-full">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
                    </div>
                </div>
            </form>

            <div class="bg-white p-4 rounded shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tehsil
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                            Inspections
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($report as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $row->total_inspections }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">No inspections found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

@endsection
