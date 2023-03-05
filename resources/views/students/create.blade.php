<x-app-layout>
    <!-- Main Content Section -->
    <div class="py-6">
        <div class="px-12">
            <h1 class="text-2xl font-semibold text-gray-900">Add New Student</h1>
        </div>

        <div class="pb-32">
            <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data"
                class="space-y-8  px-12 py-4">
                @csrf
                <div class="space-y-8 divide-y bg-white px-8 py-8 shadow divide-gray-200 sm:space-y-5">
                    <div>

                        <div class="flex justify-between items-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Add Student</h3>
                            <a href="{{ route('students.index') }}"
                                class="ml-3 inline-flex justify-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Back</a>
                        </div>

                        @if (Session::has('success') || count($errors) > 0)
                            <div class="p-4">
                                @if (Session::has('success'))
                                    <div class="rounded-md bg-green-50 pl-12 p-8">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <div class="mt-1 phone text-sm text-green-800">
                                                    <p class="font-bold"> {{ Session::get('success') }}</p>
                                                    @php
                                                        Session::forget('success');
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="rounded-md bg-red-50 pl-12 p-8">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-red-800">Whoops! There were some
                                                    problems with your input.
                                                </h3>
                                                <div class="mt-2 text-sm text-red-700">
                                                    <ul role="list" class="list-disc pl-5 space-y-1">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    First Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="text" name="first_name" id="first_name"
                                            value="{{ old('first_name') }}" autocomplete="name" required
                                            placeholder="Enter Student First Name"
                                            class="flex-1  block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0  rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="last_name"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Last Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="text" name="last_name" id="last_name"
                                            value="{{ old('last_name') }}" autocomplete="name" required
                                            placeholder="Enter Student Last Name"
                                            class="flex-1  block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0  rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Email
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            autocomplete="email" required placeholder="Enter Student Email"
                                            class="flex-1  block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0  rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Phone
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="number" name="phone" id="phone" value="{{ old('phone') }}"
                                            autocomplete="name" required placeholder="Enter Student Phone"
                                            class="flex-1  block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0  rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Address
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <input type="text" name="address" id="address"
                                            value="{{ old('address') }}" autocomplete="address" required
                                            placeholder="Enter Student Address"
                                            class="flex-1  block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0  rounded-md sm:text-sm border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Gender
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <select id="gender" name="gender" autocomplete="category-name" required
                                            class="max-w-lg block focus:ring-indigo-500 p-2 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="course"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 ">
                                    Course
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg flex rounded-md shadow-sm">
                                        <select id="course" name="course" autocomplete="category-name" required
                                            class="max-w-lg block focus:ring-indigo-500 p-2 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-start">
                        <button type="submit"
                            class="inline-flex justify-center px-6 py-3 shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add Student
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- Main Content Section -->
</x-app-layout>
