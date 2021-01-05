@extends('index')
@section('content')



      <a href="{{route('student')}}" class="btn btn-danger">Add Student</a>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">All Student Information is here!!</p>
              

              <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th scope="col">Serial No.</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Student Email</th>
                  <th scope="col">Student Phone</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                @foreach($student as $row)

               
                <tr>

                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->phone}}</td>
                  <td>
                    <a href="{{url('edit/student/'.$row->id)}}" class="btn btn-success btn-block">Edit</a>
                    <a href="{{url('delete/student/'.$row->id)}}" class="btn btn-danger btn-block" id="delete" >delete</a>
                     <a href="{{url('View/student/'.$row->id)}}" class="btn btn-info btn-block">View</a>

                  </td>
                </tr>

                @endforeach

              
                
              </tbody>
            </table>



          </div>
        </div>

  


@endsection
