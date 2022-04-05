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
										<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Riwayat Formulir</h2>
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
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th style="max-width:6%">No</th>
													<th style="max-width:25%">Batch</th>
													<th style="max-width:20%">Tanggal Daftar</th>
													<th style="max-width:40%">Alasan</th>
													<th style="max-width:15%">Status</th>
												</tr>
											</thead>
											<tbody>
                                                @php $i=0; @endphp
                                                @forelse ($forms as $form)
                                                @php $i++; @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>Pengajuan Bantuan Beasiswa (BBM) Tahun {{ $form->batch }}</td>
                                                    <td>{{ $form->created_at->format('d M Y') }}</td>
                                                    <td>@if ( $form->alasan_verifikasi == null)
                                                        -
                                                    @else
                                                    {{ $form->alasan_verifikasi }}  
                                                    @endif</td>
                                                    <td>
                                                        @if ($form->verifikasi_pengajuan == "Ditolak")
                                                            1
                                                        @elseif($form->verifikasi_pengajuan == 'Disetujui')
                                                            2
                                                        @elseif($form->verifikasi_pengajuan == 'Diajukan')
                                                            3
                                                        @elseif($form->verifikasi_pengajuan  == 'Dibatalkan')
                                                            4
                                                        @elseif($form->verifikasi_pengajuan  == 'BelumFinal')
                                                            5
                                                        @else
                                                            6
                                                        @endif</td>
                                                </tr>
                                           
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No Data Entry</td>
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
				
@endsection



@push('scripts')



@endpush