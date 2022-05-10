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
								<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Verifikasi Realisasi</h2>
								<!--end::Page Title-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
									<li class="breadcrumb-item text-muted">
										<a href="" class="text-muted">Realisasi</a>
									</li>
									<li class="breadcrumb-item text-muted">
										<a href="" class="text-muted">Semua Realisasi </a>
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
											<h2 class="card-label">Daftar Semua Realisasi Rencana Kerja </h2>
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
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatableSemua">
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:15%">Pembuat</th>
													<th style="max-width:25%">Rencana Kerja</th>
													<th style="max-width:25%">Rincian Rencana Kerja</th>
													<th style="max-width:15%">Penanggung Jawab</th>
													<th style="max-width:25%">Status</th>
													<th style="max-width:15%">Aksi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($forms as $form)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
													<td>{{ $form->nama }}</td>
                                                    <td> {{ $form->nama_rencana }}</td>
                                                    <td>Lokasi = <strong> {{ $form->lokasi }} </strong> <br>
                                                        Waktu Mulai = <strong>  {{  date('d-m-Y H:i', strtotime($form->waktu_mulai )) }} </strong> <br>
                                                        Waktu Selesai = <strong> {{date('d-m-Y H:i', strtotime($form->waktu_selesai ))}} </strong> 
                                                        {{-- <input type="text" class="form-control" value="{{ $form->id }}" id="id_form" name="id_form"  /> --}}
                                                    </td>
                                                    <td>{{ $form->nama_skpd }}</td>
                                                   
                                                    <td>
                                                      
													   @if ($form->status_spj == "Ditolak")
													   1
												   @endif
												   @if($form->status_spj == "Disetujui")
													   2
												   @endif
												   @if($form->status_spj == "Diajukan")
													   3
												   @endif
												   @if($form->status_spj  == "Dibatalkan")
													   4
												   @endif
												   @if($form->status_spj  == "BelumFinal")
													   5
												   @endif
												   @if($form->status_spj  == "BelumUpload")
													   6
												   @endif</td>
                                                        <td nowrap="nowrap">
															<a href="{{ route('kecamatan.verifikasi.laporanSpj.readOnly', $form->id) }}"style="width:100%;height:10%" class="btn btn-info btn-sm " data-id="{{ $form->id }}">
																<i class="flaticon-eye"></i> Detail
															</a><br><br>
                                                         
                                                         
                                                        </td>
                                                </tr>
                                           
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada Rencana Kerja yang ditolak</td>
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
				
@endsection



@push('scripts')




<script>

	$(".passingTolak").click(function () {
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