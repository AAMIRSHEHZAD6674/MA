@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Staff Attendance Summary Report
            </h2>
        </x-slot>

        <div class="container mx-auto p-6">

            <form method="GET" action="{{ route('reports.staff_attendance') }}" class="mb-4">
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
                    <th class="border px-4 py-2">Inspector</th>
                    <th class="border px-4 py-2">Present</th>
                    <th class="border px-4 py-2">Absent</th>
                </tr>
                </thead>
                <tbody>
                @foreach($summary as $inspector => $records)
                    @php
                        $present = $records->firstWhere('status', 'present')->count ?? 0;
                        $absent = $records->firstWhere('status', 'absent')->count ?? 0;
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $inspector }}</td>
                        <td class="border px-4 py-2">{{ $present }}</td>
                        <td class="border px-4 py-2">{{ $absent }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

@endsection
