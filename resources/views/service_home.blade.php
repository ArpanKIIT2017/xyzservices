@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Service Requests</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ongoing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Hired</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @if(!count($newServiceRequests))
                                <br>
                                You have no new requests.
                            @endif
                            @foreach ($newServiceRequests as $item)
                                <div class="card" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->date }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->customer->email }}</h6>
                                        <p class="card-text">
                                            <form action="services/{{$item->id}}" method="POST" class="form-inline">
                                                @csrf
                                                @method('put')
                                                <input type="submit" value="Accept" class="btn btn-outline-primary">
                                            </form>
                                        </p>
                                        
                                    </div>
                                </div>
                            @endforeach             
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @if(!count($ongoingServiceRequests))
                                <br>
                                You have no ongoing requests.
                            @endif
                            @foreach ($ongoingServiceRequests as $item)
                                <div class="card" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->date }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->customer->email }}</h6>
                                        <p class="card-text">
                                           You have accepted this request.
                                           <form action="services/completeService/{{$item->id}}" method="POST" class="form-inline">
                                                @csrf
                                                @method('put')
                                                <input type="submit" value="Done" class="btn btn-outline-primary">
                                            </form>
                                        </p>
                                        
                                    </div>
                                </div>
                            @endforeach           
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            @if(!count($hiredServiceRequests))
                                <br>
                                You have no completed requests.
                            @endif
                            @foreach ($hiredServiceRequests as $item)
                                <div class="card" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->date }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->customer->email }}</h6>
                                        <p class="card-text">
                                            Done...
                                        </p>
                                        
                                    </div>
                                </div>
                            @endforeach           
                        </div>
                    </div>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
