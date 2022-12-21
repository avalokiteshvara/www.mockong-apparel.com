<script type="text/javascript">
   
   var baseURL = '<?php echo base_url();?>';
   function delete_barang_masuk(id){
     $.ajax({
         url: baseURL + 'admin/barang-masuk/delete/' + id,
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
            <h2>Barang Masuk</h2>
            <button type="button" class="btn btn-primary " onclick="location.href='<?php echo base_url() . 'admin/barang-masuk/add';?>'">Tambah Transaksi</button>
            
         <?php if($tabel_barang_masuk->num_rows() > 0): ?>   
            <br><br>
            <div id="content-ajax">
               <table class="table table-first-column-number " width="80%">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>No.Invoice</th>
                        <th>Nama Pegawai</th>
                        <th>Nilai Pembelian</th>
                        <th>Tanggal</th>                        
                        <th width="10%" colspan="2"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $i = $start_number + 1;
                        foreach ($tabel_barang_masuk->result() as $barang_masuk) { 
                        ?>
                     <tr>
                        <td><?php echo $i; ?></td>                        
                        <td><?php echo $barang_masuk->no_invoice;?></td>
                        <td><?php echo $barang_masuk->nama_pegawai;?></td>
                        <td><?php echo format_rupiah($barang_masuk->nilai_total);?></td>

                        <td><?php echo $barang_masuk->masuk_at;?></td>                        
                        <td>
                           <a href="<?php echo base_url() . 'admin/barang-masuk/details/' . $barang_masuk->id; ?>" style="color:blue;text-decoration:underline"> 
                           <button type="button" class="btn btn-primary btn-mini">Details</button>
                           </a>
                        </td>                        
                        <td>
                           <a href="#" onclick="delete_barang_masuk(<?php echo $barang_masuk->id ?>);return false" style="color:blue;text-decoration:underline"> 
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

         <?php else: ?>
            <h2>Belum ada transaksi barang masuk</h2>
         <?php endif;?>   

         </div>
         <!-- end content tengah --> 
         <?php include 'sidebar.php';?>
      </div>
   </div>
</div>