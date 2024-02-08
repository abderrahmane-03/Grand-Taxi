<x-guest-layout>
<div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://wallpaperset.com/w/full/e/a/7/181063.jpg'); background-size: cover; background-position: center center;">
  <div class="rounded-xl bg-gray-800 bg-opacity-20 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
    <div class="text-white">
      <div class="mb-8 flex flex-col items-center">
        <img src="images/logo.png" width="125" alt="" srcset="" />
        <h1 class="mb-2 text-2xl">register as a driver</h1>
        <span class="text-gray-300">Enter your informations</span>
      </div>

    <form method="POST" action="{{ route('driver-register') }}">
        @csrf
        <div class="flex">
    <div class="mt-4 mr-2">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!--picture-->
        <div class="mt-4">
            <x-input-label for="picture" :value="__('picture')" />

            <x-file-input id="picture" type="file" name="picture" required autocomplete="new-picture" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />

            <x-input-error :messages="$errors->get('picture')" class="mt-2" />
        </div>
    </div>
    <div>
        <div class="mt-4">
            <x-input-label for="description" :value="__('description')" />

            <x-text-input id="description" class="block mt-1 w-full"
                            type="description"
                            name="description"
                            required autocomplete="new-description" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div> 
        <div class="mt-4">
            <x-input-label for="vehicle-type" :value="__('vehicle-type')" />

            <x-text-input id="vehicle-type" class="block mt-1 w-full"
                            type="vehicle-type"
                            name="vehicle-type"
                            required autocomplete="new-vehicle-type" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('vehicle-type')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="license_plate" :value="__('license_plate')" />

            <x-text-input id="license_plate" class="block mt-1 w-full"
                            type="license_plate"
                            name="license_plate"
                            required autocomplete="new-license_plate" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('license_plate')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="payment_accepted" :value="__('payment_accepted')" />

            <x-text-input id="payment_accepted" class="block mt-1 w-full"
                            type="payment_accepted"
                            name="payment_accepted"
                            required autocomplete="new-payment_accepted" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('payment_accepted')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="start_location" :value="__('start_location')" />

            <x-text-input id="start_location" class="block mt-1 w-full"
                            type="start_location"
                            name="start_location"
                            required autocomplete="new-start_location" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('start_location')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="destination" :value="__('destination')" />

            <x-text-input id="destination" class="block mt-1 w-full"
                            type="destination"
                            name="destination"
                            required autocomplete="new-destination" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('destination')" class="mt-2" />
        </div>
    </div>
        </div><div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 rounded-3xl bg-yellow-400 hover:bg-black">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>