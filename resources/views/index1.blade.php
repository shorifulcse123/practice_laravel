@extends('index')
@section('content')

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

         @foreach($allHome as $row)
        
        <div class="post-preview">
          <a href="post.html">

           
            <h2 class="post-title">
              {{$row->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$row->name}}
            </h3>
            <img width="200px;" height="200px;" src="{{URL::to($row->image)}}">
          </a>
          <p>{{$row->dteails}}</p>
          <p class="post-meta">Posted by 
            <a href="#">admin</a>
            on September 24, 2019</p>
        </div>
        <hr>
        
        @endforeach
        {{$allHome->links()}}
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>

@endsection