@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
      <a href="{{route('all.post')}}" class="btn btn-success">All Post</a>

        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">This is singleview post page!!</p>

             
              
              <ul>
                <li><b>Post title:</b>  {{$view->title}}</li>
                <hr>
                <li><b>Post name:</b>  {{$view->name}}</li>
                <hr>
                <li><b>Post image:</b>  <img width="200px;" height="200px;" src="{{URL::to($view->image)}}"> </li>
                <hr>
                <li><b>Post details:</b>  {{$view->dteails}}</li>
                
                

              </ul>

              
              


              



          </div>
        </div>

  
</div>

@endsection
