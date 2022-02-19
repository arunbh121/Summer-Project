<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] =  Staff::all();
        return view('backend.staff.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $row = Staff::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Staff Added successfully');
        } else {
            $request->session()->flash('error', 'Failed to insert Staff');
        }
        return redirect()->route('staff.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row']=Staff::find($id);
        return view('backend.staff.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Staff::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('staff.index');
        }
        return view('backend.staff.edit', compact('data'));
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
        $data['row'] = Staff::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('staff.index');
        } if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Staff updated successfully');
        } else {
            $request->session()->flash('error', 'Staff update failed');
        }
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Staff::find($id);
        if ($data['row']) {
            if($data['row']->delete()){
                request()->session()->flash('success', 'Deleted Successfully');
            } else {
                request()->session()->flash('error', 'Delete Failed');
            }
        }
        return redirect()->route('staff.index');
    }
}
