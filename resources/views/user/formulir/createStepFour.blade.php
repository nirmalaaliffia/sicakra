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
                                            <form action="{{ route('user.createPengajuanStepFourPost') }}" method="post" enctype="multipart/form-data">

                                              
                                                @csrf
												<div class="card-body">
                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Surat Pernyataan Kepemilikan Rumah, Kendaraan dan Tanggungan Keluarga:</h3>
                                                   
                                                   <div class="mb-15">
                                                       @if ($getPenanggungBiaya == null)
                                                       <div class="form-group row">
                                                        <label class="col-3 col-form-label">Pilih salah satu yang bertanda tangan </label>
                                                        <div class="col-9 col-form-label">
                                                            <div class="radio-inline">

                                                                @foreach ($orangtuas as $orangtua)
                                                                <label
                                                                    class="radio ">
                                                                    <input type="radio"
                                                                        name="jenis_orangtua"
                                                                        {{ $orangtua == old('jenis_orangtua') ? 'checked' : '' }}
                                                                        value="{{ $orangtua }}" />
                                                                    <span></span>{{ Str::headline($orangtua) }}</label>
                                                                @endforeach

                                                               
                                                            </div>
                                                           
                                                        </div>
                                                        @error('jenis_orangtua')
                                                        <small
                                                            class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <p>Yang bertanda tangan di bawah ini saya :</p>

                                                  
                                                    <div class="form-group row">
                                                     <label class="font-weight-bold col-lg-3 col-form-label">Nama:</label>
                                                     <div class="col-lg-6">
                                                      <input type="text" class="form-control" placeholder="Masukkan Nama Panjnag" id="nama" name="nama" disabled/>
                                                      
                                                     </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">Tempat Tanggal Lahir:</label>
                                                        <div class="col-lg-6">
                                                   
                                                         <input type="text" class="form-control" id="tanggallahir" placeholder="Masukkan tanggal lahir"  disabled/>
                                                       
                                                        </div>
                                                       </div>
                                                    <div class="form-group row">
                                                     <label class="font-weight-bold col-lg-3 col-form-label">Alamat:</label>
                                                     <div class="col-lg-6">
                                                      <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" disabled/>
                                                      
                                                     </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">Pekerjaan:</label>
                                                        <div class="col-lg-6">
                                                         <input type="text" class="form-control"  placeholder="Masukkan alamat" id="pekerjaan" disabled/>
                                                         
                                                        </div>
                                                    </div>

                                                       @else
                                                       {{-- form penanggung biaya tidak ksoong --}}
                                                       <div class="form-group row">
                                                        <label class="col-3 col-form-label">Pilih salah satu yang bertanda tangan </label>
                                                        <div class="col-9 col-form-label">
                                                            <div class="radio-inline">

                                                                @foreach ($orangtuas as $orangtua)
                                                                <label
                                                                    class="radio ">
                                                                    <input type="radio"
                                                                        name="jenis_orangtua"
                                                                        {{ $orangtua == $getPenanggungBiaya->jenis_orangtua ? 'checked' : '' }}
                                                                        value="{{ $orangtua }}" />
                                                                    <span></span>{{ Str::headline($orangtua) }}</label>
                                                                @endforeach

                                                               
                                                            </div>
                                                           
                                                        </div>
                                                        @error('jenis_orangtua')
                                                        <small
                                                            class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <p>Yang bertanda tangan di bawah ini saya :</p>

                                                  
                                                    <div class="form-group row">
                                                     <label class="font-weight-bold col-lg-3 col-form-label">Nama:</label>
                                                     <div class="col-lg-6">
                                                      <input type="text" class="form-control" value="{{ $getPenanggungBiaya->nama_orangtua }}" placeholder="Masukkan Nama Panjnag" id="nama" name="nama" disabled/>
                                                      
                                                     </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">Tempat Tanggal Lahir:</label>
                                                        <div class="col-lg-6">
                                                   
                                                         <input type="text" class="form-control" id="tanggallahir" value="{{ $getPenanggungBiaya->tempat_lahir }}, {{ $getPenanggungBiaya->tanggal_lahir }}"  placeholder="Masukkan tanggal lahir"  disabled/>
                                                       
                                                        </div>
                                                       </div>
                                                    <div class="form-group row">
                                                     <label class="font-weight-bold col-lg-3 col-form-label">Alamat:</label>
                                                     <div class="col-lg-6">
                                                      <input type="text" class="form-control" id="alamat"  value="{{ $getPenanggungBiaya->alamat }}"  placeholder="Masukkan alamat" disabled/>
                                                      
                                                     </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">Pekerjaan:</label>
                                                        <div class="col-lg-6">
                                                         <input type="text" class="form-control"  placeholder="Masukkan pekerjaan"  value="{{ $getPenanggungBiaya->pekerjaan }}"  id="pekerjaan" disabled/>
                                                         
                                                        </div>
                                                    </div>

                                                       @endif
                                          


                                                    {{-- //data kendaraan --}}
                                                    <br> <p> Dengan ini saya menyatakan bahwa :</p>

                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">1. Rumah yang saya tempati adalah:</label>
                                                        <div class="col-lg-6">
                                                         <input type="email" class="form-control"  placeholder="Masukkan kepemilikan rumah" id="kepemilikanRumah" value="{{ $get_form->kepemilikan_rumah }}" disabled/>
                                                         
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">2. Kendaraan yang dimiliki saat ini:</label>
                                                       
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Punya Kendaraan roda 4 (empat):</label>
                                                        <div class="col-lg-6">
                                                         <input type="email" class="form-control"  placeholder="Masukkan jumlah kendaraan roda 4" id="jumlahRoda4" value="{{ count($mobils) }}" disabled/>
                                                         
                                                        </div>
                                                    </div>
                                                  
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
                                                         <input type="text" class="form-control" id="platNomorMobil" placeholder="Masukkan plat nomor" value="{{ $mobil->plat_nomor }}" disabled/>
                                                         
                                                        </div>
                                                        <label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan: </label>
                                                        <div class="col-lg-2">
                                                         <input type="text" class="form-control" placeholder="Masukkan tahun pembuatan" value="{{ $mobil->tahun_pembuatan }}" disabled/>
                                                        </div>
                                                        <label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control" placeholder="Masukkan type/merk" value="{{ $mobil->merk }}" disabled/>
                                                           </div>
                                                       </div>
                                                     
                                                       <div class="separator separator-dashed my-10"></div>
                                                    @empty
                                                    <div class="separator separator-dashed my-10"></div>
                                                    @endforelse
                                                  

                                                       <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Punya Kendaraan roda 2 (dua):</label>
                                                        <div class="col-lg-6">
                                                         <input type="email" class="form-control"  placeholder="Masukkan jumlah kendaraan roda 2" id="jumlahRoda2" value="{{ count($motors) }}" disabled/>
                                                         
                                                        </div>
                                                    </div>
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
                                                         <input type="text" class="form-control" id="platNomorMotor" placeholder="Masukkan plat nomor" value="{{ $motor->plat_nomor }}" disabled/>
                                                         
                                                        </div>
                                                        <label class="col-lg-1 col-form-label text-lg-right">Tahun Pembuatan: </label>
                                                        <div class="col-lg-2">
                                                         <input type="text" class="form-control" placeholder="Masukkan tahun pembuatan" value="{{ $motor->tahun_pembuatan }}" disabled/>
                                                        </div>
                                                        <label class="col-lg-1 col-form-label text-lg-right">Type/Merk:</label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control" placeholder="Masukkan type/merk" value="{{ $motor->merk }}" disabled/>
                                                           </div>
                                                       </div>
                                                     
                                                       <div class="separator separator-dashed my-10"></div>
                                                    @empty
                                                    <div class="separator separator-dashed my-10"></div>
                                                    @endforelse
                                                       



                                                    <div class="form-group row">
                                                        <label class="font-weight-bold col-lg-3 col-form-label">3. Jumlah tanggungan keluarga:</label>
                                                        <div class="col-lg-6">
                                                         <input type="email" class="form-control"  placeholder="Masukkan jumlah tanggungan" id="jumlah_tanggungan" value="{{ $get_form->jumlah_tanggungan }} Anak" disabled/>
                                                         
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-5 col-form-label">4. Mahasiswa terkait tidak sedang menerima beasiswa dari pihak manapun:</label>
                                                        <div class="col-1 col-form-label">
                                                            <div class="checkbox-inline">
                                                                <label class="checkbox checkbox-success">
                                                                    <input type="checkbox" value="1" name="isnot_menerima_beasiswa"/>
                                                                    <span></span>
                                                                    Benar
                                                                </label>
                                                              
                                                            </div>
                                                         
                                                        </div>
                                                        @error('isnot_menerima_beasiswa')
                                                        <small
                                                            class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                               
                                                   
                                                     {{-- end data kendaraan --}}
                                               
                                                 
                                                     <div class="mb-3">
                                               
                                                 <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-square">
                                                        <input type="checkbox" value="1" name="verifikasi_pernyataan" />
                                                        <span></span>
                                                        Demikian pernyataan ini saya buat dengan sebenar-benarnya untuk dapat digunakan sebagaimana mestinya.
                                                    </label>
                                                  

                                                </div>
                                                @error('verifikasi_pernyataan')
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
															<button type="submit" class="btn btn-success">Finalisasi Formulir Saya </button>
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
<script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
    $('input:radio[name=jenis_orangtua]').change(function() {
        $.get('{{ url('u/getOrangTua')}}/'+this.value, function(data){
          
                $.each(data, function(index, element){
                   
                        document.getElementById('nama').value=element.nama_orangtua;
                        document.getElementById('tanggallahir').value=""+element.tempat_lahir+", "+element.tanggal_lahir+"";
                        document.getElementById('alamat').value=element.alamat;
                        document.getElementById('pekerjaan').value=element.pekerjaan;
                    
                });

                if(data.length == "0"){
                    document.getElementById('nama').value='';
                        document.getElementById('tanggallahir').value='';
                        document.getElementById('alamat').value='';
                        document.getElementById('pekerjaan').value='';
                    
                }

             
            });

    
    });
});

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
    });
</script>
@endpush