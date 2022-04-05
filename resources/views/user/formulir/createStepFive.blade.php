@extends('layouts.formulir_app')

@section('main-content')
	<!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        @include('user.formulir.panel')

            
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
              			<!--begin::Card-->
										<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Formulir Pengajuan Bantuan Beasiswa Mahasiswa</h3>
											
											</div>
											<!--begin::Form-->
                                            <form action="{{ route('user.createPengajuanStepFivePost') }}" id="formFive" method="post" enctype="multipart/form-data">
                                                @csrf
												<div class="card-body">
                                                   <p>Yang bertanda tangan di bawah ini saya :</p>
                                                   <div class="mb-15">
                                                    <div class="form-group row">
                                                     <label class="col-lg-3 col-form-label">Nama:</label>
                                                     <div class="col-lg-6">
                                                      <input type="email" class="form-control" placeholder="Masukkan Nama Panjnag" value="{{ $get_form->nama }}" disabled/>
                                                  
                                                     </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Tempat Tanggal Lahir:</label>
                                                        <div class="col-lg-6">
                                                   
                                                         <input type="email" class="form-control" placeholder="Masukkan tanggal lahir" value="{{ $get_form->tempat_lahir }}, {{ date('d F Y', strtotime($get_form->tanggal_lahir )) }} " disabled/>
                                                       
                                                        </div>
                                                       </div>
                                                    <div class="form-group row">
                                                     <label class="col-lg-3 col-form-label">Alamat:</label>
                                                     <div class="col-lg-6">
                                                      <input type="email" class="form-control" value="{{ $get_form->alamat }}" placeholder="Masukkan alamat" disabled/>
                                                      
                                                     </div>
                                                    </div>
                                                  
                                                 
                                               
                                                   <div class="mb-3">
                                                 <p> Dengan ini saya menyatakan bahwa :</p>
                                                 <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-square">
                                                        <input type="checkbox" value="1" name="verifikasi_pengajuan" />
                                                        <span></span>
                                                        Seluruh pernyataan data dan informasi beserta seluruh dokumen yang saya isikan adalah benar.
                                                    </label>
                                                  

                                                </div>
                                                @error('verifikasi_pengajuan')
                                                <small
                                                    class="text-danger">{{ $message }}</small>
                                                @enderror
                                                   </div>
                                                 

												
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															{{-- <button type="reset" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button> --}}
														</div>
														<div class="col-lg-6 text-lg-right">
															<a class="btn btn-success" id="sbmt_btn">Selesai & Finalisasi Formulir Saya </a>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->

										</div>
										<!--end::Card-->
            </div>
         
        </div>
        <!--end::Row-->

        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
@endsection

@push('scripts')
<script>

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan').change(function(e){
            var id = $(this).find(':selected').val();
            $.get('{{ url('u/kelurahan')}}/'+id, function(data){
                $('#kelurahan').empty();
                $('#kelurahan').append(
                    "<option label='Label'></option>"
                );
                $.each(data, function(index, element){
                    $('#kelurahan').append(
                        "<option value="+element.id+">"+element.nama_kelurahan+"</option>"
                    );
                });
            });


        });

        $("#sbmt_btn").click(function(e) {
                            Swal.fire({
                                title: "Apakah anda yakin ingin finalisasi data anda?",
                                text: "Pastikan semua data yang diisi sudah benar!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Ya, Finalisasi Data!",
                                cancelButtonText: "Batal",
                            }).then(function(result) {
                                
                                $('#formFive').submit()
                            });
        });
    });
</script>
@endpush