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
											<h2 class="card-label">Daftar Semua Rencana Kerja - {{ auth()->user()->name }}</h2>
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

                                        @foreach ($forms as $form)
                                        <form action="{{ route('kelurahan.rencanaKerja.update', $form->id) }}" id="form_edit_rencana" method="post"enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT") 
                                           
                                            <div class="form-group">
                                                <label>Rencana Kerja:</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Rencana Kerja" value="{{ $form->nama_rencana }}" id="nama_rencana" name="nama_rencana" />
                                                @error('nama_rencana')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Lokasi:</label>
                                                <input type="text" class="form-control " placeholder="Masukkan lokasi" id="lokasi" name="lokasi" value="{{ $form->lokasi }}"  />
                                                @error('lokasi')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                             <div class="col-lg-6">
                                                 <label>Waktu Mulai:<b style="color:red">*</b></label>
                                                 <input type="text" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ date('d/m/Y H:i', strtotime($form->waktu_mulai)) }}"
                                                     placeholder="Masukkan waktu mulai" />
                                                 @error('waktu_mulai')
                                                 <span class="form-text text-danger">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                             <div class="col-lg-6">
                                                 <label>Waktu Selesai:<b style="color:red">*</b></label>
                                                 <input type="text" class="form-control" id="waktu_selesai" value="{{ date('d/m/Y H:i', strtotime($form->waktu_selesai)) }}"
                                                     name="waktu_selesai" placeholder="Masukkan waktu selesai" />
                                                 @error('waktu_selesai')
                                                 <span class="form-text text-danger">{{ $message }}</span>
                                                 @enderror
                                             </div>
                                         </div>
                                         <div class="form-group ">
                                             <label>Penanggung Jawab:</label><br>
                                             <select class="form-control "  style="width:100%"id="penanggung_jawab" name="penanggung_jawab" placeholder="Pilih Penanggung Jawab">
                                                <option label="Label"></option>
                                                @foreach($opds as $opd)
                                                         <option value="{{ $opd->id }}" @if ($form->penanggung_jawab == $opd->id) selected @endif>{{ $opd->nama_skpd }}</option>
                                                @endforeach
                                              </select>
                                           
                                             @error('penanggung_jawab')
                                             <span class="form-text text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>
                                         <div class="form-group">
                                             <label>Rundown Kegiatan:</label>
                                             <textarea type="text" style="height: 150px" class="form-control" placeholder="Masukkan Rencana Kerja"  id="rundown" name="rundown" >{{ $form->rundown_kegiatan }}</textarea>
                                             @error('rundown')
                                             <span class="form-text text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>
                                         <div class="form-group">
                                             <label>Peserta:</label>
                                             <textarea type="text" style="height: 100px"  class="form-control" placeholder="Masukkan Rencana Kerja" id="peserta" name="peserta" >{{ $form->jumlah_peserta }}</textarea>
                                             @error('peserta')
                                             <span class="form-text text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>
                                         <a href="{{ route('kelurahan.rencanaKerja.daftar') }}" class="btn btn-secondary" >Kembali</a>
              
                                         <button type="submit" class="btn btn-danger" id="submt_btn" >
                                             <i class="fa fa-check" ></i> Ubah Rencana Kerja
                                         </button>
                                       
                                         <button type="submit" class="btn btn-danger spinner spinner-white spinner-right" id="spinner_btn" disabled style="display:none">
                                             <i class="fa fa-check" ></i> Ubah Rencana Kerja
                                         </button>
                                         @endforeach 
                                     </form>
									</div>
								</div>
								<!--end::Card-->
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
       
                        @include('kelurahan.rencanakerja.create')
                        @include('kelurahan.rencanakerja.show')

                    
				
@endsection



@push('scripts')



<script>
    $('#penanggung_jawab').select2({
         placeholder: "Pilih Penanggung Jawab",
      
        });

       
   
        $('#waktu_mulai').datetimepicker({
         format: 'd/m/yyyy h:ii',
         pick12HourFormat: false  
         });

         $('#waktu_selesai').datetimepicker({
            format: 'd/m/yyyy h:ii',
         pick12HourFormat: false  
         });

</script>

<script type="text/javascript">




$(document).ready(function(){
  $("#form_edit_rencana").on("submit", function(){
    document.getElementById("spinner_btn").style.display = "block";
    document.getElementById("submt_btn").style.display = "none";
  });//submit
});//document ready

// $(document).ready(function() {
//     $('#keterangan').summernote({
//       placeholder: "Silahkan isi keterangan atau deskripsi agenda"
//     });
//   });
</script>

@endpush

