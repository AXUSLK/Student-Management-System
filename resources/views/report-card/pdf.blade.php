<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style type="text/css">
        td {
            border: 1px solid #726E6D;
            padding: 15px;
            text-align: center;
        }

        thead {
            font-weight: bold;
            text-align: center;
            background: #625D5D;
            color: white;
        }

        table {
            border-collapse: collapse;
            min-width: 500px;
        }

        .footer {
            text-align: right;
            font-weight: bold;
        }

        tbody>tr:nth-child(odd) {
            background: #D1D0CE;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Main Content Section -->
    <section class="content">
        <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="container">
                    <div class="jumbotron">
                        <div class="text-center">
                            <h2 style="line-height: 1.6;">
                                S T U D E N T &nbsp; M A N A G E M E N T &nbsp; S Y S T E M
                            </h2>
                            <h4 style="line-height: 1.6;">
                                <strong>
                                    R E P O R T &nbsp; C A R D
                                </strong>
                            </h4>

                            <span style="line-height: 1.6;">
                                {{ Carbon\Carbon::now()->format('Y') }}
                            </span>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-6" style="float: left;">
                                <label>Name :</label> <span id="Name" name="student_Name">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>
                            <div class="col-sm-6" style="float: right;">
                                <label>Student No :</label> <span id="rollNo" name="RollNumber">
                                    {{ $student->id }}
                                </span>
                            </div>

                        </div>
                        <br>
                        <br>

                        <table width="100%">
                            <thead>
                                <tr>
                                    <td colspan="3">SUBJECTS </td>
                                    <td colspan="2"> GRADE </td>
                                </tr>
                                <tr>
                                    <td>Id </td>
                                    <td colspan="2"> Name </td>
                                    <td> Pass Mark </td>
                                    <td> Mark </td>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($student_subjects as $subject)
                                    @php
                                        $get_subject = App\Models\Subject::where('id', $subject->subject_id)->first();
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $subject->id }}
                                        </td>
                                        <td colspan="2">
                                            {{ $get_subject->name }}
                                        </td>
                                        <td>
                                            {{ $get_subject->pass_mark }} </td>
                                        <td>
                                            {{ $subjects = $subject->mark }}
                                        </td>
                                    </tr>
                                    @php
                                        $total_pass_mark = $total_pass_mark + $get_subject->pass_mark;
                                        $total_student_mark = $total_student_mark + $subject->mark;
                                    @endphp
                                @empty
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            No subjects found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="3" class="footer">Total</td>
                                    <td>
                                        {{ $total_pass_mark }}
                                    </td>
                                    <td colspan="2">
                                        {{ $total_student_mark }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="footer">AVERAGE </td>
                                    <td colspan="3">
                                        @php
                                            $avarage_pass = round($total_pass_mark / $subject_count, 2);
                                            $avarage = round($total_student_mark / $subject_count, 2);
                                        @endphp
                                        {{ $avarage }} / {{ $avarage_pass }}
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
                @php
                    $student = App\Models\Student::where('user_id', Auth::user()->id)->first();
                    $collect = collect($ranked_students);
                    $search = $collect->where('student_id', $student->id);
                @endphp

                <div class="md:flex md:items-center py-8 md:justify-between">
                    <div class="flex-1 min-w-0">
                        @foreach ($search as $key => $node)
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                                Congratulation! Your rank is {{ $key + 1 }} out of
                                {{ count($ranked_students) }} students
                            </h2>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Section -->
</body>

</html>
