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
											<form action="{{ route('user.createPengajuanStepThreePost') }}" method="post" enctype="multipart/form-data">
                                                @csrf
												<div class="card-body">
                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Status Ekonomi Keluarga:</h3>
													@if ($get_form->kepemilikan_rumah == null)
													<div class="form-group row">
														<label class="col-3 col-form-label">Kepemilikan Rumah Ayah/ibu/Wali:</label>
														<div class="col-9 col-form-label">
															<div class="radio-list">
															@foreach ($kepemilikan_rumahs as $kepemilikan_rumah)
                                                                <label class="radio">
                                                                    <input type="radio" name="kepemilikanRumah" 
																	{{  $kepemilikan_rumah == old('kepemilikan_rumah')  ? 'checked' : '' }}
																	value="{{ $kepemilikan_rumah }}" />
                                                                 <span></span>{{ Str::headline($kepemilikan_rumah) }}</label>
                                                            @endforeach
															</div>

															@error('kepemilikanRumah')
														<small
															class="text-danger">{{ $message }}</small>
														@enderror
														</div>

														
													</div>
													@else
													<div class="form-group row">
														<label class="col-3 col-form-label">Kepemilikan Rumah Ayah/ibu/Wali:</label>
														<div class="col-9 col-form-label">
															<div class="radio-list">
															@foreach ($kepemilikan_rumahs as $kepemilikan_rumah)
                                                                <label class="radio">
                                                                    <input type="radio" name="kepemilikanRumah" 
																	{{ $get_form->kepemilikan_rumah->label() == $kepemilikan_rumah  ? 'checked' : '' }}
																	value="{{ $kepemilikan_rumah }}" />
                                                                 <span></span>{{ Str::headline($kepemilikan_rumah) }}</label>
                                                            @endforeach
															</div>

															@error('kepemilikanRumah')
														<small
															class="text-danger">{{ $message }}</small>
														@enderror
														</div>

														
													</div>
													@endif

													@if ($get_form->jumlah_tanggungan == null)
													<div class="form-group row">
														<label class="col-3 col-form-label">Jumlah Tanggungan Ayah/Ibu:</label>
														<div class="col-9 col-form-label">
															<div class="radio-list">
																<label class="radio">
																	<input type="radio" value="1" name="tanggunganAnak"/>
																	<span></span>
																	1 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="2" name="tanggunganAnak"/>
																	<span></span>
																	2 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="3" name="tanggunganAnak"/>
																	<span></span>
																	3 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="4" name="tanggunganAnak"/>
																	<span></span>
																	4 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="5" name="tanggunganAnak"/>
																	<span></span>
																	5 Anak
																</label>
															</div>

															@error('tanggunganAnak')
															<small
																class="text-danger">{{ $message }}</small>
															@enderror
														</div>
													
													</div>
													@else
													<div class="form-group row">
														<label class="col-3 col-form-label">Jumlah Tanggungan Ayah/Ibu:</label>
														<div class="col-9 col-form-label">
															<div class="radio-list">
																<label class="radio">
																	<input type="radio" value="1" {{ $get_form->jumlah_tanggungan == "1"  ? 'checked' : '' }} name="tanggunganAnak"/>
																	<span></span>
																	1 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="2" {{ $get_form->jumlah_tanggungan == "2"  ? 'checked' : '' }} name="tanggunganAnak"/>
																	<span></span>
																	2 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="3" {{ $get_form->jumlah_tanggungan == "3"  ? 'checked' : '' }} name="tanggunganAnak"/>
																	<span></span>
																	3 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="4" {{ $get_form->jumlah_tanggungan == "4"  ? 'checked' : '' }} name="tanggunganAnak"/>
																	<span></span>
																	4 Anak
																</label>
																<label class="radio">
																	<input type="radio" value="5"  {{ $get_form->jumlah_tanggungan == "5"  ? 'checked' : '' }} name="tanggunganAnak"/>
																	<span></span>
																	5 Anak
																</label>
															</div>

															@error('tanggunganAnak')
															<small
																class="text-danger">{{ $message }}</small>
															@enderror
														</div>
													
													</div>
													@endif

													
												

												

													<div class="form-group row">
														<label class="col-3 col-form-label">Kepemilikan Kendaraan Roda 2/Sepeda Motor:<br>	<span class="form-text text-muted">Kosongkan apabila tidak memiliki kendaraan</span></label>
														
														<div class="col-2 col-form-label">												
																<input type="text" class="form-control" placeholder="JumlahMotor" id="jumlahMotor" value="{{ count($motors) }}" disabled />											
														</div>
														<div class="col-6 col-form-label">				
																	<button type="button" class="btn btn-success add_field_button"><i class="la la-plus"></i>Tambah Motor</button>
																	&emsp;&emsp;&emsp;
																
																	
														</div>
													
												
						

														<div class="col-lg-12 input_fields_wrap">
															<div class="separator separator-dashed my-10"></div>
															
															@forelse ($motors as $motor)

															<div class="form-group row mt-3">
																
																<label class="col-lg-2 col-form-label text-lg-right"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
																		<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
																	</g>
																</svg><!--end::Svg Icon--></span> &ensp;Plat Nomor:</label>
																<div class="col-lg-2">
																 <input type="text" name="platNomorMotor[]" class="form-control" placeholder="Plat Nomor" value="{{ $motor->plat_nomor }}"   />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan: </label>
																<div class="col-lg-2">
																	<input type="text" name="tahunPembuatanMotor[]" class="form-control" placeholder="Tahun" value="{{ $motor->tahun_pembuatan }}"  />
																 
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
																<div class="col-lg-2">

																	<input type="text" name="merkMotor[]" class="form-control" placeholder="Type"  value="{{ $motor->merk }}" />
															
																   </div>
																   <div class="col-lg-2">
																

																	<button href="{{ route('user.destroyKendaraan', $motor->id) }}" id="delete" class="btn btn-danger" title="Hapus"><i class="la la-trash"></i></button>
															
																</div>
																 
															   </div>
															 
															 
															   <div class="separator separator-dashed my-10"></div>
															@empty
															<div class="form-group row mt-3">
															
																
																<label class="col-lg-2 col-form-label text-lg-right">
																<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
																		<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
																	</g>
																</svg><!--end::Svg Icon--></span> &ensp; Plat Nomor:</label>
																<div class="col-lg-2">
																	<input type="text" id="platMotorKosong" name="platNomorMotor[]" class="form-control" placeholder="Plat Nomor" />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan:</label>
																<div class="col-lg-2">
																	<input type="text" name="tahunPembuatanMotor[]" class="form-control" placeholder="Tahun" />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
																<div class="col-lg-2">
																	<input type="text" name="merkMotor[]" class="form-control" placeholder="Type" />
																</div>
																
															
															</div>
															<div class="separator separator-dashed my-10"></div>
															@endforelse
															
														</div>
														
													</div>


													<div class="form-group row">
														<label class="col-3 col-form-label">Kepemilikan Kendaraan Roda 4/Mobil:<br>	<span class="form-text text-muted">Kosongkan apabila tidak memiliki kendaraan</span></label>
														<div class="col-2 col-form-label">												
																<input type="text" class="form-control" placeholder="JumlahMobil" id="jumlahMobil" value="{{ count($mobils) }}" disabled />											
														</div>
														<div class="col-6 col-form-label">				
																	<button type="button" class="btn btn-success add_mobil_button"><i class="la la-plus"></i>Tambah Mobil</button>
																	
																</div>
													
				

														<div class="col-lg-12 input_mobil_wrap">
															<div class="separator separator-dashed my-10"></div>
															@forelse ($mobils as $mobil)
															<div class="form-group row mt-3">
																
																<label class="col-lg-2 col-form-label text-lg-right"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
																		<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
																	</g>
																</svg><!--end::Svg Icon--></span> &ensp;Plat Nomor:</label>
																<div class="col-lg-2">
																 <input type="text" class="form-control" name="platNomorMobil[]"  placeholder="Masukkan plat nomor" value="{{ $mobil->plat_nomor }}" />
																 
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan: </label>
																<div class="col-lg-2">
																 <input type="text" class="form-control" name="tahunPembuatanMobil[]"  placeholder="Masukkan tahun pembuatan" value="{{ $mobil->tahun_pembuatan }}" />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
																<div class="col-lg-2">
																	<input type="text" class="form-control" name="merkMobil[]" placeholder="Masukkan type/merk" value="{{ $mobil->merk }}" />
																   </div>
																   <div class="col-lg-2">
																

																		<button href="{{ route('user.destroyKendaraan', $mobil->id) }}" id="delete" class="btn btn-danger" title="Hapus"><i class="la la-trash"></i></button>
																
																	</div>
															   </div>
															 
															 
															 
															   <div class="separator separator-dashed my-10"></div>
															@empty
															<div class="form-group row mt-3">
															
																
																<label class="col-lg-2 col-form-label text-lg-right">
																<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>
																		<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/>
																	</g>
																</svg><!--end::Svg Icon--></span> &ensp; Plat Nomor:</label>
																<div class="col-lg-2">
																	<input type="text" id="platMobilKosong" name="platNomorMobil[]" class="form-control" placeholder="Plat Nomor" />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan:</label>
																<div class="col-lg-2">
																	<input type="text" name="tahunPembuatanMobil[]" class="form-control" placeholder="Tahun" />
																</div>
																<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
																<div class="col-lg-2">
																	<input type="text" name="merkMobil[]" class="form-control" placeholder="Type" />
																</div>
																
															
															</div>
															<div class="separator separator-dashed my-10"></div>
															@endforelse
														
														</div>
														
													</div>


													
												
												
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															<a href="{{ route('user.createPengajuanStepTwo') }}" class="btn btn-secondary">Sebelumnya</a>
															
														</div>
														<div class="col-lg-6 text-lg-right">
															<button type="submit" class="btn btn-danger">Simpan & Lanjutkan</button>
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

	<form action="" method="post" id="deleteForm">
		@csrf
		@method("DELETE")
		<button type="submit" style="display:none">Hapus</button>
	</form>

