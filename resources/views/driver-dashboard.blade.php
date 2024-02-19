<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-1">
        <div class="max-w-[85rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Driver Information Section -->

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Driver Information</h3>
                        <div class=" inline-flex"><img src="{{ asset('storage/image/' . Auth::user()->picture) }}"
                                alt="Profile Picture" class="w-20 rounded-full mt-2">
                            <div class="flex ml-4 mt-2">
                                <div class="flex flex-col">
                                    <p class="flex font-semibold"> {{ Auth::user()->name }}<svg
                                            class="ml-4 w-6 h-6 text-gray-800 dark:text-blue-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 2a3 3 0 0 0-2.1.9l-.9.9a1 1 0 0 1-.7.3H7a3 3 0 0 0-3 3v1.2c0 .3 0 .5-.2.7l-1 .9a3 3 0 0 0 0 4.2l1 .9c.2.2.3.4.3.7V17a3 3 0 0 0 3 3h1.2c.3 0 .5 0 .7.2l.9 1a3 3 0 0 0 4.2 0l.9-1c.2-.2.4-.3.7-.3H17a3 3 0 0 0 3-3v-1.2c0-.3 0-.5.2-.7l1-.9a3 3 0 0 0 0-4.2l-1-.9a1 1 0 0 1-.3-.7V7a3 3 0 0 0-3-3h-1.2a1 1 0 0 1-.7-.2l-.9-1A3 3 0 0 0 12 2Zm3.7 7.7a1 1 0 1 0-1.4-1.4L10 12.6l-1.3-1.3a1 1 0 0 0-1.4 1.4l2 2c.4.4 1 .4 1.4 0l5-5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    <div class="flex" id="avg">avg rating:</div>
                                    </p>
                                    <p>{{ Auth::user()->email }}</p>


                                </div>
                            </div>

                        </div>
                        <div class="ml-4 mb-3">
                        <div class="flex mt-4 ">
                            <p class="font-semibold mr-2 ">Description:</p> {{ $driver->description }}
                        </div>
                        <div class="flex">
                            <p class="font-semibold mr-2 ">License Plate:</p> {{ $driver->license_plate }}
                        </div>
                        <div class="flex">

                            <p class="font-semibold mr-2 ">Vehicle Type: </p>{{ $driver->vehicule_type }}
                        </div>
                </div>

                        <!-- Availability Update Section -->

                        <form action="{{ route('driver.update', $driver->id) }}" method="post">
                            @csrf
                            @method('put')
                             <!-- Availablity Status Section -->
                            <h3 class="text-lg font-semibold mb-2">Availablity Status</h3>
                            <div class="ml-4 mb-6">
                                <!-- Available -->
                                <div class="flex items-center mb-4">
                                    <input id="availablity_status-1" type="radio" value="Available" name="availablity_status"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2"
                                        {{ $driver->availablity_status == 'Available' ? 'checked' : '' }}>
                                    <label for="availablity_status-1" class="ml-2 text-sm font-medium text-black ">Available</label>
                                </div>
                                <!-- Break -->
                                <div class="flex items-center mb-4">
                                    <input id="availablity_status-2" type="radio" value="Break" name="availablity_status"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2"
                                        {{ $driver->availablity_status == 'Break' ? 'checked' : '' }}>
                                    <label for="availablity_status-2" class="ml-2 text-sm font-medium text-black ">Break</label>
                                </div>
                                <!-- Off Service -->
                                <div class="flex items-center">
                                    <input id="availablity_status-3" type="radio" value="Off Service" name="availablity_status"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500 focus:ring-2 "
                                        {{ $driver->availablity_status == 'Off Service' ? 'checked' : '' }}>
                                    <label for="availablity_status-3" class="ml-2 text-sm font-medium text-black ">Off Service</label>
                                </div>
                            </div>

                            <!-- Payment Options Section -->
                            <h3 class="text-lg font-semibold mb-2">Payment Options</h3>
                            <div class="ml-4 mb-6">
                                <!-- Cash -->
                                <div class="flex items-center mb-4">
                                    <input id="payment_accepted-1" type="radio" value="Cash" name="payment_accepted"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2"
                                        {{ $driver->payment_accepted == 'Cash' ? 'checked' : '' }}>
                                    <label for="payment_accepted-1" class="ml-2 text-sm font-medium text-black ">Cash</label>
                                </div>
                                <!-- Visa Card -->
                                <div class="flex items-center mb-4">
                                    <input id="payment_accepted-2" type="radio" value="Visa card" name="payment_accepted"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2"
                                        {{ $driver->payment_accepted == 'Visa card' ? 'checked' : '' }}>
                                    <label for="payment_accepted-2" class="ml-2 text-sm font-medium text-black ">Visa Card</label>
                                </div>
                                <!-- Paypal -->
                                <div class="flex items-center">
                                    <input id="payment_accepted-3" type="radio" value="Paypal" name="payment_accepted"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500 focus:ring-2 "
                                        {{ $driver->payment_accepted == 'Paypal' ? 'checked' : '' }}>
                                    <label for="payment_accepted-3" class="ml-2 text-sm font-medium text-black ">Paypal</label>
                                </div>
                            </div>


                                                        <!-- Trip Selection Section -->
                                                    <!-- Start Point -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Start Point</h3>
                                <select class="px-4 ml-4 w-56 h-10 border-3 text-white border-yellow-100  bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg" name="start_location" id="">
                                    <option class="text-l" value="Marrakech" {{ $driver->start_location == 'Marrakech' ? 'selected' : '' }}>Marrakech</option>
                                    <option class="text-l" value="Safi" {{ $driver->start_location == 'Safi' ? 'selected' : '' }}>Safi</option>
                                    <option class="text-l" value="Casablanca" {{ $driver->start_location == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                                    <option class="text-l" value="Rabat" {{ $driver->start_location == 'Rabat' ? 'selected' : '' }}>Rabat</option>
                                    <option class="text-l" value="Sale" {{ $driver->start_location == 'Sale' ? 'selected' : '' }}>Sale</option>
                                </select>
                            </div>

                            <!-- Destination -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Destination</h3>
                                <select class="px-4 ml-4 w-56 h-10 border-3 text-white border-yellow-100  bg-yellow-300 overflow-hidden shadow-sm sm:rounded-lg" name="destination" id="">
                                    <option class="text-l" value="Tanger" {{ $driver->destination == 'Tanger' ? 'selected' : '' }}>Tanger</option>
                                    <option class="text-l" value="Tetouan" {{ $driver->destination == 'Tetouan' ? 'selected' : '' }}>Tetouan</option>
                                    <option class="text-l" value="Houceima" {{ $driver->destination == 'Houceima' ? 'selected' : '' }}>Houceima</option>
                                    <option class="text-l" value="Fes" {{ $driver->destination == 'Fes' ? 'selected' : '' }}>Fes</option>
                                    <option class="text-l" value="Taroudant" {{ $driver->destination == 'Taroudant' ? 'selected' : '' }}>Taroudant</option>
                                </select>
                            </div>

                            <div class="mb-6 mt-6">
                                <h3 class="text-lg font-semibold mb-2">History of trips</h3>
                                <!-- Display previous trips and ratings -->
                                <!-- Example: -->
                                @if ($reservations->count() > 0)
                                <div class="flex flex-wrap">
                                    @foreach ($reservations as $reservation)
                                    <div class=" mt-2 mr-4 ml-4  bg-gray-200 p-4 rounded-xl w-96">
                                        <p>Trajet: {{ $reservation->start_location }}-{{ $reservation->destination }} </p>
                                        <p> date: {{
                                            $reservation->created_at }}</p>

                                        {{-- Display reviews --}}

                                        @foreach ($reviews[$reservation->id] as $review)
                                        @foreach($passengers[$reservation->id] as $passenger)
                                        <div class="flex">
                                            <p>Trip Rating:
                                            <div class="flex" id="stars_{{$review->id}}"></div>
                                            </p>
                                        </div>
                                        <p><img src="{{ asset('storage/image/' .$passenger->user->picture) }}"
                                                alt="Profile Picture"
                                                class="inline-flex w-11 rounded-full mt-2 mr-2">"{{ $review->comment }}"
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
                            <script>
                                            var avgcontainer = document.getElementById('avg');
                                            var avgRating = {{ $avg }};
                                            for (var i = 0; i < 5; i++) {
                                                var star = document.createElement('span');
                                                if (i < Math.floor(avgRating)) {
                                                    star.innerHTML = '⭐️'; // Filled star
                                                } else if (avgRating % 1 !== 0 && i === Math.floor(avgRating)) {
                                                    star.innerHTML = '<svg class="mt-[3.7px] w-[18px] h-[18px] text-gray-800 dark:text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="m13 4-.2-.6a1 1 0 0 0-1.2-.3c-.2 0-.3.2-.3.2l-.2.1c0 .2-.2.3-.3.5a33.9 33.9 0 0 0-2.4 4.4l-4.6.4a2 2 0 0 0-1.1 3.5l3.5 3-1 4.3A2 2 0 0 0 8 21.7l4-2.4c.5-.3.9-1 .9-1.7V4Zm-2 0Z" clip-rule="evenodd"/></svg>'; // Half star
                                                } else {
                                                    star.innerHTML = '<svg class="mt-[3.5px] w-[18px] h-[18px] text-gray-800 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M11 5.1a1 1 0 0 1 2 0l1.7 4c.1.4.4.6.8.6l4.5.4a1 1 0 0 1 .5 1.7l-3.3 2.8a1 1 0 0 0-.3 1l1 4a1 1 0 0 1-1.5 1.2l-3.9-2.3a1 1 0 0 0-1 0l-4 2.3a1 1 0 0 1-1.4-1.1l1-4.1c.1-.4 0-.8-.3-1l-3.3-2.8a1 1 0 0 1 .5-1.7l4.5-.4c.4 0 .7-.2.8-.6l1.8-4Z"/></svg>'; // Empty star (gray)
                                                }
                                                avgcontainer.appendChild(star);
                                            }
                                        </script>
                            <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                            <div class="flex justify-end">
                                <button
                                    class="px-4 py-2 mt-3 border-2 bg-yellow-300 hover:bg-black hover:text-white overflow-hidden shadow-sm sm:rounded-lg"
                                    type="submit">Submit Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
