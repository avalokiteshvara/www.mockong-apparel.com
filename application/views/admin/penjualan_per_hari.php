<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
        
         <!-- content tengah -->
         <div class="span8 main-content">  
         	<h2><?php echo $page_title; ?></h2>
         	<div id="content-ajax">
         		
               <?php

                  $ci = &get_instance();
                  $ci->load->model('trans_header_model');

                  //$c = $ci->model->counters();
                  //echo $c;

                  $tgl = "";
                  $i = 0;
                  foreach ($selling_product->result() as $sell_item) { 
               ?>

               <?php if($tgl !== $sell_item->tgl) : ?> 
                  <?php if($i >= 1){echo '</table>';}; ?> 
                  <h2><?php echo $sell_item->tgl . ' Total: Rp '. format_rupiah($ci->trans_header_model->get_hasil_penjualan($sell_item->tgl)) ;?></h2>  
                   
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
                           <tr> 
                              <td><?php echo $sell_item->kode;?></td>                           
                              <td><a href="<?php echo base_url() .'produk/'. $sell_item->slug;?>" target="_blank"> <?php echo $sell_item->nama;?></a></td>
                              <td><?php echo $sell_item->harga;?></td>
                              <td><?php echo $sell_item->promo;?></td>
                              <td><?php echo $sell_item->jml_jual;?></td>
                              <td>Rp <?php echo format_rupiah($sell_item->hasil_penjualan);?></td>
                           </tr>
                        
                        <?php else: ?>
                           <tr> 
                              <td><?php echo $sell_item->kode;?></td>                           
                              <td><a href="<?php echo base_url() .'produk/'. $sell_item->slug;?>" target="_blank"> <?php echo $sell_item->nama;?></a></td>
                              <td><?php echo $sell_item->harga;?></td>
                              <td><?php echo $sell_item->promo;?></td>
                              <td><?php echo $sell_item->jml_jual;?></td>
                              <td>Rp <?php echo format_rupiah($sell_item->hasil_penjualan);?></td>
                           </tr>                           
                        <?php endif; ?>  
                           
                      
                     <?php if(($i + 1) == $selling_product->num_rows()) { echo '</table>';}; ?>   

                     <?php 
                        $tgl = $sell_item->tgl;
                        $i += 1;
                     } ?>
                     </tbody>
                  </table>

                  <div class="paging_bootstrap pagination" id="paging">
                     <ul>
                        <?php echo $this->pagination->create_links();?>
                     </ul>
                  </div>		
         	</div>
         </div>
         <?php include 'sidebar.php';?>
      </div>
   </div>
</div>         