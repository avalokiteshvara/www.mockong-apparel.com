<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span8 main-content">
            <h2>&nbsp;</h2>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" />
               <fieldset>
               <?php foreach ($produk_details->result() as $details) {};?>
                  <div class="control-group">
                     <label class="control-label" for="input01">Kode</label>
                     <div class="controls">
                        <input type="text" class="input" disabled="" value="<?php echo $details->kode_produk;?>" />
                     </div>
                  </div>

                  <input type="hidden" name="kode" value="<?php echo $details->kode_produk;?>">

                  <div class="control-group">
                     <label class="control-label" for="input01">Nama</label>
                     <div class="controls">
                        <input type="text" class="input-xlarge" name="nama" value="<?php echo $details->nama_produk;?>" />
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Kategori</label>
                     <div class="controls">
                        <select class="input-xlarge" name="id_kategori">
                           <?php foreach ($list_kategori->result() as $kat) { ?>
                           <option <?php echo $kat->id === $details->id_kategori ? 'selected':'' ?>  value="<?php echo $kat->id;?>" /><?php echo $kat->nama;?>
                           <?php } ?>
                        </select>
                     </div>
                  </div>

                  <div class="control-group">
                     <label class="control-label" for="input01">Harga</label>
                     <div class="controls">
                        <input type="text" class="input" name="harga" value="<?php echo $details->harga;?>"/>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Promo</label>
                     <div class="controls">
                        <select class="input-xlarge" name="promo">
                           <option <?php echo $details->promo === 'Y' ? 'selected':'' ?> value="Y" />Ya
                           <option <?php echo $details->promo === 'N' ? 'selected':'' ?> value="N" />Tidak
                        </select>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label" for="input01">Harga Lama</label>
                     <div class="controls">
                        <input type="text" class="input" name="harga_lama" value="<?php echo $details->harga_lama;?>"/>
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Gambar</label>
                     <div class="controls">
                        <input type="file" name="foto" >
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Deskripsi</label>
                     <div class="controls">
                        <div class="textarea">
                           <textarea class="field span12" id="textarea" rows="6" name="deskripsi" ><?php echo $details->deskripsi;?> </textarea>
                        </div>
                     </div>
                  </div>
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
