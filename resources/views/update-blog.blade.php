@extends('layouts.admin')


@section('css')
<style type="text/css">
	.thumb {
		width: 400px;
	}

</style>
@endsection


@section('content')
<div class="wrap">
	<h1> Pekerjaan </h1>
	<br>
	<form action="{{route('update-blog', $blog->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
	  <div class="form-row">
	  	<input type="hidden" name="id" value="{{$blog->id}}">
	  	 <div class="form-group col-md-6">
	      <label for="url">Title</label>
	      <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{$blog->title}}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="npsn">Kategori</label>
	        <select  class="form-control" id="Kategori" name="kategori"  value="{{$blog->kategori}}">
				@foreach ($kategoris as $kategori)
				    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
				@endforeach
		    </select>
	    </div>
	    <div class="form-group col-md-12">
	      <label for="thumnails"></label>
	      <input type="file" class="form-control" id="thumbnail" placeholder="thumbnail" name="thumbnail">
	    </div>
	    <p>Current Image</p>
	  	<img class="thumb" src="{{ ($blog->thumbnail !== '' && $blog->thumbnail !== null) ? Storage::url($blog->thumbnail) : Storage::url('work/no-image.png') }}">
	    <div class="form-group col-md-12">
	    	   <textarea name="description" id="editor">{{$blog->detail}}</textarea>
	    </div>
	  </div>	  
	  <button type="submit" class="btn btn-primary">Update</button>
	 
	</form>
</table>

</div>
@endsection


@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script type="text/javascript">
 ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
