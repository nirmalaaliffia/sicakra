@extends('layouts.app')

@section('main-content')
				<!--begin::Subheader-->
				<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
					<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
						<!--begin::Info-->
						<div class="d-flex align-items-center mr-1">
							<!--begin::Page Heading-->
							<div class="d-flex align-items-baseline flex-wrap mr-5">
								<!--begin::Page Title-->
								<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Verifikasi Rencana Kerja</h2>
								<!--end::Page Title-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
									<li class="breadcrumb-item text-muted">
										<a href="" class="text-muted">Rencana Kerja</a>
									</li>
									<li class="breadcrumb-item text-muted">
										<a href="" class="text-muted">Diajukan</a>
									</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page Heading-->
						</div>
						<!--end::Info-->
					
					</div>
				</div>
				<!--end::Subheader-->
					
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">

                                <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h2 class="card-label">Daftar Verifikasi Rencana Kerja Diajukan </h2>
											
										</div>
										
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											{{-- <div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Export</button>
												<!--begin::Dropdown Menu-->
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="nav flex-column nav-hover">
														<li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-print"></i>
																<span class="nav-text">Print</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-copy"></i>
																<span class="nav-text">Copy</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-excel-o"></i>
																<span class="nav-text">Excel</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-text-o"></i>
																<span class="nav-text">CSV</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-pdf-o"></i>
																<span class="nav-text">PDF</span>
															</a>
														</li>
													</ul>
												</div>
												<!--end::Dropdown Menu-->
											</div> --}}
											<!--end::Dropdown-->
											<!--begin::Button-->
											{{-- <button data-toggle="modal" data-target="#modal-create-rencana" class="btn btn-primary font-weight-bolder">
											<i class="la la-plus"></i>Buat Rencana Kerja</button> --}}
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                         
                                            <div class="alert-text">{{ $message }}</div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                </button>
                                            </div>
                                        </div><br>
                                        @endif
                                        @if ($message = Session::get('danger'))
                                        <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                         
                                            <div class="alert-text">{{ $message }}</div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                </button>
                                            </div>
                                        </div><br>
                                        @endif
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable kt_datatableRencana" >
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:25%">Rencana Kerja</th>
													<th style="max-width:25%">Rincian Rencana Kerja</th>
													<th style="max-width:20%">Penanggung Jawab</th>
													<th style="max-width:10%">Status</th>
													<th style="max-width:15%">Aksi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($forms as $form)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td> {{ $form->nama_rencana }}</td>
                                                    <td>Lokasi = <strong> {{ $form->lokasi }} </strong> <br>
                                                        Waktu Mulai = <strong>  {{  date('d-m-Y H:i', strtotime($form->waktu_mulai )) }} </strong> <br>
                                                        Waktu Selesai = <strong> {{date('d-m-Y H:i', strtotime($form->waktu_selesai ))}} </strong> 
                                                        {{-- <input type="text" class="form-control" value="{{ $form->id }}" id="id_form" name="id_form"  /> --}}
                                                    </td>
                                                    <td>{{ $form->nama_skpd }}</td>
                                                   
                                                    <td>
                                                        @if ($form->status_verifikasi == "Ditolak")
                                                            1
                                                        @elseif($form->status_verifikasi == 'Disetujui')
                                                            2
                                                        @elseif($form->status_verifikasi == 'Diajukan')
                                                            3
                                                        @elseif($form->status_verifikasi  == 'Dibatalkan')
                                                            4
                                                        @elseif($form->status_verifikasi  == 'BelumFinal')
                                                            5
                                                        @else
                                                            6
                                                        @endif</td>
                                                        <td nowrap="nowrap">
															<button type="button" style="width:80%;height:10%" class="btn btn-warning btn-sm passingAjuan" data-id="{{ $form->id }}"><i class="flaticon-eye icon-lg"></i> Detail</button>

															<br><br>

															{{-- <a href="{{ route('kecamatan.verifikasi.rencanaKerja.disetujui', $form->id) }}" style="width:80%;height:10%" class="btn btn-success btn-sm">
																<i class="flaticon2-check-mark icon-lg"></i> Setuju
															</a><br><br> --}}


															<button type="button" href="{{ route('kecamatan.verifikasi.rencanaKerja.disetujui', $form->id) }}" id="setuju" style="width:80%;height:10%" data-id="{{ $form->id }}" class="btn btn-success btn-sm">
																<i class="flaticon2-check-mark icon-lg"></i> Setuju
															</button>
															<br><br>

															{{-- <a href="{{ route('kecamatan.verifikasi.rencanaKerja.ditolak', $form->id) }}" style="width:80%; height:10%" class="btn btn-danger btn-sm">
																<i class="flaticon2-delete icon-md"></i> Tolak
															</a> --}}
															<button type="button" style="width:80%; height:10%" style="width:80%; height:10%" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
																<i class="flaticon2-delete icon-md"></i>Tolak
															</button>
															<br><br>
                                                         
                                                        </td>
                                                </tr>
                                           

