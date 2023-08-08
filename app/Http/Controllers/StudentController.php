<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();
        return view('students.list', compact('students'));
    }

    public function add(StudentRequest $request)
    {
//        if ($request->isMethod('post')) {
//            if ($request->hasFile('image') && $request->file('image')->isValid()) {
//                $request->image = uploadFile('image', $request->file('image'));
//            }
//            $params = $request->except('_token');
//            $params['image'] = $request->image;
//            $student = Student::create($params);
//            if ($student->id) {
//                Session::flash('success', 'thêm thành cong');
//            }
//        }
//        return view('students.add');
        if($request->isMethod('post')){
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $request->image=uploadFile('image',$request->file('image'));
            }
            $params=$request->except('_token');
            $params['image']=$request->image;
            $student=Student::create($params);
            if($student->id){
                Session::flash('success','thêm thành công');
            }
        }
        return view('students.add');
    }

    public function edit(StudentRequest $request, $id)
    {
//        $student = DB::table('students')
//            ->where('id', $id)->first();
//        if ($request->isMethod('POST')) {
//            $params = $request->except('_token');
//            if ($request->hasFile('image') && $request->file('image')->isValid()) {
//                //xóa ảnh cũ
//                $resultDL = Storage::delete('/public/' . $student->image);
//                if ($resultDL) {
//                    $request->image = uploadFile('image', $request->file('image'));
//                    $params['image'] = $request->image;
//                }
//            } else {//nếu ko thay đổi
//                $params['image'] = $student->image;
//            }
//            $result = Student::where('id', $id)->update($params);
//            if ($result) {
//                Session::flash('success', 'sửa thành công');
//               return redirect()->route('edit-student', ['id' => $id]);
//            }
//        }
        $student=DB::table('students')->where('id',$id)->first();
        if($request->isMethod('post')){
            $params=$request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDl=Storage::delete('/public/'.$student->image);
                if($resultDl){
                    $request->image=uploadFile('image',$request->file('image'));
                    $params['image']=$request->image;
                }
                else{
                    $params['image']=$student->image;
                }
            }
            $result=Student::where('id',$id)->update($params);
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('edit-student',['id'=>$id]);
            }
        }
        return view('students.edit', compact('student'));
    }

    public function delete(Request $request, $id)
    {
//        $studentDL = Student::where('id', $id)->delete();
        $studentDL=DB::table('students')->where('id',$id)->delete();
//        if($studentDL){
            Session::flash('success', 'Xóa khách hàng thành công');
//        }
        return redirect()->route('list-student');
    }
}