@endsection

@push('scripts')


  <script>
        $('button#delete').on('click', function(e){
                e.preventDefault();

                var href = $(this).attr('href');

                Swal.fire({
                    title: 'Hapus Kendaraan?',
                    type: 'warning',
                    showCancelButton: true,
                	confirmButtonText: 'Hapus',
                	cancelButtonText: 'Batal',
                	confirmButtonClass: 'btn btn-lg btn-danger mr-3',
                	cancelButtonClass: 'btn btn-lg border',
                	buttonsStyling: false
                    }).then((result) => {
                    if (result.value) {
                        document.getElementById('deleteForm').action = href;
                        document.getElementById('deleteForm').submit();
                    }
                })
            })
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#platMotorKosong').keyup(function(e){
            document.getElementById('jumlahMotor').value = "1";


			
			
		
        });

	
    });

	  $(document).ready(function(){
        $('#platMobilKosong').keyup(function(e){
            document.getElementById('jumlahMobil').value = "1";


			
			
		
        });

	
    });

	
</script>


<script>


$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = document.getElementById('jumlahMotor').value; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			// $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
			$(wrapper).append('<div class="col-lg-12 input_fields_wrap" id="kendaraanMotor">'+
									'<div class="form-group row mt-3">'+
										'<label class="col-lg-2 col-form-label text-lg-right">'+
											'<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">'+
												'<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">'+
													'<rect x="0" y="0" width="24" height="24"/>'+
														'<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>'+
															'<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/></g>'+
																'</svg><!--end::Svg Icon--></span> &ensp; Plat Nomor:</label>'+
																'<div class="col-lg-2">'+
																	'<input type="text" name="platNomorMotor[]" class="form-control" placeholder="Plat Nomor" />'+
																'</div>'+
																'<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan:</label>'+
																'<div class="col-lg-2">'+
																	'<input type="text" name="tahunPembuatanMotor[]" class="form-control" placeholder="Tahun" />'+
																'</div>'+
																'<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>'+
																'<div class="col-lg-2">'+
																	'<input type="text" name="merkMotor[]" class="form-control" placeholder="Type" />'+
																'</div>	'+
																'<div class="col-lg-2">'+
																	'<a href="#" class="btn btn-danger remove_field"><i class="la la-trash"></i></a>'+
																'</div>'+
															'</div>'+
															'<div class="separator separator-dashed my-10"></div>'+
														'</div>'); //add input box
														document.getElementById('jumlahMotor').value=x;
														// console.log("tambah:"+x)
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); 
		var elem = document.getElementById("kendaraanMotor");
		elem.remove();
		// $(this).parent('div').remove(); 
		x--;
		document.getElementById('jumlahMotor').value=x;
	
	})
});

