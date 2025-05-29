@extends('layouts.admin')

@section('title', 'Inspection Dashboard')

@section('content')
    <x-app-layout>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <x-slot name="header">Edit User</x-slot>

        <div class="max-w-xl mx-auto mt-6 p-6 bg-white rounded shadow">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('name', $user->name) }}">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('email', $user->email) }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select Role</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="deo" {{ old('role', $user->role) == 'deo' ? 'selected' : '' }}>DEO/DDEO</option>
                        <option value="sdeo" {{ old('role', $user->role) == 'sdeo' ? 'selected' : '' }}>SDEO</option>
                        <option value="asdeo" {{ old('role', $user->role) == 'asdeo' ? 'selected' : '' }}>ASDEO</option>
                    </select>
                    @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="office_id" class="block text-sm font-medium text-gray-700">Offices</label>
                    <select name="office_id" id="office_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select District</option>
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}" {{ old('office_id', $user->office_id) == $office->id ? 'selected' : '' }}>
                                {{ $office->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="tehsil-container" class="mt-4 {{ old('tehsil_id', $user->tehsil_id) ? '' : 'hidden' }}">
                    <label for="tehsil_id" class="block text-sm font-medium text-gray-700">Tehsils</label>
                    <select name="tehsil_id" id="tehsil_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select Tehsil</option>
                        @if($tehsils)
                            @foreach($tehsils as $tehsil)
                                <option value="{{ $tehsil->id }}" {{ old('tehsil_id', $user->tehsil_id) == $tehsil->id ? 'selected' : '' }}>
                                    Tehsil({{ $tehsil->ucs ?? '' }}) - Union Council({{ $tehsil->union_councils ?? '' }})
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (leave blank to keep current)</label>
                    <input id="password" name="password" type="password"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-blue-700">
                    Update User
                </button>
            </form>
        </div>

        <script>
            function loadTehsils(officeId, selectedTehsilId = null) {
                if (officeId) {
                    $.ajax({
                        url: `/office/${officeId}/tehsils`,
                        type: 'GET',
                        success: function (data) {
                            let tehsilSelect = $('#tehsil_id');
                            tehsilSelect.empty();
                            tehsilSelect.append('<option value="">Select Tehsil</option>');
                            data.forEach(tehsil => {
                                let selected = (tehsil.id == selectedTehsilId) ? 'selected' : '';
                                tehsilSelect.append(`<option value="${tehsil.id}" ${selected}>Tehsil(${tehsil.ucs ?? ''}) - Union Council(${tehsil.union_councils ?? ''})</option>`);
                            });
                            $('#tehsil-container').removeClass('hidden');
                        },
                        error: function () {
                            alert('Failed to fetch tehsils');
                        }
                    });
                } else {
                    $('#tehsil_id').empty().append('<option value="">Select Tehsil</option>');
                    $('#tehsil-container').addClass('hidden');
                }
            }

            $(document).ready(function () {
                // Load tehsils on page load if office is selected
                const selectedOfficeId = $('#office_id').val();
                const selectedTehsilId = "{{ old('tehsil_id', $user->tehsil_id) }}";
                if (selectedOfficeId) {
                    loadTehsils(selectedOfficeId, selectedTehsilId);
                }

                $('#office_id').on('change', function () {
                    const officeId = $(this).val();
                    loadTehsils(officeId);
                });
            });
        </script>
    </x-app-layout>
@endsection
