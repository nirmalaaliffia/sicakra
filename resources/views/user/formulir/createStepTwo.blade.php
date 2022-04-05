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
                                            <form action="{{ route('user.createPengajuanStepTwoPost') }}" method="post" enctype="multipart/form-data">
                                                @csrf
											    <div class="card-body">
											       

											        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
											            <div class="card">
											                <div class="card-header" id="headingOne3">
											                    <div class="card-title" data-toggle="collapse" data-target="#collapseOne3">
											                        Identitas Orang Tua
											                    </div>
											                </div>
											                <div id="collapseOne3" class="collapse show" data-parent="#accordionExample3">
											                    <div class="card-body">

                                                                    {{-- FORM IDENTITAS AYAH --}}
                                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Identitas Ayah:</h3>
                                    
                                                                            @forelse ($formAyah as $ayah)
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Status Hidup Ayah:</label>

                                                                                    <div class="radio-inline">
                                                                                        @foreach ($status_hidups as
                                                                                        $status_hidup)
                                                                                        <label
                                                                                            class="radio radio-solid">
                                                                                            <input type="radio"
                                                                                                name="status_hidup"
                                                                                                {{ $ayah->status_hidup->label() == $status_hidup  ? 'checked' : '' }}
                                                                                                value="{{ $status_hidup }}" />
                                                                                            <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                                        @endforeach

                                                                                        @error('status_hidup')
                                                                                        <small
                                                                                            class="text-danger">{{ $message }}</small>
                                                                                        @enderror


                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
        
                                                                                    <label>Nama Ayah:</label>
                                                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah" value="{{ $ayah->nama_orangtua }}"/>
        
                                                                                    @error('nama_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-8">
                                                                                            <label>Alamat Ayah:</label>
                                                                                            <input type="text" class="form-control"  value="{{ $ayah->alamat }}" id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan alamat sesuai KTP" />
                                                                                            @error('alamat_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <label>RT:</label>
                                                                                            <input type="text" class="form-control"  value="{{ $ayah->rt }}" id="rt_ayah" name="rt_ayah" placeholder="RT" />
                                                                                            @error('rt_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <label>RW:</label>
                                                                                            <input type="text" class="form-control" id="rw_ayah" name="rw_ayah"  value="{{ $ayah->rw }}" placeholder="RW" />
                                                                                            @error('rw_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-6">
                                                                                          
                                                                                            <label>Kecamatan Ayah:</label>
                                                                                           
                                                                                            <div class="input-group">
                                                                                                
                                                                                                    <select class="form-control select2" id="kecamatan_ayah" name="kecamatan_ayah"  placeholder="Pilih Kecamatan" >
                                                                                                        <option label="Label"></option>
                                                                                                        @foreach($kecamatans as $kecamatan)
                                                                                                        <option value="{{ $kecamatan->id }}"  @if ($ayah->kecamatan_id == $kecamatan->id) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                                                                                                        @endforeach
                                                                                                       </select>
                                                                                                   
                                                                                               
                                                                                            </div>
                                                                                            @error('kecamatan_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            
                                                                                         @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <label>Kelurahan Ayah:</label>
                                                                                            <div class="input-group">
                                                                                               
                                                                                                <select class="form-control select2" id="kelurahan_ayah" name="kelurahan_ayah" placeholder="Pilih Kelurahan" >
                                                                                                    <option label="Label"></option>
                                                                                                    
                                                                                                    @foreach (App\Http\Controllers\User\FormulirController::getNamaKelurahan($ayah->kecamatan_id) as $jd)
                                                                                                    <option value="{{ $jd->id }}" @if ($ayah->kelurahan_id == $jd->id) selected @endif>{{ $jd->nama_kelurahan }}</option>
                                                                                                  
                                                                                                    @endforeach   
                                                                                                </select>
                                                                                              
                                                                                            </div>
                                                                                            @error('kelurahan_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                     
                                                                                       
                                                                                    </div>
                                                                                  
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Disabilitas Ayah:</label>
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <select class="form-control select2" id="cacat_ayah" name="cacat_ayah" placeholder="Pilih Disabilitas" >
                                                                                            <option label="Label"></option>
                                                                                            @foreach($cacats as $cacat)
                                                                                            <option value="{{ $cacat->id }}" @if ($ayah->disabilitas_orangtua == $cacat->id) selected @endif>{{ $cacat->nama }}</option>
                                                                                            @endforeach
                                                                                           </select>
                                                                                      
                                                                                      
                                                                                    </div>
                                                                                    @error('cacat_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-6">
                                                                                            <label>Tempat Lahir Ayah:</label>
                                                                                            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="{{ $ayah->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" />
                                                                                            @error('tempat_lahir_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <label>Tanggal Lahir Ayah:</label>
                                                                                            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="{{ $ayah->tanggal_lahir }}" placeholder="Masukkan Tanggal Lahir" />
                                                                                            @error('tanggal_lahir_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                     
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>No Telp/ WhatsApp Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_telp_ayah" name="no_telp_ayah" class="form-control" value="{{ $ayah->no_telp }}"
                                                                                            placeholder="Masukkan No Telp/WhatsApp" />
                                                                                      
                                                                                    </div>
                                                                                    <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                                    @error('no_telp_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>No KTP Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_ktp_ayah" name="no_ktp_ayah" class="form-control" value="{{ $ayah->no_ktp }}"
                                                                                            placeholder="Masukkan Nomor KTP" />
                                                                                       
                                                                                    </div>  
                                                                                    @error('no_ktp_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>No KK Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_kk_ayah" name="no_kk_ayah" class="form-control" value="{{ $ayah->no_kk }}"
                                                                                            placeholder="Masukkan Nomor Kartu Keluarga" />
                                                                                       
                                                                                    </div>
                                                                                    @error('no_kk_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Pekerjaan Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" rows="3">{{ $ayah->pekerjaan }}</textarea>
                                                                                        
                                                                                    </div>
                                                                                    <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
        
                                                                                    @error('pekerjaan_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Penghasilan Setiap Bulan Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">Rp</span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" value="{{ $ayah->penghasilan }}" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                     
                                                                                    </div>
                                                                                    @error('penghasilan_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
        


                                                                            {{-- kalau kosong --}}
                                                                            @empty

                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Status Hidup Ayah:</label>
                                                                                    <div class="radio-inline">
                                                                                        @foreach ($status_hidups as
                                                                                        $status_hidup)
                                                                                        <label
                                                                                            class="radio radio-solid">
                                                                                            <input type="radio"
                                                                                                name="status_hidup"
                                                                                                {{ $status_hidup == old('status_hidup') ? 'checked' : '' }}
                                                                                                value="{{ $status_hidup }}" />
                                                                                            <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                                        @endforeach

                                                                                        @error('status_hidup')
                                                                                        <small
                                                                                            class="text-danger">{{ $message }}</small>
                                                                                        @enderror


                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
        
                                                                                    <label>Nama Ayah:</label>
                                                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah" />
        
                                                                                    @error('nama_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-8">
                                                                                            <label>Alamat Ayah:</label>
                                                                                            <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan alamat sesuai KTP" />
                                                                                            @error('alamat_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <label>RT:</label>
                                                                                            <input type="text" class="form-control" id="rt_ayah" name="rt_ayah" placeholder="RT" />
                                                                                            @error('rt_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <label>RW:</label>
                                                                                            <input type="text" class="form-control" id="rw_ayah" name="rw_ayah" placeholder="RW" />
                                                                                            @error('rw_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-6">
                                                                                          
                                                                                            <label>Kecamatan Ayah:</label>
                                                                                           
                                                                                            <div class="input-group">
                                                                                                
                                                                                                    <select class="form-control select2" id="kecamatan_ayah" name="kecamatan_ayah" placeholder="Pilih Kecamatan" >
                                                                                                        <option label="Label"></option>
                                                                                                        @foreach($kecamatans as $kecamatan)
                                                                                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                                                                                        @endforeach
                                                                                                       </select>
                                                                                                   
                                                                                               
                                                                                            </div>
                                                                                            @error('kecamatan_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            
                                                                                         @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <label>Kelurahan Ayah:</label>
                                                                                            <div class="input-group">
                                                                                               
                                                                                                <select class="form-control select2" id="kelurahan_ayah" name="kelurahan_ayah" placeholder="Pilih Kelurahan" >
                                                                                                    <option label="Label"></option>
                                                                                                 
                                                                                                   </select>
                                                                                              
                                                                                            </div>
                                                                                            @error('kelurahan_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                     
                                                                                       
                                                                                    </div>
                                                                                  
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Disabilitas Ayah:</label>
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <select class="form-control select2" id="cacat_ayah" name="cacat_ayah" placeholder="Pilih Disabilitas" >
                                                                                            <option label="Label"></option>
                                                                                            @foreach($cacats as $cacat)
                                                                                            <option value="{{ $cacat->id }}" @if($cacat->id == '8') selected @endif>{{ $cacat->nama }}</option>
                                                                                            @endforeach
                                                                                           </select>
                                                                                      
                                                                                      
                                                                                    </div>
                                                                                    @error('cacat_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-lg-6">
                                                                                            <label>Tempat Lahir Ayah:</label>
                                                                                            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir" />
                                                                                            @error('tempat_lahir_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <label>Tanggal Lahir Ayah:</label>
                                                                                            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Masukkan Tanggal Lahir" />
                                                                                            @error('tanggal_lahir_ayah')
                                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                     
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>No Telp/ WhatsApp Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_telp_ayah" name="no_telp_ayah" class="form-control"
                                                                                            placeholder="Masukkan No Telp/WhatsApp" />
                                                                                      
                                                                                    </div>
                                                                                    <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                                    @error('no_telp_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>No KTP Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_ktp_ayah" name="no_ktp_ayah" class="form-control"
                                                                                            placeholder="Masukkan Nomor KTP" />
                                                                                       
                                                                                    </div>  
                                                                                    @error('no_ktp_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>No KK Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="no_kk_ayah" name="no_kk_ayah" class="form-control"
                                                                                            placeholder="Masukkan Nomor Kartu Keluarga" />
                                                                                       
                                                                                    </div>
                                                                                    @error('no_kk_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Pekerjaan Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <textarea class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" rows="3"></textarea>
                                                                                        
                                                                                    </div>
                                                                                    <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
        
                                                                                    @error('pekerjaan_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Penghasilan Setiap Bulan Ayah:</label>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">Rp</span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                     
                                                                                    </div>
                                                                                    @error('penghasilan_ayah')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
        

                                                                            @endforelse

                                                                          

											                        
                                                                    
											                      
											                      
											                      
                                                                    <hr><br>
                                                                    {{-- FORM IDENTITAS IBU --}}
                                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Identitas Ibu:</h3>

                                                                    @forelse ($formIbu as $ibu)
                                                                    
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <label>Status Hidup Ibu:</label>
                                                                            <div class="radio-inline">
                                                                                @foreach ($status_hidups as $status_hidup)
                                                                                <label class="radio radio-solid">
                                                                                    <input type="radio" name="status_hidup_ibu"
                                                                                        {{ $ibu->status_hidup->label() == $status_hidup  ? 'checked' : '' }}
                                                                                        value="{{ $status_hidup }}" />
                                                                                    <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                                @endforeach
                                                                         

                                                                            
                                                                            @error('status_hidup_ibu')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                                
                                                                            </div>
                                                                            
											                            </div>
											                          
											                        </div>

                                                                    <div class="form-group row">
											                            <div class="col-lg-6">

											                                <label>Nama Ibu:</label>
											                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $ibu->nama_orangtua }}" placeholder="Masukkan Nama Lengkap Ibu" />
                                                                            @error('nama_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-8">
                                                                                    <label>Alamat Ibu:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $ibu->alamat }}" id="alamat_ibu" name="alamat_ibu" placeholder="Masukkan alamat sesuai KTP" />
                                                                                    @error('alamat_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RT:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $ibu->rt }}" id="rt_ibu" name="rt_ibu" placeholder="RT" />
                                                                                    @error('rt_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RW:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $ibu->rw }}" id="rw_ibu" name="rw_ibu" placeholder="RW" />
                                                                                    @error('rw_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                               
                                                                            </div>
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                  
                                                                                    <label>Kecamatan Ibu:</label>
											                                <div class="input-group">
								
                                                                                    <select class="form-control select2" id="kecamatan_ibu" name="kecamatan_ibu" placeholder="Pilih Kecamatan" >
                                                                                        <option label="Label"></option>
                                                                                        @foreach($kecamatans as $kecamatan)
                                                                                        <option value="{{ $kecamatan->id }}"  @if ($ibu->kecamatan_id == $kecamatan->id) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                                                                                        @endforeach
                                                                                       </select>
                                                                                 
											                                   
											                                </div>
                                                                            @error('kecamatan_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                         @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Kelurahan Ibu:</label>
                                                                                    <div class="input-group">
                                                                                      
                                                                                            <select class="form-control select2" id="kelurahan_ibu" name="kelurahan_ibu" placeholder="Pilih Kelurahan" >
                                                                                                <option label="Label"></option>
                                                                                                @foreach (App\Http\Controllers\User\FormulirController::getNamaKelurahan($ibu->kecamatan_id) as $jd)
                                                                                                <option value="{{ $jd->id }}" @if ($ibu->kelurahan_id == $jd->id) selected @endif>{{ $jd->nama_kelurahan }}</option>
                                                                                              
                                                                                                @endforeach   
                                                                                               </select>
                                                                                    </div>
                                                                                    @error('kelurahan_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                 @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                              
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Disabilitas Ibu:</label>
											                                <div class="input-group">
                                                                               
                                                                                <select class="form-control select2" id="cacat_ibu" name="cacat_ibu" placeholder="Pilih Disabilitas" >
                                                                                    <option label="Label"></option>
                                                                                    @foreach($cacats as $cacat)
                                                                                    <option value="{{ $cacat->id }}" @if ($ibu->disabilitas_orangtua == $cacat->id) selected @endif>{{ $cacat->nama }}</option>
                                                                                    @endforeach
                                                                                   </select>
                                                                              
											                                  
											                                </div>
                                                                            @error('cacat_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Tempat Lahir Ibu:</label>
                                                                                    <input type="text" class="form-control" value="{{ $ibu->tempat_lahir }}" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir" />
                                                                                    @error('tempat_lahir_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                 @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Tanggal Lahir Ibu:</label>
                                                                                    <input type="date" class="form-control" value="{{ $ibu->tanggal_lahir }}" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Masukkan Tanggal Lahir" />
                                                                                    @error('tanggal_lahir_ibu')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No Telp/ WhatsApp Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_telp_ibu" name="no_telp_ibu" value="{{ $ibu->no_telp }}"
											                                        placeholder="Masukkan No Telp/WhatsApp" />
											                                  
											                                </div>
											                                <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                            @error('no_telp_ibu')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>No KTP Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_ktp_ibu" name="no_ktp_ibu" value="{{ $ibu->no_ktp }}"
											                                        placeholder="Masukkan Nomor KTP" />
                                                                                    @error('no_ktp_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                                </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No KK Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_kk_ibu" name="no_kk_ibu" value="{{ $ibu->no_kk }}"
											                                        placeholder="Masukkan Nomor Kartu Keluarga" />
                                                                                    @error('no_kk_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                                </div>
											                              
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>Pekerjaan Ibu:</label>
											                                <div class="input-group">
                                                                                <textarea class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" rows="3">{{ $ibu->pekerjaan }}</textarea>
											                                    
											                                </div>
											                                <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
                                                                            @error('pekerjaan_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Penghasilan Setiap Bulan Ibu:</label>
											                                <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Rp</span>
                                                                                </div>
											                                    <input type="text" class="form-control" value="{{ $ibu->penghasilan }}" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                @error('penghasilan_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                                </div>
											                             
											                            </div>
											                        </div>


                                                                    {{-- kalau kosong --}}
                                                                    @empty
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <label>Status Hidup Ibu:</label>
                                                                            <div class="radio-inline">
                                                                                @foreach ($status_hidups as $status_hidup)
                                                                                <label class="radio radio-solid">
                                                                                    <input type="radio" name="status_hidup_ibu" checked="{{ $status_hidup == old('status_hidup_ibu') ? 'checked' : '' }}" value="{{ $status_hidup }}"/>
                                                                                    <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                             
                                                                            @endforeach
                                                                            @error('status_hidup_ibu')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                                
                                                                            </div>
                                                                            
											                            </div>
											                          
											                        </div>

                                                                    <div class="form-group row">
											                            <div class="col-lg-6">

											                                <label>Nama Ibu:</label>
											                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Lengkap Ibu" />
                                                                            @error('nama_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-8">
                                                                                    <label>Alamat Ibu:</label>
                                                                                    <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" placeholder="Masukkan alamat sesuai KTP" />
                                                                                    @error('alamat_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RT:</label>
                                                                                    <input type="text" class="form-control" id="rt_ibu" name="rt_ibu" placeholder="RT" />
                                                                                    @error('rt_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RW:</label>
                                                                                    <input type="text" class="form-control" id="rw_ibu" name="rw_ibu" placeholder="RW" />
                                                                                    @error('rw_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                               
                                                                            </div>
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                  
                                                                                    <label>Kecamatan Ibu:</label>
											                                <div class="input-group">
								
                                                                                    <select class="form-control select2" id="kecamatan_ibu" name="kecamatan_ibu" placeholder="Pilih Kecamatan" >
                                                                                        <option label="Label"></option>
                                                                                        @foreach($kecamatans as $kecamatan)
                                                                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                                                                        @endforeach
                                                                                       </select>
                                                                                 
											                                   
											                                </div>
                                                                            @error('kecamatan_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                         @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Kelurahan Ibu:</label>
                                                                                    <div class="input-group">
                                                                                      
                                                                                            <select class="form-control select2" id="kelurahan_ibu" name="kelurahan_ibu" placeholder="Pilih Kelurahan" >
                                                                                                <option label="Label"></option>
                                                                                             
                                                                                               </select>
                                                                                    </div>
                                                                                    @error('kelurahan_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                 @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                              
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Disabilitas Ibu:</label>
											                                <div class="input-group">
                                                                               
                                                                                <select class="form-control select2" id="cacat_ibu" name="cacat_ibu" placeholder="Pilih Disabilitas" >
                                                                                    <option label="Label"></option>
                                                                                    @foreach($cacats as $cacat)
                                                                                    <option value="{{ $cacat->id }}" @if($cacat->id == '8') selected @endif>{{ $cacat->nama }}</option>
                                                                                    @endforeach
                                                                                   </select>
                                                                              
											                                  
											                                </div>
                                                                            @error('cacat_ibu')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Tempat Lahir Ibu:</label>
                                                                                    <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir" />
                                                                                    @error('tempat_lahir_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                 @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Tanggal Lahir Ibu:</label>
                                                                                    <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Masukkan Tanggal Lahir" />
                                                                                    @error('tanggal_lahir_ibu')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No Telp/ WhatsApp Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_telp_ibu" name="no_telp_ibu"
											                                        placeholder="Masukkan No Telp/WhatsApp" />
											                                  
											                                </div>
											                                <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                            @error('no_telp_ibu')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>No KTP Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_ktp_ibu" name="no_ktp_ibu"
											                                        placeholder="Masukkan Nomor KTP" />
                                                                                    @error('no_ktp_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                                </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No KK Ibu:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_kk_ibu" name="no_kk_ibu"
											                                        placeholder="Masukkan Nomor Kartu Keluarga" />
                                                                                    @error('no_kk_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                                </div>
											                              
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>Pekerjaan Ibu:</label>
											                                <div class="input-group">
                                                                                <textarea class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" rows="3"></textarea>
											                                    
											                                </div>
											                                <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
                                                                            @error('pekerjaan_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Penghasilan Setiap Bulan Ibu:</label>
											                                <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Rp</span>
                                                                                </div>
											                                    <input type="text" class="form-control"  id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                @error('penghasilan_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                                </div>
											                             
											                            </div>
											                        </div>
                                                                    @endforelse
                                                                 
											                    </div>
											                </div>
											            </div>
											           {{-- FORM IDENTITAS WALI --}}
											            <div class="card">
											                <div class="card-header" id="headingThree3">
											                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree3">
											                        Identitas Wali
											                    </div>
											                </div>
											                <div id="collapseThree3" class="collapse show" data-parent="#accordionExample3">
											                    <div class="card-body">
                                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Identitas Wali:</h3>

                                                                    @forelse ($formWali as $wali)

                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <label>Status Hidup Wali:</label>
                                                                            <div class="radio-inline">
                                                                                @foreach ($status_hidups as $status_hidup)
                                                                                <label class="radio radio-solid">
                                                                                    <input type="radio" name="status_hidup_wali"  {{ $wali->status_hidup->label() == $status_hidup  ? 'checked' : '' }}
                                                                                    value="{{ $status_hidup }}"/>
                                                                                    <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                             
                                                                            @endforeach
                                                                            @error('status_hidup_wali')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                                
                                                                            </div>
                                                                            
											                            </div>
											                          
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">

											                                <label>Nama Wali:</label>
											                                <input type="text" class="form-control"  value="{{ $wali->nama_orangtua }}" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Lengkap Wali" />
                                                                            @error('nama_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                        </div>
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-8">
                                                                                    <label>Alamat Wali:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $wali->alamat }}" id="alamat_wali" name="alamat_wali" placeholder="Masukkan alamat sesuai KTP" />
                                                                                    @error('alamat_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RT:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $wali->rt }}" id="rt_wali" name="rt_wali" placeholder="RT" />
                                                                                    @error('rt_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RW:</label>
                                                                                    <input type="text" class="form-control"  value="{{ $wali->rw }}" id="rw_wali" name="rw_wali" placeholder="RW" />
                                                                                    @error('rw_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                               
                                                                            </div>
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Kecamatan Wali:</label>
                                                                                    <div class="input-group">
								
                                                                                        <select class="form-control select2" id="kecamatan_wali" name="kecamatan_wali" placeholder="Pilih Kecamatan" >
                                                                                            <option label="Label"></option>
                                                                                            @foreach($kecamatans as $kecamatan)
                                                                                            <option value="{{ $kecamatan->id }}" @if ($wali->kecamatan_id == $kecamatan->id) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                                                                                            @endforeach
                                                                                           </select>
                                                                                       
                                                                                   
                                                                                </div>
                                                                                @error('kecamatan_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Kelurahan Wali:</label>
                                                                                    <div class="input-group">
                                                                                      
                                                                                            <select class="form-control select2" id="kelurahan_wali" name="kelurahan_wali" placeholder="Pilih Kelurahan" >
                                                                                                <option label="Label"></option>
                                                                                                @foreach (App\Http\Controllers\User\FormulirController::getNamaKelurahan($wali->kecamatan_id) as $jd)
                                                                                                <option value="{{ $jd->id }}" @if ($wali->kelurahan_id == $jd->id) selected @endif>{{ $jd->nama_kelurahan }}</option>
                                                                                              
                                                                                                @endforeach   
                                                                                               </select>
                                                                                    </div>
                                                                                    @error('kelurahan_wali')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                              
											                               
											                                
											                            </div>
											                            <div class="col-lg-6">
											                                <label>Disabilitas Wali:</label>
											                                <div class="input-group">
                                                                               
                                                                                <select class="form-control select2" id="cacat_wali" name="cacat_wali" placeholder="Pilih Disabilitas" >
                                                                                    <option label="Label"></option>
                                                                                    @foreach($cacats as $cacat)
                                                                                    <option value="{{ $cacat->id }}" @if ($wali->disabilitas_orangtua == $cacat->id) selected @endif>{{ $cacat->nama }}</option>
                                                                                    @endforeach
                                                                                   </select>
                                                                              
											                                  
											                                </div>
                                                                            @error('cacat_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Tempat Lahir Wali:</label>
                                                                                    <input type="text" class="form-control" value="{{ $wali->tempat_lahir }}" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir" />
                                                                                    @error('tempat_lahir_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Tanggal Lahir Wali:</label>
                                                                                    <input type="date" class="form-control" value="{{ $wali->tanggal_lahir }}" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Masukkan Tanggal Lahir" />
                                                                                    @error('tanggal_lahir_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No Telp/ WhatsApp Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_telp_wali" name="no_telp_wali" value="{{ $wali->no_telp }}"
											                                        placeholder="Masukkan No Telp/WhatsApp" />
											                                  
											                                </div>
											                                <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                            @error('no_telp_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>No KTP Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_ktp_wali" name="no_ktp_wali" value="{{ $wali->no_ktp }}"
											                                        placeholder="Masukkan Nomor KTP" />
                                                                                  
											                                </div>
                                                                            @error('no_ktp_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No KK Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_kk_wali" name="no_kk_wali" value="{{ $wali->no_kk }}"
											                                        placeholder="Masukkan Nomor Kartu Keluarga" />
											                                   
											                                </div>
                                                                            @error('no_kk_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>Pekerjaan Wali:</label>
											                                <div class="input-group">
                                                                                <textarea class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" rows="3">{{ $wali->pekerjaan }}</textarea>
											                                    
											                                </div>
											                                <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
                                                                            @error('pekerjaan_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Penghasilan Setiap Bulan Wali:</label>
											                                <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Rp</span>
                                                                                </div>
											                                    <input type="text" class="form-control"  value="{{ $wali->penghasilan }}" id="penghasilan_wali" name="penghasilan_wali" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                @error('penghasilan_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                                </div>
											                             
											                            </div>
											                        </div>

                                                                    {{-- data formwali kosong --}}
                                                                    @empty
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <label>Status Hidup Wali:</label>
                                                                            <div class="radio-inline">
                                                                                @foreach ($status_hidups as $status_hidup)
                                                                                <label class="radio radio-solid">
                                                                                    <input type="radio" name="status_hidup_wali" checked="{{ $status_hidup == old('status_hidup_wali') ? 'checked' : '' }}" value="{{ $status_hidup }}"/>
                                                                                    <span></span>{{ Str::headline($status_hidup) }}</label>
                                                                             
                                                                            @endforeach
                                                                            @error('status_hidup_wali')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                                
                                                                            </div>
                                                                            
											                            </div>
											                          
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">

											                                <label>Nama Wali:</label>
											                                <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Lengkap Wali" />
                                                                            @error('nama_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                        </div>
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-8">
                                                                                    <label>Alamat Wali:</label>
                                                                                    <input type="text" class="form-control" id="alamat_wali" name="alamat_wali" placeholder="Masukkan alamat sesuai KTP" />
                                                                                    @error('alamat_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RT:</label>
                                                                                    <input type="text" class="form-control" id="rt_wali" name="rt_wali" placeholder="RT" />
                                                                                    @error('rt_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                                <div class="col-lg-2">
                                                                                    <label>RW:</label>
                                                                                    <input type="text" class="form-control" id="rw_wali" name="rw_wali" placeholder="RW" />
                                                                                    @error('rw_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                               
                                                                            </div>
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Kecamatan Wali:</label>
                                                                                    <div class="input-group">
								
                                                                                        <select class="form-control select2" id="kecamatan_wali" name="kecamatan_wali" placeholder="Pilih Kecamatan" >
                                                                                            <option label="Label"></option>
                                                                                            @foreach($kecamatans as $kecamatan)
                                                                                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                                                                            @endforeach
                                                                                           </select>
                                                                                       
                                                                                   
                                                                                </div>
                                                                                @error('kecamatan_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Kelurahan Wali:</label>
                                                                                    <div class="input-group">
                                                                                      
                                                                                            <select class="form-control select2" id="kelurahan_wali" name="kelurahan_wali" placeholder="Pilih Kelurahan" >
                                                                                                <option label="Label"></option>
                                                                                             
                                                                                               </select>
                                                                                    </div>
                                                                                    @error('kelurahan_wali')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                              
											                               
											                                
											                            </div>
											                            <div class="col-lg-6">
											                                <label>Disabilitas Wali:</label>
											                                <div class="input-group">
                                                                               
                                                                                <select class="form-control select2" id="cacat_wali" name="cacat_wali" placeholder="Pilih Disabilitas" >
                                                                                    <option label="Label"></option>
                                                                                    @foreach($cacats as $cacat)
                                                                                    <option value="{{ $cacat->id }}" @if($cacat->id == '8') selected @endif>{{ $cacat->nama }}</option>
                                                                                    @endforeach
                                                                                   </select>
                                                                              
											                                  
											                                </div>
                                                                            @error('cacat_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
											                        <div class="form-group row">
											                            <div class="col-lg-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-6">
                                                                                    <label>Tempat Lahir Wali:</label>
                                                                                    <input type="text" class="form-control" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir" />
                                                                                    @error('tempat_lahir_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label>Tanggal Lahir Wali:</label>
                                                                                    <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Masukkan Tanggal Lahir" />
                                                                                    @error('tanggal_lahir_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                </div>
                                                                             
                                                                               
                                                                            </div>
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No Telp/ WhatsApp Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_telp_wali" name="no_telp_wali"
											                                        placeholder="Masukkan No Telp/WhatsApp" />
											                                  
											                                </div>
											                                <span class="form-text text-muted">Wajib WhatsApp</span>
                                                                            @error('no_telp_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>No KTP Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_ktp_wali" name="no_ktp_wali"
											                                        placeholder="Masukkan Nomor KTP" />
                                                                                  
											                                </div>
                                                                            @error('no_ktp_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                            <div class="col-lg-6">
											                                <label>No KK Wali:</label>
											                                <div class="input-group">
											                                    <input type="text" class="form-control" id="no_kk_wali" name="no_kk_wali"
											                                        placeholder="Masukkan Nomor Kartu Keluarga" />
											                                   
											                                </div>
                                                                            @error('no_kk_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                        </div>
                                                                    <div class="form-group row">
											                            <div class="col-lg-6">
											                                <label>Pekerjaan Wali:</label>
											                                <div class="input-group">
                                                                                <textarea class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" rows="3"></textarea>
											                                    
											                                </div>
											                                <span class="form-text text-muted">Jelaskan secara rinci jenis pekerjaan</span>
                                                                            @error('pekerjaan_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
											                            </div>
											                            <div class="col-lg-6">
                                                                            <label>Penghasilan Setiap Bulan Wali:</label>
											                                <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Rp</span>
                                                                                </div>
											                                    <input type="text" class="form-control"  id="penghasilan_wali" name="penghasilan_wali" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                @error('penghasilan_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
											                                </div>
											                             
											                            </div>
											                        </div>
                                                                    @endforelse
                                                                  
											                    </div>
											                </div>
											            </div>
											        </div>



											    </div>
											    <div class="card-footer">
											        <div class="row">
											            <div class="col-lg-6">

											                <a href="{{ route('user.createPengajuanStepOne') }}" class="btn btn-secondary">Sebelumnya</a>
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
@endsection

@push('scripts')

<script>


$(document).ready(function(){ 
$('#kecamatan_ayah').select2({
          placeholder: "Pilih Kecamatan",
          allowClear: true
         });


         $('#kelurahan_ayah').select2({
          placeholder: "Pilih Kelurahan",
          allowClear: true
         });
 
        $("#no_ktp_ayah").keyup(function() {
            $("#no_ktp_ayah").val(this.value.match(/[0-9]*/));
        });


        $("#no_kk_ayah").keyup(function() {
            $("#no_kk_ayah").val(this.value.match(/[0-9]*/));
        });

        
        $("#no_telp_ayah").keyup(function() {
            $("#no_telp_ayah").val(this.value.match(/[0-9]*/));
        });


        $('#kecamatan_ibu').select2({
          placeholder: "Pilih Kecamatan",
          allowClear: true
         });

         $('#cacat_ayah').select2({
          placeholder: "Pilih Disabilitas",
          allowClear: true
         });

         


         $('#kelurahan_ibu').select2({
          placeholder: "Pilih Kelurahan",
          allowClear: true
         });

         $("#no_ktp_ibu").keyup(function() {
            $("#no_ktp_ibu").val(this.value.match(/[0-9]*/));
        });


        $("#no_kk_ibu").keyup(function() {
            $("#no_kk_ibu").val(this.value.match(/[0-9]*/));
        });

        
        $("#no_telp_ibu").keyup(function() {
            $("#no_telp_ibu").val(this.value.match(/[0-9]*/));
        });
        $('#cacat_ibu').select2({
          placeholder: "Pilih Disabilitas",
          allowClear: true
         });


        $('#kecamatan_wali').select2({
          placeholder: "Pilih Kecamatan",
          allowClear: true
         });


         $('#kelurahan_wali').select2({
          placeholder: "Pilih Kelurahan",
          allowClear: true
         });
 
        $("#no_ktp_wali").keyup(function() {
            $("#no_ktp_wali").val(this.value.match(/[0-9]*/));
        });


        $("#no_kk_wali").keyup(function() {
            $("#no_kk_wali").val(this.value.match(/[0-9]*/));
        });

        
        $("#no_telp_wali").keyup(function() {
            $("#no_telp_wali").val(this.value.match(/[0-9]*/));
        });

        $('#cacat_wali').select2({
          placeholder: "Pilih Disabilitas",
          allowClear: true
         });


        var penghasilan_wali = document.getElementById('penghasilan_wali');
        penghasilan_wali.addEventListener('keyup', function(e)
    {
        penghasilan_wali.value = formatRupiah(this.value);
    });

        var penghasilan_ibu = document.getElementById('penghasilan_ibu');
        penghasilan_ibu.addEventListener('keyup', function(e)
    {
        penghasilan_ibu.value = formatRupiah(this.value);
    });


        /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('penghasilan_ayah');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });


  });
     

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan_ayah').change(function(e){
            var id = $(this).find(':selected').val();
            $.get('{{ url('u/kelurahan')}}/'+id, function(data){
                $('#kelurahan_ayah').empty();
                $('#kelurahan_ayah').append(
                    "<option label='Label'></option>"
                );
                $.each(data, function(index, element){
                    $('#kelurahan_ayah').append(
                        "<option value="+element.id+">"+element.nama_kelurahan+"</option>"
                    );
                });
            });


        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan_wali').change(function(e){
            var id = $(this).find(':selected').val();
            $.get('{{ url('u/kelurahan')}}/'+id, function(data){
                $('#kelurahan_wali').empty();
                $('#kelurahan_wali').append(
                    "<option label='Label'></option>"
                );
                $.each(data, function(index, element){
                    $('#kelurahan_wali').append(
                        "<option value="+element.id+">"+element.nama_kelurahan+"</option>"
                    );
                });
            });


        });
    });
</script>




<script type="text/javascript">
    $(document).ready(function(){
        $('#kecamatan_ibu').change(function(e){
            var id = $(this).find(':selected').val();
            $.get('{{ url('u/kelurahan')}}/'+id, function(data){
                $('#kelurahan_ibu').empty();
                $('#kelurahan_ibu').append(
                    "<option label='Label'></option>"
                );
                $.each(data, function(index, element){
                    $('#kelurahan_ibu').append(
                        "<option value="+element.id+">"+element.nama_kelurahan+"</option>"
                    );
                });
            });


        });
    });
</script>
@endpush