<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Rencana Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            <!--begin::Form-->
			<form action="{{ route('kecamatan.verifikasi.rencanaKerja.ditolak', $form->id) }}" class="tagForm" id="tag-form" method="post" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group row">
					<label class="col-lg-4 col-form-label">Alasan Penolakan:</label>
					<div class="col-lg-8">
					 <textarea type="text" class="form-control" id="alasanDitolak" name="alasanDitolak" required placeholder="Masukkan Alasan penolakan"  ></textarea>
					 <input type="hidden" class="form-control" id="rencanaKerja_id" name="rencanaKerja_id" value="{{ $form->id }}"  />
					</div>
				   </div>
			   
		   
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
				<button type="submit" id="submitTolak" class="btn btn-primary font-weight-bold">Tolak</button>
			</div>
			</form>
<!--end::Form-->
        </div>
    </div>
</div>

                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada Rencana Kerja yang diajukan</td>
                                                </tr>
                                            @endforelse
												
											
											
											</tbody>
										</table>
										<!--end: Datatable-->
                                    
									</div>
								</div>
								<!--end::Card-->
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
						@include('kelurahan.rencanakerja.show')

     
						<form action="" method="post" id="setujuForm">
                            @csrf
                            <button type="submit" style="display:none">Setuju</button>
                        </form>
@endsection



@push('scripts')

<script>

      
    $('button#setuju').on('click', function(e){
            e.preventDefault();

            var href = $(this).attr('href');

            Swal.fire({
				title: 'Apakah anda yakin ingin menyetujui?',
                text: "Rencana Kerja yang disetujui akan dilanjutkan mengisi realisasi oleh kelurahan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setuju!'
                }).then((result) => {
                if (result.value) {
                    document.getElementById('setujuForm').action = href;
                    document.getElementById('setujuForm').submit();
					
                    // Swal.fire(
                    //     'Berhasil!',
                    //     'Data telah dihapus.',
                    //     'success'
                    // )
                }
            })
        })
</script>



<script>

	$(".passingAjuan").click(function () {
		var ids = $(this).attr('data-id');
		console.log('data')
		$('#myModal').modal('show');
		$.get('{{ url('kelurahan/rencanaKerja/show')}}/'+ids, function(data){
		 $("#nama_rencana_show").val(data[0]['nama_rencana']);
		 $("#lokasi_show").val(data[0]['lokasi']);
		 $("#waktu_mulai_show").val(data[0]['waktu_mulai']);
		 $("#waktu_selesai_show").val(data[0]['waktu_selesai']);
		 $("#rundown_show").val(data[0]['rundown_kegiatan']);
		 $("#peserta_show").val(data[0]['jumlah_peserta']);
		 $("#penanggung_jawab_show").val(data[0]['opd']['nama_skpd']);
	     $("#status_verifikasi_show").val(data[0]['status_verifikasi']);
   
		//    console.log(data[0]['opd']['nama_skpd'])
	
			
	
		
	   
			});
		});
	</script>

@endpush