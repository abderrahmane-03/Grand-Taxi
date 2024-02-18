<?php
use Carbon\Carbon;
?>
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
                            <h3 class="text-lg font-semibold mb-2">Passenger Information</h3>
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
                    <form action="{{route('driver-filtre')}}" method="post">
                        @csrf
                        <select name="localisation" id="">
                            <option value="Marrakech">Marrakech</option>
                            <option value="Safi">Safi</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Fes">Fes</option>
                            <option value="Sale">Sale</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Tanger">Tanger</option>
                            <option value="Houceima">Houceima</option>
                        </select>

                        <select name="vehicle_type" id="">
                            <option value="Tesla">Tesla</option>
                            <option value="BMW">BMW</option>
                            <option value="Ford">Ford</option>
                            <option value="Mercides">Mercides</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Dacia">Dacia</option>
                        </select>
                        <select name="rating" id="">
                            <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                            <option value="4">⭐️⭐️⭐️⭐️</option>
                            <option value="3">⭐️⭐️⭐️</option>
                            <option value="2">⭐️⭐️</option>
                            <option value="1">⭐️</option>
                        </select>
                        <button type="submit">Filtre</button>
                    </form>
                    <div class="mb-6 mt-6">
    <h3 class="text-lg font-semibold mb-2">Our Available Drivers</h3>

    <div class="flex flex-wrap">
        @foreach($alldrivers as $alldriver)
        <div class="mt-2 mr-4 ml-4 bg-yellow-200 p-4 rounded-xl w-96 relative">
            <div class="flex justify-between">
                <div>
                    <p class="inline-flex font-bold">Trajet:</p>
                    <p class="inline-flex font-semibold">{{ $alldriver->start_location }}-{{ $alldriver->destination }}</p>
                </div>

                <div>
                    <img src="{{ asset('storage/image/' .$alldriver->user->picture) }}" alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-3">

                    </div>
                </div> <div class="flex mb-4 justify-between">
                <p class=" font-bold ">Average Rating:</p>
                    <div class=" items-center" id="avg_{{ $alldriver->id }}">

        @if(isset($avgs[$alldriver->id]))
        @php
            $rating = $avgs[$alldriver->id];
            $wholeStars = floor($rating);
            $fractionalPart = $rating - $wholeStars;
        @endphp

    
    @for ($i = 0; $i < $wholeStars; $i++)
     <svg class=" inline-flex w-[18px] h-[18px] text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
  </svg>

    @endfor


    @if ($fractionalPart > 0)
        <svg class=" inline-flex w-[18px] h-[18px] text-gray-800 dark:text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="m13 4-.2-.6a1 1 0 0 0-1.2-.3c-.2 0-.3.2-.3.2l-.2.1c0 .2-.2.3-.3.5a33.9 33.9 0 0 0-2.4 4.4l-4.6.4a2 2 0 0 0-1.1 3.5l3.5 3-1 4.3A2 2 0 0 0 8 21.7l4-2.4c.5-.3.9-1 .9-1.7V4Zm-2 0Z" clip-rule="evenodd"/></svg>

        @endif

@else
    Not Rated
