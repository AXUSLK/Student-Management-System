<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $subject_count = count($student_subjects);

        $ranked_students = DB::table('student_subject')
            ->select('student_id', DB::raw('AVG(mark) as average_mark'))
            ->groupBy('student_id')
            ->orderBy('mark', 'desc')
            ->get();

        if ($subject_count > 0) {
            return view('report-card.show', compact('student', 'student_subjects', 'total_pass_mark', 'total_student_mark', 'subject_count', 'ranked_students'));
        } else {
            abort('404');
        }
    }

    public function createPDF()
    {
        $total_pass_mark = 0;
        $total_student_mark = 0;
        $student = Student::where('user_id', Auth::user()->id)->first();
        $student_subjects = DB::table("student_subject")
            ->where("student_subject.student_id", $student->id)
            ->whereNotNull('mark')
            ->get();
        $subject_count = count($student_subjects);

        $ranked_students = DB::table('student_subject')
            ->select('student_id', DB::raw('AVG(mark) as average_mark'))
            ->groupBy('student_id')
            ->orderBy('mark', 'desc')
            ->get();

        //   view()->share('employee', $data);
        $pdf = Pdf::loadView('report-card.pdf', compact('student', 'student_subjects', 'total_pass_mark', 'total_student_mark', 'subject_count', 'ranked_students'));
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
