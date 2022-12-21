<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
        
         <!-- content tengah -->
         <div class="span8 main-content">            
                  <h2>Konfirmasi Pembayaran
                     <span class="info">Anda mempunyai <?php echo $payment_confirmed->num_rows()?> konfirmasi pembayaran yang perlu di cek.</span>
                  </h2>
               <div id="content-ajax">
                  <table class="table table-first-column-number">
                     <thead>
                        <tr>
                           <th style="padding-left: 1em;">#</th>                           
                           <th>Tanggal Transaksi</th>                           
                           <th>No.Transaksi</th>                
                           <th>Quantity</th>
                           <th>Total Harga</th>
                           <th>Detail</th>
                        </tr>
                     </thead>

                     <tbody>
                     <?php 
                        $i = $start_number + 1;
                        foreach ($payment_confirmed->result() as $payment_confirmed) { 
                     ?>
                       <tr>
                         <td><?php echo $i; ?></td>  
                         <td><?php echo $payment_confirmed->created_at;?></td>
                         <td><?php echo str_pad($payment_confirmed->id, 7,"0",STR_PAD_LEFT); ?></td>                         
                         <td><?php echo $payment_confirmed->quantity;?></td>
                         <td>Rp<?php echo format_rupiah($payment_confirmed->total_trans);?></td>
                         <td>
                            <a href="<?php echo base_url() . 'admin/trans/detail/' . $payment_confirmed->id; ?>" style="color:blue;text-decoration:underline">
                              <button type="button" class="btn btn-primary btn-mini">Details</button>
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

               <h2>10 Produk Best Seller</h2>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Kode</th>
                           <th>Nama</th>                           
                           <th>Harga</th>                
                           <th>Promo</th>
                           <th>Qty</th>
                           <th>Penjualan</th>
                        </tr>
                     </thead>
                     <tbody>

                     <?php foreach ($best_seller_product->result() as $best_seller) { ?>
                       <tr> 
                           <td><?php echo $best_seller->kode;?></td>
                           <td><a href="<?php echo base_url() .'produk/'. $best_seller->slug;?>" target="_blank"> <?php echo $best_seller->nama;?></a></td>
                           <td><?php echo $best_seller->harga;?></td>
                           <td><?php echo $best_seller->promo;?></td>
                           <td><?php echo $best_seller->jml_jual;?></td>
                           <td>Rp <?php echo format_rupiah($best_seller->hasil_penjualan);?></td>
                       </tr> 
                     <?php } ?>
                     </tbody>
                  </table>
                  <h3><a href="<?php echo base_url() . 'admin/penjualan' ?>">Penjualan Selengkapnya...</a></h3>

                  
                  <h2>10 Stok Produk Terkecil</h2>
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
                  <h3><a href="<?php echo base_url() . 'admin/stok'?>">Produk Stok Selengkapnya...</a></h3>

                  <h2>10 Produk Paling dilihat</h2>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Kode</th>
                           <th>Nama</th>                           
                           <th>Dilihat</th>
                        </tr>
                     </thead>
                     <tbody>

                     <?php foreach ($most_viewed->result() as $viewed_item) { ?>
                       <tr> 
                           <td><?php echo $viewed_item->kode;?></td>
                           <td><a href="<?php echo base_url() .'produk/'.$viewed_item->slug;?>" target="_blank"><?php echo $viewed_item->nama;?></a></td>
                           <td><?php echo $viewed_item->view_count;?></td>
                       </tr> 
                     <?php } ?>
                     </tbody>
                  </table>
         </div>
         <!--end content tengah -->

         <?php include 'sidebar.php';?>

      </div>
   </div>
</div>