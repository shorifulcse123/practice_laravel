<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
    	return view('studentPost');
    }

    public function addStudentPost(Request $request)
    {
    	$request->validate([
		    'name' => 'required|max:255|min:3',
		    'email' => 'required|unique:students|max:255|min:6',
		    'phone' => 'required|unique:students|min:11|max:11',
		]);


		$student= new Student;
		$student->name=$request->name;
		$student->email=$request->email;
		$student->phone=$request->phone;
        

        if ($student->save()) {

        	$notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.student')->with($notification);
        	
        }else{

        	$notification=array(
                'messege'=>'Something went wrong',
                'alert-type'=>'danger'
                 );
                return Redirect()->route('all.student')->with($notification);

        }


    	
    }


    public function addStudentview()
    {
    	$student=Student::all();

    	return view('allStudentShow',compact('student'));
    }

    public function SingleStudentView($id)
    {
    	$SinglePost=Student::findorfail($id);
    	return view('singleStudentView',compact('SinglePost'));
    	
    }

    public function SingleStudentdelete($id)
    {
    	$student=Student::findorfail($id);

    	if ($student->delete()) {

        	$notification=array(
                'messege'=>'Successfully Post Deleted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.student')->with($notification);
        	
        }else{

        	$notification=array(
                'messege'=>'Something went wrong',
                'alert-type'=>'danger'
                 );
                return Redirect()->route('all.student')->with($notification);

        }

    	
    	
    }

    public function SingleStudentedit($id)
    {
    	$student=Student::findorfail($id);
    	return view ('editStudentPost',compact('student'));


    }


    public function SingleStudentupdate(Request $request,$id)
    {
    	$request->validate([
		    'name' => 'required|max:255|min:3',
		    'email' => 'required|unique:students|max:255|min:6',
		    'phone' => 'required|unique:students|min:11|max:11',
		]);


		$student=Student::findorfail($id);
		$student->name=$request->name;
		$student->email=$request->email;
		$student->phone=$request->phone;
       

        if ($student->save()) {

        	$notification=array(
                'messege'=>'Successfully Post updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.student')->with($notification);
        	
        }else{

        	$notification=array(
                'messege'=>'Something went wrong',
                'alert-type'=>'danger'
                 );
                return Redirect()->route('all.student')->with($notification);

        }


    	
    }

}
