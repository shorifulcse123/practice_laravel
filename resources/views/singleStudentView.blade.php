@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
      <a href="{{route('all.post')}}" class="btn btn-success">All Post</a>
      <a href="{{route('all.student')}}" class="btn btn-warning">All Student</a>

        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">This is singleview post page!!</p>

             
              
              <ul>
                <li><b>Student Name:</b>  {{$SinglePost->name}}</li>
                <hr>
                <li><b>Student Email:</b>  {{$SinglePost->email}}</li>
                <hr>
                <li><b>Student Phone:</b>  {{$SinglePost->phone}}</li>
                
                
                
                

              </ul>

              
              


              



          </div>
        </div>

  
</div>

@endsection
