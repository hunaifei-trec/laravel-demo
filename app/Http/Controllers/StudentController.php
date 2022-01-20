<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function lists(Request $request)
    {
        $conditions = [' 1=1 '];
        $params = [];

        $search = "";
        $search = $request->input('Student');
        if(!empty($search['name'])) {
            $conditions[] = ' name = :name ';
            $params[':name'] = $search['name'];
        }

        if(!empty($search['age'])) {
            $conditions[] = ' age = :age ';
            $params[':age'] = $search['age'];
        }

        $students = Student::whereRaw(implode('and', $conditions), $params)->paginate(5);
        return view('student.lists', [
            'students' => $students,
        ]);
    }

    public function create(Request $request)
    {
        $student = new Student();

        if ($request->isMethod('POST')) {

            $validator = \Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20|unique:students,name',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'unique' => ':attribute cannot be repeated',
                'required' => ':attribute is required',
                'min' => ':attribute length does not meet the requirements',
                'integer' => ':attribute must be an integer',
            ], [
                'Student.name' => 'name',
                'Student.age' => 'age',
                'Student.sex' => 'sex',
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $data = $request->input('Student');

            if (Student::create($data) ) {
                return redirect('student/lists')->with('success', 'Create Success');
            } else {
                return redirect()->back();
            }
        }

        return view('student.create', [
            'student' => $student
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->input('Student');

        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];

        if ($student->save()) {
            return redirect('student/lists');
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20|unique:students,name,' . $student->id,
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'unique' => ':attribute cannot be repeated',
                'required' => ':attribute is required',
                'min' => ':attribute length does not meet the requirements',
                'integer' => ':attribute must be an integer',
            ], [
                'Student.name' => 'name',
                'Student.age' => 'age',
                'Student.sex' => 'sex',
            ]);

            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];

            if ($student->save()) {
                return redirect('student/lists')->with('success', 'Update Success:' . $id);
            }
        }

        return view('student.update', [
            'student' => $student
        ]);
    }


    public function detail($id)
    {
        $student = Student::find($id);

        return view('student.detail', [
            'student' => $student
        ]);
    }

    public function delete($id)
    {

        $student = Student::find($id);

        if ($student->delete()) {
            return redirect('student/lists')->with('success', 'Delete Success:' . $id);
        } else {
            return redirect('student/lists')->with('error', 'Delete Fail:' . $id);
        }
    }
}