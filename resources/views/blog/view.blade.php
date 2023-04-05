@extends('layouts.app')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.6.2/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@section('content')

<style>
    .flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
</style>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div> 
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="width:400px;text-align:justify;">
                <img class="card-img-top" src="{{ $blog->image }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $blog->title }}
                    </h4>
                    
                    <p class="card-text">
                        {{ $blog->body }}
                    </p>

                    <span style="color:cornflowerblue; font-size: 14px;">
                        Posted: {{ date('M d, Y', strtotime($blog->created_at)) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
