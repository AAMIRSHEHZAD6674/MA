@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Top & Bottom Performing Offices
            </h2>
        </x-slot>

        <div class="container mx-auto p-6">

            <form method="GET" action="{{ route('reports.offices_performance') }}" class="mb-4 flex gap-4 items-end">
                <div>
                    <label class="block mb-1">Start Date:</label>
                    <input type="date" name="start_date" value="{{ $start_date }}" class="border rounded p-1">
                </div>
                <div>
                    <label class="block mb-1">End Date:</label>
                    <input type="date" name="end_date" value="{{ $end_date }}" class="border rounded p-1">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <h3 class="text-lg font-semibold mb-2">Top 5 Performing Offices</h3>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">Office</th>
                            <th class="border px-4 py-2">Total Inspections</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($top_offices as $office)
                            <tr>
                                <td class="border px-4 py-2">{{ $office->name }}</td>
                                <td class="border px-4 py-2">{{ $office->inspections_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="border px-4 py-2 text-center">No data available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">Bottom 5 Performing Offices</h3>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">Office</th>
                            <th class="border px-4 py-2">Total Inspections</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($bottom_offices as $office)
                            <tr>
                                <td class="border px-4 py-2">{{ $office->name }}</td>
                                <td class="border px-4 py-2">{{ $office->inspections_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="border px-4 py-2 text-center">No data available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </x-app-layout>

@endsection
