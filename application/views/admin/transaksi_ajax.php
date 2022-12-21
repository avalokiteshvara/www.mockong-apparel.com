<table class="table table-first-column-number">
   <thead>
      <tr>
         <th style="padding-left: 1em;">#</th>
         <th>Tanggal Transaksi</th>
         <th>No.Transaksi</th>
         <th>Nama</th>
         <th>Email</th>
         <th>No.Telephon</th>
         <th>Quantity</th>
         <th>Total Harga</th>
         <th>Status</th>
         <th>Detail</th>
      </tr>
   </thead>
   <tbody>
      <?php 
         $i = $start_number + 1;
         foreach ($tabel_transaksi->result() as $transaksi) { 
         ?>
      <tr>
         <td><?php echo $i; ?></td>
         <td><?php echo $transaksi->created_at;?></td>
         <td><?php echo str_pad($transaksi->id, 7,"0",STR_PAD_LEFT); ?></td>
         <td><?php echo $transaksi->nama;?></td>
         <td><?php echo $transaksi->email;?></td>
         <td><?php echo $transaksi->telp;?></td>
         <td><?php echo $transaksi->quantity;?></td>
         <td>Rp <?php echo format_rupiah($transaksi->total_trans);?></td>
         <td><?php echo $transaksi->status;?></td>
         <td>
            <a href="<?php echo base_url() . 'admin/trans/detail/' . $transaksi->id; ?>" style="color:blue;text-decoration:underline">
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