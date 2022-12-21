<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12 main-content">
            <h2><?php echo $page_title;?></h2>
            <button type="button" class="btn btn-primary " onclick="location.href='<?php echo base_url() . 'admin/produk/add';?>'">Tambah Produk</button>
            <br><br>
            <div id="content-ajax">
               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>

                        <th>Promo</th>
                        <th>Harga</th>
                        <th>Harga Lama</th>
                        <!-- <th>Aktif</th> -->
                        <th colspan="2"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i = $start_number + 1;
                        foreach ($tabel_produk->result() as $produk) {
                        ?>
                     <tr class="<?php echo $produk->aktif !== 'Y' ? 'error' : '';  ?>">
                        <td><?php echo $i; ?></td>
                        <td><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' .$produk->gambar ;?> " width="50"></td>
                        <td><?php echo $produk->kode;?></td>
                        <td><?php echo $produk->nama;?></td>
                        <td><?php echo $produk->kategori;?></td>

                        <td><?php echo $produk->promo;?></td>
                        <td><?php echo format_rupiah($produk->harga);?></td>
                        <td><?php echo format_rupiah($produk->harga_lama);?></td>
                        <!-- <td><?php echo $produk->aktif;?></td> -->
                        <td>
                           <a href="<?php echo base_url() . 'admin/produk/edit/' . $produk->slug; ?>" style="color:blue;text-decoration:underline">
                           <button type="button" class="btn btn-primary btn-mini">Edit Produk</button>
                           </a>
                        </td>

                        <td>
                           <a href="<?php echo base_url() . 'admin/produk/images/' . $produk->slug; ?>" style="color:blue;text-decoration:underline">
                           <button type="button" class="btn btn-primary btn-mini">Gambar</button>
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
         </div>
         <!-- end content tengah -->
      </div>
   </div>
</div>
