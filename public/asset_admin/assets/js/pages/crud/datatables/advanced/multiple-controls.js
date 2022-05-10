"use strict";
var KTDatatablesAdvancedMultipleControls = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<div class="dropdown dropdown-inline">\
				// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	            //                     <i class="la la-cog"></i>\
	            //                 </a>\
				// 			  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
				// 					<ul class="nav nav-hoverable flex-column">\
				// 			    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
				// 			    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
				// 			    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
				// 					</ul>\
				// 			  	</div>\
				// 			</div>\
				// 			<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
				// 				<i class="la la-edit"></i>\
				// 			</a>\
				// 			<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
				// 				<i class="la la-trash"></i>\
				// 			</a>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Dibatalkan', 'class': ' label-light-primary'},
							5: {'title': 'BelumFinal', 'class': ' label-light-info'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};

	var init2 = function() {
		var table = $('#kt_datatableVerifikasi');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Dibatalkan', 'class': ' label-light-primary'},
							5: {'title': 'BelumFinal', 'class': ' label-light-info'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};


	var init3 = function() {
		var table = $('#kt_datatableLaporan');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '130px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Upload', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};


	var init4 = function() {
		var table = $('#kt_datatableSpj');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 3,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};


	var init5 = function() {
		var table = $('#kt_datatableAjuan');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};


	var init6 = function() {
		var table = $('#kt_datatableSetuju');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};


	
	var init7 = function() {
		var table = $('#kt_datatableTolak');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};
	
	var init8 = function() {
		var table = $('.kt_datatableRealisasiAjuan');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};

	var init9 = function() {
		var table = $('.kt_datatableRencana');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};

	var init10 = function() {
		var table = $('.kt_datatableRencanaKerja');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Rencana Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Rencana Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Rencana Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Belum Final', 'class': ' label-light-info'},
							5: {'title': 'Lainnya', 'class': ' label-light-primary'},
							6: {'title': 'Lainnya', 'class': 'label-light-primary'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};

	var init11 = function() {
		var table = $('#kt_datatableSemua');

		// begin first table
		table.DataTable({
			// DOM Layout settings
			dom:
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
				"<'row py-3'<'col-sm-12'tr>>" +
				"<'row py-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", // read more: https://datatables.net/examples/basic_init/dom.html

			columnDefs: [
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="#" style="width:100%" class="btn btn-warning btn-sm ">\
				// 			<i class="flaticon-eye"></i> Lihat Formulir\
				// 			</a><br><br>\
				// 			<a href="#" style="width:100%" class="btn btn-success btn-sm">\
				// 			<i class="flaticon2-checkmark"></i> Setuju\
				// 			</a><br><br>\
				// 			<button type="button"  style="width:100%" class="btn btn-danger btn-sm btn_gettolak" data-toggle="modal" data-target="#exampleModal">\
				// 			<i class="flaticon2-cross"></i> Tolak\
				// 			</button>\
				// 		';
				// 	},
				// },
				{
					width: '90px',
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							// 2: {'title': 'Delivered', 'class': ' label-light-danger'},
							
							1: {'title': 'Realisasi Ditolak', 'class': ' label-light-danger'},
							2: {'title': 'Realisasi Disetujui', 'class': ' label-light-success'},
							3: {'title': 'Realisasi Diajukan', 'class': ' label-light-warning'},
							4: {'title': 'Realisasi Dibatalkan', 'class': ' label-light-primary'},
							5: {'title': 'Belum Final', 'class': ' label-light-info'},
							6: {'title': 'Belum Upload', 'class': 'label-light-info'},
							7: {'title': 'Lainnya', 'class': 'label-light-info'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				// {
				// 	width: '75px',
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});
	};




	return {
		//main function to initiate the module
		init: function() {
			init();
			init2();
			init3();
			init4();
			init5();
			init6();
			init7();
			init8();
			init9();
			init10();
			init11();
		}
	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedMultipleControls.init();
});
