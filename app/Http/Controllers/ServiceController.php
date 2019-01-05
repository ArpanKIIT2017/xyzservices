<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ServiceRequest;
use App\RequestStatus;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceRequest = new ServiceRequest();

        $serviceRequest->customer_id = $request->input('customer_id');
        $serviceRequest->service_pro_id = $request->input('service_pro_id');
        $serviceRequest->status_id = $request->input('status_id');
        $serviceRequest->date = $request->input('date');

        $serviceRequest->status_id = RequestStatus::where('status_name' , 'NEW')->first()->id;
        $serviceRequest->save();

        $request->session()->flash('message', 'Successfully Created Service Request !!');
        $request->session()->flash('alert-class', 'alert-success'); 
        return redirect('/customer_home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $serviceRequest = ServiceRequest::find($id);

        $serviceRequest->status_id = RequestStatus::where('status_name' , 'ONGOING')->first()->id;
        $serviceRequest->save();

        $request->session()->flash('message', 'Successfully Updated Service Request !!');
        $request->session()->flash('alert-class', 'alert-success'); 
        return redirect('/service_home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function complete(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::find($id);

        $serviceRequest->status_id = RequestStatus::where('status_name' , 'HIRED')->first()->id;
        $serviceRequest->save();
        
        $request->session()->flash('message', 'Successfully Updated Service Request !!');
        $request->session()->flash('alert-class', 'alert-success'); 
        return redirect('/service_home');

    }
}
