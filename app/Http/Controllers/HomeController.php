<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor =doctor::all();
                
                return view('user.home',compact('doctor'));
            }
            else{
                $doctor =doctor::all();
                return view('admin.home',compact('doctor'));
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctor =doctor::all();
            return view('user.home',compact('doctor'));
        }
    }
    public function appointment(Request $request)
    {
        $appointment=new appointment;
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->date=$request->date;
        $appointment->doctor=$request->doctor;
        $appointment->phone=$request->phone;
        $appointment->message=$request->message;
        $appointment->status='In progress';

        if(Auth::id()){
        $appointment->user_id=Auth::user()->id;
        }
        $appointment->save();

        return redirect()->back()->with('mmm','Appointment Request Sucessful .we will contact with you soon');

    }
    public function myappointment()
    {
        if(auth::id()){
            return view('user.my_appointment');
        }
    return redirect()->back();
        
    }
    public function getdata()
    {
        $data=Appointment::select('*')->where('user_id',Auth::user()->id);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('cancel appointment',function($row){
            return $btn='<a id="deletebtn" data-id="'.$row->id.'"class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal">Cancel</a>
            ';
        })
        ->rawColumns(['cancel appointment'])

        ->make(true);

    }
    public function delete_appointment(Request $request)
    {
        Appointment::where('id',$request->id)->delete();
        return redirect()->back();
    }
}
