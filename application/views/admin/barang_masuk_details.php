<script type="text/javascript">
   
   var baseURL = '<?php echo base_url();?>';
   function delete_barang_masuk_details(id){
     $.ajax({
         url: baseURL + 'admin/barang-masuk/details/delete/' + id,
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
         <div class="span8 main-content">
            <h2><a href="javascript:javascript:history.go(-1)"> << Kembali</a></h2>
            <h2><?php echo $page_title;?></h2>
            
         <?php if($tabel_barang_masuk_details->num_rows() > 0): ?>   
            <!-- <br><br> -->
            <div id="content-ajax">
               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jumlah</th>                        
                        <th>#</th>                                                
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $i = 1;
                        foreach ($tabel_barang_masuk_details->result() as $barang_masuk_details) { 
                        ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $barang_masuk_details->kode; ?></td>        
                        <td><?php echo $barang_masuk_details->nama; ?></td>              
                        <td><?php echo $barang_masuk_details->jumlah; ?></td>              
                        <td>
                          <a href="#" onclick="delete_barang_masuk_details(<?php echo $barang_masuk_details->id;?>);return false" style="color:blue;text-decoration:underline">
                            <button type="button" class="btn btn-primary btn-mini">Hapus</button>
                          </a>
                        </td>
                        
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
            <h2>Belum ada Data untuk Invoice ini.</h2>
         <?php endif;?>   

         </div>
         <!-- end content tengah -->
         <?php include 'sidebar.php';?>
      </div>
   </div>
</div>