@endif
</div>
                                </div>
                                <p class="inline-flex mr-1 font-bold"> Vehicle Type:</p>
                                <p class="inline-flex font-semibold">{{$alldriver->vehicule_type}}</p>


                                @if($alldriver->availablity_status == "Available")
                                <svg class="absolute top-0 left-[21rem] m-2" xmlns="http://www.w3.org/2000/svg">
                                    <circle r="10" cx="10" cy="10" stroke-width="3" style="fill: #22c55e;" />
                                </svg>
                                <div class="flex justify-between">
                                    <div>
                                        <p class="inline-flex font-bold mt-4">Payment Type:</p>
                                        <p class="inline-flex font-semibold">{{$alldriver->payment_accepted}}
                                        </p>
                                    </div>
                                    <button
                                        onclick="showform('{{$alldriver->id}}','{{$alldriver->user->name}}','{{ $alldriver->start_location }}','{{$alldriver->destination }}')"
                                        class="bg-yellow-300 hover:bg-black hover:text-white text-neutral-950 rounded-xl p-2 font-semibold mb-1 mt-3">
                                        Reserve now</button>
                                </div>
                                @endif
                                @if($alldriver->availablity_status == "Off Service")
                                <svg class="absolute top-0 left-[21rem] m-2" xmlns="http://www.w3.org/2000/svg">
                                    <circle r="10" cx="10" cy="10" stroke-width="3" style="fill:#ff4e4e;" />
                                </svg>
                                <div class="flex justify-between">
                                    <p class="inline-flex font-bold mt-4">Payment Type:{{$alldriver->payment_accepted}}
                                    </p>
                                    <div class="bg-gray-300 text-neutral-950 rounded-xl p-2 font-semibold mb-2 mt-2">Off
                                        Service</div>
                                </div>
                                @endif
                                @if($alldriver->availablity_status == "Break")

                                <svg class="absolute top-0 left-[21rem] m-2" xmlns="http://www.w3.org/2000/svg">
                                    <circle r="10" cx="10" cy="10" stroke-width="3" style="fill:#f59e0b;" />
                                </svg>
                                <div>
                                    <p class="inline-flex font-bold mt-4">Payment Type:</p>
                                    <p class="inline-flex font-semibold">{{$alldriver->payment_accepted}}
                                    </p>
                                </div>
                                <div class="bg-gray-300 text-neutral-950 rounded-xl p-2 font-semibold mb-2 mt-2">taking
                                    a break</div>
                                @endif


                                <form
                                    class="hidden bg-yellow-200 rounded-xl absolute top-[40%] left-[40%] transform -translate-x-[40%] -translate-y-[40%] z-50 justify-center items-center w-[30rem] h-[30rem] sm:fixed sm:top-[25%] sm:left-[32%] sm:transform-none sm:-translate-x-[30%] sm:-translate-y-[30%]"
                                    action="{{ route('reservation.store') }}" method="post" id="res-form">
                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="driver_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">driver</label>
                                            <input type="hidden" name="passenger_id" value="{{$passenger->id}}">
                                            <input type="hidden" name="driver_id" id="driver_id"
                                                value="{{$alldriver->id}}">
                                            <input type="text" id="driver_name" value="{{$alldriver->user->name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                readonly>
                                        </div>

                                        <div>
                                            <label for="starting_time"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">starting_time</label>
                                            <input type="datetime-local" name="starting_time"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                        </div>
                                        <div>
                                            <label for="start_location"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">start_location</label>
                                            <input type="text" name="start_location" id="start_location"
                                                value="{{$alldriver->start_location}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                readonly>
                                        </div>
                                        <div>
                                            <label for="destination"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">destination</label>
                                            <input type="text" name="destination" id="destination"
                                                value="{{$alldriver->destination}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                readonly>
                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-yellow-300 hover:bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd">
                                            </svg>
                                            Reserve
                                        </button>
                                        <button type="button" onclick="hideform()"
                                            class="text-white inline-flex items-center hover:bg-yellow-300 bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="w-5 mt-1 mr-1 h-5 text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                                            </svg>cancel</button>
                                    </div>
                                </form>


                            </div>
                            @endforeach


                                    </div>

                    </div>
                    <div class="mb-6 mt-6">
                        <h3 class="text-lg font-semibold mb-2">History of trips</h3>
                        <div class="flex flex-wrap">
                            @if ($reservations->count() > 0)
                            @foreach ($reservations as $reservation)
                            <div class="mt-2 mr-4 ml-4 bg-gray-200 p-4 rounded-xl w-96">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="inline-flex font-bold">Trajet:</p>
                                        <p class="inline-flex font-semibold">{{ $reservation->start_location }}-{{
                                            $reservation->destination }}</p>
                                    </div>
                                    @foreach($drivers[$reservation->id] as $driver)
                                    <img src="{{ asset('storage/image/' .$driver->user->picture) }}"
                                        alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-2">
                                    @endforeach
                                </div>
                                <p class="inline-flex font-bold"> Date:</p>
                                <p class="inline-flex font-semibold"> {{ $reservation->created_at }}</p>
                                <form
                                    class="hidden bg-yellow-200 rounded-xl absolute top-[40%] left-[40%] transform -translate-x-[40%] -translate-y-[40%] z-50 justify-center items-center w-[33rem] h-[33rem] sm:fixed sm:top-[25%] sm:left-[32%] sm:transform-none sm:-translate-x-[30%] sm:-translate-y-[30%]"
                                    action="{{ route('review.store') }}" method="post" id="rev-form">
                                    <input type="hidden" name="reservation_id" id="reservation_id"
                                        value="{{$reservation->id}}">

                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">


                                        <div>
                                            <label for="comment"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">Comment</label>
                                            <input type="text" name="comment"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
                                        </div>
                                        <div>
                                            <label for="rating"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">Rating</label>
                                            <div class="flex items-center space-x-1">
                                                <input type="radio" id="star1" name="rating" value="1" class="hidden" />
                                                <label for="star1"
                                                    class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                                                    onclick="handleStarClick(this)">⭐️</label>
                                                <input type="radio" id="star2" name="rating" value="2" class="hidden" />
                                                <label for="star2"
                                                    class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                                                    onclick="handleStarClick(this)">⭐️</label>
                                                <input type="radio" id="star3" name="rating" value="3" class="hidden" />
                                                <label for="star3"
                                                    class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                                                    onclick="handleStarClick(this)">⭐️</label>
                                                <input type="radio" id="star4" name="rating" value="4" class="hidden" />
                                                <label for="star4"
                                                    class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                                                    onclick="handleStarClick(this)">⭐️</label>
                                                <input type="radio" id="star5" name="rating" value="5" class="hidden" />
                                                <label for="star5"
                                                    class="starr cursor-pointer text-xl opacity-50 hover:opacity-100 hover:text-3xl"
                                                    onclick="handleStarClick(this)">⭐️</label>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-yellow-300 hover:bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Send Review
                                        </button>
                                        <button type="button" onclick="hidereview()"
                                            class="text-white inline-flex items-center hover:bg-yellow-300 bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="w-5 mt-1 mr-1 h-5 text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                                            </svg>cancel</button>
                                    </div>
                                </form>
                                @if ($reservation->created_at->diffInMinutes(Carbon::now()) < 10 &&
                                    count($reviews[$reservation->id]) == 0)
                                    <div class="flex">
                                        <button onclick="showreview({{ $reservation->id }})"
                                            class="bg-yellow-300 mt-6 hover:bg-black hover:text-white text-neutral-950 rounded-xl p-2 font-semibold">
                                            <input type="hidden" id="reservation_idd" value="{{ $reservation->id }}">Add
                                            Review
                                        </button>
                                        <button onclick="showcancel({{ $reservation->id }})"
                                            class=" bg-black mt-6 ml-2 hover:bg-red-400 text-white hover:text-neutral-950 rounded-xl p-2 font-semibold">
                                            <input type="hidden" value="{{ $reservation->id }}">Cancel Reservation
                                        </button>
                                    </div>
                                    @endif
                                    @if($reservation->created_at->diffInMinutes(Carbon::now()) > 10 &&
                                    count($reviews[$reservation->id]) == 0)
                                    <button onclick="showreview({{ $reservation->id }})"
                                        class="bg-yellow-300 mt-6 hover:bg-black hover:text-white text-neutral-950 rounded-xl p-2 font-semibold">
                                        <input type="hidden" id="reservation_idd" value="{{ $reservation->id }}">Add
                                        Review
                                    </button>
                                    @endif
                                    @foreach ($reviews[$reservation->id] as $review)
                                    <div class="mt-2 bg-gray-200 p-4 rounded-xl">
                                        <div class="flex">
                                            <p class="inline-flex font-bold">Your Rating:
                                            <div class="flex" id="stars_{{ $review->id }}"></div>
                                            </p>
                                        </div>
                                        <p class="inline-flex font-bold">Your comment :</p>
                                        <p class="inline-flex font-semibold">"{{ $review->comment }}"</p>

                                    </div>
                                    <script>


                                        var starsContainer = document.getElementById('stars_{{$review->id}}');
                                        var rating = {{ $review-> rating}};
                                        for (var i = 0; i < 5; i++) {
                                            var star = document.createElement('span');
                                            if (i < rating) {
                                                star.innerHTML = '⭐️';
                                            } else {
                                                star.innerHTML = '<svg class="mt-[3.5px] w-[18px] h-[18px] text-gray-800 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M11 5.1a1 1 0 0 1 2 0l1.7 4c.1.4.4.6.8.6l4.5.4a1 1 0 0 1 .5 1.7l-3.3 2.8a1 1 0 0 0-.3 1l1 4a1 1 0 0 1-1.5 1.2l-3.9-2.3a1 1 0 0 0-1 0l-4 2.3a1 1 0 0 1-1.4-1.1l1-4.1c.1-.4 0-.8-.3-1l-3.3-2.8a1 1 0 0 1 .5-1.7l4.5-.4c.4 0 .7-.2.8-.6l1.8-4Z"/></svg>'; // Empty star (gray)

                                            }
                                            starsContainer.appendChild(star);
                                        }

                                    </script>
                                    @endforeach
                            </div>
                            @endforeach
                            @else
                            <p>No reservations found.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <form
                    class="hidden bg-yellow-200 rounded-xl absolute top-[40%] left-[40%] transform -translate-x-[40%] -translate-y-[40%] z-50 justify-center items-center w-[33rem] h-[33rem] sm:fixed sm:top-[25%] sm:left-[32%] sm:transform-none sm:-translate-x-[30%] sm:-translate-y-[30%]"
                    action="{{ route('reservation.delete') }}" method="post" id="cancel-form">
                    <input type="hidden" name="reservation_id" id="cancel_id" value="">

                    @csrf
                    @method('delete')
                    <div>
                        <div class="flex">
                            <p class="text-red-500 font-bold">Are you sure you want to cancel this reservation?</p><svg
                                class xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1" width="35" height="35" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path
                                        d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 7 C 24.047 7 7 24.047 7 45 s 17.047 38 38 38 s 38 -17.047 38 -38 S 65.953 7 45 7 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <circle cx="30.85" cy="33.68" r="7"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform="  matrix(1 0 0 1 0 0) " />
                                    <circle cx="59.15" cy="33.68" r="7"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform="  matrix(1 0 0 1 0 0) " />
                                    <path
                                        d="M 61.691 65.942 c -0.778 0 -1.563 -0.259 -2.212 -0.789 c -4.136 -3.379 -9.143 -5.165 -14.479 -5.165 s -10.344 1.786 -14.479 5.164 c -1.496 1.224 -3.702 1.002 -4.925 -0.495 s -1.001 -3.702 0.496 -4.925 c 5.322 -4.35 12.038 -6.744 18.908 -6.744 s 13.585 2.395 18.907 6.743 c 1.497 1.224 1.72 3.429 0.497 4.925 C 63.712 65.504 62.706 65.942 61.691 65.942 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <p class="mt-8 text-red-600">This action cannot be undone.</p>

                        <div class="grid gap-4 mb-4 sm:grid-cols-2">


                            <button type="submit"
                                class="text-white inline-flex items-center bg-yellow-300 hover:bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Yes
                            </button>
                            <button type="button" onclick="hidecancel()"
                                class="text-white inline-flex items-center hover:bg-yellow-300 bg-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-5 mt-1 mr-1 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 18 6m0 12L6 6" />
                                </svg>No</button>
                        </div>
                </form>
            </div>
        </div>

        <script>
            function handleStarClick(starr) {
                var stars = document.querySelectorAll('.starr');
                var clickedIndex = Array.from(stars).indexOf(starr);

                // Loop through stars
                for (var i = 0; i <= clickedIndex; i++) {
                    stars[i].classList.add('selected');
                }
            }
            function showcancel(reservation) {

                document.getElementById('cancel_id').value = reservation;
                document.getElementById('cancel-form').classList.remove('hidden');
                document.getElementById('cancel-form').classList.add('flex');
                document.getElementById('bg').classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
            function hidecancel() {

                document.getElementById('cancel-form').classList.remove('flex');
                document.getElementById('cancel-form').classList.add('hidden');
                document.getElementById('bg').classList.add('hidden');
                document.body.classList.add('overflow-hidden');
            }
            function showform(driverId, drivername, startlocation, destination) {
                document.getElementById('driver_id').value = driverId;
                document.getElementById('driver_name').value = drivername;
                document.getElementById('start_location').value = startlocation;
                document.getElementById('destination').value = destination;

                document.getElementById('res-form').classList.remove('hidden');
                document.getElementById('res-form').classList.add('flex');
                document.getElementById('bg').classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }


            function hideform() {
                document.getElementById('res-form').classList.add('hidden');
                document.getElementById('res-form').classList.remove('flex');
                document.getElementById('bg').classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
            function showreview(reservationId) {
                document.getElementById('reservation_id').value = reservationId;

                document.getElementById('rev-form').classList.remove('hidden');
                document.getElementById('rev-form').classList.add('flex');
                document.getElementById('bg').classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }


            function hidereview() {
                document.getElementById('rev-form').classList.add('hidden');
                document.getElementById('rev-form').classList.remove('flex');
                document.getElementById('bg').classList.add('hidden');
            }

        </script>
        <style>
            .starr.selected {
                opacity: 1;
                /* Change opacity to 1 when selected */
                font-size: 2rem;
                /* Adjust text size as desired when selected */
            }
        </style>

    </div>
</x-app-layout>
