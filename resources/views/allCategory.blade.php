@extends('index')
@section('content')



      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">All Categorie present here!!</p>
              

              <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Categorie Slug</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($allcategory as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->slug}}</td>
                 
                  <td>
                    <a href="{{url('single/category/edit/'.$row->id)}}" class="btn btn-success btn-block">Edit</a>
                    <a href="{{url('single/category/delete/'.$row->id)}}" class="btn btn-danger btn-block" id="delete" >delete</a>
                     <a href="{{url('single/category/view/'.$row->id)}}" class="btn btn-info btn-block">View</a>

                  </td>
                </tr>

                @endforeach
                
              </tbody>
            </table>



          </div>
        </div>

  


@endsection
