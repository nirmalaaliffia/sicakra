 <!-- Modal-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Rencana Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Status Rencana Kerja:</label>
                    <input type="text" class="form-control" disabled placeholder="Masukkan Rencana Kerja" id="status_verifikasi_show" name="status_verifikasi_show" />
                    @error('nama_rencana')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Rencana Kerja:</label>
                    <input type="text" class="form-control" disabled placeholder="Masukkan Rencana Kerja" id="nama_rencana_show" name="nama_rencana_show" />
                    @error('nama_rencana')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Lokasi:</label>
                    <input type="text" class="form-control " disabled placeholder="Masukkan lokasi" id="lokasi_show" name="lokasi_show"  />
                    @error('lokasi')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                 <div class="col-lg-6">
                     <label>Waktu Mulai:<b style="color:red">*</b></label>
                     <input type="text" class="form-control" disabled id="waktu_mulai_show" name="waktu_mulai_show"
                         placeholder="Masukkan waktu mulai" />
                     @error('waktu_mulai')
                     <span class="form-text text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="col-lg-6">
                     <label>Waktu Selesai:<b style="color:red">*</b></label>
                     <input type="text" class="form-control" disabled id="waktu_selesai_show"
                         name="waktu_selesai_show" placeholder="Masukkan waktu selesai" />
                     @error('waktu_selesai')
                     <span class="form-text text-danger">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
             <div class="form-group ">
                 <label>Penanggung Jawab:</label><br>
          
                  <input type="text" class="form-control" disabled id="penanggung_jawab_show"
                  name="penanggung_jawab_show" placeholder="Masukkan penanggung jawab" />
               
                 @error('penanggung_jawab')
                 <span class="form-text text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <div class="form-group">
                 <label>Rundown Kegiatan:</label>
                 <textarea type="text" class="form-control" disabled placeholder="Masukkan Rencana Kerja" id="rundown_show" name="rundown_show" ></textarea>
                 @error('rundown')
                 <span class="form-text text-danger">{{ $message }}</span>
                 @enderror
             </div>
             <div class="form-group">
                 <label>Peserta:</label>
                 <textarea type="text" class="form-control" disabled placeholder="Masukkan Rencana Kerja" id="peserta_show" name="peserta_show" ></textarea>
                 @error('peserta')
                 <span class="form-text text-danger">{{ $message }}</span>
                 @enderror
             </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>