<x-guest-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                          :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="deo" {{ old('role') == 'deo' ? 'selected' : '' }}>DEO/DDEO</option>
                <option value="sdeo" {{ old('role') == 'sdeo' ? 'selected' : '' }}>SDEO</option>
                <option value="asdeo" {{ old('role') == 'asdeo' ? 'selected' : '' }}>ASDEO</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- District -->
        <div class="mt-4">
            <label for="district_id" class="block text-sm font-medium text-gray-700">District</label>
            <select name="district_id" id="district_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select District</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('district_id')" class="mt-2" />
        </div>

        <!-- Office (dependent on District) -->
        <div class="mt-4">
            <label for="office_id" class="block text-sm font-medium text-gray-700">Office</label>
            <select name="office_id" id="office_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Office</option>
            </select>
            <x-input-error :messages="$errors->get('office_id')" class="mt-2" />
        </div>

        <!-- Tehsil (dependent on Office) -->
        <div id="tehsil-container" class="mt-4 hidden">
            <label for="tehsil_id" class="block text-sm font-medium text-gray-700">Tehsils</label>
            <select name="tehsil_id" id="tehsil_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Tehsil</option>
            </select>
            <x-input-error :messages="$errors->get('tehsil_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Scripts for cascading dropdowns -->
    <script>
        $('#district_id').on('change', function () {
            var districtId = $(this).val();
            $('#office_id').html('<option value="">Loading...</option>');
            if (districtId) {
                $.ajax({
                    url: '{{ route("get.offices.by.district") }}',
                    type: 'GET',
                    data: { district_id: districtId },
                    success: function (data) {
                        let options = '<option value="">Select Office</option>';
                        data.forEach(function (office) {
                            options += `<option value="${office.id}">${office.name}</option>`;
                        });
                        $('#office_id').html(options);
                    },
                    error: function () {
                        $('#office_id').html('<option value="">Error loading offices</option>');
                    }
                });
            } else {
                $('#office_id').html('<option value="">Select Office</option>');
            }
        });

        $('#office_id').on('change', function () {
            const officeId = $(this).val();
            if (officeId) {
                $.ajax({
                    url: `/office/${officeId}/tehsils`,
                    type: 'GET',
                    success: function (data) {
                        let tehsilSelect = $('#tehsil_id');
                        tehsilSelect.empty().append('<option value="">Select Tehsil</option>');
                        data.forEach(tehsil => {
                            tehsilSelect.append(`<option value="${tehsil.id}">Tehsil(${tehsil.ucs ?? ''}) - Union Council(${tehsil.union_councils ?? ''})</option>`);
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
        });
    </script>
</x-guest-layout>
