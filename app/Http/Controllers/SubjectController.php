<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasAnyRole(['Admin', 'Teacher'])) {
            $subjects = Subject::get();
        } elseif ($user->hasAnyRole(['Student'])) {
            $subjects = Subject::active()
                ->with('studentMark')
                ->whereHas(
                    'studentMark',
                    function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    }
                )
                ->get();
        }
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->pass_mark = $request->mark;
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::with('studentMark')->find($id);
        $student_marks = $subject->studentMark;
        if (Auth::user()->hasAnyRole(['Student'])) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            $subjectMark = DB::table("student_subject")
                ->where("student_subject.student_id", $student->id)
                ->where("student_subject.subject_id", $id)
                ->first();
        } else {
            $subjectMark = null;
        }

        return view('subjects.show', compact('subject', 'student_marks', 'subjectMark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, $id)
    {
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->pass_mark = $request->mark;
        $subject->status = $request->status == null ? false : true;
        $subject->updated_by = Auth::user()->id;
        $subject->update();
        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }

    /**
     * Get assing the specified resource to this.
     */
    public function getAddMarks(Request $request, Subject $subject, Student $student)
    {
        $subjectMark = DB::table("student_subject")
            ->where("student_subject.student_id", $student->id)
            ->where("student_subject.subject_id", $subject->id)
            ->first();
        return view('subjects.partials.mark', compact('subject', 'student', 'subjectMark'));
    }

    /**
     * Assing the specified resource to this.
     */
    public function postAddMarks(Request $request, Subject $subject, Student $student)
    {
        $this->validate($request, [
            'mark' => 'required',
        ]);
        $subjectMark = DB::table("student_subject")
            ->where("student_subject.student_id", $student->id)
            ->where("student_subject.subject_id", $subject->id)
            ->update(['mark' => $request->mark]);
        $student_marks = $student->studentMark;
        if ($subjectMark) {
            return redirect()->route('subjects.show', compact('subject', 'student_marks'));
        } else {
            abort('404');
        }
    }
}
