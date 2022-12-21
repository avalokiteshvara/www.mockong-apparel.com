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

   <?php foreach ($selling_product->result() as $sell_item) { ?>
     <tr> 
         <td><?php echo $sell_item->kode;?></td>
         <td><a href="<?php echo base_url() .'produk/'. $sell_item->slug;?>" target="_blank"> <?php echo $sell_item->nama;?></a></td>
         <td><?php echo $sell_item->harga;?></td>
         <td><?php echo $sell_item->promo;?></td>
         <td><?php echo $sell_item->jml_jual;?></td>
         <td>Rp <?php echo format_rupiah($sell_item->hasil_penjualan);?></td>
     </tr> 
   <?php } ?>
   </tbody>
</table>
<div class="paging_bootstrap pagination" id="paging">
   <ul>
      <?php echo $this->pagination->create_links();?>
   </ul>
</div>	