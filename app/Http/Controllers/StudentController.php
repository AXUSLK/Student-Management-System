<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Lov;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('firstName', 'LastName', 'studentGender')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Lov::where('lov_category_id', 2)->get();
        $courses = Lov::where('lov_category_id', 1)->get();
        return view('students.create', compact('genders', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->email_verified_at = Carbon::now();
        $userData = $user->save();

        if ($userData) {
            $student = new Student();
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->gender = $request->gender;
            $student->course_id = $request->course;
            $student->user_id = $user->id;
            $student->created_by = Auth::user()->id;
            $student->save();
        }
        return redirect()->route('students.index')
            ->with('success', 'Student registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('studentSubject')->find($id);
        $student_subjects = $student->studentSubject;
        return view('students.show', compact('student', 'student_subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $genders = Lov::where('lov_category_id', 2)->get();
        $courses = Lov::where('lov_category_id', 1)->get();
        return view('students.edit', compact('student', 'genders', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $user = User::find($student->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->email_verified_at = Carbon::now();
        $userData = $user->save();

        if ($userData) {
            $student = Student::find($student->id);
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->gender = $request->gender;
            $student->course_id = $request->course;
            $student->status = $request->status == null ? false : true;
            $student->user_id = $user->id;
            $student->updated_by = Auth::user()->id;
            $student->save();
        }
        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }

    /**
     * Get assing the specified resource to this.
     */
    public function getAssignSubjects(Student $student)
    {
        $subjects = Subject::active()->get();
        $studentSubjects = DB::table("student_subject")->where("student_subject.student_id", $student->id)
            ->pluck('student_subject.subject_id', 'student_subject.subject_id')
            ->all();
        return view('students.partials.assign', compact('student', 'subjects', 'studentSubjects'));
    }

    /**
     * Assing the specified resource to this.
     */
    public function postAssignSubjects(Request $request, Student $student)
    {
        $this->validate($request, [
            'subjects' => 'required',
        ]);

        $attach_student_subjects = $student->studentSubject()->sync($request->subjects);
        if ($attach_student_subjects) {
            $student_subjects = $student->studentSubject;
        }
        return redirect()->route('students.show', compact('student', 'student_subjects'));
    }
}
