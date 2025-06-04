<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Inspection Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    @if(auth()->user()->hasRole('admin'))
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="p-6 text-xl font-bold border-b">Admin Panel</div>
            <nav class="flex-1 overflow-y-auto">
                <ul class="p-4 space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition
                            {{ request()->routeIs('admin-dashboard') ? 'bg-blue-600 text-white' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition
                            {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white' : '' }}">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('targets.index') }}"
                           class="block px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition
              {{ request()->routeIs('targets.*') ? 'bg-blue-600 text-white' : '' }}">
                            Targets
                        </a>
                    </li>

                    <li x-data="{ open: false }" class="relative" x-cloak>
                        <button @click="open = !open"
                                class="w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition flex justify-between items-center">
                            Reports
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <ul x-show="open" class="mt-2 ml-4 border-l border-gray-200 pl-2 space-y-1">
                            <li>
                                <a href="{{ route('reports.school') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    School-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.daily') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Daily Inspection Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.staff_attendance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Staff Attendance Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.student_attendance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Student Attendance Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.offices_performance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Top & Bottom Performing Offices
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.inspection-vs-target') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Inspection vs Target Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.district') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    District-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.user-wise') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    User-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.tehsil') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Tehsil-wise Report
                                </a>
                            </li>
                        </ul>

                    </li>

                    <!-- Add more menu items as needed -->
                </ul>
            </nav>
        </aside>
    @endif
    @if(auth()->user()->hasAnyRole(['deo', 'sdeo', 'asdeo']))
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="p-6 text-xl font-bold border-b">Panel</div>
            <nav class="flex-1 overflow-y-auto">
                <ul class="p-4 space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition
                            {{ request()->routeIs('admin-dashboard') ? 'bg-blue-600 text-white' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li x-data="{ open: false }" class="relative" x-cloak>
                        <button @click="open = !open"
                                class="w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition flex justify-between items-center">
                            Reports
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <ul x-show="open" class="mt-2 ml-4 border-l border-gray-200 pl-2 space-y-1">
                            <li>
                                <a href="{{ route('reports.school') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    School-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.daily') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Daily Inspection Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.staff_attendance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Staff Attendance Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.student_attendance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Student Attendance Summary
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.offices_performance') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Top & Bottom Performing Offices
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.inspection-vs-target') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Inspection vs Target Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.district') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    District-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.user-wise') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    User-wise Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reports.tehsil') }}"
                                   class="block px-4 py-2 rounded hover:bg-blue-500 hover:text-white text-sm">
                                    Tehsil-wise Report
                                </a>
                            </li>
                        </ul>

                    </li>

                    <!-- Add more menu items as needed -->
                </ul>
            </nav>
        </aside>
    @endif


    <!-- Main content -->
    <main class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