</script>


<script>//tipe mobil

	$(document).ready(function() {
		var max_fields      = 10; //maximum input boxes allowed
		var wrapper   		= $(".input_mobil_wrap"); //Fields wrapper
		var add_button      = $(".add_mobil_button"); //Add button ID
		
		var x = document.getElementById('jumlahMobil').value; ; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				// $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
				$(wrapper).append('<div class="col-lg-12 input_fields_wrap" id="kendaraanMobil">'+
										'<div class="form-group row mt-3">'+
											'<label class="col-lg-2 col-form-label text-lg-right">'+
												'<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo5/dist/../src/media/svg/icons/Home/Key.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">'+
													'<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">'+
														'<rect x="0" y="0" width="24" height="24"/>'+
															'<polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158) " points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"/>'+
																'<path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281) "/></g>'+
																	'</svg><!--end::Svg Icon--></span> &ensp; Plat Nomor:</label>'+
																	'<div class="col-lg-2">'+
																		'<input type="text" name="platNomorMobil[]" class="form-control" placeholder="Plat Nomor" />'+
																	'</div>'+
																	'<label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan:</label>'+
																	'<div class="col-lg-2">'+
																		'<input type="text" name="tahunPembuatanMobil[]" class="form-control" placeholder="Tahun" />'+
																	'</div>'+
																	'<label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>'+
																	'<div class="col-lg-2">'+
																		'<input type="text" name="merkMobil[]" class="form-control" placeholder="Type" />'+
																	'</div>	'+
																	'<div class="col-lg-2">'+
																		'<a href="#" class="btn btn-danger removeMobil_field"><i class="la la-trash"></i></a>'+
																	'</div>'+
																'</div>'+
																'<div class="separator separator-dashed my-10"></div>'+
															'</div>'); //add input box
															document.getElementById('jumlahMobil').value=x;
															// console.log("tambah:"+x)
			}
		});
		
		$(wrapper).on("click",".removeMobil_field", function(e){ //user click on remove text
			e.preventDefault(); 
			var elem = document.getElementById("kendaraanMobil");
			elem.remove();
			// $(this).parent('div').remove(); 
			x--;
			document.getElementById('jumlahMobil').value=x;
		
		})
	});
	
	</script>


@endpush


