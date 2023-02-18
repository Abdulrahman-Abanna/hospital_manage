<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Psy\CodeCleaner\FunctionContextPass;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }
            
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function uploade(Request $request)
    {


        $doctor=new Doctor;
        $image=$request->file('image');
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file('image')->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->speciality;
        $doctor->room=$request->room;
        $doctor->save();
        return redirect()->back()->with('message','Add Doctor sucessfull');


    }
    public function showappointment()
    {
        if(auth::id()){
            if(auth::user()->usertype==1){
                return view('admin.show_appointment');
            }
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function getshowappointmet()
    {
    
        $data=Appointment::select('*');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('accept',function($row){
            return $btn='<a href="'.Route('acceptappointment',$row->id).'" class="edit btn btn-success btn-sm">Accept</a>';
        })

        ->addColumn('cancel',function($row){
            return $btn='<a href="'.Route('cancelappointment',$row->id).'" class="edit btn btn-danger btn-sm">Cancel</a>';
        })

        ->addColumn('send_mail',function($row){
            return $btn='<a href="'.Route('send_email',$row->id).'" class="btn btn-primary btn-rounded btn-icon "><i class="mdi mdi-email-open"></i></a>';
        })
        ->rawColumns(['accept','cancel','send_mail'])

        ->make(true);
    }
    public function acceptappointment($id)
    {
        $data=appointment::find($id);
        $data->status='Accepted';
        $data->save();
        return redirect()->back();
    }

    public function cancelappointment($id)
    {
        $data=appointment::find($id);
        $data->status='Cancel';
        $data->save();
        return redirect()->back();
    }
    public function showdoctors()
    {
        if(auth::id()){
            if(auth::user()->usertype==1){
                return view('admin.show_doctors');

            }
            return redirect()->back();
            }
            return redirect()->back();

    }
    public function getdatadoctor()
    {
        $data=Doctor::select('*');
        return Datatables::of($data)
        ->addColumn('images',function($row){
            return $img= '<img src="'.asset('doctorimage/'.$row->image.'').'">';
        })
        ->addColumn('delete',function($row){
            return $btn='<a href="'.Route('delete_doctor',$row->id).'" class="edit btn btn-danger">Delete</a>';
        })

        ->addColumn('updata',function($row){
            return $btn='<a href="'.Route('edit_doctor',$row->id).'" class="edit btn btn-primary btn-sm">Updata</a>';
        })
        ->rawColumns(['images','delete','updata'])
        ->make(true);
    }
    public function edit_doctor($id)
    {
        if(auth::id()){
            if(auth::user()->usertype==1){
                $doctor=Doctor::find($id);
                return view('admin.updata_doctor',compact('doctor'));
        
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function updatadoctor(Request $request,$id)
    {
        $data=Doctor::find($id);
        // dd($data);
        if($image=$request->file('image')){
            $nameimage=time().'.'.$image->getClientOriginalExtension();
            $request->file('image')->move('doctorimage',$nameimage);
            $data->image=$nameimage;
        }
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->specialty=$request->speciality;
        $data->room=$request->room;
        $data->save();

        return redirect()->route('show_doctor')->with('message','The Updata Sucssesful');
    }

    public function deletedoctor($id)
    {
            $data= Doctor::find($id);
            $data->delete();
            return redirect()->back();
    }
    public function sendemail($id)
    {
        if(auth::id()){
            if(auth::user()->usertype==1){
                $data=Appointment::find($id);
                return view('admin.send_email',compact('data'));
            }
            return redirect()->back();
        }
        return redirect()->back();

    }

    public function sendemailnotification(Request $request,$id)
    {

        $data=Appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'action_text'=>$request->action_text,
            'action_url'=>$request->action_url,
            'end_part'=>$request->end_part,
        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email Sucsseful send ');
    }

}
