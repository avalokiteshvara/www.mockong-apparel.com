<table class="table table-first-column-number">
   <thead>
      <tr>
         <th style="padding-left: 1em;">#</th>
         <th>Gambar</th>
         <th>Kode</th>
         <th>Nama</th>
         <!-- <th>Slug</th> -->

         <th>Promo</th>
         <th>Harga</th>
         <th>Harga Lama</th>
         <th>Aktif</th>
         <th colspan="2"></th>
      </tr>
   </thead>
   <tbody>
      <?php
         $i = $start_number + 1;
         foreach ($tabel_produk->result() as $produk) {
         ?>
      <tr>
         <td><?php echo $i; ?></td>
         <td><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' .$produk->gambar ;?> " width="50"></td>
         <td><?php echo $produk->kode;?></td>
         <td><?php echo $produk->nama;?></td>
         <td><?php echo $produk->kategori;?></td>

         <td><?php echo $produk->promo;?></td>
         <td><?php echo format_rupiah($produk->harga);?></td>
         <td><?php echo format_rupiah($produk->harga_lama);?></td>
         <td><?php echo $produk->aktif;?></td>
         <td><a href="<?php echo base_url() . 'admin/produk/edit/' . $produk->slug; ?>" style="color:blue;text-decoration:underline"> <i class="icon-edit"></i></a></td>
         <!-- <td><a href="<?php echo base_url() . 'admin/produk/delete/' . $produk->slug; ?>" style="color:blue;text-decoration:underline"> <i class="icon-remove"></i></a></td> -->
         <td><a href="<?php echo base_url() . 'admin/produk/images/' . $produk->slug; ?>" style="color:blue;text-decoration:underline"> <i class="icon-picture"></i></a></td>
      </tr>
      <?php $i++;} ?>
   </tbody>
</table>
<div class="paging_bootstrap pagination" id="paging">
   <ul>
      <?php echo $this->pagination->create_links();?>
   </ul>
</div>
