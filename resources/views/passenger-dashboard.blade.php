<x-app-layout>
    <div id="bg" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-2">
        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Driver Information Section -->
                    <div class="mb-6">

                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold mb-2">Passenger Information</h3> <button
                                onclick="showform()"
                                class="bg-gray-200 text-neutral-950 rounded-xl p-2 font-semibold">Add
                                Reservation</button>
                        </div>
                        <div class=" inline-flex"><img src="{{ asset('storage/image/' . Auth::user()->picture) }}"
                                alt="Profile Picture" class="w-14 rounded-full mt-2">
                            <div class="flex ml-4 mt-2">
                                <div class="flex flex-col">
                                    <p class="flex font-semibold"> {{ Auth::user()->name }}<svg
                                            class="ml-4 w-6 h-6 text-gray-800 dark:text-blue-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 2a3 3 0 0 0-2.1.9l-.9.9a1 1 0 0 1-.7.3H7a3 3 0 0 0-3 3v1.2c0 .3 0 .5-.2.7l-1 .9a3 3 0 0 0 0 4.2l1 .9c.2.2.3.4.3.7V17a3 3 0 0 0 3 3h1.2c.3 0 .5 0 .7.2l.9 1a3 3 0 0 0 4.2 0l.9-1c.2-.2.4-.3.7-.3H17a3 3 0 0 0 3-3v-1.2c0-.3 0-.5.2-.7l1-.9a3 3 0 0 0 0-4.2l-1-.9a1 1 0 0 1-.3-.7V7a3 3 0 0 0-3-3h-1.2a1 1 0 0 1-.7-.2l-.9-1A3 3 0 0 0 12 2Zm3.7 7.7a1 1 0 1 0-1.4-1.4L10 12.6l-1.3-1.3a1 1 0 0 0-1.4 1.4l2 2c.4.4 1 .4 1.4 0l5-5Z"
                                                clip-rule="evenodd" />
                                        </svg></p>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Availability Update Section -->
                    </div>
                    <div class="mb-6 mt-6">
                        <h3 class="text-lg font-semibold mb-2">History of trips</h3>

                        @if ($reservations->count() > 0)
                        <div class="flex flex-wrap">
                            @foreach ($reservations as $reservation)
                            <div class=" mt-2 mr-2 bg-gray-200 p-4 rounded-xl w-96">

                                <div class="flex justify-between">
                                    <p class="inline-flex">Trip: {{ $reservation->start_location }}-{{
                                        $reservation->destination }} </p>
                                    @foreach ($reviews[$reservation->id] as $review)
                                    @foreach($drivers[$reservation->id] as $driver)
                                    <img src="{{ asset('storage/image/' .$driver->user->picture) }}"
                                        alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-2">
                                </div>
                                <p> Date: {{
                                    $reservation->created_at }}</p>


                                {{-- Display reviews --}}


                                <div class="flex">
                                    <p>Your Rating:
                                    <div class="flex" id="stars_{{$review->id}}"></div>
                                    </p>
                                </div>
                                <p>Your comment :"{{
                                    $review->comment }}"
                                </p>

                                <script>
                                    // JavaScript code to generate stars dynamically

                                    var starsContainer = document.getElementById('stars_{{$review->id}}');
                                    var rating = {{ $review-> rating}};
                                    for (var i = 0; i < 5; i++) {
                                        var star = document.createElement('span');
                                        if (i < rating) {
                                            star.innerHTML = '⭐️'; // Filled star
                                        } else {
                                            star.innerHTML = '<svg class="mt-[3.5px] w-[18px] h-[18px] text-gray-800 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M11 5.1a1 1 0 0 1 2 0l1.7 4c.1.4.4.6.8.6l4.5.4a1 1 0 0 1 .5 1.7l-3.3 2.8a1 1 0 0 0-.3 1l1 4a1 1 0 0 1-1.5 1.2l-3.9-2.3a1 1 0 0 0-1 0l-4 2.3a1 1 0 0 1-1.4-1.1l1-4.1c.1-.4 0-.8-.3-1l-3.3-2.8a1 1 0 0 1 .5-1.7l4.5-.4c.4 0 .7-.2.8-.6l1.8-4Z"/></svg>'; // Empty star (gray)

                                        }
                                        starsContainer.appendChild(star);
                                    }

                                </script>

                                @endforeach
                                @endforeach

                            </div>
                            @endforeach
                        </div>
                        @else
                        <div>
                            <p>You have not made a trip yet</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
    <form
        class="hidden bg-yellow-200 rounded-xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 justify-center items-center w-[30rem] h-[30rem]"
        action="{{ route('reservation.store') }}" method="post" id="res-form">

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="driver_id" class="block mb-2 text-sm font-medium text-gray-900 ">driver</label>
                <input type="text" name="driver_id" value=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="">
            </div>
            <div>
                <label for="starting_time" class="block mb-2 text-sm font-medium text-gray-900 ">starting_time</label>
                <input type="text" name="starting_time"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
            </div>
            <div>
                <label for="start_location" class="block mb-2 text-sm font-medium text-gray-900 ">start_location</label>
                <input type="text" name="start_location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
            </div>
            <div>
                <label for="destination" class="block mb-2 text-sm font-medium text-gray-900 ">destination</label>
                <input type="text" name="destination"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
            </div>
            <button type="submit" name=""
                class="text-white inline-flex items-center bg-yellow-300 hover:bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Reserve
            </button>
            <button type="button" onclick="hideform()"
                class="text-white inline-flex items-center hover:bg-yellow-300 bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 18 6m0 12L6 6" />
                </svg>cancel</button>
        </div>
    </form>
    <script>
        function showform() {
            document.getElementById('res-form').classList.remove('hidden');
            document.getElementById('res-form').classList.add('flex');
            document.getElementById('bg').classList.remove('hidden');

            document.body.classList.add('overflow-hidden');
        }


        function hideform() {
            document.getElementById('res-form').classList.add('hidden');
            document.getElementById('res-form').classList.remove('flex');
            document.getElementById('bg').classList.add('hidden');
        }
    </script>
    </div>
</x-app-layout>