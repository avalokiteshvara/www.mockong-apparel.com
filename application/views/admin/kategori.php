<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12">
         <div class="span8 main-content">
            <h2><?php echo $page_title;?></h2>
            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url() . 'admin/kategori_add';?>'" style="margin-bottom:10px">[+] Tambah kategori</button>



            <div id="content-ajax">
               <table class="table table-first-column-number ">
                  <thead>
                     <tr>
                        <th style="padding-left: 1em;">#</th>
                        <th>Nama</th>
                        <th style="text-align:center">Gender</th>
                        <th colspan="2"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i = 1;
                        foreach ($data_kategori->result() as $kat) {
                     ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $kat->nama;?></td>
                        <td style="text-align:center"><?php echo ($kat->gender === 'L' ? 'Cowok' : 'Cewek');?></td>

                        <td style="width:80px">
                           <a href="<?php echo base_url() . 'admin/kategori_edit/' . $kat->id; ?>" style="color:blue;text-decoration:underline">
                           <button type="button" class="btn btn-primary btn-mini">Edit Kategori</button>
                           </a>
                        </td>
                        <td style="width:60px">
                           <a href="<?php echo base_url() . 'admin/kategori_delete/' . $kat->id; ?>" style="color:blue;text-decoration:underline">
                           <button type="button" class="btn btn-danger btn-mini">Hapus</button>
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
</div>
