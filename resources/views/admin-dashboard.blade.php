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
                        <div class=" inline-flex"><svg class="w-16 h-16 text-gray-800" aria-hidden="true"
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
                            </div>
                        </div>

                        <!-- Availability Update Section -->
                        <div class="mb-6 mt-6">
                            <h3 class="text-lg font-semibold mb-2">Drivers</h3>

                            <div class="flex flex-wrap">
                                @foreach($alldrivers as $alldriver)
                                <div class="mt-2 mr-4 ml-4 bg-yellow-200 p-4 rounded-xl w-96 relative">
                                    <div class="flex justify-between">
                                        <div>
                                            <p class="inline-flex font-bold">Trajet:</p>
                                            <p class="inline-flex font-semibold">{{ $alldriver->start_location }}-{{
                                                $alldriver->destination }}</p>
                                        </div>

                                        <div>
                                            <img src="{{ asset('storage/image/' .$alldriver->user->picture) }}"
                                                alt="Profile Picture" class="inline-flex w-11  rounded-full  mr-3">

                                        </div>
                                    </div>
                                    <div class="flex mb-4 justify-between">
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
                                @if($alldriver->banned == "0")
                                <form method="POST" action="{{ route('bann.driver', ['driver' => $alldriver]) }}">
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

                            @if($alldriver->banned == "1")
                                <form method="POST" action="{{ route('unbann.driver', ['driver' => $alldriver]) }}">
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

                                @endforeach


                            </div>

                        </div>

                    </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</x-app-layout>
