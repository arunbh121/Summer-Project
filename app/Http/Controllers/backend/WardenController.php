<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\WardenRequest;
use App\Models\Warden;
use Illuminate\Http\Request;

class WardenController extends Controller
{
    public function create()
    {
        return view('backend.warden.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $row = Warden::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Warden created successfully');
        } else {
            $request->session()->flash('error', 'Failed to insert warden');
        }
        return redirect()->route('warden.index');
    }

    public function index()
    {
        $data['rows'] = Warden::all();
        return view('backend.warden.index',compact('data'));
    }

    public function show($id)
    {
        $data['row'] = Warden::find($id);
        return view('backend.warden.show', compact('data'));
    }

    public function edit($id)
    {
        {
            $data['row'] = Warden::find($id);
            if (!$data ['row']) {
                request()->session()->flash('error', 'Invalid Request');
                return redirect()->route('warden.index');
            }
            return view('backend.warden.edit', compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $data['row'] = Warden::find($id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('warden.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Update Successfully');
        } else {
            $request->session()->flash('error', 'Update Failed');
        }
        return redirect()->route('warden.index');


    }

    public function destroy($id)
    {

        $data['row'] = Warden::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Deleted Successfully');
            } else {
                request()->session()->flash('error', 'Delete Failed');
            }
        }
        return redirect()->route('warden.index');
    }
}
