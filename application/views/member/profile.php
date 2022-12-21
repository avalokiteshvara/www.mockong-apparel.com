<!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
  

    <div class="grid_16">

      <form id="create" class="clearfix" action="#" method="POST">
        <h2 class="s_title_1"><span class="s_secondary_color">Form</span> Pendaftaran</h2>
        <div class="clear"></div>
       
        <div class="grid_8 alpha">
            <h3><span class="s_secondary_color">Informasi</span> Detail Personal</h3>
          <?php foreach ($member_info->result() as $member_info) {} ?>            
            
            
            <div class="s_row_2 clearfix">
              <label class="required">Nama Lengkap:</label>
              <input type="text" size="30" name="nama_lengkap" value="<?php echo isset($member_info->nama_lengkap) ? $member_info->nama_lengkap:''; ?>" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Email:</label>
              <input type="text" size="30" name="email" value="<?php echo isset($member_info->email) ? $member_info->email:''; ?>" disabled />
            </div>            

            <div class="s_row_2 clearfix">
              <label class="required">No.Telp:</label>
              <input type="text" size="30" name="telp" value="<?php echo isset($member_info->telp) ? $member_info->telp:''; ?>" />
            </div>

          </div>
          <div class="grid_8 omega">
            <h3><span class="s_secondary_color">Informasi</span> Alamat</h3>           

            <div class="s_row_2 clearfix">
              <label class="required">Provinsi:</label>
              <input type="text" size="30" name="propinsi" value="<?php echo isset($member_info->propinsi) ? $member_info->propinsi:''; ?>" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kota:</label>
              <input type="text" size="30" name="kota" value="<?php echo isset($member_info->kota) ? $member_info->kota:''; ?>" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kode POS:</label>
              <input type="text" size="30" name="kode_pos" value="<?php echo isset($member_info->kode_pos) ? $member_info->kode_pos:''; ?>" />
            </div>

            <div class="s_row_2 clearfix">
              <label>Alamat</label>
              <textarea rows="5" cols="31" name="alamat"><?php echo isset($member_info->alamat) ? $member_info->alamat:''; ?></textarea>
            </div>
            
            
          </div>

          <div class="grid_16 clearfix"> 
            <button class="s_button_1 s_main_color_bgr" type="submit" onclick="update_profile();return false"><span class="s_text">Update</span></button>
          </div>
      </form>
      <br />
      <br />
  
    </div>
    
  </div>
  <!-- end of content --> 
