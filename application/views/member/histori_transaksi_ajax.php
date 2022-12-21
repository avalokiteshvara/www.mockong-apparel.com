        <div id="data_ajax">          
            <table class="s_table" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <th>Tanggal Transaksi</th>
                <th>No.Transaksi</th>
                <!-- <th>Status</th> -->
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>Detail</th>
                <th>Status</th>
              </tr>
          
            <?php foreach ($histori_transaksi->result() as $histori_item) { ?>
              <tr>
                <td><?php echo $histori_item->created_at;?></td>
                <td><?php echo str_pad($histori_item->id, 7,"0",STR_PAD_LEFT); ?></td>
                <!--<td><?php echo $histori_item->status;?></td>-->
                <td><?php echo $histori_item->quantity;?></td>
                <td>Rp<?php echo format_rupiah($histori_item->total_trans);?></td>
                <td><a href="<?php echo base_url() . 'member/trans/detail/' . $histori_item->id; ?>" style="color:blue;text-decoration:underline"> Lihat Detail</a></td>
              <?php if($histori_item->status === "WAITING_PAYMENT") : ?> 
                <td>
                    <a href="<?php echo base_url() . 'member/konfirmasi/'. $histori_item->id; ?>" style="color:blue;text-decoration:underline"> KONFIRMASI</a> | 
                    <a href="#" onclick="batal_trans(<?php echo $histori_item->id;?>)" style="color:blue;text-decoration:underline"> BATAL</a>
                </td>
              <?php else: ?>
                <td><?php echo $histori_item->status;?></td>
              <?php endif; ?>  
              </tr>        
             <?php } ?>  
            </table>
        </div>

        <div class="pagination" id="ajax_paging">
          <div class="links">            
            <?php echo $pagination;?>
           </div>
          <div class="results">Showing 1 to 12 of 20 (2 Pages)</div>
        </div>        