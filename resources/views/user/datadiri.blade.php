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
										<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Data Diri</h2>
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
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center flex-wrap">
									<!--begin::Button-->
									<a href="{{ route('user.editDataDiri') }}" class="btn btn-warning btn-fixed-height font-weight-bold px-2 px-lg-5 mr-2">
										<span class="svg-icon svg-icon-lg">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Add-user.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                </g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="d-none d-md-inline">Ubah Data Diri</span>
									</a>
									<!--end::Button-->
                                    <!--begin::Button-->
									<a href="{{ route('user.cetakFormulir') }}" class="btn btn-primary btn-fixed-height font-weight-bold px-2 px-lg-5 mr-2">
										<span class="svg-icon svg-icon-lg">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Add-user.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                                </g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<span class="d-none d-md-inline">Cetak Formulir</span>
									</a>
									<!--end::Button-->
									{{-- <!--begin::Dropdown-->
									<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-primary btn-fixed-height font-weight-bold px-2 px-lg-5 mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-lg">
												<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Files/File.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
														<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
											<span class="d-none d-md-inline">Cetak Formulir</span>
										</a>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover">
												<li class="navi-header font-weight-bold py-4">
													<span class="font-size-lg">Choose Label:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer py-4">
													<a class="btn btn-clean font-weight-bold btn-sm" href="#">
													<i class="ki ki-plus icon-sm"></i>Add new</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown--> --}}
								
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">

                                <!--begin::Card-->
								<div class="card card-custom gutter-b">
									<div class="card-body">
										<!--begin::Details-->
										<div class="d-flex mb-9">
											<!--begin: Pic-->
											<div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
												<div class="symbol symbol-50 symbol-lg-120">
													<img src="{{ asset('landing/assets/images/graduated.png') }}" alt="image" />
												</div>
												<div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
													<span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
												</div>
											</div>
											<!--end::Pic-->
											<!--begin::Info-->
											<div class="flex-grow-1">
												<!--begin::Title-->
												<div class="d-flex justify-content-between flex-wrap mt-1">
													<div class="d-flex mr-3">
														<p class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $formulir->nama }}</p>
														<span class="label label-warning label-pill label-inline mr-2">{{ $formulir->verifikasi_pengajuan }}</span>
													</div>
													{{-- <div class="my-lg-0 my-3">
														<a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">ask</a>
														<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">hire</a>
													</div> --}}
												</div>
												<!--end::Title-->
												<!--begin::Content-->
												<div class="d-flex flex-wrap justify-content-between mt-1">
													<div class="d-flex flex-column flex-grow-1 pr-8">
														<div class="d-flex flex-wrap mb-4">
															<p class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<i class="flaticon2-new-email mr-2 font-size-lg"></i>{{ Auth::user()->email; }}</p>
															<p class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{ $formulir->no_telp }}</p>
															<p class="text-dark-50 text-hover-primary font-weight-bold">
															<i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{ $formulir->kecamatan->nama_kecamatan }}, {{ $formulir->kelurahan->nama_kelurahan }}</p>
														</div>
														<span class="font-weight-bold text-dark-50">{{ $formulir->alamat }}</span>
													</div>
													<div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-10">
														<span class="font-weight-bold text-dark-75">Kelengkapan Formulir</span>
														

                                                            @if ($formulir->form_submitted == "0")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                             </div>
														    <span class="font-weight-bolder text-dark">0%</span>
                                                            @elseif ($formulir->form_submitted == "1")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                 </div>
                                                                <span class="font-weight-bolder text-dark">20%</span>
                                                            @elseif($formulir->form_submitted == "2")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                 </div>
                                                                <span class="font-weight-bolder text-dark">40%</span>
                                                            @elseif($formulir->form_submitted == "3")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                                <div class="progress-bar bg-yellow" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                 </div>
                                                                <span class="font-weight-bolder text-dark">60%</span>
                                                            @elseif($formulir->form_submitted == "4")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                                <div class="progress-bar bg-yellow" role="progressbar" style="width: 80%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                 </div>
                                                                <span class="font-weight-bolder text-dark">80%</span>
                                                            @elseif($formulir->form_submitted == "5")
                                                            <div class="progress progress-xs mx-3 w-100">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                 </div>
                                                                <span class="font-weight-bolder text-dark">100%</span>
                                                            @else
                                                                
                                                            @endif
															
														
													</div>
												</div>
												<!--end::Content-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Details-->
									
									</div>
								</div>
								<!--end::Card-->


								<div class="card card-custom gutter-b">
                                    <div class="card-header card-header-tabs-line">
                                        <div class="card-toolbar">
                                            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                                                        <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                                        <span class="nav-text">Identitas Diri</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                                                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="nav-text">Identitas Orang Tua</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_4">
                                                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                                                        <span class="nav-text">Identitas Status Ekonomi</span>
                                                    </a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                   
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                              
                                                     @if ($formulir != null)
                                                     {{-- formulir tidak kosong --}}

                                                     <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Nama Mahasiswa:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $formulir->nama }}" placeholder="Masukkan Nama Panjang" disabled />
                                                            @error('nama')
                                                            <span class="form-text text-danger">Nama harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Kecamatan:<b style="color:red">*</b></label> 
                                                            <select class="form-control select2" disabled id="kecamatan" name="kecamatan" placeholder="Pilih Kecamatan" >
                                                                <option label="Label"></option>
                                                                @foreach($kecamatans as $kecamatan)
                                                                <option value="{{ $kecamatan->id }}" @if ($formulir->kecamatan_id == $kecamatan->id) selected @endif>{{ $kecamatan->nama_kecamatan }}</option>
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
                                                                    <input type="text" class="form-control" disabled id="jalan" name="jalan" value="{{ $formulir->alamat }}" placeholder="Masukkan nama jalan sesuai KTP" />
                                                                    @error('jalan')
                                                                    <span class="form-text text-danger">Alamat harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <label>RT:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" disabled id="rt" name="rt" value="{{ $formulir->rt }}" placeholder="RT" />
                                                                    @error('rt')
                                                                     <span class="form-text text-danger">RT harus diisi</span>
                                                                     @enderror
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <label>RW:<b style="color:red">*</b></label>
                                                                    <input type="text" class="form-control" disabled id="rw" name="rw" value="{{ $formulir->rw }}" placeholder="RW" />
                                                                    @error('rw')
                                                                    <span class="form-text text-danger">RW harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Kelurahan:<b style="color:red">*</b></label>
                                                            <div class="input-group">
                                                                <select class="form-control select2" disabled id="kelurahan" name="kelurahan" >
                                                                    <option label="Label"></option>
                                                                    @foreach (App\Http\Controllers\User\FormulirController::getNamaKelurahan($formulir->kecamatan_id) as $jd)
                                                                    <option value="{{ $jd->id }}" @if ($formulir->kelurahan_id == $jd->id) selected @endif>{{ $jd->nama_kelurahan }}</option>
                                                                  
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
                                                            <input type="text" class="form-control" id="tempat_lahir" disabled name="tempat_lahir" value="{{ $formulir->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" />
                                                            @error('tempat_lahir')
                                                            <span class="form-text text-danger">Tempat lahir harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Tanggal Lahir:<b style="color:red">*</b></label>
                                                        
                                                            <input type="date" class="form-control" id="tanggal_lahir" disabled name="tanggal_lahir" value="{{ $formulir->tanggal_lahir }}" placeholder="Masukkan Tanggal Lahir" />
                                                            @error('tanggal_lahir')
                                                            <span class="form-text text-danger">Tanggal lahir harus diisi</span>
                                                         @enderror
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No KTP:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="ktp" name="ktp" disabled placeholder="Masukkan Nomor KTP" value="{{ $formulir->no_ktp }}" />
                                                            @error('ktp')
                                                            <span class="form-text text-danger">Nomor KTP harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>No KK:<b style="color:red">*</b></label>

                                                            <div class="input-group">
                                                            <input type="text" class="form-control" id="kk" name="kk" disabled placeholder="Masukkan Nomor Kartu Keluarga" value="{{ $formulir->no_kk }}" />
                                                           
                                                            </div>
                                                            @error('kk')
                                                            <span class="form-text text-danger">Nomor KK harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No Telp/WhatsApp (Wajib WhatsApp):<b style="color:red">*</b></label>
                                                            <input type="text" id="no_telp" name="no_telp" class="form-control" disabled value="{{ $formulir->no_telp }}" placeholder="Masukkan No Telp/WhatsApp" />
                                                         <span class="form-text text-muted">Wajib WhatsApp</span>

                                                         @error('no_telp')
                                                         <span class="form-text text-danger">No Telp/WhatsApp harus diisi</span>
                                                        @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Asal Sekolah (SMA/SMK):<b style="color:red">*</b></label>
                                                            <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" disabled value="{{ $formulir->asal_sekolah }}" placeholder="Masukkan Asal Sekolah" />
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
                                                                    <input type="number" class="form-control" id="nilai_ujian_sekolah" disabled name="nilai_ujian_sekolah" value="{{ $formulir->nilai_rata_ujian_sekolah }}"  step="0.01" placeholder="Nilai Rata-Rata Ujian Sekolah" />
                                                                    <span class="form-text text-muted">Bagi Mahasiswa Baru</span>
                                                                    @error('nilai_ujian_sekolah')
                                                                    <span class="form-text text-danger">Nilai Rata-rata ujian harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Nilai IPK:</label>
                                                                    <input type="number" class="form-control" id="nilai_ipk" name="nilai_ipk" disabled step="0.01" value="{{ $formulir->nilai_ipk }}" placeholder="Nilai Indeks Prestasi Kumulatif" />
                                                                    <span class="form-text text-muted">Bagi Mahasiswa Lama</span>
                                                                    @error('nilai_ipk')
                                                                    <span class="form-text text-danger">Nilai IPK Harus diisi</span>
                                                                 @enderror
                                                                </div>
                                                            
                                                               
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Nama Universitas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" disabled value="{{ $formulir->nama_universitas }}" placeholder="Masukkan Nama Universitas" />
                                                            @error('nama_universitas')
                                                            <span class="form-text text-danger">Nama Universitas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>No Induk Mahasiswa:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="no_induk_mahasiswa" name="no_induk_mahasiswa" disabled value="{{ $formulir->no_induk_mahasiswa }}" placeholder="Masukkan Nomor Induk Mahasiswa" />
                                                            @error('no_induk_mahasiswa')
                                                            <span class="form-text text-danger">No Induk mahasiswa harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Tahun Masuk Universitas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="tahun_masuk_universitas" name="tahun_masuk_universitas" disabled value="{{ $formulir->tahun_masuk_universitas }}"  placeholder="Masukkan Tahun Masuk Universitas" />
                                                            @error('tahun_masuk_universitas')
                                                            <span class="form-text text-danger">Tahun masuk universitas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Jenjang/Strata:<b style="color:red">*</b></label>
                                                            <select class="form-control select2" id="jenjang" name="jenjang" placeholder="Masukkan Jenjang/Strata" disabled >
                                                                <option label="Label"></option>
                                                                @foreach($jenjangs as $jenjang)
                                                                <option value="{{ $jenjang->id }}" @if ($formulir->jenjang_id == $jenjang->id) selected @endif >{{ $jenjang->nama_jenjang }}</option>
                                                                @endforeach
                                                               </select>

                                                               @error('jenjang')
                                                               <span class="form-text text-danger">Pilih salah satu jenjang</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Fakultas:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="fakultas" name="fakultas" value="{{ $formulir->fakultas }}" disabled placeholder="Masukkan Nama Fakultas" />
                                                            @error('fakultas')
                                                            <span class="form-text text-danger">Nama Fakultas harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Jurusan/Program Studi:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $formulir->jurusan }}"  disabled placeholder="Masukkan Nama Jurusan/Program Studi" />
                                                            @error('jurusan')
                                                            <span class="form-text text-danger">Nama Jurusan/Program Studi harus diisi</span>
                                                         @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>Semester:<b style="color:red">*</b></label>
                                                            <input type="number" class="form-control" id="semester" name="semester"  value="{{ $formulir->semester }}" disabled placeholder="Masukkan Semester Saat ini" />
                                                            @error('semester')
                                                            <span class="form-text text-danger">Semester saat ini harus diisi</span>
                                                         @enderror
                                                        </div>
                                                    </div>
                                                     @else
                                                     {{-- formulir kosong --}}
                                                     <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>Nama Mahasiswa:<b style="color:red">*</b></label>
                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Panjang" disabled />
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
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-secondary" onclick="cariNIK()">Cek Ketersediaan</button>
                                                            </div>
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

                                                     @endif
                                                      
                                                   
                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
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
                                                                                        <input type="radio" disabled
                                                                                            name="status_hidup"
                                                                                            {{ $ayah->status_hidup->label() == $status_hidup  ? 'checked' : '' }}
                                                                                            value="{{ $status_hidup }}" />
                                                                                        <span></span>{{ Str::headline($status_hidup) }} </label>
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
                                                                                <input type="text" class="form-control" id="nama_ayah" disabled name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah" value="{{ $ayah->nama_orangtua }}"/>
    
                                                                                @error('nama_ayah')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <div class="col-lg-8">
                                                                                        <label>Alamat Ayah:</label>
                                                                                        <input type="text" class="form-control"  disabled value="{{ $ayah->alamat }}" id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan alamat sesuai KTP" />
                                                                                        @error('alamat_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <label>RT:</label>
                                                                                        <input type="text" class="form-control" disabled  value="{{ $ayah->rt }}" id="rt_ayah" name="rt_ayah" placeholder="RT" />
                                                                                        @error('rt_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <label>RW:</label>
                                                                                        <input type="text" class="form-control" disabled id="rw_ayah" name="rw_ayah"  value="{{ $ayah->rw }}" placeholder="RW" />
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
                                                                                        <input type="text" class="form-control" disabled id="kecamatan_ayah_view" name="kecamatan_ayah_view"  value="{{ $ayah->kecamatan->nama_kecamatan }}" placeholder="RW" />
                                                                                        
                                                                                        @error('kecamatan_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        
                                                                                     @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <label>Kelurahan Ayah:</label>
                                                                                        <input type="text" class="form-control" disabled id="kelurahan_ayah_view" name="kelurahan_ayah_view"  value="{{ $ayah->kelurahan->nama_kelurahan }}" placeholder="RW" />
                                                                                        
                                                                                        @error('kelurahan_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                 
                                                                                   
                                                                                </div>
                                                                              
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Disabilitas Ayah:</label>
                                                                                <div class="input-group">
                                                                                   
                                                                                    <input type="text" class="form-control" disabled id="kelurahan_ayah_view" name="kelurahan_ayah_view"  value="{{ $ayah->cacat->nama }}" placeholder="RW" />
                                                                                        
                                                                                  
                                                                                  
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
                                                                                        <input type="text" class="form-control" disabled id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="{{ $ayah->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" />
                                                                                        @error('tempat_lahir_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <label>Tanggal Lahir Ayah:</label>
                                                                                        <input type="date" class="form-control" disabled id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="{{ $ayah->tanggal_lahir }}" placeholder="Masukkan Tanggal Lahir" />
                                                                                        @error('tanggal_lahir_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                 
                                                                                   
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>No Telp/ WhatsApp Ayah:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" id="no_telp_ayah"  disabled name="no_telp_ayah" class="form-control" value="{{ $ayah->no_telp }}"
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
                                                                                    <input type="text" id="no_ktp_ayah"  disabled name="no_ktp_ayah" class="form-control" value="{{ $ayah->no_ktp }}"
                                                                                        placeholder="Masukkan Nomor KTP" />
                                                                                   
                                                                                </div>  
                                                                                @error('no_ktp_ayah')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>No KK Ayah:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" id="no_kk_ayah" disabled name="no_kk_ayah" class="form-control" value="{{ $ayah->no_kk }}"
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
                                                                                    <textarea class="form-control" disabled id="pekerjaan_ayah" name="pekerjaan_ayah" rows="3">{{ $ayah->pekerjaan }}</textarea>
                                                                                    
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
                                                                                    <input type="text" class="form-control" disabled value="{{ $ayah->penghasilan }}" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                 
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
                                                                                        <input type="radio" disabled
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
                                                                                <input type="text" class="form-control" disabled id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah" />
    
                                                                                @error('nama_ayah')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group row">
                                                                                    <div class="col-lg-8">
                                                                                        <label>Alamat Ayah:</label>
                                                                                        <input type="text" class="form-control" disabled id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan alamat sesuai KTP" />
                                                                                        @error('alamat_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <label>RT:</label>
                                                                                        <input type="text" class="form-control" disabled id="rt_ayah" name="rt_ayah" placeholder="RT" />
                                                                                        @error('rt_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <label>RW:</label>
                                                                                        <input type="text" class="form-control" disabled id="rw_ayah" name="rw_ayah" placeholder="RW" />
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
                                                                                            
                                                                                                <select class="form-control select2" disabled id="kecamatan_ayah" name="kecamatan_ayah" placeholder="Pilih Kecamatan" >
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
                                                                                           
                                                                                            <select class="form-control select2" disabled id="kelurahan_ayah" name="kelurahan_ayah" placeholder="Pilih Kelurahan" >
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
                                                                                   
                                                                                    <select class="form-control select2" id="cacat_ayah" disabled name="cacat_ayah" placeholder="Pilih Disabilitas" >
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
                                                                                        <input type="text" class="form-control" disabled id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir" />
                                                                                        @error('tempat_lahir_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <label>Tanggal Lahir Ayah:</label>
                                                                                        <input type="date" class="form-control"  disabledid="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Masukkan Tanggal Lahir" />
                                                                                        @error('tanggal_lahir_ayah')
                                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                 
                                                                                   
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>No Telp/ WhatsApp Ayah:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" id="no_telp_ayah"  disabled name="no_telp_ayah" class="form-control"
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
                                                                                    <input type="text" id="no_ktp_ayah" disabled name="no_ktp_ayah" class="form-control"
                                                                                        placeholder="Masukkan Nomor KTP" />
                                                                                   
                                                                                </div>  
                                                                                @error('no_ktp_ayah')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>No KK Ayah:</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" id="no_kk_ayah" disabled name="no_kk_ayah" class="form-control"
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
                                                                                    <textarea class="form-control" disabled id="pekerjaan_ayah" name="pekerjaan_ayah" rows="3"></textarea>
                                                                                    
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
                                                                                    <input type="text" class="form-control" disabled id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
                                                                                 
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
                                                                                <input type="radio" name="status_hidup_ibu" disabled
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
                                                                        <input type="text" class="form-control" disabled id="nama_ibu" name="nama_ibu" value="{{ $ibu->nama_orangtua }}" placeholder="Masukkan Nama Lengkap Ibu" />
                                                                        @error('nama_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-8">
                                                                                <label>Alamat Ibu:</label>
                                                                                <input type="text" class="form-control" disabled  value="{{ $ibu->alamat }}" id="alamat_ibu" name="alamat_ibu" placeholder="Masukkan alamat sesuai KTP" />
                                                                                @error('alamat_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RT:</label>
                                                                                <input type="text" class="form-control" disabled  value="{{ $ibu->rt }}" id="rt_ibu" name="rt_ibu" placeholder="RT" />
                                                                                @error('rt_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RW:</label>
                                                                                <input type="text" class="form-control" disabled value="{{ $ibu->rw }}" id="rw_ibu" name="rw_ibu" placeholder="RW" />
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
                                                                                <input type="text" class="form-control" disabled value="{{ $ibu->kecamatan->nama_kecamatan }}"  id="kecamatan_ibu_view" name="kecamatan_ibu"  placeholder="RW" />
                                                                      
                                                                        @error('kecamatan_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                     @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Kelurahan Ibu:</label>
                                                                                <input type="text" class="form-control" disabled value="{{ $ibu->kelurahan->nama_kelurahan }}"  id="kelurahan_ibu_view" name="kelurahan_ibu"  placeholder="RW" />
                                                                      
                                                                             
                                                                                @error('kelurahan_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                      
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Disabilitas Ibu:</label>
                                                                        <input type="text" class="form-control" disabled value="{{ $ibu->cacat->nama }}"  id="cacat_ibu_view" name="cacat_ibu" placeholder="RW" />
                                                                      
                                                                 
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
                                                                                <input type="text" class="form-control" disabled value="{{ $ibu->tempat_lahir }}" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir" />
                                                                                @error('tempat_lahir_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Tanggal Lahir Ibu:</label>
                                                                                <input type="date" class="form-control" disabled value="{{ $ibu->tanggal_lahir }}" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Masukkan Tanggal Lahir" />
                                                                                @error('tanggal_lahir_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No Telp/ WhatsApp Ibu:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" disabled id="no_telp_ibu" name="no_telp_ibu" value="{{ $ibu->no_telp }}"
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
                                                                            <input type="text" class="form-control" disabled id="no_ktp_ibu" name="no_ktp_ibu" value="{{ $ibu->no_ktp }}"
                                                                                placeholder="Masukkan Nomor KTP" />
                                                                                @error('no_ktp_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No KK Ibu:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" disabled id="no_kk_ibu" name="no_kk_ibu" value="{{ $ibu->no_kk }}"
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
                                                                            <textarea class="form-control" disabled id="pekerjaan_ibu" name="pekerjaan_ibu" rows="3">{{ $ibu->pekerjaan }}</textarea>
                                                                            
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
                                                                            <input type="text" class="form-control" disabled value="{{ $ibu->penghasilan }}" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
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
                                                                                <input type="radio" name="status_hidup_ibu" disabled checked="{{ $status_hidup == old('status_hidup_ibu') ? 'checked' : '' }}" value="{{ $status_hidup }}"/>
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
                                                                        <input type="text" class="form-control" disabled id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Lengkap Ibu" />
                                                                        @error('nama_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-8">
                                                                                <label>Alamat Ibu:</label>
                                                                                <input type="text" class="form-control" disabled id="alamat_ibu" name="alamat_ibu" placeholder="Masukkan alamat sesuai KTP" />
                                                                                @error('alamat_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RT:</label>
                                                                                <input type="text" class="form-control" disabled id="rt_ibu" name="rt_ibu" placeholder="RT" />
                                                                                @error('rt_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RW:</label>
                                                                                <input type="text" class="form-control" disabled id="rw_ibu" name="rw_ibu" placeholder="RW" />
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

                                                                                <input type="text" class="form-control" disabled id="kecamatan_ibu" name="kecamatan_ibu"  />
                                                                      
                                                                        @error('kecamatan_ibu')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                     @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Kelurahan Ibu:</label>
                                                                                <input type="text" class="form-control" disabled id="kelurahan_ibu" name="kelurahan_ibu"  />
                                                                      
                                                                              
                                                                                @error('kelurahan_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                      
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Disabilitas Ibu:</label>

                                                                        <input type="text" class="form-control" disabled  id="cacat_ibu" name="cacat_ibu" />
                                                                      
                                                                       
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
                                                                                <input type="text" class="form-control" disabled id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir" />
                                                                                @error('tempat_lahir_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                             @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Tanggal Lahir Ibu:</label>
                                                                                <input type="date" class="form-control" disabled id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Masukkan Tanggal Lahir" />
                                                                                @error('tanggal_lahir_ibu')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No Telp/ WhatsApp Ibu:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control disabled" disabled id="no_telp_ibu" name="no_telp_ibu"
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
                                                                            <input type="text" class="form-control"  disabled id="no_ktp_ibu" name="no_ktp_ibu"
                                                                                placeholder="Masukkan Nomor KTP" />
                                                                                @error('no_ktp_ibu')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No KK Ibu:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" disabled id="no_kk_ibu" name="no_kk_ibu"
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
                                                                            <textarea class="form-control" id="pekerjaan_ibu" disabled name="pekerjaan_ibu" rows="3"></textarea>
                                                                            
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
                                                                            <input type="text" class="form-control" disabled  id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
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
                                                                                <input type="radio" name="status_hidup_wali"  disabled {{ $wali->status_hidup->label() == $status_hidup  ? 'checked' : '' }}
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
                                                                        <input type="text" class="form-control" disabled value="{{ $wali->nama_orangtua }}" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Lengkap Wali" />
                                                                        @error('nama_wali')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-8">
                                                                                <label>Alamat Wali:</label>
                                                                                <input type="text" class="form-control" disabled  value="{{ $wali->alamat }}" id="alamat_wali" name="alamat_wali" placeholder="Masukkan alamat sesuai KTP" />
                                                                                @error('alamat_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RT:</label>
                                                                                <input type="text" class="form-control" disabled  value="{{ $wali->rt }}" id="rt_wali" name="rt_wali" placeholder="RT" />
                                                                                @error('rt_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <label>RW:</label>
                                                                                <input type="text" class="form-control" disabled  value="{{ $wali->rw }}" id="rw_wali" name="rw_wali" placeholder="RW" />
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

                                                                                <input type="text" class="form-control" disabled  value="{{ $wali->kecamatan->nama_kecamatan }}" id="kecamatan_wali" name="kecamatan_wali" placeholder="RW" />
                                                                             
                                                                            @error('kecamatan_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                         @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Kelurahan Wali:</label>

                                                                                <input type="text" class="form-control" disabled  value="{{ $wali->kelurahan->nama_kelurahan }}" id="kelurahan_wali" name="kelurahan_wali" placeholder="RW" />
                                                                             
                                                                              
                                                                                @error('kelurahan_wali')
                                                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                      
                                                                       
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Disabilitas Wali:</label>

                                                                        <input type="text" class="form-control" disabled  value="{{ $wali->kelurahan->nama_kelurahan }}" id="cacat_wali" name="cacat_wali" placeholder="RW" />
                                                                             
                                                               
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
                                                                                <input type="text" class="form-control" disabled value="{{ $wali->tempat_lahir }}" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Masukkan Tempat Lahir" />
                                                                                @error('tempat_lahir_wali')
                                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label>Tanggal Lahir Wali:</label>
                                                                                <input type="date" class="form-control" disabled  value="{{ $wali->tanggal_lahir }}" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Masukkan Tanggal Lahir" />
                                                                                @error('tanggal_lahir_wali')
                                                                                <span class="form-text text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                            </div>
                                                                         
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No Telp/ WhatsApp Wali:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" disabled id="no_telp_wali" name="no_telp_wali" value="{{ $wali->no_telp }}"
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
                                                                            <input type="text" class="form-control"  disabled id="no_ktp_wali" name="no_ktp_wali" value="{{ $wali->no_ktp }}"
                                                                                placeholder="Masukkan Nomor KTP" />
                                                                              
                                                                        </div>
                                                                        @error('no_ktp_wali')
                                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>No KK Wali:</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" disabled id="no_kk_wali" name="no_kk_wali" value="{{ $wali->no_kk }}"
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
                                                                            <textarea class="form-control" disabled id="pekerjaan_wali" name="pekerjaan_wali" rows="3">{{ $wali->pekerjaan }}</textarea>
                                                                            
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
                                                                            <input type="text" class="form-control"   disabled value="{{ $wali->penghasilan }}" id="penghasilan_wali" name="penghasilan_wali" placeholder="Masukkan Nominal Penghasilan Setiap Bulan" />
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
                                            <div class="tab-pane fade" id="kt_tab_pane_3_4" role="tabpanel" aria-labelledby="kt_tab_pane_3_4">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Kepemilikan Rumah Ayah/ibu/Wali:<b style="color:red">*</b></label>
                                                        <input type="text" class="form-control"  placeholder="Masukkan kepemilikan rumah" id="kepemilikanRumah" value="{{ $formulir->kepemilikan_rumah }}" disabled/>
                                                   
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Jumlah Tanggungan Ayah/Ibu:<b style="color:red">*</b></label> 
                                                        <input type="text" class="form-control"  placeholder="Masukkan jumlah tanggungan" id="jumlah_tanggungan" value="{{ $formulir->jumlah_tanggungan }} Anak" disabled/>
                                                    
                                                        
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="font-weight-bold col-lg-3 col-form-label">Kendaraan yang dimiliki saat ini:</label>
                                                   
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
                                                   

                                               

                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
				
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
    
    
    
             $('#cacat_ayah').select2({
              placeholder: "Pilih Disabilitas",
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
      
        
            $("#no_ktp_wali").keyup(function() {
                $("#no_ktp_wali").val(this.value.match(/[0-9]*/));
            });
    
    
            $("#no_kk_wali").keyup(function() {
                $("#no_kk_wali").val(this.value.match(/[0-9]*/));
            });
    
            
            $("#no_telp_wali").keyup(function() {
                $("#no_telp_wali").val(this.value.match(/[0-9]*/));
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


@endpush