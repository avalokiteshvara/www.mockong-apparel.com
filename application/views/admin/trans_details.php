<script type="text/javascript">
  var baseURL = '<?php echo base_url();?>';
         
 function set_status(id,status){    
    // alert(status);
    $.ajax({
     url: baseURL + 'admin/set_status/' + id + '/' + status,
     type:"POST",    
     success: function(msg){                                                       
         if(status == 0){
            $.jGrowl('Status Berubah menjadi PROCESSING');         
         }else{
            $.jGrowl('Status Berubah menjadi COMPLETE');         
         }
         
         
         setTimeout(function(){
             window.location.href = msg;
           },1000);        
         }
         
     })              
 }  

</script>


<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
          <!--content tengah -->
         <div class="span8 main-content">
         
            <h2><a href="" onclick="history.go(-1); return false;"> << Kembali</a></h2>
            <h2>Detail Pengiriman</h2>
            <?php foreach ($details_pengiriman->result() as $pengiriman) {} ?>
            <table class="table">
               <thead>
                  <tr>
                     <th style="width:100px"></th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>No.Trans</td>
                     <td><?php echo str_pad($pengiriman->id, 7,"0",STR_PAD_LEFT);?></td>
                  </tr>
                  <tr>
                     <td>Nama</td>
                     <td><?php echo $pengiriman->nama;?></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td><?php echo $pengiriman->email;?></td>
                  </tr>
                  <tr>
                     <td>Telephon</td>
                     <td><?php echo $pengiriman->telp;?></td>
                  </tr>
                  <tr>
                     <td>Provinsi</td>
                     <td><?php echo $pengiriman->propinsi;?></td>
                  </tr>
                  <tr>
                     <td>Kota</td>
                     <td><?php echo $pengiriman->nama;?></td>
                  </tr>
                  <tr>
                     <td>Kode POS</td>
                     <td><?php echo $pengiriman->kode_pos;?></td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td>
                  <?php if(!empty($pengiriman->alamat)):?>    
                        <pre><?php echo $pengiriman->alamat;?></pre>
                  <?php endif;?>      
                     </td>
                  </tr>
                  <tr>
                     <td>Pesan</td>
                     <td>
                  <?php if(!empty($pengiriman->pesan)):?>
                        <pre><?php echo $pengiriman->pesan;?></pre>                     
                  <?php endif;?>
                      </td>
                  </tr>
               </tbody>
            </table>

            <h2>Detail Items</h2>            
            <table class="table">
               <thead>
                  <tr>
                     <th>Kode Produk</th>
                     <th>Nama Produk</th>
                     <th>Harga</th>
                     <th>Quantity</th>
                     <th>Sub Total</th>
                  </tr>
               </thead>
               <tbody>
            <?php 
              $total_harga = 0;
              foreach ($details_pesanan->result() as $pesanan) { 
              $total_harga += $pesanan->sub_total;
            ?>   
                  <tr>
                    <td><?php echo $pesanan->kode_produk;?></td>
                    <td><a href="<?php echo base_url() . 'produk/' .$pesanan->slug;?>" target="_blank"><?php echo $pesanan->nama;?></a></td>
                    <td>Rp <?php echo format_rupiah($pesanan->harga_satuan);?></td>
                    <td><?php echo $pesanan->quantity;?></td>
                    <td>Rp <?php echo format_rupiah($pesanan->sub_total); ?></td>
                  </tr>
            <?php } ?>
                <tr>
                  <td colspan="4" style="text-align:right">Total</td>
                  <td colspan="1" style="text-align:left">Rp <?php echo format_rupiah($total_harga);?></td>
                </tr>                  
               </tbody>
            </table>

        <?php if($details_konfirmasi->num_rows() > 0):?>   
           <!-- Split button -->
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary ">Set Status Transaksi</button>
              <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#" onclick="set_status(<?php echo $details_konfirmasi->row()->id_trans .',0' ?>);return false">Sedang Proses</a></li>
                <li><a href="#" onclick="set_status(<?php echo $details_konfirmasi->row()->id_trans .',1' ?>);return false">Proses Selesai</a></li>                
              </ul>
            </div>   

         
             <h2>Details Konfirmasi</h2>            
            <table class="table">
               <thead>
                  <tr>
                    <th style="width:100px"></th>
                    <th></th>
                  </tr>
               </thead>
               <?php foreach ($details_konfirmasi->result() as $konfirmasi) {} ?>
               <tbody>
                    <tr>
                      <td>Tanggal Setor</td>
                      <td><?php echo $konfirmasi->tgl_setor;?></td>
                    </tr>
                    <tr>
                      <td>Metode Bayar</td>
                      <td><?php echo $konfirmasi->metode_bayar;?></td>
                    </tr>
                    <tr>
                      <td>Nama Penyetor</td>
                      <td><?php echo $konfirmasi->nama_penyetor;?></td>
                    </tr>
                    <tr>
                      <td>BANK</td>
                      <td><?php echo $konfirmasi->bank;?></td>
                    </tr>
                    <tr>
                      <td>Jumlah</td>
                      <td>Rp <?php echo format_rupiah($konfirmasi->jml_transfer);?></td>
                    </tr>
                    <tr>
                      <td>Metode Kirim</td>
                      <td><?php echo $konfirmasi->metode_kirim;?></td>
                    </tr>
                    <tr>
                      <td>Pesan</td>
                      <td><pre><?php echo $konfirmasi->pesan;?></pre></td>
                    </tr>
               </tbody>
            </table>
        <?php endif; ?>    
            <h2><a href="<?php echo base_url() . 'admin/transaksi';?>"> << Kembali</a></h2>        
         </div>
         
            
         <!--end content tengah -->
          <!-- <div class="clearfix"></div> -->
         <!-- side bar -->
         <?php include 'sidebar.php';?>
         <!-- end side bar -->
      </div>
   </div>
</div>