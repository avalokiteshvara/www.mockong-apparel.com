 <!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
          <a href="<?php echo base_url()?>">Home</a>
          &gt;
          <a href="<?php echo base_url() . 'konfirmasi'?>">Konfirmasi Pembayaran</a>
        </div>
        <h1>Konfirmasi Pembayaran</h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_12">
    <div class="grid_9">
      <div class="grid_8">

        <h2>Konfirmasi</h2>
        <div class="clear"></div>
        <!-- <div class="grid_9 alpha">
          <h3><span class="s_secondary_color">Informasi</span> Detail Personal</h3> -->
        <form method="POST" action="#">
          <div class="s_row_2 clearfix">
            <label>Nomor Transaksi:</label>
            <input type="text" size="30" name="id_trans" />
          </div>

          <div class="s_row_2 clearfix">
            <label>Tanggal Transfer:</label>
            <input type="date" size="30" name="tgl_setor"/>
          </div>


          <div class="s_row_2 clearfix">
            <label>Bank Tujuan</label>
            <select style="width: 212px;" name="bank">
              <option value="BCA - No.Rek xx.xx.xx.xx">BCA - No.Rek xx.xx.xx.xx</option>
              <option value="BRI - No.Rek xx.xx.xx.xx">BRI - No.Rek xx.xx.xx.xx</option>
              <option value="BNI - No.Rek xx.xx.xx.xx">BNI - No.Rek xx.xx.xx.xx</option>
              <option value="MANDIRI - No.Rek xx.xx.xx.xx">MANDIRI - No.Rek xx.xx.xx.xx</option>
            </select>
          </div>

          <div class="s_row_2 clearfix">
            <label>Metode Pembayaran</label>
            <select style="width: 212px;" name="metode_bayar">
              <option value="Setoran Tunai, Transfer Bank">Setoran Tunai, Transfer Bank</option>
              <option value="Setoran Tunai, Transfer Antar Bank">Setoran Tunai, Transfer Antar Bank</option>
              <option value="ATM">ATM</option>
              <option value="ATM - Antar Bank">ATM - Antar Bank</option>
              <option value="Internet Banking">Internet Banking</option>
              <option value="Internet Banking - Antar Bank">Internet Banking - Antar Bank</option>
              <option value="SMS Banking">SMS Banking</option>
              <option value="SMS Banking - Antar Bank">SMS Banking - Antar Bank</option>
            </select>
          </div>

          <div class="s_row_2 clearfix">
            <label>Jumlah Transfer:</label>
            <input type="text" size="30" name="jml_transfer"  />
          </div>

          <div class="s_row_2 clearfix">
            <label>Nama Pengirim:</label>
            <input type="text" size="30" name="nama_penyetor"  />
          </div>

          <div class="s_row_2 clearfix">
            <label>Paket Pengiriman</label>
            <select style="width: 212px;" name="metode_kirim">
              <option value="TIKI">TIKI</option>
              <option value="JNE">JNE</option>
              <option value="ESL Express">ESL Express</option>
            </select>
          </div>

          <div class="s_row_2 clearfix">
            <label>Pesan Tambahan:</label>
            <textarea style="width: 50%;" rows="8" name="pesan"></textarea>
            <p class="s_legend"><span style="color: #FF0000;">Note:</span> HTML is not translated!</p>
          </div>

          <span class="clear border_ddd"></span>
            <br />
          <button class="s_button_1 s_main_color_bgr" type="submit" onclick="kirim_konfirmasi_guest();return false"><span class="s_text">Kirim</span></button>
        </form>
      </div>
    </div>



    <div id="right_col" class="grid_3">
      <div id="cart_side" class="s_box_1 s_cart_holder">
        <h2 class="s_secondary_color">Keranjang Belanja</h2>
        <div class="clear"></div>
        <div id="cart_side_contents">
      <?php if(!$this->cart->contents()) : ?>
          <p class="s_mb_0">0 items</p>
      <?php else : ?>
        <?php foreach ($this->cart->contents() as $item) { ?>
          <?php echo form_hidden('rowid[]', $item['rowid']); ?>
          <div class="s_cart_item">
              <a id="hremove_<?php echo $item['id'];?>" class="s_button_remove" href="#" onclick="delete_cart('<?php echo $item['rowid'];?>')">&nbsp;</a>
              <span class="block"><?php echo $item['qty'];?>x <a href="<?php echo base_url() .'produk/' .$item['slug']; ?>"><?php echo $item['name'];?></a></span>
          </div>

        <?php } ?>
          <span class="clear s_mb_15 border_eee"></span>
          <!-- <div class="s_total clearfix"><strong class="cart_module_total left">Sub-Total:</strong><span class="cart_module_total">Rp <?php echo format_rupiah($item['subtotal']); ?><span class="s_currency s_after"></span></span></div>                     -->
          <div class="s_total clearfix"><strong class="cart_module_total left">Total:</strong><span class="cart_module_total">Rp <?php echo format_rupiah($this->cart->total()); ?><span class="s_currency s_after"></span></span></div>

          <span class="clear s_mb_15"></span>
          <div class="align_center clearfix">
            <a class="s_button_1 s_secondary_color_bgr s_ml_0" href="<?php echo base_url() . 'shopping-cart';?>"><span class="s_text">Lihat</span></a>
            <?php if($this->session->userdata('sudah_login') == 1):?>
            <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/checkout'; ?>"><span class="s_text">Lanjut</span></a>
            <?php else :?>
            <a class="s_button_1 s_main_color_bgr" href="<?php echo base_url() . 'member/login';?>"><span class="s_text">Lanjut</span></a>
            <?php endif;?>
          </div>

      <?php endif; ?>
        </div>
      </div>

      <?php if($best_seller_product->num_rows() > 0){ ?>
        <div id="bestseller_side" class="s_box clearfix">
          <h2>Best Sellers</h2>
          <?php foreach ($best_seller_product->result() as $best_seller) { ?>
          <div class="s_item s_size_1 clearfix">
            <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $best_seller->gambar;?>" width="38" height="38" alt="<?php echo $best_seller->nama;?>" /></a>
            <h3><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><?php echo $best_seller->nama;?></a></h3>
          <?php if($best_seller->promo === 'N'): ?>
            <p><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><span class="s_main_color"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller->harga);?></span></a></p>
          <?php else: ?>
            <p><a href="<?php echo base_url() . 'produk/' . $best_seller->slug;?>"><span class="s_old"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($best_seller->harga_lama);?></span> <span class="s_secondary_color"><span class="s_currency s_after">Rp</span><?php echo format_rupiah($best_seller->harga);?></span></a></p>
          <?php endif; ?>
          <div class="s_rating_holder clearfix"><p class="s_rating s_rating_small s_rating_5 left"><span style="width: <?php echo get_percent($best_seller->average_rating,5) ?>%;" class="s_percent"></span></p><span class="left">&nbsp;<?php echo $best_seller->average_rating;?>/5</span></div>
          </div>
        <?php } ?>
        </div>
      <?php } ?>


    </div>

  </div>
  <!-- end of content -->
