@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">School Inspection Report</h2>

        <form id="report-form" class="flex flex-wrap items-center gap-4 mb-6">
            <div>
                <label class="block text-sm">Start Date</label>
                <input type="date" name="start_date" class="border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block text-sm">End Date</label>
                <input type="date" name="end_date" class="border px-3 py-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Get Report</button>
        </form>

        <table class="w-full table-auto border border-gray-200 hidden" id="result-table">
            <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">School Code</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Date</th>
            </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>

    <script>
        document.getElementById('report-form').addEventListener('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            fetch('{{ route('school.report.fetch') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const tbody = document.getElementById('table-body');
                    tbody.innerHTML = '';
                    if (data.inspections.length > 0) {
                        data.inspections.forEach(row => {
                            tbody.innerHTML += `
                    <tr>
                        <td class="border px-4 py-2">${row.id}</td>
                        <td class="border px-4 py-2">${row.school_code}</td>
                        <td class="border px-4 py-2">${row.school_status}</td>
                        <td class="border px-4 py-2">${new Date(row.created_at).toLocaleDateString()}</td>
                    </tr>
                `;
                        });
                        document.getElementById('result-table').classList.remove('hidden');
                    } else {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center py-4">No inspections found</td></tr>';
                        document.getElementById('result-table').classList.remove('hidden');
                    }
                });
        });
    </script>
@endsection
