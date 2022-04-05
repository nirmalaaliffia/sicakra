@extends('layouts.app')

@section('main-content')
				
					
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">

                                <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h2 class="card-label">Data Siap Diverifikasi</h2>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2">
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
											</div>
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a href="#" class="btn btn-primary font-weight-bolder">
											<i class="la la-plus"></i>New Record</a>
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatableVerifikasi">
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:25
                                                    %">Batch</th>
													<th style="max-width:20%">Data mahasiswa</th>
													<th style="max-width:20%">Tanggal Daftar</th>
													<th style="max-width:15%">Status</th>
													<th style="max-width:15%">Aksi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($forms as $form)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>Pengajuan BBM Tahun {{ $form->batch }}</td>
                                                    <td>No KTP = <strong> {{ $form->no_ktp }} </strong> <br>
                                                        Nama = <strong> {{ $form->nama }} </strong> 
                                                        {{-- <input type="text" class="form-control" value="{{ $form->id }}" id="id_form" name="id_form"  /> --}}
                                                    </td>
                                                    <td>{{ $form->created_at->format('d M Y') }}</td>
                                                   
                                                    <td>
                                                        @if ($form->verifikasi_pengajuan == "Ditolak")
                                                            1
                                                        @elseif($form->verifikasi_pengajuan == 'Disetujui')
                                                            2
                                                        @elseif($form->verifikasi_pengajuan == 'Diajukan')
                                                            3
                                                        @elseif($form->verifikasi_pengajuan  == 'Dibatalkan')
                                                            4
                                                        @elseif($form->verifikasi_pengajuan  == 'BelumFinal')
                                                            5
                                                        @else
                                                            6
                                                        @endif</td>
                                                        <td nowrap="nowrap"></td>
                                                </tr>
                                           
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No Data Entry</td>
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
                      

<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan Ditolak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               		<!--begin::Form-->
                       <form action="{{ route('admin.verifikasiFormulir.tolak') }}" class="tagForm" id="tag-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alasan Penolakan:</label>
                            <div class="col-lg-8">
                             <textarea type="text" class="form-control" id="alasanDitolak" name="alasanDitolak" placeholder="Masukkan Alasan penolakan"  ></textarea>
                             <input type="text" class="form-control" id="formulir_id" name="formulir_id"  />
                            </div>
                           </div>
                       
                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" id="submitTolak" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </form>
        <!--end::Form-->
        </div>
    </div>
</div>
				
@endsection



@push('scripts')


<script>

\

$(function() {

    $('#submitTolak').on('click', function(e) {
        e.preventDefault();
        var formulir_id = document.getElementById("id_form").value;
        
        $.ajax({
            type: "POST",
            url: "verifikasiFormulir/tolak",
            data: $('form.tagForm').serialize(),
            success: function(response) {
               console.log(response)
               Swal.fire({
                   position: "top-right",
                   icon: "error",
                   title: "Pengajuan Beasiswa telah ditolak!",
                   showConfirmButton: false,
                   timer: 1500
                });
            },
            error: function() {
                alert('Error, hubungi admin');
            }
        });
        return false;
    });
});

</script>

@endpush