<script type="text/javascript">

   var baseURL = '<?php echo base_url();?>';
   function delete_image(id){
     $.ajax({
         url: baseURL + 'admin/produk/images/delete/' + id,
         type:"POST",
         success : function(msg){
           if(msg.trim() == 'OK'){
             $.jGrowl('Item dihapus');
             setTimeout(function(){
               location.reload();
             },2000);
           }
         }
     })
   }

</script>


<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12 main-content">
            <h2><a href="javascript:javascript:history.go(-1)"> << Kembali</a></h2>
            <h2><?php echo $page_title;?></h2>

            <form class="form" action="<?php echo base_url() . 'admin/produk/images/add/' .$slug;?>" method="POST" enctype="multipart/form-data" />
               <!-- <fieldset> -->
                  <div class="control-group">
                     <!-- <label class="control-label">Gambar</label> -->
                     <div class="controls">
                        <input type="file" name="foto" >
                     </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Tambah Gambar</button>
               <!-- </fieldset> -->
            </form>

         <?php if($tabel_gambar->num_rows() > 0): ?>
            <!-- <br><br> -->
            <div id="content-ajax">
               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>Gambar</th>
                        <th>Update</th>
                        <th>#</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i = 1;
                        foreach ($tabel_gambar->result() as $tabel_gambar) {
                        ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' .$tabel_gambar->gambar ;?> " width="50"></td>        
                        <td><?php echo $tabel_gambar->updated_at; ?></td>
                        <td><a href="" onclick="delete_image(<?php echo $tabel_gambar->id;?>);return false" style="color:blue;text-decoration:underline">Hapus</a></td>

                     </tr>
                     <?php $i++;} ?>
                  </tbody>
               </table>
               <div class="paging_bootstrap pagination" id="paging">
                  <ul>
                     <?php echo $this->pagination->create_links();?>
                  </ul>
               </div>
            </div>
         <?php else:?>
            <h2>Belum ada gambar untuk produk ini.</h2>
         <?php endif;?>

         </div>
         <!-- end content tengah -->
      </div>
   </div>
</div>
