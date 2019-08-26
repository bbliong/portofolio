@extends('layouts.admin')


@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

<style type="text/css">
	.thumb {
		width: 120px;
		height: 120px;
	    border-radius: 50%;
	    text-align: center;
	}
	.clear {
	  clear: both;
	  float: none;
	  width: 100%;
	}


	.container {
	  max-width: 1170px;
	  width: 100%;
	  padding-right: 15px;
	  padding-left: 15px;
	  margin-right: auto;
	  margin-left: auto;
	}

	.container .gallery a {
	      margin-left : 10px;
	}

	.container .gallery a img {
	  width: 18%;
	  margin :5px;
	  margin-left: 20px;
	  height: auto;
	  border: 2px solid #fff;
	  -webkit-transition: -webkit-transform .15s ease;
	  -moz-transition: -moz-transform .15s ease;
	  -o-transition: -o-transform .15s ease;
	  -ms-transition: -ms-transform .15s ease;
	  transition: transform .15s ease;
	  position: relative;
	}

	@media only screen and (max-width: 600px) {
	  .container .gallery a img {
	    width: 80%;
	  }
	}

	.delete {

	}
	.container .gallery a:hover img {
	  -webkit-transform: scale(1.05);
	  -moz-transform: scale(1.05);
	  -o-transform: scale(1.05);
	  -ms-transform: scale(1.05);
	  transform: scale(1.05);
	  z-index: 5;
	}

	.container .gallery a.big img {
	  width: 40%;
	  margin-left: 5px;
	}

	.align-center {
	  text-align: center;
	}

	.img-container {
		margin-right: 10px;
	}

	.img-container > button {
		position: absolute;
		padding: 5px 10px;
		border: 0px;
		border-radius: 50%;
		cursor: pointer;
	}

</style>
@endsection


@section('content')
<div class="wrap">
	<h1> Pekerjaan </h1>
	<br>
	 
	 <div class="row">
	 	<div class="col-md-12" style="text-align:center">
	 		 <p>Current Image</p>
	 		<img class="thumb" src="{{ ($work->thumbnail !== '' && $work->thumbnail !== null) ? Storage::url($work->thumbnail) : Storage::url('work/no-image.png') }}">
	 	</div>
	 </div>
	<form action="{{route('update-work', $work->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
	  <div class="form-row">
	  	<input type="hidden" name="id" value="{{$work->id}}">

	  	<div class="form-group col-md-6">
	      <label for="url">Title</label>
	      <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{$work->title}}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="url">URL</label>
	      <input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{$work->url}}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="npsn">Kategori</label>
	        <select  class="form-control" id="Kategori" name="kategori"  value="{{$work->kategori}}">
				@foreach ($kategoris as $kategori)
				    <option value="{{$kategori->id}}">{{$kategori->name}}</option>
				@endforeach
		    </select>
	    </div>
	    <div class="form-group col-md-6">
	      <label for="thumnails"></label>
	      <input type="file" class="form-control" id="thumbnail" placeholder="thumbnail" name="thumbnail">
	    </div>
	      <div class="form-group col-md-12">
	    	<textarea name="description" id="editor">{{$work->description}}</textarea>
	    </div>

	  </div>	  
	  <button type="submit" class="btn btn-primary">Update</button>
	  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	   Work Images
	  </button>
	</form>

	  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Work Images</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	         <div class="form-group col-md-12">
			      <form method="post" action="{{ route('image-store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
			      	@csrf
			      		 <input type="hidden" value="{{$work->id}}" name="work_id">
			      </form>
		    </div>
		     <div class="row">
			 	<div class="col-md-12">
			 		<div class="container">      
		                <div class="gallery col-md-10 col-md-offset-1" id="gallery">
		                    <h4>Your Work  Image{{$work->name}}</h4>
		                  @php
		                    $count = 1;
		                  @endphp
		                   @if($work->images->count())
		                      @foreach($work->images as $image) 
		                        @if($count  > 4)
		                        <div class="clear"></div>
		                        @endif
		                        <span class="img-container">
		                          <a href="{{Storage::url($image->url)}}" style="position: relative;"><img src="{{Storage::url($image->url)}}" alt="" title=""/></a>
		                         <button class="delete"  style="position:absolute;" class="deletePhoto" data-id="{{$image->id}}" >x</button>
		                      </span>
		                      @endforeach
		                  @else
		                  @endif
		                </div>
		            </div>
			 	</div>
			 </div>
	      </div>
	    </div>
	  </div>
	</div>


</div>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script type="text/javascript">
 		ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    	$('.delete').click(function(){
          var result = confirm("Yakin ingin dihapus??");
            if (result) {
                var id = $(this).attr('data-id')
                hapus(id , function(){
	                alert('Foto telah terhapus')
	                // location.reload();
	            })
            }           
        })

        var hapus =  function(id, callback){
           $.ajax({
                    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
                    type: 'DELETE',
                    url: '{{ route("image-delete") }}',
                    data: {id: id},
                    success: function (data){
                        callback()
                    },
                    error: function(e) {
                        console.log(e);
                    }});
        }

        Dropzone.options.dropzone =
         {
            maxFilesize: 5,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
       
            success: function(file, response) 
            {
                if(response.error){
                 alert('Gagal upload foto dikarenakan' + response.error)
                }else{
                	console.log("berhasil")
                     var inputHTML = '<a href="/'+ response.img.replace("public", "storage")+'" respinsestyle="position: relative;"><img src="/'+response.img.replace("public", "storage")+'" alt="" title=""/></a><button class="delete"  style="position:absolute;" class="deletePhoto" data-id="/'+ response.id +'">x</button>';
            			$(inputHTML).appendTo("#gallery");
            	}              
            },
            error: function(file, response)
            {
               console.log(response)
            }
        };
</script>
@endsection
