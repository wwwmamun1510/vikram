<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

    public function getData(){
        try{
          
           $student = Student::all();
           return \response([
   
              'students_information'=>$student,
              'my_message'=>'my_message is Clear',
             ]);
          }catch(Exception $ex){
            return \response([
   
               'message' => $ex->getMessage()
   
               ]);
             }
          }
          public function storeData(Request $request){

            try{
             $student = new Student();
             $student->candidate_name = $request->candidate_name;
             $student->roll = $request->roll;
             $student->address = $request->address;
             if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $picture = \date('His').'-'.$filename;
                $file->move('public/uploads/new/', $picture);
                $student->image = $filename;
            }
             $student->save();
             return response([
                 'message' => 'Student List Created Successfully!!!',
                 'student' => $student
             ]);
     
         }catch(Exception $ex){
             return redirect([
                 'message' => $ex->getMessage()
             ]);
         }
     }
    public function updateData(Request $request , $id){
    try {
        
        $student = Student::find($id);
        $student->candidate_name = $request->candidate_name;
        $student->roll = $request->roll;
        $student->address = $request->address;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $picture = \date('His').'-'.$filename;
            $file->move('public/uploads/new/', $picture);
            $student->image = $filename;
        }
        $student->update();
        return \response([
            'message'=>'Student List updated Successfully!!!',
            'student'=>$student
        ]);
    } catch (\Throwable $th) {
        return \response([
            'message'=>$th->getMessage()
        ]);
    }
}

public function deleteData($id)
{
    try {
        $student = Student::find($id)->delete();

        return \response([
            'message'=>'Student deleted Successfully!!!'
        ]);
    } catch (\Throwable $th) {
        return \response([
            'message'=>$th->getMessage()
        ]);
    }
}
public function uploadImage(Request $request)
{
    try {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $picture = \date('His').'-'.$filename;
            $file->move('public/uploads/new/', $picture);
            return \response([
                'message'=>'Image uploaded Successfully!!!',
                'file'=>$picture
            ]);
        }else{
            return \response([
                'message'=>'Select image first'
            ]);
        }
    } catch (\Throwable $th) {
        return \response([
            'message'=> $th->getMessage()
        ]);
    }
}

public function index()
    {
        $student = Student::all();
        return view('admin.Students.index', compact('student'));
    }

    public function store(Request $request)
    {
        $student= new  Student;
        $student->candidate_name = $request->input('candidate_name');
        $student->roll = $request->input('roll');
        $student->address = $request->input('address');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $student->image = $filename;
        }
        $student->save();
        return redirect()->back()->with('status','Student Added Successfully!!!');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.Students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student =  Student::find($id);
        $student->candidate_name = $request->input('candidate_name');
        $student->roll = $request->input('roll');
        $student->address = $request->input('address');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/images/', $filename);
            $student->image = $filename;
        }
        $student->update();
        return redirect()->back()->with('status','Student Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfully!!!');
    }


}
