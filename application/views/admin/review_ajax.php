               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Nama Reviewers</th>
                        <th>Email</th>                        
                        <th>Rating</th>
                        <th>Isi</th>
                        <th>Tanggal</th>                        
                        <th colspan="2">Aksi</th>                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $i = $start_number + 1;
                        foreach ($tabel_review->result() as $review) { 
                        ?>
                     <tr>
                        <td><?php echo $i; ?></td>                        
                        <td><?php echo $review->kode_produk;?></td>
                        <td><?php echo $review->nama_produk;?></td>
                        <td><?php echo $review->nama;?></td>
                        <td><?php echo $review->email;?></td>
                        
                        <td><?php echo $review->rating;?></td>
                        <td><p><?php echo $review->isi;?></p></td>
                        <td><?php echo $review->update_at;?></td>

                        <td><a href="<?php echo base_url() . 'admin/produk/edit/' . $review->id; ?>" style="color:blue;text-decoration:underline"> Hapus</i></a></td>                        
                        <td><a href="<?php echo base_url() . 'admin/produk/edit/' . $review->id; ?>" style="color:blue;text-decoration:underline"> Accepted</i></a></td>                        

                     </tr>
                     <?php $i++;} ?>  
                  </tbody>
               </table>
               <div class="paging_bootstrap pagination" id="paging">
                  <ul>
                     <?php echo $this->pagination->create_links();?>
                  </ul>
               </div>