{{-- @extends('layouts.master')
@section('content')
<style >
    
body {
    background-color: #fff
}

.container {
    background-color: #eef2f5;
    width: 400px
}

.addtxt {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    font-size: 13px;
    width: 350px;
    background-color: #e5e8ed;
    font-weight: 500
}

.form-control: focus {
    color: #000
}

.second {
    width: 350px;
    background-color: white;
    border-radius: 4px;
    box-shadow: 10px 10px 5px #aaaaaa
}

.text1 {
    font-size: 13px;
    font-weight: 500;
    color: #56575b
}

.text2 {
    font-size: 13px;
    font-weight: 500;
    margin-left: 6px;
    color: #56575b
}

.text3 {
    font-size: 13px;
    font-weight: 500;
    margin-right: 4px;
    color: #828386
}

.text3o {
    color: #00a5f4
}

.text4 {
    font-size: 13px;
    font-weight: 500;
    color: #828386
}

.text4i {
    color: #00a5f4
}

.text4o {
    color: white
}

.thumbup {
    font-size: 13px;
    font-weight: 500;
    margin-right: 5px
}

.thumbupo {
    color: #17a2b8
}
</style>
 @foreach($services->chunk(2) as $itemservice)
<div class="card">
     @foreach($itemservice as $service)
    <div class="row">
        <div class="col-2"> <img src="{{ asset('images/'.$service->img_path) }}" width ="180" height="180" class="img-circle">
        <div class="col-10">
        <div class="comment-box ml-2">
           </div>
            <div class="comment-area"> 
                <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea> 
                    </div>
                </div>
                <div class="comment-btns mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="pull-left"> <button class="btn btn-success btn-sm">Cancel</button> </div>
                        </div>
                        <div class="col-6">
                            <div class="pull-right"> <button class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach     
  @endforeach  
@endsection --}}