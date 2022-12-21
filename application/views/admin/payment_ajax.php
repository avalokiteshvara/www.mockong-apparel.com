<table class="table table-first-column-number">
   <thead>
      <tr>
         <th style="padding-left: 1em;">#</th>
         <th>Tanggal Transaksi</th>
         <th>No.Transaksi</th>
         <th>Quantity</th>
         <th>Total Harga</th>
         <th>Detail</th>
         <!-- <th>Status</th> -->
         <!-- <th colspan="2" width="10"></th> -->
         <!-- <th style="padding-left: 1em;">#</th>
            <th>First</th>
            <th>Last</th>
            <th>Username</th>
            <th colspan="2" width="10"></th> -->
      </tr>
   </thead>
   <tbody>
      <?php 
         $i = $start_number + 1;
         foreach ($payment_confirmed->result() as $payment_confirmed) { 
         ?>
      <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $payment_confirmed->created_at;?></td>
         <td><?php echo str_pad($payment_confirmed->id, 7,"0",STR_PAD_LEFT); ?></td>
         <td><?php echo $payment_confirmed->quantity;?></td>
         <td>Rp<?php echo format_rupiah($payment_confirmed->total_trans);?></td>
         <td><a href="<?php echo base_url() . 'admin/trans/detail/' . $payment_confirmed->id; ?>" style="color:blue;text-decoration:underline"> Details</a></td>
      </tr>
      <?php $i++;} ?>                         
   </tbody>
</table>
<div class="paging_bootstrap pagination" id="paging">
   <ul>
      <?php echo $this->pagination->create_links();?>
   </ul>
</div>
