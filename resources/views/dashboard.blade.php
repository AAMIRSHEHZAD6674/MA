@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-2xl font-semibold text-gray-700">Inspection Dashboard</h2>
        </x-slot>

        <!-- User Filter -->

        <div class="w-full">
            <div class="bg-white text-black p-6 rounded shadow">
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-center gap-4">
                    <!-- User Filter -->
                    <div class="flex flex-col">
                        <label for="user_id" class="font-semibold text-gray-700 mb-1">User:</label>
                        <select name="user_id" id="user_id"
                                class="border border-gray-300 rounded px-3 py-2 w-52 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- All Users --</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}" @if($user && $user->id == $u->id) selected @endif>
                                    {{ $u->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Start Date -->

                    <!-- Buttons -->
                    <div class="flex items-end gap-2 mt-4 sm:mt-0">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                            Filter
                        </button>

                        @if($user || request('start_date') || request('end_date'))
                            <a href="{{ route('dashboard') }}" class="text-red-600 underline">Clear</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>



        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Summary Cards -->
        <!-- Summary Cards in One Horizontal Row -->
        <div class="w-full">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-blue-500 text-white p-6 rounded shadow text-center">
                    <h2 class="text-white font-bold mb-2">Total Inspections</h2>
                    <p class="text-4xl text-white font-semibold">{{ $totalInspections }}</p>
                </div>
                <div class="bg-green-500 text-white p-6 rounded shadow text-center">
                    <h2 class="text-white font-bold mb-2">Total Inspections</h2>
                    <p class="text-4xl text-white font-semibold">{{  $openSchools  }}</p>
                </div>
                <div class="bg-red-500 text-white p-6 rounded shadow text-center">
                    <h2 class="text-white font-bold mb-2">Total Inspections</h2>
                    <p class="text-4xl text-white font-semibold">{{ $closedSchools }}</p>
                </div>
            </div>
        </div>
        <!-- Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-white rounded-lg shadow-md p-6 border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Staff Attendance Status</h3>
                <canvas id="staffAttendanceChart"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Student Attendance Summary</h3>
                <p><strong>Total Enrollment:</strong> {{ $studentAttendances['total_enrollment'] ?? 0 }}</p>
                <p><strong>Total Absent:</strong> {{ $studentAttendances['total_absent'] ?? 0 }}</p>
                <canvas id="studentAttendanceChart" class="mt-4"></canvas>
            </div>
        </div>

        <!-- Map -->
        <div class="bg-white rounded-lg shadow-md p-6 border mb-10">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Inspection Map</h3>
            <div id="inspection-map" class="w-full rounded" style="height: 500px;"></div>
        </div>

        <!-- Targets Table -->
        <div class="bg-white rounded-lg shadow-md p-6 border mb-10">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Targets @if($user) for {{ $user->name }} @endif
            </h3>

            @if($targets->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <th class="border px-4 py-2 text-left">Target</th>
                            <th class="border px-4 py-2 text-left">Achieved</th>
                            <th class="border px-4 py-2 text-left">Remaining</th>
                            <th class="border px-4 py-2 text-left">Start Date</th>
                            <th class="border px-4 py-2 text-left">End Date</th>
                            <th class="border px-4 py-2 text-left">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($targets as $target)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $target->target_assign }}</td>
                                <td class="border px-4 py-2">{{ $target->achieved }}</td>
                                <td class="border px-4 py-2">{{ $target->remaining }}</td>
                                <td class="border px-4 py-2">{{ $target->start_date }}</td>
                                <td class="border px-4 py-2">{{ $target->end_date }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($target->status) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No targets assigned.</p>
            @endif
        </div>

        <!-- Charts Scripts -->
        <script>
            const ctxStaff = document.getElementById('staffAttendanceChart').getContext('2d');
            const staffAttendanceChart = new Chart(ctxStaff, {
                type: 'pie',
                data: {
                    labels: ['Present', 'Absent'],
                    datasets: [{
                        data: [{{ $staffAttendances['present'] }}, {{ $staffAttendances['absent'] }}],
                        backgroundColor: ['#10B981', '#EF4444'],
                        borderWidth: 1
                    }]
                }
            });

            const ctxStudent = document.getElementById('studentAttendanceChart').getContext('2d');
            const studentAttendanceChart = new Chart(ctxStudent, {
                type: 'bar',
                data: {
                    labels: ['Enrollment', 'Absent'],
                    datasets: [{
                        data: [{{ $studentAttendances['total_enrollment'] ?? 0 }}, {{ $studentAttendances['total_absent'] ?? 0 }}],
                        backgroundColor: ['#3B82F6', '#F59E0B'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {beginAtZero: true}
                    }
                }
            });
        </script>

        <!-- Map Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const map = L.map('inspection-map').setView([30.3753, 69.3451], 6);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                }).addTo(map);

                const inspections = @json($inspection_map);
                const bounds = L.latLngBounds();

                inspections.forEach(inspection => {
                    if (inspection.latitude && inspection.longitude) {
                        const marker = L.marker([inspection.latitude, inspection.longitude])
                            .addTo(map)
                            .bindPopup(`<strong>School Code:</strong> ${inspection.school_code}`);
                        bounds.extend(marker.getLatLng());
                    }
                });

                if (!bounds.isEmpty()) {
                    map.fitBounds(bounds, {padding: [50, 50]});
                }
            });
        </script>
    </x-app-layout>
@endsection
