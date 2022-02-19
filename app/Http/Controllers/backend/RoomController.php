<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create()
    {
        $data['rows'] = RoomType::all();
        return view('backend.room.create',compact('data'));
    }
    public function store(RoomRequest $request)
    {
//        dd($request->all());

        $file=$request->file('image_file');
        $request->request->add(['created_by'=> auth()->user()->id]);
        $fileName = time().'.'.$file->getClientOriginalName();
        //dd($fileName);
        $file->move(public_path('uploads'),$fileName);
        $request->request->add(['feature_image'=>$fileName]);
        $data['row']=Room::create($request->all());
        if($data['row']) {
            $request->session()->flash('success','Room successfully created');
        }
        else{
            $request->session()->flash('error','Error in creating room');
        }
        return redirect()->route('room.index');
    }
    public function index()
    {
        $data['rows'] =  Room::all();
//        $data['room_type'] = RoomType::find($data['row']->room_type_id);
//        dd($data['room']);
        return view('backend.room.index',compact('data'));
    }

    public function show($id)
    {
        $data['row']=Room::find($id);
        $data['room_type'] = RoomType::find($data['row']->room_type_id);
//        dd($data['room']);
        return view('backend.room.show',compact('data'));
    }
    public function edit($id)
    {
        $data['row'] = Room::find($id);
        $data['room_types'] = RoomType::all();
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('room.index');
        }
        return view('backend.room.edit', compact('data'));
    }
    public function update(RoomRequest $request, $id)
    {
        $data['row'] = Room::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('room.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Update successfully');
        }
        else {
            $request->session()->flash('error', 'Update failure');
        }
        return redirect()->route('room.index');
    }
    public function destroy($id)
    {
        $data['row'] = Room::find($id);
        $data['room_types'] = RoomType::all();
        if ($data['row']) {
            if($data['row']->delete()){
            request()->session()->flash('success', 'Deleted Successfully');
        }
        else {
            request()->session()->flash('error', 'Delete Failed');
        }
    }
        return redirect()->route('room.index');
}
}
