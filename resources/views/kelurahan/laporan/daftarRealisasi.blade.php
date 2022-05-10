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
                                            <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Buat Laporan Realisasi Rencana Kegiatan</h2>
                                            <!--end::Page Title-->
                                            <!--begin::Breadcrumb-->
                                            {{-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="" class="text-muted">Applications</a>
                                                </li>
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="" class="text-muted">Profile</a>
                                                </li>
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="" class="text-muted">Profile 1</a>
                                                </li>
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="" class="text-muted">Overview</a>
                                                </li>
                                            </ul> --}}
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

											<h2 class="card-label">
                                               Laporan Realisasi &emsp;: <strong>{{ $form->nama_rencana }}</strong><br>
                                               Bulan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <strong> {{  date('F Y', strtotime($form->waktu_mulai )) }} </strong>
                                            </h2>
										
										</div>
										<div class="card-toolbar">
                                            <a href="{{ route('kelurahan.laporanSpj') }}" class="btn btn-secondary font-weight-bolder">
                                                <i class="flaticon2-back"></i>Kembali</a> &emsp;
                                                
                                                @if ($form->status_spj == "BelumUpload" || $form->status_spj == "Ditolak")
                                                    	<!--begin::Button-->
											<button data-toggle="modal" data-target="#modal-create-realisasi" class="btn btn-primary font-weight-bolder">
                                                <i class="flaticon2-add"></i>Upload Realisasi</button>&emsp;
                                                <!--end::Button-->
    
                                                <button type="button" href="{{ route('kelurahan.laporanSpj.ajukan', $form->id) }}" id="ajukanRelisasiBtn" class="btn btn-info font-weight-bolder ">
                                                    <i class="flaticon2-sheet"></i>Ajukan Realisasi</button> 
                                                    
                                                @else
                                                    
                                                @endif

                                                @if ($form->status_spj == "Diajukan")
                                                <button type="button" href="{{ route('kelurahan.laporanSpj.ajukanBatal', $form->id) }}" id="batalkanRelisasiBtn" class="btn btn-warning font-weight-bolder">
                                                    <i class="flaticon2-sheet"></i>Batalkan Pengajuan Realisasi</button> 
                                                   
                                                @endif
										
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
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatableSpj">
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:34%">Bukti Pendukung</th>
													<th style="max-width:30%">Tanggal Upload</th>
													<th style="max-width:10%">Status</th>
													<th style="max-width:10%">Aksi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($spjs as $spj)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{  $spj->bukti_pendukung }}</td>
                                                  
                                                    <td> {{ date('d-m-Y H:i', strtotime($spj->created_at )) }}</td>
                                                    <td>
                                                        @if ($spj->status == "Ditolak")
                                                            1
                                                        @elseif($spj->status == 'Disetujui')
                                                            2
                                                        @elseif($spj->status == 'Diajukan')
                                                            3
                                                        @elseif($spj->status == 'BelumFinal')
                                                            4
                                                        @else
                                                           5
                                                        @endif</td>
                                                        <td nowrap="nowrap">
                                                                                                         
                                                    
                                                        

                                                       
                                                        @if ($spj->link_bukti != null)
                                                        <a href="{{ asset($spj->link_bukti) }}" target="_blank"  style="width:100%"   class="btn btn-success btn-sm">
                                                        <i class="flaticon2-folder"></i> Lihat
                                                        </a> <br><br>
                                                        @else
                                                        
                                                        @endif

                                                      

                                                        @if ($spj->status == "BelumFinal" ||  $spj->status == "Ditolak")
                                                        <button type="button" href="{{ route('kelurahan.laporanSpj.destroy', $spj->id) }}" id="delete"  style="width:100%" data-id="{{ $form->id }}" class="btn btn-danger btn-sm">
                                                            <i class="flaticon2-trash"></i> Hapus
                                                        </button>
                                                      
                                                     <br><br>
                                                @endif


                                                

                                                   
     
                                                          
                                                        </td>
                                                </tr>
                                           
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada Realisasi yang dibuat</td>
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
                        
       
                        @include('kelurahan.laporan.form.create')
                        @include('kelurahan.laporan.form.show')

                    
                        <form action="" method="post" id="deleteForm">
                            @csrf
                            @method("PUT")
                            <input type="hidden" class="form-control" placeholder="Masukkan Rencana Kerja"  value="{{ $form->id }}" id="rencana_kerja_id" name="rencana_kerja_id"  />
                            <button type="submit" style="display:none">Hapus</button>
                        </form>
                        
                        <form action="" method="post" id="setujuForm">
                            @csrf
                            <button type="submit" style="display:none">Setuju</button>
                        </form>
                        
@endsection



@push('scripts')

<script>

      
    $('button#ajukanRelisasiBtn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');

            Swal.fire({
				title: 'Apakah anda yakin ingin mengajukan realisasi?',
                text: "Realisasi yang diajukan akan diverifikasi oleh Kecamatan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ajukan!'
                }).then((result) => {
                if (result.value) {
                    document.getElementById('setujuForm').action = href;
                    document.getElementById('setujuForm').submit();
					
                    // Swal.fire(
                    //     'Berhasil!',
                    //     'Realisasi berhasil diajukan.',
                    //     'success'
                    // )
                }
            })
        })
</script>

<script>

      
    $('button#batalkanRelisasiBtn').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');

            Swal.fire({
				title: 'Apakah anda yakin ingin membatalkan pengajuan realisasi?',
                text: "Realisasi yang belum diverifikasi oleh Kecamatan dapat dibatalkan pengajuan dan diubah kembali.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Batalkan pengajuan!'
                }).then((result) => {
                if (result.value) {
                    document.getElementById('setujuForm').action = href;
                    document.getElementById('setujuForm').submit();
					
                    // Swal.fire(
                    //     'Berhasil!',
                    //     'Realisasi berhasil diajukan.',
                    //     'success'
                    // )
                }
            })
        })
</script>

<script>

$(".passingID").click(function () {
    var ids = $(this).attr('data-id');
    $
    $('#myModal').modal('show');
    $.get('{{ url('kelurahan/rencanaKerja/show')}}/'+ids, function(data){
     $("#nama_rencana_show").val(data[0]['nama_rencana']);
     $("#lokasi_show").val(data[0]['lokasi']);
     $("#waktu_mulai_show").val(data[0]['waktu_mulai']);
     $("#waktu_selesai_show").val(data[0]['waktu_selesai']);
     $("#rundown_show").val(data[0]['rundown_kegiatan']);
     $("#peserta_show").val(data[0]['jumlah_peserta']);
     $("#penanggung_jawab_show").val(data[0]['opd']['nama_skpd']);
   
    //    console.log(data[0]['opd']['nama_skpd'])
    
   
        });
    });



// $(".passing_spj").click(function () {
//     var id = $(this).attr('data-id');
//     $
  
//     $.get('{{ url('kelurahan/laporanSpj/create')}}/'+id, function(data){
    
//         });
//     });
</script>

<script>

      
    $('button#delete').on('click', function(e){
            e.preventDefault();

            var href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah anda yakin hapus data ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                if (result.value) {
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();

                    // Swal.fire(
                    //     'Berhasil!',
                    //     'Data telah dihapus.',
                    //     'success'
                    // )
                }
            })
        })
</script>

@endpush