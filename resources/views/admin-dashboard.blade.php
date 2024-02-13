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
                     
                        <h3 class="text-lg font-semibold mb-2">Driver Information</h3>
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
                        <form action="">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2 mt-4">Update Availability</h3>
                                <!-- Add button or link to update availability -->
                                <!-- Allow driver to specify accepted payment types -->

                                <div class="flex items-center mb-4">
                                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2">
                                    <label for="default-radio-1"
                                        class="ml-2 text-sm font-medium text-black ">available</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500   focus:ring-2">
                                    <label for="default-radio-1"
                                        class="ml-2 text-sm font-medium text-black ">break</label>
                                </div>
                                <div class="flex items-center">
                                    <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                                        class="form-radio w-4 h-4 text-yellow-300 bg-yellow-100 border-yellow-300 focus:ring-yellow-500 focus:ring-2 ">
                                    <label for="default-radio-2" class="ml-2 text-sm font-medium text-black ">off
                                        service</label>
                                </div>

                                <!-- Additional payment options can be added -->
                                <!-- This button can open a modal or a form for the driver to update availability -->
                            </div>

                            <!-- Trip History and Ratings Section -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2">Trip History and Ratings</h3>
                                <!-- Display previous trips and ratings -->
                                <!-- Example: -->
                                <div>
                                    <p>Trip to: Destination - Date</p>
                                    <p>Rating: .5/5 stars</p>
                                </div>
                            </div>

                            <!-- Payment Options Section -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2">Payment Options</h3>
                                <!-- Allow driver to specify accepted payment types -->
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox" checked>
                                    <span class="ml-2">Cash</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="checkbox" class="form-checkbox">
                                    <span class="ml-2">Card</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="checkbox" class="form-checkbox">
                                    <span class="ml-2">Paypal</span>
                                </label>
                                <!-- Additional payment options can be added -->
                            </div>

                            <!-- Trip Selection Section -->
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Select Trip</h3>
                                <select
                                    class="px-4 border-2 border-stone-950  bg-yellow-400 overflow-hidden shadow-sm sm:rounded-lg"
                                    name="" id="">
                                    <option class="text-l" value="">marrakech-safi</option>
                                    <option value="">casablanca-safi</option>
                                    <option value="">rabat-casablanca</option>
                                </select>
                                <!-- Add functionality for the driver to select a trip -->
                                <!-- This could be a dropdown list of available destinations or a search field -->
                            </div>
                            <div class=" flex justify-end">
                                <button
                                    class="px-4 py-2 mt-3 border-2  bg-yellow-500 hover:bg-black hover:text-white overflow-hidden shadow-sm sm:rounded-lg"
                                    type="submit">submit changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>