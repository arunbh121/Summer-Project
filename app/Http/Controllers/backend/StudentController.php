<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
//    create
//    store
//    list
//    edit
//    update
//    delete/destroy

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['row'] = Room::all();
//        dd($data['row']);
        return view('backend.student.create',compact('data'));
    }

    public function store(Request $request)
    {
        $file=$request->file('image_file');
        $fileName = time().'.'.$file->getClientOriginalName();
        //dd($fileName);
        $file->move(public_path('uploads'),$fileName);
        $request->request->add(['feature_image'=>$fileName]);
        $data['row']=Student::create($request->all());
        if($data['row']) {
            $request->session()->flash('success','Student successfully created');
        }
        else{
            $request->session()->flash('error','Error in creating student');
        }
        return redirect()->route('student.index');

    }
    public function index()
    {
        $data['rows'] =  Student::all();
        return view('backend.student.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Student::find($id);
        return view('backend.student.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $data['row'] = Student::find($id);
            if (!$data ['row']) {
                request()->session()->flash('error', 'Invalid Request');
                return redirect()->route('student.index');
            }
            return view('backend.student.edit', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data['row'] = Student::find($id);
        if ($data['row']) {
            if($data['row']->delete()){
                request()->session()->flash('success', 'Deleted Successfully');
            }
            else {
                request()->session()->flash('error', 'Delete Failed');
            }

        }
        return redirect()->route('student.index');
    }
    }
