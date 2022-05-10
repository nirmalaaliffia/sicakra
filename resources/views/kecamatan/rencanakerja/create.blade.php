<div class="modal" id="modal-create-rencana"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Rencana Kerja </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
           	<!--begin::Form-->
               <form action="{{ route('kecamatan.rencana.store') }}" id="form_create_rencana" method="post"enctype="multipart/form-data">
                   @csrf

                   <div class="form-group">
                       <label>Rencana Kerja:</label>
                       <input type="text" class="form-control" placeholder="Masukkan Rencana Kerja" id="nama_rencana" name="nama_rencana" />
                       @error('nama_rencana')
                       <span class="form-text text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label>Lokasi:</label>
                       <input type="text" class="form-control " placeholder="Masukkan lokasi" id="lokasi" name="lokasi"  />
                       @error('lokasi')
                       <span class="form-text text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Waktu Mulai:<b style="color:red">*</b></label>
                        <input type="text" class="form-control" id="waktu_mulai" name="waktu_mulai"
                            placeholder="Masukkan waktu mulai" />
                        @error('waktu_mulai')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label>Waktu Selesai:<b style="color:red">*</b></label>
                        <input type="text" class="form-control" id="waktu_selesai"
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
                                <option value="{{ $opd->id }}">{{ $opd->nama_skpd }}</option>
                       @endforeach
                     </select>
                  
                    @error('penanggung_jawab')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rundown Kegiatan:</label>
                    <textarea type="text" class="form-control" placeholder="Masukkan Rencana Kerja" id="rundown" name="rundown" ></textarea>
                    @error('rundown')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Peserta:</label>
                    <textarea type="text" class="form-control" placeholder="Masukkan Rencana Kerja" id="peserta" name="peserta" ></textarea>
                    @error('peserta')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                   


            
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              
                <button type="submit" class="btn btn-danger" id="submt_btn" >
                    <i class="fa fa-check" ></i> Buat
                </button>
              
                <button type="submit" class="btn btn-danger spinner spinner-white spinner-right" id="spinner_btn" disabled style="display:none">
                    <i class="fa fa-check" ></i> Buat
                </button>
                
            </form>
            </div>
        </div>
    </div>
</div>

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
  $("#form_create_rencana").on("submit", function(){
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


