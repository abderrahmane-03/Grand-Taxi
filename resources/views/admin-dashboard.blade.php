<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <!-- Driver Information Section -->
                    <div class="mb-6">

                        <h3 class="text-lg font-semibold mb-2">Admin Information</h3>

                        <div class=" inline-flex">

                            <svg class="w-16 h-16 text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z"
                                    clip-rule="evenodd" />
                            </svg>

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
<!-- component -->
                                <div class="max-w-full mx-4 py-6 sm:mx-auto sm:ml-72 sm:px-6 lg:px-8">
                                    <div class="sm:flex sm:space-x-4">
                                        <div class="inline-block align-bottom bg-yellow-300 rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                            <div class="bg-yellow-200 p-5">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Total Passengers</h3>
                                                        <p class="text-3xl font-bold text-black">{{$passengers->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inline-block align-bottom bg-black rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                            <div class="bg-black p-5">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Reviews</h3>
                                                        <p class="text-3xl font-bold text-white">{{$reviewss->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inline-block align-bottom bg-yellow-200 rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                            <div class="bg-yellow-200 p-5">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Total Drivers</h3>
                                                        <p class="text-3xl font-bold text-black">{{$alldrivers->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inline-block align-bottom bg-black rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                                            <div class="bg-black p-5">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                                        <h3 class="text-sm leading-6 font-medium text-gray-400">Reservations</h3>
                                                        <p class="text-3xl font-bold text-white">{{$reservations->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Availability Update Section -->
                        <div class="mb-6 mt-6">
                            <h3 class="text-lg font-semibold mb-2">Drivers</h3>

                            <div class="flex flex-wrap">
                                @foreach($alldrivers as $alldriver)
                                <div class="mt-2 mr-4 ml-4 bg-yellow-200 p-4 rounded-xl w-96 relative">

                            <div class="flex justify-between">

                            @if($alldriver->banned == "0")

                                <form method="POST" action="{{ route('bann.driver', ['driver' => $alldriver]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-400 hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        ban
                                    </button>
                                </form>
                            @endif

                            @if($alldriver->banned == "1")
                                <form method="POST" action="{{ route('unbann.driver', ['driver' => $alldriver]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-300  hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        unban
                                    </button>
                                </form>
                            @endif
                                        <div>
                                            <img src="{{ asset('storage/image/' .$alldriver->user->picture) }}"
                                                alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-3">

                                        </div>
                                    </div>
                                    <div class="flex mb-2 justify-between">
                                        <p class=" font-bold ">Average Rating:</p>
                                        <div class=" items-center" id="avg_{{ $alldriver->id }}">

                                            @if(isset($avgs[$alldriver->id]))
                                            @php
                                            $rating = $avgs[$alldriver->id];
                                            $wholeStars = floor($rating);
                                            $fractionalPart = $rating - $wholeStars;
                                            @endphp


                                            @for ($i = 0; $i < $wholeStars; $i++)
                                            <svg
                                                class=" inline-flex w-[18px] h-[18px] text-yellow-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                                </svg>

                                                @endfor


                                                @if ($fractionalPart > 0)
                                                <svg class=" inline-flex w-[18px] h-[18px] text-gray-800 dark:text-yellow-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="m13 4-.2-.6a1 1 0 0 0-1.2-.3c-.2 0-.3.2-.3.2l-.2.1c0 .2-.2.3-.3.5a33.9 33.9 0 0 0-2.4 4.4l-4.6.4a2 2 0 0 0-1.1 3.5l3.5 3-1 4.3A2 2 0 0 0 8 21.7l4-2.4c.5-.3.9-1 .9-1.7V4Zm-2 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                @endif

                                                @else
                                                Not Rated
                                                @endif
                                        </div>
                                    </div>
                                    <div>
                                            <p class="inline-flex font-bold">Trajet:</p>
                                            <p class="inline-flex font-semibold">{{ $alldriver->start_location }}-{{
                                                $alldriver->destination }}</p>
                                        </div>

                                    <p class="inline-flex mr-1 mt-2 font-bold"> Vehicle Type:</p>
                                    <p class="inline-flex font-semibold">{{$alldriver->vehicule_type}}</p>





                                </p>
                <p class="inline-flex mt-3  font-bold"> reservations made:</p>
                                                    <p class="inline-flex font-semibold">

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

                                    </div>

                                    @endif

                                    @if($alldriver->availablity_status == "Off Service")
                                    <svg class="absolute top-0 left-[21rem] m-2" xmlns="http://www.w3.org/2000/svg">
                                        <circle r="10" cx="10" cy="10" stroke-width="3" style="fill:#ff4e4e;" />
                                    </svg>

                                    <div class="flex justify-between">
                                        <p class="inline-flex font-bold mt-4">Payment
                                            Type:{{$alldriver->payment_accepted}}
                                        </p>

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

                                    @endif

                                </div>



                                @endforeach


                            </div>

                        </div>
                        <div class="mb-6 mt-6">
                        <h3 class="text-lg font-semibold mb-2">passengers</h3>
                        <div class="flex flex-wrap">
                            @if ($passengers->count() > 0)
                            @foreach($passengers as $passenger)
                            <div class="mt-2 mr-4 ml-4 bg-gray-200 p-4 rounded-xl w-96">
                                <div class="flex justify-between">


                                    <img src="{{ asset('storage/image/' .$passenger->user->picture) }}"
                                        alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-2">



                                </div>
                                <p class="inline-flex mt-3 font-bold"> Subscribed at:</p>
                                <p class="inline-flex font-semibold"> {{ $passenger->created_at }}</p>

                                <p class="inline-flex mt-3 font-bold"> reservations made:</p>
                                <p class="inline-flex font-semibold">


                                    </p>

                                @if($passenger->banned == "0")
                                <form method="POST" action="{{ route('bann.passenger', ['passenger' => $passenger]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-400 mt-6 hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        ban
                                    </button>
                                </form>
                            @endif

                            @if($passenger->banned == "1")
                                <form method="POST" action="{{ route('unbann.passenger', ['passenger' => $passenger]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-300 mt-6 hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        unban
                                    </button>
                                </form>
                            @endif
                            </div>
                            @endforeach
                            @else
                            <p>No passengers found.</p>
                            @endif
                        </div>

                    </div>

                        <div class="mb-6 mt-6">

                        <h3 class="text-lg font-semibold mb-2">reviews</h3>
                        <div class="flex flex-wrap">
                            @if ($reservations->count() > 0)
                            @foreach ($reservations as $reservation)
                            <div class="mt-2 mr-4 ml-4 bg-gray-200 p-4 rounded-xl w-96">
                                <div class="flex justify-between">

                                @foreach($passengers as $passenger)
                                    <img src="{{ asset('storage/image/' .$passenger->user->picture) }}"
                                        alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-2">
                                    @endforeach
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
                                <p class="inline-flex mt-3 font-bold"> Date:</p>
                                <p class="inline-flex font-semibold"> {{ $reservation->created_at }}</p>

                                @if($reservation->deleted == "0")
                                <form method="POST" action="{{ route('bann.reservation', ['reservation' => $reservation]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-400 mt-6 hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        soft delete
                                    </button>
                                </form>
                            @endif

                            @if($reservation->deleted == "1")
                                <form method="POST" action="{{ route('unbann.reservation', ['reservation' => $reservation]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-300 mt-6 hover:text-white rounded-xl p-2 font-semibold">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                        </svg>
                                        undelete
                                    </button>
                                </form>
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

                </div>
            </div>


        </div>
    </div>
</x-app-layout>
