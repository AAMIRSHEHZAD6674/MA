@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <div class="container mx-auto p-4">
            <h2 class="text-xl font-bold mb-4">District-wise Inspection Report</h2>

            <form method="GET" action="{{ route('reports.district') }}" class="flex space-x-4 mb-6">
                <div>
                    <label class="block text-sm">Start Date</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="border rounded px-2 py-1">
                </div>
                <div>
                    <label class="block text-sm">End Date</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="border rounded px-2 py-1">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
                </div>
            </form>

            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">District</th>
                    <th class="border px-4 py-2">Total Inspections</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($report as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->name }}</td>
                        <td class="border px-4 py-2">{{ $row->total_inspections }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $report->withQueryString()->links() }}
            </div>

            {{-- Chart Section --}}
            <div id="chart" class="mt-6"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($report->pluck('name')),
                    datasets: [{
                        label: 'Total Inspections',
                        data: @json($report->pluck('total_inspections')),
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {display: false}
                    }
                }
            });
        </script>
    </x-app-layout>
@endsection
