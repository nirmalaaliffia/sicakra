<div class="modal" id="modal-create-realisasi"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buat Realisasi Rencana Kerja : {{ $form->nama_rencana }} </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
           	<!--begin::Form-->
               <form action="{{ route('kecamatan.laporanSpj.store') }}" id="form_create_realisasi" method="post"enctype="multipart/form-data">
                   @csrf

                   <div class="form-group">
                       <label>Rencana Kerja:</label>
                       <input type="hidden" class="form-control" placeholder="Masukkan Rencana Kerja"  value="{{ $form->id }}" id="rencana_kerja_id" name="rencana_kerja_id"  />
                       <input type="text" class="form-control" placeholder="Masukkan Rencana Kerja"  value="{{ $form->nama_rencana }}" id="nama_rencana" name="nama_rencana" disabled />
                       @error('nama_rencana')
                       <span class="form-text text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group">
                       <label>Upload Bukti Pendukung:</label>
                       <input type="file" class="form-control " placeholder="Masukkan File" id="file" name="file"  />
                       @error('file')
                       <span class="form-text text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                


            
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              
                <button type="submit" class="btn btn-danger" id="submt_btn" >
                    <i class="fa fa-check" ></i> Upload
                </button>
              
                <button type="submit" class="btn btn-danger spinner spinner-white spinner-right" id="spinner_btn" disabled style="display:none">
                    <i class="fa fa-check" ></i> Upload
                </button>
                
            </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')



<script type="text/javascript">




$(document).ready(function(){
  $("#form_create_realisasi").on("submit", function(){
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


