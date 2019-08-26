@extends('layouts.admin')


@section('css')
<style type="text/css">
	@media (min-width: 576px){
		.modal-dialog {
		    max-width: 1200px;
		    margin: 1.75rem auto;
		}

		.subcategory {
			margin-top : 30px;
		}
	}

	.blue {
		    background: #1572e8!important;
		    color: #fff!important;
		    border: 1px solid white!important;
	}

	.thumb {
		width: 100px;
		padding: 20px;
	}

</style>
@endsection


@section('content')
<div class="wrap table-responsive">
	<h1> Data Pekerjaan </h1>
	 <a type="button" class="btn btn-primary" style="margin-bottom:20px;" href="{{route('create-work')}}">Tambah</a>
	<br>
	<table id="basic-datatables" class="table table-bordered table-striped table-head-bg-primary mb-3">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Thumbanail</th>
			<th scope="col">URL</th>
			<th scope="col">Title</th>
			<th scope="col">Kategori</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($works as $work)
			<tr>
				<td>{{$loop->index + 1}}</td>
				<td><img class="thumb" src="{{ ($work->thumbnail !== '' && $work->thumbnail !== null) ? Storage::url($work->thumbnail) : Storage::url('public/work/no-image.png') }}"></td>
				<td>{{$work->url}}</td>
				<td>{{$work->title}}</td>
				<td>{{$work->Kategori->name}}</td>
				<td>{{($work->active) ? "active" : "non-active"}}</td>

				<td>
				<div class="dropdown">
					  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Aksi
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item" href="{{ route('edit-work', [$work->id])}}">Ubah</a>
					     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); 
                                       if(confirm('Yakin dihapus ?')){
                                            document.getElementById('delete-form-'+<?php echo  $work->id ?>).submit();
                                        }">
                                        Hapus
                                    </a>
					    <form action="{{route('delete-work', [$work->id])}}" method="post" id="delete-form-<?php echo $work->id ?>" style="display: none;">
					    	  @csrf
					    	@method('DELETE')
					    	<a type="submit" class="dropdown-item">Submit</a>
					    </form>
					  </div>
					</div>
				</td>
			</tr>
		@endforeach

	</tbody>
</table>

@endsection


@section('js')
<script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#basic-datatables').DataTable();

		$('.get-data').click(function(){
			var id = $(this).attr('data-id');
			$.ajax({
               type:'GET',
               url:'/admin/mywork/' + id,
               success:function(data) {
              		var data = data.data[0]
              		// work

              		$('#work_name').html(data.nama)
              		$('#work_npsn').html(data.npsn)
              		$('#work_bp').html(data.bp)
              		$('#work_status').html(data.status)
              		$('#work_kecamatan').html(data.kecamatan)
              		$('#work_alamat').html(data.alamat)
              		$('#work_lb1').html(data.lb2)
              		$('#work_lb2').html(data.lb2)
              		$('#work_lb3').html(data.lb3)

              		// infra
					$('#work_peserta_didik').html(data.infrastructure.peserta_didik)
					$('#work_rombel').html(data.infrastructure.rombel)
					$('#work_guru').html(data.infrastructure.guru)
					$('#work_tendik').html(data.infrastructure.tendik)

					var infra = data.infrastructure
					for (var keys in infra) {
					    if (infra.hasOwnProperty(keys)) {
					    	if(typeof infra[keys] == "object"){
					    			if(infra[keys] !== null){
										infra[keys].forEach(function(item,index){
										var context = $('#'+keys+'_jumlah')
										console.log(keys)
										console.log(context)
										if(context.length > 0) {
											if(item.level == 0){	
												$('#'+keys+'_jumlah').html(item.jumlah)				
												for (var key in item) {
												    if (item.hasOwnProperty(key)) {
												     	if(typeof item[key] == "object"){
												     		$('#'+keys+'_'+key).html(function(item){
																var add ="<table>"
																for (var key in item) {
																    if (item.hasOwnProperty(key)) {
																       add += '<tr><td>' + key.replace("_", " ")+'</td><td> '+item[key]+ '</td>';
																    }
																}
																add	+= "</table>"
																return add 
															}(item[key]))
												     	}
												    }
												}				
											}else if(item.level == 1){
												$('#'+keys+'_jumlah_usulan').html(item.jumlah)
												for (var key in item) {
												    if (item.hasOwnProperty(key)) {
												     	if(typeof item[key] == "object"){
												     		$('#'+keys+'_'+key+'_usulan').html(function(item){
																var add ="<table>"
																for (var key in item) {
																    if (item.hasOwnProperty(key)) {
																       add += '<tr><td>' + key.replace("_", " ")+'</td><td> '+item[key]+ '</td>';
																    }
																}
																add	+= "</table>"
																return add 
															}(item[key]))
												     	}
												    }
												}	
											}
										}
									});
								}
					    	}
					    }
					}
               }	

            });
		})
	})
</script>
@endsection
