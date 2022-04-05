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
                                            <form action="{{ route('user.createPengajuanStepOnePost') }}" method="post" enctype="multipart/form-data">
                                                @csrf
												<div class="card-body">
                                                    <h3 class="font-size-lg text-dark font-weight-bold mb-6">Identitas Mahasiswa:</h3>

                                                   @if ($forms == null)
                                                            {{-- form kosong --}}
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Nama Mahasiswa:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Panjang" />
                                                                    @error('nama')
                                                                    <span class="form-text text-danger">Nama harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Kecamatan:<b style="color:red">*</b></label> 
                                                                    <select class="form-control select2" id="kecamatan" name="kecamatan" placeholder="Pilih Kecamatan" >
                                                                        <option label="Label"></option>
                                                                        @foreach($kecamatans as $kecamatan)
                                                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                                                        @endforeach
                                                                       </select>
                                                                    @error('kecamatan')
                                                                       <span class="form-text text-danger">Pilih salah satu kecamatan</span>
                                                                    @enderror
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-8">
                                                                            <label>Alamat:<b style="color:red">*</b></label>
                                                                            <input type="text" class="form-control" id="jalan" name="jalan" placeholder="Masukkan nama jalan sesuai KTP" />
                                                                            @error('jalan')
                                                                            <span class="form-text text-danger">Alamat harus diisi</span>
                                                                         @enderror
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <label>RT:<b style="color:red">*</b></label>
                                                                            <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" />
                                                                            @error('rt')
                                                                             <span class="form-text text-danger">RT harus diisi</span>
                                                                             @enderror
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <label>RW:<b style="color:red">*</b></label>
                                                                            <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" />
                                                                            @error('rw')
                                                                            <span class="form-text text-danger">RW harus diisi</span>
                                                                         @enderror
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Kelurahan:<b style="color:red">*</b></label>
                                                                    <div class="input-group">
                                                                        <select class="form-control select2" id="kelurahan" name="kelurahan" placeholder="Pilih Kelurahan" >
                                                                            <option label="Label"></option>
                                                                         
                                                                           </select>
                                                                    
                                                                    </div>
                                                                    @error('kelurahan')
                                                                    <span class="form-text text-danger">Pilih salah satu kelurahan</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Tempat Lahir:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" />
                                                                    @error('tempat_lahir')
                                                                    <span class="form-text text-danger">Tempat lahir harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Tanggal Lahir:<b style="color:red">*</b></label>
                                                                
                                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  placeholder="Masukkan Tanggal Lahir" />
                                                                    @error('tanggal_lahir')
                                                                    <span class="form-text text-danger">Tanggal lahir harus diisi</span>
                                                                 @enderror
                                                               
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>No KTP:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="ktp" name="ktp" placeholder="Masukkan Nomor KTP" />
                                                                    @error('ktp')
                                                                    <span class="form-text text-danger">Nomor KTP harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>No KK:<b style="color:red">*</b></label>
        
                                                                    <div class="input-group">
                                                                    <input type="text" class="form-control" id="kk" name="kk" placeholder="Masukkan Nomor Kartu Keluarga" />
                                                                  
                                                                    </div>
                                                                    <div id="nik_found" style="display:none;">
                                                                        <span class="form-text text-danger"  >Anda tidak bisa melakukan pengajuan karena No KK tersebut sudah terdaftar di pengajuan Bantuan Beasiswa Mahasiswa. </span>
                                                                      
                                                                       </div>
        
                                                                       <div id="nik_not_found" style="display:none;">
                                                                        <span class="form-text text-info" >No KK belum terdaftar, Silahkan melanjutkan pengisian formulir untuk mengajukan Bantuan Beasiswa.  </span>
                                                                      
                                                                       </div>
                                                                    @error('kk')
                                                                    <span class="form-text text-danger">Nomor KK harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
        
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>No Telp/WhatsApp (Wajib WhatsApp):<b style="color:red">*</b></label>
                                                                    <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Masukkan No Telp/WhatsApp" />
                                                                 <span class="form-text text-muted">Wajib WhatsApp</span>

                                                                 @error('no_telp')
                                                                 <span class="form-text text-danger">No Telp/WhatsApp harus diisi</span>
                                                                @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Asal Sekolah (SMA/SMK):<b style="color:red">*</b></label>
                                                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" placeholder="Masukkan Asal Sekolah" />
                                                                    @error('asal_sekolah')
                                                                    <span class="form-text text-danger">Asal sekolah harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
        
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-6">
                                                                            <label>Nilai Rata-Rata Ujian Sekolah:</label>
                                                                            <input type="number" class="form-control" id="nilai_ujian_sekolah" name="nilai_ujian_sekolah"  step="0.01" placeholder="Nilai Rata-Rata Ujian Sekolah" />
                                                                            <span class="form-text text-muted">Bagi Mahasiswa Baru</span>
                                                                            @error('nilai_ujian_sekolah')
                                                                            <span class="form-text text-danger">Nilai Rata-rata ujian harus diisi</span>
                                                                         @enderror
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label>Nilai IPK:</label>
                                                                            <input type="number" class="form-control" id="nilai_ipk" name="nilai_ipk" step="0.01" placeholder="Nilai Indeks Prestasi Kumulatif" />
                                                                            <span class="form-text text-muted">Bagi Mahasiswa Lama</span>
                                                                            @error('nilai_ipk')
                                                                            <span class="form-text text-danger">Nilai IPK Harus diisi</span>
                                                                         @enderror
                                                                        </div>
                                                                    
                                                                       
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Nama Universitas:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" placeholder="Masukkan Nama Universitas" />
                                                                    @error('nama_universitas')
                                                                    <span class="form-text text-danger">Nama Universitas harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
        
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>No Induk Mahasiswa:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="no_induk_mahasiswa" name="no_induk_mahasiswa" placeholder="Masukkan Nomor Induk Mahasiswa" />
                                                                    @error('no_induk_mahasiswa')
                                                                    <span class="form-text text-danger">No Induk mahasiswa harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Tahun Masuk Universitas:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="tahun_masuk_universitas" name="tahun_masuk_universitas"  placeholder="Masukkan Tahun Masuk Universitas" />
                                                                    @error('tahun_masuk_universitas')
                                                                    <span class="form-text text-danger">Tahun masuk universitas harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Jenjang/Strata:<b style="color:red">*</b></label>
                                                                    <select class="form-control select2" id="jenjang" name="jenjang" placeholder="Masukkan Jenjang/Strata" >
                                                                        <option label="Label"></option>
                                                                        @foreach($jenjangs as $jenjang)
                                                                        <option value="{{ $jenjang->id }}">{{ $jenjang->nama_jenjang }}</option>
                                                                        @endforeach
                                                                       </select>

                                                                       @error('jenjang')
                                                                       <span class="form-text text-danger">Pilih salah satu jenjang</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Fakultas:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Masukkan Nama Fakultas" />
                                                                    @error('fakultas')
                                                                    <span class="form-text text-danger">Nama Fakultas harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
        
        
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Jurusan/Program Studi:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Nama Jurusan/Program Studi" />
                                                                    @error('jurusan')
                                                                    <span class="form-text text-danger">Nama Jurusan/Program Studi harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Semester:<b style="color:red">*</b></label>
                                                                    <input type="number" class="form-control" id="semester" name="semester" placeholder="Masukkan Semester Saat ini" />
                                                                    @error('semester')
                                                                    <span class="form-text text-danger">Semester saat ini harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            </div>
                                                   @else
                                                       {{-- form tidak kosong --}}
                                                       <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Nama Mahasiswa:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $forms->nama }}" placeholder="Masukkan Nama Panjang" />
                                                            @error('nama')
                                                            <span class="form-text text-danger">Nama harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Kecamatan:<b style="color:red">*</b></label> 
                                                            <select class="form-control select2" id="kecamatan" name="kecamatan" placeholder="Pilih Kecamatan" >
                                                                <option label="Label"></option>
                                                                @foreach($kecamatans as $kecamatan)
                                                                <option value="{{ $kecamatan->id }}"  @if ($forms->kecamatan_id == $kecamatan->id) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
                                                                @endforeach
                                                               </select>
                                                            @error('kecamatan')
                                                               <span class="form-text text-danger">Pilih salah satu kecamatan</span>
                                                            @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group row">
                                                                <div class="col-lg-8">
                                                                    <label>Alamat:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" value="{{ $forms->alamat }}" id="jalan" name="jalan" placeholder="Masukkan nama jalan sesuai KTP" />
                                                                    @error('jalan')
                                                                    <span class="form-text text-danger">Alamat harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <label>RT:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" value="{{ $forms->rt }}" id="rt" name="rt" placeholder="RT" />
                                                                    @error('rt')
                                                                     <span class="form-text text-danger">RT harus diisi</span>
                                                                     @enderror
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <label>RW:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" value="{{ $forms->rw }}"  id="rw" name="rw" placeholder="RW" />
                                                                    @error('rw')
                                                                    <span class="form-text text-danger">RW harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Kelurahan:<b style="color:red">*</b></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2" id="kelurahan" name="kelurahan" placeholder="Pilih Kelurahan" >
                                                                    <option label="Label"></option>
                                                                    @foreach (App\Http\Controllers\User\FormulirController::getNamaKelurahan($forms->kecamatan_id) as $jd)
                                                                    <option value="{{ $jd->id }}" @if ($forms->kelurahan_id == $jd->id) selected @endif>{{ $jd->nama_kelurahan }}</option>
                                                                  
                                                                    @endforeach   
                                                                   </select>
                                                            
                                                            </div>
                                                            @error('kelurahan')
                                                            <span class="form-text text-danger">Pilih salah satu kelurahan</span>
                                                         @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Tempat Lahir:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->tempat_lahir }}"  id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" />
                                                            @error('tempat_lahir')
                                                            <span class="form-text text-danger">Tempat lahir harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Tanggal Lahir:<b style="color:red">*</b></label>
                                                        
                                                            <input type="date" class="form-control" value="{{ $forms->tanggal_lahir }}"  id="tanggal_lahir" name="tanggal_lahir"  placeholder="Masukkan Tanggal Lahir" />
                                                            @error('tanggal_lahir')
                                                            <span class="form-text text-danger">Tanggal lahir harus diisi</span>
                                                         @enderror
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No KTP:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->no_ktp }}"  id="ktp" name="ktp" placeholder="Masukkan Nomor KTP" />
                                                            @error('ktp')
                                                            <span class="form-text text-danger">Nomor KTP harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>No KK:<b style="color:red">*</b></label>
                                                           
                                                            <div class="input-group">
                                                            <input type="text" class="form-control" value="{{ $forms->no_kk }}" id="kk" name="kk" placeholder="Masukkan Nomor Kartu Keluarga" />
                                                          
                                                            </div>
                                                          
                                                            <div id="nik_found" style="display:none;">
                                                                <span class="form-text text-danger"  >Salah satu NoNo KK tersebut sudah terdaftar di pengajuan Bantuan Beasiswa Mahasiswa. </span>
                                                              
                                                               </div>

                                                               <div id="nik_not_found" style="display:none;">
                                                                <span class="form-text text-success" >NIK tersebut bisa digunakan karena belum terdaftar di data penduduk.  </span>
                                                              
                                                               </div>
                                                             
                                                            @error('kk')
                                                            <span class="form-text text-danger">Nomor KK harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No Telp/WhatsApp (Wajib WhatsApp):<b style="color:red">*</b></label>
                                                            <input type="text" value="{{ $forms->no_telp }}"  id="no_telp" name="no_telp" class="form-control" placeholder="Masukkan No Telp/WhatsApp" />
                                                         <span class="form-text text-muted">Wajib WhatsApp</span>

                                                         @error('no_telp')
                                                         <span class="form-text text-danger">No Telp/WhatsApp harus diisi</span>
                                                        @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Asal Sekolah (SMA/SMK):<b style="color:red">*</b></label>
                                                            <input type="text" id="asal_sekolah" value="{{ $forms->asal_sekolah }}"  name="asal_sekolah" class="form-control" placeholder="Masukkan Asal Sekolah" />
                                                            @error('asal_sekolah')
                                                            <span class="form-text text-danger">Asal sekolah harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label>Nilai Rata-Rata Ujian Sekolah:</label>
                                                                    <input type="number" class="form-control" value="{{ $forms->nilai_rata_ujian_sekolah }}"  id="nilai_ujian_sekolah" name="nilai_ujian_sekolah"  step="0.01" placeholder="Nilai Rata-Rata Ujian Sekolah" />
                                                                    <span class="form-text text-muted">Bagi Mahasiswa Baru</span>
                                                                    @error('nilai_ujian_sekolah')
                                                                    <span class="form-text text-danger">Nilai Rata-rata ujian harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Nilai IPK:</label>
                                                                    <input type="number" class="form-control" value="{{ $forms->nilai_ipk }}"  id="nilai_ipk" name="nilai_ipk" step="0.01" placeholder="Nilai Indeks Prestasi Kumulatif" />
                                                                    <span class="form-text text-muted">Bagi Mahasiswa Lama</span>
                                                                    @error('nilai_ipk')
                                                                    <span class="form-text text-danger">Nilai IPK Harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            
                                                               
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Nama Universitas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->nama_universitas }}" id="nama_universitas" name="nama_universitas" placeholder="Masukkan Nama Universitas" />
                                                            @error('nama_universitas')
                                                            <span class="form-text text-danger">Nama Universitas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No Induk Mahasiswa:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->no_induk_mahasiswa }}"  id="no_induk_mahasiswa" name="no_induk_mahasiswa" placeholder="Masukkan Nomor Induk Mahasiswa" />
                                                            @error('no_induk_mahasiswa')
                                                            <span class="form-text text-danger">No Induk mahasiswa harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Tahun Masuk Universitas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->tahun_masuk_universitas }}"  id="tahun_masuk_universitas" name="tahun_masuk_universitas"  placeholder="Masukkan Tahun Masuk Universitas" />
                                                            @error('tahun_masuk_universitas')
                                                            <span class="form-text text-danger">Tahun masuk universitas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Jenjang/Strata:<b style="color:red">*</b></label>
                                                            <select class="form-control select2" id="jenjang" name="jenjang" placeholder="Masukkan Jenjang/Strata" >
                                                                <option label="Label"></option>
                                                                @foreach($jenjangs as $jenjang)
                                                                <option value="{{ $jenjang->id }}"  @if ($forms->jenjang_id == $jenjang->id) selected @endif>{{ $jenjang->nama_jenjang }}</option>
                                                                @endforeach
                                                               </select>

                                                               @error('jenjang')
                                                               <span class="form-text text-danger">Pilih salah satu jenjang</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Fakultas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->fakultas }}" id="fakultas" name="fakultas" placeholder="Masukkan Nama Fakultas" />
                                                            @error('fakultas')
                                                            <span class="form-text text-danger">Nama Fakultas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Jurusan/Program Studi:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" value="{{ $forms->jurusan }}" id="jurusan" name="jurusan" placeholder="Masukkan Nama Jurusan/Program Studi" />
                                                            @error('jurusan')
                                                            <span class="form-text text-danger">Nama Jurusan/Program Studi harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Semester:<b style="color:red">*</b></label>
                                                            <input type="number" class="form-control" value="{{ $forms->semester }}"  id="semester" name="semester" placeholder="Masukkan Semester Saat ini" />
                                                            @error('semester')
                                                            <span class="form-text text-danger">Semester saat ini harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>
                                                   @endif
                                                    
                                                    

												
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															{{-- <button type="reset" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button> --}}
														</div>
														<div class="col-lg-6 text-lg-right">
															<button type="submit" id="btn_sbmt" class="btn btn-danger">Simpan & Lanjutkan</button>
															<button type="submit" id="btn_disabled" disabled style="display: none;" class="btn btn-danger">Simpan & Lanjutkan</button>
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
     $('#kecamatan').select2({
          placeholder: "Pilih Kecamatan",
          allowClear: true
         });


         $('#kelurahan').select2({
          placeholder: "Pilih Kelurahan",
          allowClear: true
         });


         $('#jenjang').select2({
          placeholder: "Masukkan Jenjang/Strata",
          allowClear: true
         });
         
     
 
        $("#ktp").keyup(function() {
            $("#ktp").val(this.value.match(/[0-9]*/));
        });


        $("#kk").keyup(function() {
            $("#kk").val(this.value.match(/[0-9]*/));
        });

        
        $("#no_telp").keyup(function() {
            $("#no_telp").val(this.value.match(/[0-9]*/));
        });

        $("#tahun_masuk_universitas").keyup(function() {
            $("#tahun_masuk_universitas").val(this.value.match(/[0-9]*/));
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


<script>
    
        $(document).ready(function(){
        
            $('#kk').change(function(e){
            var x = document.getElementById("nik_found");
            var z = document.getElementById("nik_not_found");
            var kk = document.getElementById("kk").value;
            var ktp = document.getElementById("ktp").value;
            var btn_sbmt = document.getElementById("btn_sbmt");
            var btn_dsbld = document.getElementById("btn_disabled");
           
            $.get('{{ url('u/formulir/cari')}}/'+kk, function(data){
                if (data.length >= 1) {
                    x.style.display = '';
                    z.style.display = "none";
                    btn_dsbld.style.display = null;
                    btn_sbmt.style.display = "none";
            
                }else{
                    z.style.display = '';
                    x.style.display = "none";
                    btn_dsbld.style.display = "none";
                    btn_sbmt.style.display = null;
                    
                }
            });
        });

        });
   
</script>
@endpush