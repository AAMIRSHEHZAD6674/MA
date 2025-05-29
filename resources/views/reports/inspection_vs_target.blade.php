@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Inspection vs Target Report</h2>
        </x-slot>

        <div class="container mx-auto px-4 py-6">
            <form method="GET" action="{{ route('reports.inspection-vs-target') }}" class="mb-6 flex gap-4 items-end">
                <div>
                    <label class="block font-medium">Start Date:</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $start_date) }}" class="border rounded px-3 py-1" />
                </div>
                <div>
                    <label class="block font-medium">End Date:</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $end_date) }}" class="border rounded px-3 py-1" />
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
                </div>
            </form>

            <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">User</th>
                    <th class="border border-gray-300 px-4 py-2">Office</th>
                    <th class="border border-gray-300 px-4 py-2">Target Assigned</th>
                    <th class="border border-gray-300 px-4 py-2">Inspections Done</th>
                    <th class="border border-gray-300 px-4 py-2">Percentage Achieved (%)</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->user_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->office_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->target_assign }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->inspections_done }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->percentage_achieved }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">No records found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <h3 class="text-lg font-semibold mb-2">Top 20 Users by % Achieved (Bar Chart)</h3>
            <canvas id="inspectionVsTargetChart" width="800" height="400"></canvas>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('inspectionVsTargetChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Percentage Achieved (%)',
                            data: @json($chartData),
                            backgroundColor: 'rgba(37, 99, 235, 0.7)', // blue bars
                            borderColor: 'rgba(37, 99, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',  // horizontal bar chart
                        scales: {
                            x: {
                                beginAtZero: true,
                                max: 100,
                                title: {
                                    display: true,
                                    text: 'Percentage %'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Users (Name + Office)'
                                }
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.parsed.x + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
        @endpush
    </x-app-layout>


@endsection
