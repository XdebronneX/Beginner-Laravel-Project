@extends('layouts.master')
@section('content')
<style>
span{
  color: #00008B; /* lime */
}
</style> 
  @foreach($services->chunk(10) as $itemservice)
        <div class="row">
             @foreach($itemservice as $service)
                <div class="col-sm-6 col-md-4">
<div class="thumbnail">
  <img src="{{ asset('images/'.$service->img_path) }}" width ="180" height="180" class="img-circle">
  <h3><center><strong><span>{{$service->service_name}}</span></strong></center>
                        </h3>
                        {{-- <center><a href="#" class="btn btn-primary" role="button">View Details</a> </center> --}}
                        {{-- <center><a href="{{ route('reviews.create') }}" class="btn btn-primary" role="button">View Details</a> </center> --}}

                        <center><a href="{{route('reviews.showServices',$service->service_id)}}" class="btn btn-primary" role="button">View Details</a> </center>

</div>
<div class="caption"> 
                 
  </div> 
  </div>
{{--   </div>  --}}        
    @endforeach     
  @endforeach        
@endsection
