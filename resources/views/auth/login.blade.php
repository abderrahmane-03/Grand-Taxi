<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<img src="/images/bg.png" class="flex h-screen w-full items-center justify-center fixed inset-0 bg-cover"alt="">

    <div class="flex h-screen w-full items-center justify-center">
        <div class="rounded-xl bg-yellow-200 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
            <div class="text-white">
                <div class="mb-8 flex flex-col items-center">
                    <img src="images/logo.png" width="125" alt="" srcset="" />
                    <h1 class="mb-2 text-3xl font-bold">Login</h1>
                    <span class="text-gray-500">Enter Login Details</span>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username"
                            class="rounded-3xl border-none w-64 bg-white bg-opacity-70 px-6 py-2 text-center text-black placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 mb-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password"
                            class="rounded-3xl border-none w-64 bg-white bg-opacity-70 px-6 py-2 text-center text-black placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>



                    <div class="flex items-center justify-end mt-8">
                        <div class="flex flex-col">
                            <a class="underline text-sm text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('register') }}">
                                {{ __('you dont have an account?') }}
                            </a>
                            <a class="underline text-sm text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('driver-register') }}">
                                {{ __('you want to be a driver ?') }}
                            </a>
                        </div>

                        <x-primary-button class="ms-3 rounded-3xl bg-yellow-300 hover:bg-black ">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
