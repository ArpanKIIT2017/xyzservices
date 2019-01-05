<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ServiceRequest;
use App\RequestStatus;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function customer()
    {
        $serviceProList = User::role('service_pro')->get();
        return view('customer_home')->with('serviceProList', $serviceProList);
    }

    public function service()
    {
        $new = RequestStatus::where('status_name', 'NEW')->first();
        $ongoing = RequestStatus::where('status_name', 'ONGOING')->first();
        $hired = RequestStatus::where('status_name', 'HIRED')->first();

        $newServiceRequests = ServiceRequest::where('service_pro_id', auth()->user()->id)->where('status_id', $new->id)->get();
        $ongoingServiceRequests = ServiceRequest::where('service_pro_id', auth()->user()->id)->where('status_id', $ongoing->id)->get();
        $hiredServiceRequests = ServiceRequest::where('service_pro_id', auth()->user()->id)->where('status_id', $hired->id)->get();

        return view('service_home')->with('newServiceRequests', $newServiceRequests)->with('ongoingServiceRequests', $ongoingServiceRequests)->with('hiredServiceRequests', $hiredServiceRequests);
    }
}
