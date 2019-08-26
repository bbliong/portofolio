@extends('layouts.admin')


@section('css')

@endsection


@section('content')
<div class="wrap">
	<h1> Pekerjaan </h1>
	<br>
	<form action="{{route('store-blog')}}" method="post" enctype="multipart/form-data">
		@csrf
	  <div class="form-row">
	  	 <div class="form-group col-md-6">
	      <label for="url">Title</label>
	      <input type="text" class="form-control" id="title" placeholder="title" name="title">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="npsn">Kategori</label>
	        <select  class="form-control" id="Kategori" name="kategori">
				@foreach ($kategoris as $kategori)
				    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
				@endforeach
		    </select>
	    </div>
	    <div class="form-group col-md-12">
	      <label for="thumnails"></label>
	      <input type="file" class="form-control" id="thumbnail" placeholder="thumbnail" name="thumbnail">
	    </div>
	    <div class="form-group col-md-12">
	    	   <textarea name="description" id="editor"></textarea>
	    </div>
	  </div>	  
	  <button type="submit" class="btn btn-primary">Tambah</button>
	 
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
