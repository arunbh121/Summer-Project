<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Servce;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create(){
        return view('backend.service.create');
    }

   public function store(ServiceRequest $request){
//       dd($request->all());
       $file=$request->file('image_file');
       $request->request->add(['created_by'=> auth()->user()->id]);
       $fileName = time().'.'.$file->getClientOriginalName();
       //dd($fileName);
       $file->move(public_path('uploads'),$fileName);
       $request->request->add(['feature_image'=>$fileName]);
       $data['row']=Service::create($request->all());
       if($data['row']) {
           $request->session()->flash('success','successfully created');
       }
       else{
           $request->session()->flash('error','Error in creating room');
       }
       return redirect()->route('service.index');
   }

    public function index()
    {
        $data['rows'] = Service::all();
        return view('backend.service.index', compact('data'));
    }

    public function show($id)
    {

        $data['row'] = Service::find($id);
        return view('backend.service.show', compact('data'));

    }

    public function edit($id)
    {
        $data['row'] = Service::find($id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('room.index');
        }
        return view('backend.service.edit', compact('data'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $data['row'] = Service::find($id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('room.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', ' Update successfully');
        } else {
            $request->session()->flash('error', ' Update failure');
        }
        return redirect()->route('service.index');
    }

    public function destroy($id)
    {
        $data['row'] = Service::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Deleted Successfully');
            } else {
                request()->session()->flash('error', 'Delete Failed');
            }
            return redirect()->route('service.index');

        }
    }
}
