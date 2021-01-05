@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
      <a href="{{route('all.student')}}" class="btn btn-success">All Students</a>


        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">Please,give your information under the form!!</p>
              
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              


              <form action="{{route('store.student')}}" method="post">

                @csrf
              <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Student Name</label>
                    <input type="text" class="form-control" placeholder="Student name..." name="name" >
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group floating-label-form-group controls">
                    <label>Student Email</label>
                    <input type="email" class="form-control" placeholder="Student email..." name="email" >
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group floating-label-form-group controls">
                    <label>Student Phone</label>
                    <input type="tel" class="form-control" placeholder="Student Phone Number..." name="phone" >
                    <p class="help-block text-danger"></p>
                  </div>


                  
              </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Insert</button>
              </form>



          </div>
        </div>

  
</div>

@endsection
