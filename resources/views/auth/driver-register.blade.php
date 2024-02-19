<x-guest-layout>@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <img src="/images/bg.png" class="flex h-screen w-full items-center justify-center fixed inset-0 bg-cover"alt="">

<div class="flex h-screen w-full items-center justify-center">
    <div class="rounded-xl bg-yellow-200 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
          <div class="text-white">
      <div class="mb-8 flex flex-col items-center">
        <img src="images/logo.png" width="125" alt="" srcset="" />
        <h1 class="mb-2 text-2xl">register as a driver</h1>
        <span class="text-gray-300">Enter your informations</span>
      </div>

    <form method="POST" action="{{ route('driver-register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex">
    <div class="mt-4 mr-2">

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
            <x-input-label for="vehicule_type" :value="__('vehicule_type')" />

            <select class="w-72 rounded-lg bg-yellow-300 h-10" name="vehicule_type" id="">
                <option value="Mercedes">Mercedes</option>
                <option value="Dacia">Dacia</option>
                <option value="BMW">BMW</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Tasla">Tasla</option>
                <option value="Bugatti">Bugatti</option>
                <option value="Ford">Ford</option>
                <option value="Toyota">Toyota</option>
            </select>
            <x-input-error :messages="$errors->get('vehicule_type')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="license_plate" :value="__('license_plate')" />

            <x-text-input id="license_plate" class="block mt-1 w-full"
                            type="license_plate"
                            name="license_plate"
                            required autocomplete="new-license_plate" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"  />

            <x-input-error :messages="$errors->get('license_plate')" class="mt-2" />
        </div>
        <!--picture-->
        <div class="mt-4">
            <x-input-label for="image" :value="__('image')" />

            <x-file-input id="image" type="file" name="picture" required autocomplete="new-image" class="rounded-3xl border-none w-72 bg-yellow-400 bg-opacity-70 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
