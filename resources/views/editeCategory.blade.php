@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>

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
              


              <form action="{{url('edit/category/'.$edit->id)}}" method="post">

                @csrf
              <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="category name..." name="name" value="{{$edit->name}}" >
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Category Slug</label>
                    <input type="text" class="form-control" placeholder="Slug name..." name="slug"value="{{$edit->slug}}" >
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
              </form>



          </div>
        </div>

  
</div>

@endsection
