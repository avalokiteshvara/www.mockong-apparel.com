<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span8 main-content">
            <h2>Tambah Kategori&nbsp;</h2>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/kategori_add';?>" method="POST" enctype="multipart/form-data" />
               <fieldset>
                  <div class="control-group">
                     <label class="control-label" for="input01">Nama</label>
                     <div class="controls">
                        <input type="text" class="input" name="nama" required=""/>
                     </div>
                  </div>

                  <div class="control-group">
                     <label class="control-label">Gender</label>
                     <div class="controls">
                        <select class="input-xlarge" name="gender">
                           <option  value="L" />Cowok
                           <option  value="P" />Cewek
                        </select>
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
