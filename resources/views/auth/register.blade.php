<x-guest-layout>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Select a role</option>
                <option value="admin">Admin</option>
                <option value="deo">DEO/DDEO</option>
                <option value="sdeo">SDEO</option>
                <option value="asdeo">ASDEO</option>
                <!-- Add more roles as needed -->
            </select>
        </div>

        <!-- District Dropdown -->
        <div>
            <label for="office_id" class="block text-sm font-medium text-gray-700">Offices</label>
            <select name="office_id" id="office_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Offices</option>
                @foreach($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="tehsil-container" class="mt-4 hidden">
            <label for="tehsil_id" class="block text-sm font-medium text-gray-700">Tehsils</label>
            <select name="tehsil_id" id="tehsil_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Tehsil</option>
            </select>
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>




        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        $('#office_id').on('change', function () {
            const officeId = $(this).val();

            if (officeId) {
                $.ajax({
                    url: `/office/${officeId}/tehsils`,
                    type: 'GET',
                    success: function (data) {
                        let tehsilSelect = $('#tehsil_id');
                        tehsilSelect.empty();
                        console.log("my data is " + data);
                        tehsilSelect.append('<option value="">Select Tehsil</option>');
                        data.forEach(tehsil => {
                            tehsilSelect.append(`<option value="${tehsil.id}">${tehsil.name} - Tehsil= ${tehsil.ucs ?? ''} / Union Council = ${tehsil.union_councils ?? ''}</option>`);

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
