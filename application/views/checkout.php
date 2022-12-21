<!-- ********************** --> 
  <!--      C O N T E N T     --> 
  <!-- ********************** --> 
  <div id="content" class="container_16">
  

    <div class="grid_16">

      <form id="create" class="clearfix" action="#">
        <h2 class="s_title_1"><span class="s_secondary_color">Form Guest</span> Checkout</h2>
        <div class="clear"></div>
       
        <div class="grid_8 alpha">
            <h3><span class="s_secondary_color">Informasi</span> Pembeli</h3>           
            
            <div class="s_row_2 clearfix">
              <label class="required">Nama Lengkap:</label>
              <input type="text" size="30" name="nama"/>
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
          
          <div class="grid_8 omega">
            <h3><span class="s_secondary_color">Informasi</span> Alamat Pengiriman</h3>           
            <div class="s_row_2 clearfix">
              <label class="required">Provinsi:</label>
              <input type="text" size="30" name="propinsi" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kota:</label>
              <input type="text" size="30" name="kota" />
            </div>

            <div class="s_row_2 clearfix">
              <label class="required">Kode POS:</label>
              <input type="text" size="30" name="kode_pos" />
            </div>

            <div class="s_row_2 clearfix">
              <label>Alamat</label>
              <textarea rows="5" cols="31" name="alamat"></textarea>
            </div>
            
          </div>
          <div class="grid_16 clearfix"> 
            <button class="s_button_1 s_main_color_bgr" type="submit" onclick="do_guestcheckout();return false"><span class="s_text">Lanjut</span></button>
          </div>
      </form>
      <br />
      <br />
  
    </div>
    
  </div>
  <!-- end of content --> 
