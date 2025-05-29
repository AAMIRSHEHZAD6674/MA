<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">School-wise Inspection Report</h2>
    </x-slot>

    <div class="p-6">
        <form method="GET" action="{{ route('reports.school') }}" class="mb-4">
            <label class="mr-2">Start Date:
                <input type="date" name="start_date" value="{{ request('start_date') }}">
            </label>
            <label class="mr-2">End Date:
                <input type="date" name="end_date" value="{{ request('end_date') }}">
            </label>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </form>

        <table class="table-auto w-full border">
            <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">School Code</th>
                <th class="border px-4 py-2">Total Inspections</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($report as $row)
                <tr>
                    <td class="border px-4 py-2">{{ $row->school_code }}</td>
                    <td class="border px-4 py-2">{{ $row->total_inspections }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
