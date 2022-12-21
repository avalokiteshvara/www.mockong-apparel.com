<!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
    
    <?php foreach ($user_profile->result() as $profile) {} ?>

    <div class="grid_16">

      <form id="create" class="clearfix" action="#">
        <h2 class="s_title_1"><span class="s_secondary_color">Form Member</span> Checkout</h2>
        <div class="clear"></div>
       
        <div class="grid_7 alpha">
            <h3><span class="s_secondary_color">Informasi</span> Pembeli</h3>           
            
            <div class="s_row_2 clearfix">
              <label class="required">Nama Lengkap:</label>
              <input type="text" size="30" name="billing_nama" value="<?php echo $profile->nama_lengkap;?>" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Email:</label>
              <input type="text" size="30" name="billing_email" value="<?php echo $profile->email;?>"  />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Nomor Telephon:</label>
              <input type="text" size="30"  name="billing_telp" value="<?php echo $profile->telp;?>"  />
            </div>
          </div>
          
          <div class="grid_9 omega">
            <h3><span class="s_secondary_color">Informasi</span> Alamat</h3>           
            <div class="s_row_2 clearfix">
              <label class="required">Provinsi:</label>
              <input type="text" size="30" name="billing_propinsi" value="<?php echo $profile->propinsi;?>"   />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kota:</label>
              <input type="text" size="30" name="billing_kota" value="<?php echo $profile->kota;?>"   />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kode POS:</label>
              <input type="text" size="30" name = "billing_kode_pos" value="<?php echo $profile->kode_pos;?>"   />
            </div>

            <div class="s_row_2 clearfix">
              <label>Alamat</label>
              <textarea rows="5" cols="31" name="billing_alamat"><?php echo $profile->alamat;?></textarea>
            </div>
            
          </div>
          <span class="clear border_ddd"></span>
            <br />
          <div class="grid_16 omega">          
            <label class="s_radio"><input type="checkbox" name="shipping_too"onclick="fill_billing(this.form)"  /> <strong>Sama dengan informasi diatas</strong></label>
          </div>  
          <span class="clear border_ddd"></span>

          <!-- info pengiriman -->
          <div class="grid_7 alpha">
            <h3><span class="s_secondary_color">Informasi</span> Penerima</h3>           
            
            <div class="s_row_2 clearfix">
              <label class="required">Nama Lengkap:</label>
              <input type="text" size="30" name="nama" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Email:</label>
              <input type="text" size="30" name="email" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Nomor Telephon:</label>
              <input type="text" size="30" name="telp" />
            </div>

            <div class="s_row_2 clearfix">
                <label>Pesan</label>
                <textarea rows="5" cols="31" name="pesan" placeholder="Pesan tambahan yang ingin anda sampaikan"></textarea>
            </div>

          </div>

          <div class="grid_9 omega">
            <h3><span class="s_secondary_color">Informasi</span> Alamat Penerima</h3>           
            <div class="s_row_2 clearfix">
              <label class="required">Provinsi:</label>
              <input type="text" size="30" name="propinsi" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kota:</label>
              <input type="text" size="30" name="kota"  />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kode POS:</label>
              <input type="text" size="30" name="kode_pos"  />
            </div>

            <div class="s_row_2 clearfix">
              <label>Alamat</label>
              <textarea rows="5" cols="31" name="alamat"></textarea>
            </div>
            
          </div>  
          <div class="grid_16 clearfix"> 
            <button class="s_button_1 s_main_color_bgr" type="submit" onclick="do_checkout();return false"><span class="s_text">Lanjut</span></button>
          </div>
      </form>
      <br />
      <br />
  
    </div>
    
  </div>
  <!-- end of content --> 
