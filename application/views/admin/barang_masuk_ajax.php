               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>No.Invoice</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>                        
                        <th colspan="2"></th>
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
                        <td><?php echo $barang_masuk->masuk_at;?></td>                        
                        <td>
                           <a href="<?php echo base_url() . 'admin/barang-masuk/details/' . $barang_masuk->no_invoice; ?>" style="color:blue;text-decoration:underline"> 
                           <button type="button" class="btn btn-primary btn-mini">Details</button>
                           </a>
                        </td>                        
                        <td>
                           <a href="<?php echo base_url() . 'admin/barang-masuk/delete/' . $barang_masuk->no_invoice; ?>" style="color:blue;text-decoration:underline"> 
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