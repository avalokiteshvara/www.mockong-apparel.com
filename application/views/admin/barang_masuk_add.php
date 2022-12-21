<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span8 main-content">
            <h2><?php echo $page_title; ?></h2>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label" for="input01">No.Invoice</label>
                     <div class="controls">
                        <input type="text" class="input" name="no_invoice" />          
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label" for="input01">Nama Pegawai</label>
                     <div class="controls">
                        <input type="text" class="input-xlarge" name="nama_pegawai" />          
                     </div>
                  </div>
                  
                  <div class="control-group">
                     <label class="control-label" for="input01">Harga Total</label>
                     <div class="controls">
                        <input type="text" class="input" name="nilai_total" />          
                     </div>
                  </div>

                  <div class="control-group">
                     <label class="control-label">Tanggal Masuk</label>                     
                     <div class="controls">
                        <input type="date" class="input" name="masuk_at" />          
                     </div>
                  </div>

                  <div class="control-group">
                     <label class="control-label">Kode Proses</label>
                     <div class="controls">
                        <div class="textarea">
                           <textarea class="field span8" id="textarea" rows="6" name="kode_proses"> </textarea>
                        </div>
                     </div>
                  </div>

                  <div class="control-group">
                     <label class="control-label">Keterangan</label>
                     <div class="controls">
                        <div class="textarea">
                           <textarea class="field span8" id="textarea" rows="6" name="keterangan"> </textarea>
                        </div>
                     </div>
                  </div>


                 <!--  <div class="control-group">
                     <label class="control-label">Gambar</label>
                     <div class="controls">
                        <input type="file" name="foto" >  
                     </div>
                  </div>
                  
                  <div class="control-group">
                     <label class="control-label">Deskripsi</label>
                     <div class="controls">
                        <div class="textarea">
                           <textarea class="field span12" id="textarea" rows="6" name="deskripsi"> </textarea>
                        </div>
                     </div>
                  </div> -->

                  <div class="control-group">
                     <div class="controls">
                        <button type="submit" class="btn btn-success">Simpan</button>
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
   </div>
</div>