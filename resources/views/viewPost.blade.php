@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>

        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">This is singleview page!!</p>

             
              
              <ul>
                <li><b>Category Name:</b>  {{$cat->name}}</li>
                <hr>
                <li><b>Category Slug:</b>  {{$cat->slug}}</li>
                

              </ul>

              
              


              



          </div>
        </div>

  
</div>

@endsection
