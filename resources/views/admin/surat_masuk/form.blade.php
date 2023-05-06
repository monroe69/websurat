 <div class="modal fade bs-example-modal-xl tampilModal" tabindex="1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="judul_form">Extra large modal</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formGambar">
                 @csrf
                 <input type="hidden" name="id" id="id">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12 col-md-4">
                             <div class="mb-3">
                                 <label for="no_surat" class="form-label">No. Surat</label>
                                 <input class="form-control inputReset" type="text" id="no_surat" name="no_surat">
                             </div>
                         </div>

                         <div class="col-12 col-md-5">
                             <div class="mb-3">
                                 <label for="perihal" class="form-label">Perihal</label>
                                 <input class="form-control inputReset" type="text" id="perihal" name="perihal">
                             </div>
                         </div>
                         <div class="col-12 col-md-3">
                             <div class="mb-3">
                                 <label for="tgl_surat" class="form-label">Tgl. Surat</label>
                                 <input class="form-control inputReset" type="date" id="tgl_surat" name="tgl_surat">
                             </div>
                         </div>
                         <div class="col-12 col-md-9">
                             <div class="mb-3">
                                 <label for="asal_surat" class="form-label">Asal Surat</label>
                                 <input class="form-control inputReset" type="text" id="asal_surat" name="asal_surat">
                             </div>
                         </div>
                         <div class="col-12 col-md-3">
                             <div class="mb-3">
                                 <label for="tgl_masuk" class="form-label">Tgl. Masuk</label>
                                 <input class="form-control inputReset" type="date" id="tgl_masuk" name="tgl_masuk">
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="mb-3">
                                 <label for="file_surat">File</label>
                                 <div>
                                     <button data-id="file_surat" class="btn btn-secondary">File Surat</button>
                                     <span data-span="file_surat"></span>
                                 </div>
                                 <input type="file" id="file_surat" name="file_surat" class="file-upload"
                                     accept=".doc,.docx,.pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" id="tombolForm">Save changes</button>
                 </div>
             </form>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
