@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Inspection Dashboard</h1>

    <!-- User Filter -->
    <form method="GET" action="{{ route('admin-dashboard') }}" class="mb-6">
        <label for="user_id" class="font-semibold mr-2">Filter by User:</label>
        <select name="user_id" id="user_id" class="border rounded p-2">
            <option value="">-- All Users --</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}" @if($user && $user->id == $u->id) selected @endif>
                    {{ $u->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Filter</button>
        @if($user)
            <a href="{{ route('dashboard') }}" class="ml-4 text-red-600 underline">Clear Filter</a>
        @endif
    </form>

    @if(session('error'))
        <div class="bg-red-200 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded shadow p-4">
            <h2 class="font-bold text-lg">Total Inspections</h2>
            <p class="text-3xl">{{ $totalInspections }}</p>
        </div>
        <div class="bg-white rounded shadow p-4">
            <h2 class="font-bold text-lg">Open Schools</h2>
            <p class="text-3xl text-green-600">{{ $openSchools }}</p>
        </div>
        <div class="bg-white rounded shadow p-4">
            <h2 class="font-bold text-lg">Closed Schools</h2>
            <p class="text-3xl text-red-600">{{ $closedSchools }}</p>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">

        <div class="bg-white rounded shadow p-6">
            <h3 class="font-semibold mb-4">Staff Attendance Status</h3>
            <canvas id="staffAttendanceChart"></canvas>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="font-semibold mb-4">Student Attendance Summary</h3>
            <p><strong>Total Enrollment:</strong> {{ $studentAttendances->total_enrollment ?? 0 }}</p>
            <p><strong>Total Absent:</strong> {{ $studentAttendances->total_absent ?? 0 }}</p>
            <canvas id="studentAttendanceChart" class="mt-4"></canvas>
        </div>
    </div>
    <div class="bg-white rounded shadow p-6 mt-6">
        <h3 class="font-semibold mb-4">Inspection Map</h3>
        <div id="inspection-map" class="w-full h-[500px] rounded" style="height: 500px;"></div>
    </div>

    <!-- Targets Table -->
    <div class="bg-white rounded shadow p-6">
        <h3 class="font-semibold mb-4">Targets @if($user) for {{ $user->name }} @endif</h3>
        @if($targets->count())
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Target</th>
                    <th class="border border-gray-300 px-4 py-2">Achieved</th>
                    <th class="border border-gray-300 px-4 py-2">Remaining</th>
                    <th class="border border-gray-300 px-4 py-2">Start Date</th>
                    <th class="border border-gray-300 px-4 py-2">End Date</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($targets as $target)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $target->target_assign }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $target->achieved }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $target->remaining }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $target->start_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $target->end_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($target->status) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No targets assigned.</p>
        @endif
    </div>
@endsection

<script>
    // Staff Attendance Pie Chart
    const ctxStaff = document.getElementById('staffAttendanceChart').getContext('2d');
    const staffAttendanceChart = new Chart(ctxStaff, {
        type: 'pie',
        data: {
            labels: ['Present', 'Absent'],
            datasets: [{
                label: 'Staff Attendance',
                data: [{{ $staffAttendances['present'] }}, {{ $staffAttendances['absent'] }}],
                backgroundColor: ['#10B981', '#EF4444'], // green and red
                borderWidth: 1
            }]
        }
    });

    // Student Attendance Bar Chart
    const ctxStudent = document.getElementById('studentAttendanceChart').getContext('2d');
    const studentAttendanceChart = new Chart(ctxStudent, {
        type: 'bar',
        data: {
            labels: ['Enrollment', 'Absent'],
            datasets: [{
                label: 'Students',
                data: [{{ $studentAttendances->total_enrollment ?? 0 }}, {{ $studentAttendances->total_absent ?? 0 }}],
                backgroundColor: ['#3B82F6', '#F59E0B'], // blue and amber
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const map = L.map('inspection-map').setView([30.3753, 69.3451], 6); // Initial center

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,  // 500 is too high, use max 18 for OSM tiles
        }).addTo(map);

        const inspections = @json($inspection_map);
        console.log('data', inspections);

        // Create a LatLngBounds object to track bounds of all markers
        const bounds = L.latLngBounds();

        inspections.forEach(inspection => {
            if (inspection.latitude && inspection.longitude) {
                const marker = L.marker([inspection.latitude, inspection.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>School Code:</strong> ${inspection.school_code}`);

                // Extend bounds to include this marker
                bounds.extend(marker.getLatLng());
            }
        });

        // If we have any markers, zoom map to show all of them
        if (!bounds.isEmpty()) {
            map.fitBounds(bounds, { padding: [50, 50] }); // Add padding for nicer fit
        }
    });
</script>

</body>
</html>


