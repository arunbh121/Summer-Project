<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use App\Models\Staff;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    public function create()

    {
        return view('backend.roomType.create');
    }

   public function store(Request $request){

       $request->request->add(['created_by'=>auth()->user()->id]);
       $row = RoomType::create($request->all());
       if ($row) {
           $request->session()->flash('success', 'Staff Added successfully');
       } else {
           $request->session()->flash('error', 'Failed to insert Staff');
       }
       return redirect()->route('roomType.index');
   }

    public function index()
    {
        $data['rows'] = RoomType::all();
        return view('backend.roomType.index', compact('data'));
    }

    public function show($id)
    {

        $data['row'] = RoomType::find($id);
        return view('backend.roomType.show', compact('data'));
    }

    public function edit($id)
    {
        $data['row'] = RoomType::find($id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('roomType.index');
        }
        return view('backend.roomType.edit', compact('data'));
    }

    public function update(RoomTypeRequest $request, $id)
    {
        $data['row'] = RoomType::find($id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('roomType.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Room update successfully');
        } else {
            $request->session()->flash('error', 'Room update failure');
        }
        return redirect()->route('roomType.index');
    }
    public function destroy($id)
    {
        $data['row'] = RoomType::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Deleted Successfully');
            } else {
                request()->session()->flash('error', 'Delete Failed');
            }
            return redirect()->route('roomType.index');

        }
    }
}
