<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $data['rows'] =  Offer::all();
        return view('backend.offer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.offer.create');
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
        $row = Offer::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Offer Added successfully');
        } else {
            $request->session()->flash('error', 'Failed to insert offer');
        }
        return redirect()->route('offer.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row']=Offer::find($id);
        return view('backend.offer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Offer::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('offer.index');
        }
        return view('backend.offer.edit', compact('data'));
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
        $data['row'] = Offer::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('offer.index');
        } if ($data['row']->update($request->all())) {
        $request->session()->flash('success', 'Offer updated successfully');
    } else {
        $request->session()->flash('error', 'Offer update failed');
    }
        return redirect()->route('offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Offer::find($id);
        if ($data['row']) {
            if($data['row']->delete()){
                request()->session()->flash('success', 'Deleted Successfully');
            } else {
                request()->session()->flash('error', 'Delete Failed');
            }
        }
        return redirect()->route('offer.index');
    }
}
