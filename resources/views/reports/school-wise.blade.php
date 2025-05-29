@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">School-wise Inspection Report</h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <form method="GET" action="{{ route('reports.school') }}" class="mb-4 flex gap-4">
                    <div>
                        <label class="block">Start Date:</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                               class="border rounded px-2 py-1">
                    </div>
                    <div>
                        <label class="block">End Date:</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                               class="border rounded px-2 py-1">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
                    </div>
                </form>

                <div class="overflow-x-auto bg-white rounded shadow">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">School Code</th>
                            <th class="px-4 py-2">District</th>
                            <th class="px-4 py-2">Office</th>
                            <th class="px-4 py-2">Tehsil</th>
                            <th class="px-4 py-2">UCs</th>
                            <th class="px-4 py-2">Union Councils</th>
                            <th class="px-4 py-2">Inspected By</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inspections as $inspection)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $inspection->school_code }}</td>
                                <td class="px-4 py-2">{{ $inspection->office->district->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->office->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->user->tehsil->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->user->tehsil->ucs ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->user->tehsil->union_councils ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $inspection->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="p-4">
                        {{ $inspections->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </x-app-layout>
@endsection
