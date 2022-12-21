<script type="text/javascript">
   
   var baseURL = '<?php echo base_url();?>';
   function accepted(id){
     $.ajax({
         url: baseURL + 'admin/produk/review/accepted/' + id,
         type:"POST",
         success : function(msg){
           if(msg.trim() == 'OK'){
             $.jGrowl('Review akan ditampilkan');               
             setTimeout(function(){
               location.reload();                     
             },2000);
           }
         }
     })
   }

   function delete_review(id){
     $.ajax({
         url: baseURL + 'admin/produk/review/delete/' + id,
         type:"POST",
         success : function(msg){
           if(msg.trim() == 'OK'){
             $.jGrowl('Review telah dihapus');               
             setTimeout(function(){
               location.reload();                     
             },2000);
           }
         }
     })
   }


</script>

<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12 main-content">
            <h2><?php echo $page_title;?></h2>
            
            <div id="content-ajax">
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

                        <td>
                          <a href="#" style="color:blue;text-decoration:underline" onclick="delete_review(<?php echo $review->id;?>);return false"> 
                            <button type="button" class="btn btn-primary btn-mini">Hapus</button>
                          </a>
                        </td>                        
                     <?php if($review->accepted === 'N'):?>
                        <td>
                          <a href="#" style="color:blue;text-decoration:underline" onclick="accepted(<?php echo $review->id;?>);return false"> 
                            <button type="button" class="btn btn-primary btn-mini">Accepted</button>
                          </a>
                        </td>                        
                     <?php else: ?>
                        <td>Accepted</td>                           
                     <?php endif; ?>   
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