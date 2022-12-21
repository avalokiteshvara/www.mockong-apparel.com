<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span8 main-content">
            <h2>Edit Kategori</h2>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" />
               <fieldset>
               <?php foreach ($kategori_details->result() as $kat) {};?>

                  <div class="control-group">
                     <label class="control-label" for="input01">Nama</label>
                     <div class="controls">
                        <input type="text" class="input-xlarge" name="nama" value="<?php echo $kat->nama;?>" />
                     </div>
                  </div>
                  <div class="control-group">
                     <label class="control-label">Gender</label>
                     <div class="controls">
                        <select class="input-xlarge" name="id_kategori">
                          <option <?php echo $kat->gender === 'L' ? 'selected':'' ?>  value="L" />Cowok
                          <option <?php echo $kat->gender === 'P' ? 'selected':'' ?>  value="P" />Cewek
                        </select>
                     </div>
                  </div>


                  <div class="control-group">
                     <div class="controls">
                        <a href="<?php echo base_url() . 'admin/kategori'?>"><button type="button" class="btn btn-warning">Kembali</button></a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
   </div>
</div>
