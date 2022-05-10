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
											<h2 class="card-label">Daftar Laporan Realisasi Rencana Kerja - {{ auth()->user()->name }}</h2>
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
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatableLaporan">
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:10%">Bulan</th>
													<th style="max-width:23%">Rencana Kerja</th>
													<th style="max-width:20%">Rincian Rencana Kerja</th>
													<th style="max-width:15%">Penanggung Jawab</th>
													<th style="max-width:15%">Status</th>
													<th style="max-width:10%">Aksi</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($forms as $form)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{  date('F Y', strtotime($form->waktu_mulai )) }}</td>
                                                    <td> {{ $form->nama_rencana }}</td>
                                                    <td>Lokasi = <strong> {{ $form->lokasi }} </strong> <br>
                                                        Waktu Mulai = <strong>  {{  date('d-m-Y H:i', strtotime($form->waktu_mulai )) }} </strong> <br>
                                                        Waktu Selesai = <strong> {{date('d-m-Y H:i', strtotime($form->waktu_selesai ))}} </strong> <br>
                                                        @if ($form->keterangan_tolak_spj != null)
                                                        Keterangan Tolak = <strong style="color:red">  {{ $form->keterangan_tolak_spj }} </strong> <br>
                                                        @endif 
                                                        {{-- <input type="text" class="form-control" value="{{ $form->id }}" id="id_form" name="id_form"  /> --}}
                                                    </td>
                                                    <td>{{ $form->opd->nama_skpd }}</td>
                                                   
                                                    <td>
                                                        @if ($form->status_spj == "Ditolak")
                                                            1
                                                        @elseif($form->status_spj == 'Disetujui')
                                                            2
                                                        @elseif($form->status_spj == 'Diajukan')
                                                            3
                                                        @elseif($form->status_spj  == 'BelumUpload')
                                                            4
                                                        @else
                                                            5
                                                        @endif</td>
                                                        <td nowrap="nowrap">
                                                           
                                                                
                                                                @if ($form->status_spj == "BelumUpload")
                                                               
                                                                <a href="{{ route('kecamatan.laporanSpj.create', $form->id) }}" style="width:100%" class="btn btn-info btn-sm">
                                                                    <i class="flaticon-upload"></i> Upload Realisasi
                                                                </a>
                                                                <br><br>
                                                                @endif
                                                                


                                                                {{-- @if ($form->status_spj == "Diajukan")
                                                                <a href="{{ route('kelurahan.laporanSpj.create', $form->id) }}" style="width:100%" class="btn btn-warning btn-sm">
                                                                    <i class="flaticon2-edit"></i> Tambah Realisasi
                                                                </a><br><br>
                                                                @endif --}}

                                                                @if ($form->status_spj == "Ditolak")
                                                                <a href="{{ route('kecamatan.laporanSpj.create', $form->id) }}" style="width:100%" class="btn btn-warning btn-sm">
                                                                    <i class="flaticon2-edit"></i> Ubah
                                                                </a><br><br>
                                                                @endif

                                                                @if ($form->status_spj != "BelumUpload")
                                                             
                                                                <a href="{{ route('kecamatan.laporanSpj.create', $form->id) }}" style="width:100%" class="btn btn-success btn-sm" data-id="{{ $form->id }}"><i class="flaticon-eye"></i> Lihat Realisasi</a>

                                                                <br><br>
                                                                @endif
                                                           
                                                                
                                                          
                                                        </td>
                                                </tr>
                                           
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada Rencana Kerja yang disetujui</td>
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
       
                        @if ($forms == null)
                            @include('kecamatan.laporan.form.create')
                            @include('kecamatan.rencanakerja.show')      
                       
                        @endif
                       

                    
                        <form action="" method="post" id="deleteForm">
                            @csrf
                            @method("DELETE")
                            <button type="submit" style="display:none">Hapus</button>
                        </form>
                        
                        
@endsection



@push('scripts')


<script>

$(".passingID").click(function () {
    var ids = $(this).attr('data-id');
    $
    $('#myModal').modal('show');
    $.get('{{ url('kecamatan/rencana/show')}}/'+ids, function(data){
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