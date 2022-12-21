<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">        
        <!-- content tengah -->
        <div class="span8 main-content">            
          <h2>Produk Stok</h2>
          <div id="content-ajax">
              <table class="table">
                <thead>
                  <tr>
                     <th>Kode</th>
                     <th>Nama</th>                           
                     <th>Barang Masuk</th>
                     <th>Barang Keluar</th>
                     <th>Stok</th>
                  </tr>
               </thead>
               <tbody>

               <?php foreach ($stok_product->result() as $stok) { ?>
                 <tr> 
                     <td><?php echo $stok->kode;?></td>
                     <td><a href="<?php echo base_url() .'produk/'. $stok->slug;?>" target="_blank"> <?php echo $stok->nama;?></a></td>
                     <td><?php echo $stok->barang_masuk;?></td>
                     <td><?php echo $stok->barang_keluar;?></td>
                     <td><?php echo $stok->stok;?></td>                           
                 </tr> 
               <?php } ?>
                </tbody>
              </table>

              <div class="paging_bootstrap pagination" id="paging">
                 <ul>
                    <?php echo $this->pagination->create_links();?>
                 </ul>
              </div>
          </div> 
        </div>
         <!--end content tengah -->
         <?php include 'sidebar.php';?>
      </div>
   </div>
</div>