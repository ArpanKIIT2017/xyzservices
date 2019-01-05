@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available Service Professionals</div>

                <div class="card-body">
                    @foreach ($serviceProList as $item)
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $item->email }}</h6>
                                <p class="card-text">Sample Description goes here...</p>
                                <form action="services" method="POST" class="form-inline">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="service_pro_id" value="{{ $item->id }}">
                                    <div class="form-group md-4 mb-2">
                                        <input type="date" class="form-control" name="date" id="date" placeholder="Date">
                                    </div>
                                    <Button type="submit" style="margin-left: 2%" class="btn btn-outline-primary mb-2" value="Hire">Hire</Button>
                                </form>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
