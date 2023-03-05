<x-app-layout>

    <style>
        td {
            padding: 0 5rem 1rem 1rem;
        }
    </style>

    <!-- Main Content Section -->
    <div class="py-6">
        <div class="px-12 flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900">
                Subject Name: {{ $subject->name }}
            </h1>
            <a href="{{ route('subjects.index') }}"
                class="ml-3 inline-flex justify-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back</a>
        </div>

        <div class="space-y-8  px-12 py-4">
            <div class="space-y-8 divide-y bg-white px-8 py-8 divide-gray-200 sm:space-y-5">
                <div class="card w-full mx-auto bg-white p-4">
                    <table>
                        <tr>
                            <td>Subject: </td>
                            <td>{{ $subject->name }}</td>
                        </tr>
                        <tr>
                            <td>Pass Mark: </td>
                            <td>{{ $subject->pass_mark }}</td>
                        </tr>
                        @if (Auth::user()->hasRole(['Student']))
                            <tr>
                                <td>My Mark: </td>
                                <td>
                                    @if ($subjectMark?->mark)
                                        @if ($subjectMark?->mark >= $subject->pass_mark)
                                            <span
                                                class="inline-flex bg-green-300 text-center px-3 py-1 text-xs font-bold leading-5 text-green-800">
                                                {{ $subjectMark?->mark }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex bg-red-300 text-center px-3 py-1 text-xs font-bold leading-5 text-red-800">
                                                {{ $subjectMark?->mark }}
                                            </span>
                                        @endif
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Result: </td>
                                <td>
                                    @if ($subjectMark?->mark)
                                        @if ($subjectMark?->mark >= $subject->pass_mark)
                                            <h2>Pass</h2>
                                        @else
                                            <h2>Fail</h2>
                                        @endif
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if (Auth::user()->hasAnyRole(['Admin', 'Teacher']))
                            <tr>
                                <td>Created By: </td>
                                <td>{{ $subject->createdBy?->name }}</td>
                            </tr>
                            <tr>
                                <td>Created at: </td>
                                <td>{{ $subject->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Updated By: </td>
                                <td>{{ $subject->updatedBy?->name }}</td>
                            </tr>
                            <tr>
                                <td>Updated at: </td>
                                <td>{{ $subject->updated_at }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        @if (Auth::user()->hasAnyRole(['Admin', 'Teacher']))
            <div class="px-12 py-4 flex justify-between">
                <h1 class="text-2xl font-semibold text-gray-900">
                    Enrolled Students
                </h1>
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
                                    <th scope="col"
                                        class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                        Mark</th>
                                    <th scope="col"
                                        class="text-center py-3.5 pl-4 pr-4 text-sm font-semibold text-gray-900 sm:pl-6 ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 bg-white">

                                @forelse($student_marks as $student)
                                    <tr class="divide-x divide-y divide-gray-400">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $student->id }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $student->firstName?->name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            @if ($student->pivot?->mark)
                                                @if ($student->pivot?->mark >= $subject->pass_mark)
                                                    <span
                                                        class="inline-flex bg-green-300 text-center px-3 py-1 text-xs font-bold leading-5 text-green-800">
                                                        {{ $student->pivot?->mark }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex bg-red-300 text-center px-3 py-1 text-xs font-bold leading-5 text-red-800">
                                                        {{ $student->pivot?->mark }}
                                                    </span>
                                                @endif
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            @if ($student->pivot?->mark)
                                                <a href="{{ route('get.add.marks', ['subject' => $subject, 'student' => $student]) }}"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    Edit Marks
                                                </a>
                                            @else
                                                <a href="{{ route('get.add.marks', ['subject' => $subject, 'student' => $student]) }}"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Add Marks
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            No students found
                                        </td>
                                    </tr>
                                @endforelse
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Main Content Section -->

</x-app-layout>
