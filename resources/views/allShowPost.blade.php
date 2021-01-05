@extends('index')
@section('content')



      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">All Post present here!!</p>
              

              <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Category id</th>
                  <th scope="col">Post title</th>
                  <th scope="col">Post image</th>
                 
                  <th scope="col">Post details</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($allpost as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->title}}</td>
                  <td><img width="50px;" height="50px;" src="{{URL::to($row->image)}}"></td>

                  <td>{{$row->dteails}}</td>
                 
                  <td>
                    <a href="{{url('Edit/post/'.$row->id)}}" class="btn btn-success btn-block">Edit</a>
                    <a href="{{url('delete/post/'.$row->id)}}" class="btn btn-danger btn-block" id="delete" >delete</a>
                     <a href="{{url('View/post/'.$row->id)}}" class="btn btn-info btn-block">View</a>

                  </td>
                </tr>

                @endforeach
                
              </tbody>
            </table>



          </div>
        </div>

  


@endsection
