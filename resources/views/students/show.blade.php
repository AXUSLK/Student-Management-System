<x-app-layout>

    <style>
        td {
            padding: 0 5rem 1rem 1rem;
        }
    </style>

    <!-- Main Content Section -->
    <div class="py-6 pb-32">
        <div class="px-12 flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900">
                Student Name: {{ $student->firstName?->name }}
            </h1>
            <a href="{{ route('students.index') }}"
                class="ml-3 inline-flex justify-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back</a>
        </div>

        <div class="space-y-8 px-12 py-4">
            <div class="space-y-8 divide-y bg-white px-8 py-8 divide-gray-200 sm:space-y-5">
                <div class="card w-full mx-auto bg-white p-4">
                    <table>
                        <tr>
                            <td>First Name: </td>
                            <td>{{ $student->firstName?->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td>{{ $student->lastName?->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $student->userEmail?->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone: </td>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <td>Created By: </td>
                            <td>{{ $student->createdBy?->name }}</td>
                        </tr>
                        <tr>
                            <td>Created at: </td>
                            <td>{{ $student->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated By: </td>
                            <td>{{ $student->updatedBy?->name }}</td>
                        </tr>
                        <tr>
                            <td>Updated at: </td>
                            <td>{{ $student->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="px-12 py-4 flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900">
                Selected Subjects
            </h1>
            <a href="{{ route('get.attach.subjects', $student) }}"
                class="ml-3 inline-flex justify-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Attach Subject</a>
        </div>

        <div class="space-y-8 px-12 py-4">

            <div class="space-y-8 divide-y bg-white px-8 py-8 divide-gray-200 sm:space-y-5">
                <div class="card w-full mx-auto bg-white p-4">
                    <table id="dashboardDataTable" class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    No</th>
                                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Subject
                                </th>
                                <th scope="col"
                                    class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                    Pass Mark</th>
                                <th scope="col"
                                    class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                    Mark</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-400 bg-white">

                            @forelse($student_subjects as $subject)
                                <tr class="divide-x divide-y divide-gray-400">
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $subject->id }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $subject->name }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $subject->pass_mark }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        @if ($subject->pivot?->mark)
                                            @if ($subject->pivot?->mark >= $subject->pass_mark)
                                                <span
                                                    class="inline-flex bg-green-300 text-center px-3 py-1 text-xs font-bold leading-5 text-green-800">
                                                    {{ $subject->pivot?->mark }}
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex bg-red-300 text-center px-3 py-1 text-xs font-bold leading-5 text-red-800">
                                                    {{ $subject->pivot?->mark }}
                                                </span>
                                            @endif
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        No subjects found
                                    </td>
                                </tr>
                            @endforelse
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Main Content Section -->

</x-app-layout>
