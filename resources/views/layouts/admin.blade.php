<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inspection Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
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

                <!-- Add more menu items as needed -->
            </ul>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
