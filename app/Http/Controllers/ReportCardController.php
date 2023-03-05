<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class ReportCardController extends Controller
{
    public function show()
    {
        $total_pass_mark = 0;
        $total_student_mark = 0;
        $student = Student::where('user_id', Auth::user()->id)->first();
        $student_subjects = DB::table("student_subject")
            ->where("student_subject.student_id", $student->id)
            ->whereNotNull('mark')
            ->get();
        $subject_count = Count($student_subjects);

        $rank_students = DB::table("student_subject")
            ->where("student_subject.student_id", $student->id)
            ->whereNotNull('mark')
            ->get();
        return view('report-card.show', compact('student', 'student_subjects', 'total_pass_mark', 'total_student_mark', 'subject_count'));
    }
}
