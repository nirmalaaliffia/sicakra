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
										<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Ganti Password</h2>
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
                                   
									{{-- <div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Multiple Controls 
											<span class="text-muted pt-2 font-size-sm d-block">multiple controls examples</span></h3>
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
									</div> --}}
									<div class="card-body">
                                        <form method="POST" action="{{ route('gantiPassword.update') }}">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $user->id }}"/>
                                            <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}"/>
                                            <div class="card-body">
                                             <div class="form-group row">
                                              <div class="col-lg-6">
                                               <label>Nama:</label>
                                               
                                               <div class="input-group">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama anda" id="name" name="name" value="{{ $user->name }}"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                               </div>
                                               @error('name')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                               <span class="form-text text-muted">Ganti Nama tidak akan merubah nama anda di formulir</span>
                                              
                                              </div>
                                              <div class="col-lg-6">
                                               <label>Email:</label>
                                               <div class="input-group">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" disabled  id="emailuser" name="emailuser" placeholder="masukkan email anda" value="{{ $user->email }}"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                               </div>
                                               @error('email')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                               <span class="form-text text-muted">Email tidak bisa diganti, harap hubungi Administrator untuk menggantinya</span>
                                             
                                            </div>
                                             </div>
                                             <div class="form-group row">
                                              <div class="col-lg-6">
                                               <label>Password:</label>
                                               <div class="input-group">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" placeholder="Masukkan password anda"/>
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-key"></i></span></div>
                                               </div>
                                               @error('password')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                               <span class="form-text text-muted">Biarkan form diatas apabila tidak ingin diganti</span>
                                              
                                              </div>
                                              <div class="col-lg-6">
                                               <label>Konfirmasi Password:</label>
                                               <div class="input-group">
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"   id="password_confirmation" name="password_confirmation" placeholder="Masukkan konfirmasi password anda" />
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-key"></i></span></div>
                                               </div> 
                                               @error('password_confirmation')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                               <span class="form-text text-muted">Biarkan form diatas apabila tidak ingin diganti</span>
                                              
                                              </div>
                                             </div>
                                         
                                            </div>
                                            <div class="card-footer">
                                             <div class="row">
                                              <div class="col-lg-6">
                                               {{-- <button type="reset" class="btn btn-primary mr-2">Ganti Password</button>
                                                --}}
                                              </div>
                                              <div class="col-lg-6 text-lg-right">
                                               <button type="submit" class="btn btn-danger">Ganti Password</button>
                                              </div>
                                             </div>
                                            </div>
                                           </form>
                                    
									</div>
								</div>
								<!--end::Card-->
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
				
@endsection



@push('scripts')



@endpush