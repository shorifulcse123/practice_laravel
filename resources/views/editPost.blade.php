@extends('index')
@section('content')

<div class="container">

      <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
      <a href="{{route('all.post')}}" class="btn btn-success">All Post</a>

        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <p class="text-success">Please,give your information under the form!!</p>
             
             <hr>
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif

              

             <form action="{{ url('update/'.$posts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Title</label>
             <input type="text" class="form-control"  name="title" value="{{$posts->title}}"  >
           </div>
         </div>
         <br>
          <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Category</label>
            <select class="form-control" name="category_id">
              @foreach($category as $row)
              <option value="{{ $row->id }}" <?php if($row->id == $posts->category_id) echo "selected"; ?>>{{ $row->name }}</option>
              @endforeach
            </select>
           </div>
         </div>
         <br>
         <div class="control-group">
           <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>Post Image</label>
             <input type="file" class="form-control"  name="image">
             <h6>Old image:</h6>
             <img width="100px;" height="100px;" src="{{URL::to($posts->image)}}">
             <input type="hidden" name="old_photo" value="{{$posts->image}}">
             
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Details</label>
             <textarea rows="5" class="form-control"  name="dteails" >{{$posts->dteails}}</textarea>
            
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
         </div>
       </form>
     </div>
   </div>
</div>

  
</div>

@endsection
