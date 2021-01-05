<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index()
    {
    	$category=DB::table('users')->get();
    	return view ('write',compact('category'));


    }

    public function index1()
    {
    	$allHome=DB::table('posts')
    	->join('users','posts.category_id','users.id')
    	->select('posts.*','users.name')
    	->paginate(3);
    	
    	return view ('index1',compact('allHome'));


    }

    public function addCategory()
    {
    	return view ('addCategory');


    }

    public function storeCategory(Request $request)
    {
            $validatedData = $request->validate([
			        'name' => 'required|unique:users|max:255|min:3',
			        'slug' => 'required|unique:users|max:255|min:3',
			    ]);






    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;

    	$insertCategory=DB::table('users')->insert($data);

    	if ($insertCategory) {?>
    		<script> alert('insert successfully') </script>
    		<?php
    	}else {?>

    		<script> alert('someting went wrong!!') </script>
    		<?php

    	}


    	return Redirect()->route('all.category');

    	

    }

    public function allCategory()
    {

    	$allcategory=DB::table('users')->get();



    	return view ('allCategory',compact('allcategory'));

    }

    public function viewCategory($id)
    {
    	$viewCategory=DB::table('users')->where('id',$id)->first();
    	return view('viewPost')->with('cat',$viewCategory);
    }

    public function deleteCategory($id)
    {
    	$deleteCategory=DB::table('users')->where('id',$id)->delete();

    	if ($deleteCategory) {?>
    		<script> alert('delete successfully') </script>
    		<?php
    	}else {?>

    		<script> alert('someting went wrong!!') </script>
    		<?php

    	}


    	return Redirect()->route('all.category');

    	
    }

    public function editCategory($id)
    {
    	$editCategory=DB::table('users')->where('id',$id)->first();
    	return view ("editeCategory")->with('edit',$editCategory);
    }

    public function editpostCategory(Request $request,$id)
    {
            $validatedData = $request->validate([
			        'name' => 'required|unique:users|max:255|min:3',
			        'slug' => 'required|unique:users|max:255|min:3',
			    ]);






    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;

    	$insertCategory=DB::table('users')->where('id',$id)->update($data);

    	if ($insertCategory) {?>
    		<script> alert('update successfully') </script>
    		<?php
    	}else {?>

    		<script> alert('someting went wrong!!') </script>
    		<?php

    	}


    	return Redirect()->route('all.category');

    	

    }


   public function WritePost(Request $request)
    {
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'dteails' => 'required',
             'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['dteails']=$request->dteails;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/fontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
             $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.post')->with($notification);
    	}else{
    		 DB::table('posts')->insert($data);
    		 $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
                 );
             return Redirect()->route('all.post')->with($notification);
    	}

    }


    public function allPostShow()
    {
    	
    	$allpost=DB::table('posts')
    	->join('users','posts.category_id','users.id')
    	->select('posts.*','users.name')
    	->get();

    	return view('allShowPost',compact('allpost'));
    }

    public function viewPost($id)
    {
    	$singleview=DB::table('posts')
    	->join('users','posts.category_id','users.id')
    	->select('posts.*','users.name')
    	->first();
    	return view('singleViewPost')->with('view',$singleview);

    }

    public function editPost($id)
    {
    	$category=DB::table('users')->get();
    	$posts=DB::table('posts')->where('id',$id)->first();

    	return view('editPost',compact('category','posts'));


    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'dteails' => 'required',
             'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['dteails']=$request->dteails;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/fontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
             $notification=array(
                'messege'=>'Successfully Post updated',
                'alert-type'=>'warning'
                 );
               return Redirect()->route('all.post')->with($notification);
    	}else{
    		$data['image']=$request->old_photo;
    		  DB::table('posts')->where('id',$id)->update($data);
    		 $notification=array(
                'messege'=>'Successfully Post updated',
                'alert-type'=>'warning'
                 );
             return Redirect()->route('all.post')->with($notification);
    	}

    }

     public function delete($id)
    {
    	
    	$posts=DB::table('posts')->where('id',$id)->first();
    	$image=$posts->image;


    	$deleteCategory=DB::table('posts')->where('id',$id)->delete();

    	if ($deleteCategory) {

    		unlink($image);

    		$notification=array(
                'messege'=>'Successfully Post delete',
                'alert-type'=>'warning'
                 );
               return Redirect()->route('all.post')->with($notification);
    		
    	}else {

    		$notification=array(
                'messege'=>'someting went wrong',
                'alert-type'=>'warning'
                 );
               return Redirect()->route('all.post')->with($notification);

    		

    	}


    	

    	
    }






}
