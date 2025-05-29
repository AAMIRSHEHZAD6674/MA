@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daily Inspection Summary
            </h2>
        </x-slot>

        <div class="container mx-auto p-6">
            <form method="GET" action="{{ route('reports.daily') }}" class="mb-4">
                <label>Start Date:
                    <input type="date" name="start_date" value="{{ $start_date }}" class="border rounded p-1">
                </label>
                <label>End Date:
                    <input type="date" name="end_date" value="{{ $end_date }}" class="border rounded p-1">
                </label>
                <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Filter</button>
            </form>

            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Total Inspections</th>
                </tr>
                </thead>
                <tbody>
                @foreach($summary as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->date }}</td>
                        <td class="border px-4 py-2">{{ $row->total_inspections }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

@endsection
