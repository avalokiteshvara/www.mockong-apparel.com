<script type="text/javascript">
   
   
    function change_sort(){

      // var sel = document.getElementById('based_on');   
      // window.location.href = "<?php echo base_url().'admin/sort_konfirmasi/' ?>" + sel.options[sel.selectedIndex].value;

      $.ajax({
            url: baseURL + 'sort_konfirmasi',
            type:"POST",
            data : $('form').serialize(),   
            async: false,
            cache: false,  
            success : function(msg){              
                setTimeout(function(){
                  location.reload();                     
                },2000);
              
            }
        })
   }     

</script>


<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12 main-content">
            <h2>Status Transaksi</h2>

         <form class="form-inline" method="POST" action="">
            <label class="control-label" for="inputEmail">Status</label>
            <select id="based_on" name="based_on">
               <option <?php echo ($based_on === 'ALL') ? 'selected':''; ?> value="ALL" >ALL</option>
               <option <?php echo ($based_on === 'PROCESSING') ? 'selected':'';?> value="PROCESSING">PROCESSING</option>
               <option <?php echo ($based_on === 'CANCELED') ? 'selected':'';?> value="CANCELED">CANCELED</option>
               <option <?php echo ($based_on === 'COMPLETE') ? 'selected':'';?> value="COMPLETE">COMPLETE</option>
               <option <?php echo ($based_on === 'PAYMENT_CONFIRMED') ? 'selected':'';?> value="PAYMENT_CONFIRMED">PAYMENT_CONFIRMED</option>
               <option <?php echo ($based_on === 'WAITING_PAYMENT') ? 'selected':''; ?> value="WAITING_PAYMENT">WAITING_PAYMENT</option>
            </select>
            <button type="submit" class="btn">Filter</button>
          </form>

            <div id="content-ajax">
               <table class="table table-first-column-number data-table sort display">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th><a href="#"> Tanggal Transaksi</a></th>
                        <th>No.Transaksi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No.Telephon</th>
                        <th>Quantity</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th></th>
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
            </div>
         </div>
      </div>
   </div>
</div>