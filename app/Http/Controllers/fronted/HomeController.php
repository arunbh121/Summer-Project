<?php

namespace App\Http\Controllers\Fronted;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends FrontBaseController
{
    protected $folder = 'fronted.home';
    protected $title;
    function index()
    {
        $this->title = 'Home';
//        $data['total_room'] = Room::count();
        $data['row'] = Service::all();
        $data['room'] = Room::all();
        return view($this->__loadDataToView('fronted.home.index'),compact('data'));
    }
}
