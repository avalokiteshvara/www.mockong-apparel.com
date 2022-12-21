
 <script type="text/javascript">

   $(document).ready(function() {

     $(".s_tabs").tabs({ fx: { opacity: 'toggle', duration: 300 } });

     $("#product_images a[rel^='prettyPhoto'], #product_gallery a[rel^='prettyPhoto']").prettyPhoto({
       theme: 'light_square',
       opacity: 0.5
     });

   });

</script>

 <!-- ********************** -->  <!--     I N T R O          -->
  <!-- ********************** -->

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
        <a href="<?php echo base_url()?>">Home</a>
           &gt; <a href="">Produk Details</a>
        </div>
        <h1><?php echo $breadcrumbs ?></h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->


  <div id="content" class="product_view container_16">

    <div id="product" class="grid_12">
  <?php if($data_produk->num_rows == 0):?>

      <div id="welcome">
        <h2><span class="s_secondary_color">Produk Belum Tersedia</span></h2>
        <p>Kami mohon maaf, namun sepertinya produk yang anda cari belum tersedia </p>
      </div>
      <div class="clear"></div>

  <?php else:?>

    <?php foreach ($data_produk->result() as $dt_produk) {} ?>
      <div id="product_images" class="grid_6 alpha">
      	<a id="product_image_preview" rel="prettyPhoto[gallery]" href="<?php echo image(base_url() .'assets/web/images/foto_produk/' .$dt_produk->gambar,"prettyphoto"); ?>"><img id="image" src="<?php echo image(base_url() .'assets/web/images/foto_produk/' .$dt_produk->gambar,"prettyphoto"); ?>" title="<?php echo $dt_produk->nama_produk;?>" alt="<?php echo $dt_produk->nama_produk;?>" /></a>
      </div>
      <div id="product_info" class="grid_6 omega">
      <?php if($dt_produk->promo == 'Y'): ?>
        <p class="s_price s_promo_price"><span class="s_old_price"><?php echo format_rupiah($dt_produk->harga_lama);?><span class="s_currency s_after"> Rp</span></span> <?php echo format_rupiah($dt_produk->harga);?><span class="s_currency s_after"> Rp</span></p>
      <?php else:?>
        <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($dt_produk->harga);?></p>
      <?php endif;?>
        <dl class="clearfix">
        <?php if($stok <= 0): ?>
           <dt>Stok</dt><dd><strong>0</strong></dd>
        <?php else : ?>
          <dt>Stok</dt><dd><strong><?php echo $stok; ?></strong></dd>
        <?php endif; ?>

          <dt>Kategori</dt><dd><a href="#"><?php echo str_ireplace("bahan","", $dt_produk->kategori) ;?></a></dd>

          <dt>Rating</dt>
          <dd>
        <?php if($dt_produk->average_rating >= 3) : ?>
            <p class="s_rating s_rating_5">
            <span style="width: <?php echo get_percent($dt_produk->average_rating,5);?>%;" class="s_percent"></span>
            </p>
        <?php else: ?>
            Belum ada Rating
        <?php endif; ?>
          </dd>
        </dl>

        <!-- form produk buy-->
        <div id="product_buy" class="clearfix">

        <?php if($stok <= 0): ?>
           <h2 class="s_secondary_color">STOK HABIS</h2>
        <?php else : ?>

          <form id="form_add_item_cart" method="POST" action="<?php echo base_url() . 'add-cart';?>" >
            <label for="product_buy_quantity">Qty:</label>
            <input id="product_buy_quantity" type="text" name="banyak" size="2" />

            <input type="hidden" name="kode_produk" value="<?php echo $dt_produk->kode_produk; ?>">
            <input type="hidden" name="harga" value="<?php echo $dt_produk->harga; ?>">
            <input type="hidden" name="nama_produk" value="<?php echo $dt_produk->nama_produk; ?>">
            <input type="hidden" name="gambar" value="<?php echo $dt_produk->gambar; ?>">
            <input type="hidden" name="slug" value="<?php echo $dt_produk->slug; ?>">


            <button id="add_to_cart" class="s_button_1 s_main_color_bgr" type="submit">
              <span class="s_text">
                <span class="s_icon">
                </span>
                Beli
              </span>
            </button>
          </form>
        <?php endif; ?>

        </div>
        <!-- end produk buy-->

      </div>
      <div class="clear"></div>
      <div class="s_tabs grid_12 alpha omega">
        <ul class="s_tabs_nav clearfix">
          <li><a href="#product_description">Description</a></li>
          <li><a href="#product_reviews">Reviews (<?php echo $tot_review;?>)</a></li>
          <li><a href="#product_gallery">Photos (<?php echo $images->num_rows();?>)</a></li>
        </ul>
        <div class="s_tab_box">

          <div id="product_description">
            <div class="cpt_product_description ">
          <?php echo $dt_produk->deskripsi;?>
            </div>
            <!-- cpt_container_end -->
          </div>

          <div id="product_reviews" class="s_listing">

          <?php
              $num_rows = $reviews->num_rows();
              if( $num_rows == 0):
          ?>
            <div class="cpt_product_description ">

            </div>
          <?php else: ?>
            <!--content ajax -->
            <div id="content_ajax">

              <div id="data-ajax">
              <?php foreach ($reviews->result() as $review) { ?>
                <div class="s_review last">
                  <p class="s_author"><strong><?php echo $review->nama .'(' . $review->email .')' ;?></strong><small>(<?php echo $review->update_at;?>)</small></p>
                  <div class="right">
                    <div class="s_rating_holder">
                      <p class="s_rating s_rating_5"><span class="s_percent" style="width: <?php echo get_percent($review->rating,5);?>%;"></span></p>
                      <span class="s_average"><?php echo $review->rating;?> out of 5 Stars!</span>
                    </div>
                  </div>
                  <div class="clear"></div>
                  <p><?php echo $review->isi;?></p>
                </div>
              <?php } ?>
              </div>


              <div class="pagination" id="ajax_paging">
                <div class="links">
                  <?php echo $this->pagination->create_links();?>
                </div>
                <!-- <div class="results">Showing 1 to 1 of 1 (1 Pages)</div> -->
              </div>

            </div>
            <!--content ajax-->
          <?php endif;?>

            <h2 class="s_title_1"><span class="s_main_color">Tulis</span> Review</h2>
            <div id="review_title" class="clear"></div>

            <form method="POST" action="">
                <input type="hidden" name="kode_produk" value="<?php echo $dt_produk->kode_produk; ?>">
                <input type="hidden" name="slug" value="<?php echo $dt_produk->slug; ?>">

                <div class="s_row_3 clearfix">
                  <label><strong>Nama:</strong></label>
                  <input name = "nama" type="text" />
                </div>

                <div class="s_row_3 clearfix">
                  <label><strong>Email:</strong></label>
                  <input name="email" type="text" />
                </div>

                <div class="s_row_3 clearfix">
                  <label><strong>Review Anda:</strong></label>
                  <textarea style="width: 98%;" rows="8" name="isi"></textarea>
                  <p class="s_legend"><span style="color: #FF0000;">Note:</span> HTML is not translated!</p>
                </div>

                <div class="s_row_3 clearfix">
                  <label><strong>Rating</strong></label>
                  <span class="clear"></span> <span>Bad</span>&nbsp;
                  <input type="radio" name="rating" value="1"/>&nbsp;
                  <input type="radio" name="rating" value="2"/>&nbsp;
                  <input type="radio" name="rating" value="3"/>&nbsp;
                  <input type="radio" name="rating" value="4"/>&nbsp;
                  <input type="radio" name="rating" value="5"/>&nbsp;
                  <span>Good</span>
                </div>

                <span class="clear border_ddd"></span>
                <!-- <a class="s_button_1 s_main_color_bgr"><span class="s_text">Kirim</span></a> <span class="clear"></span> -->
                <button class="s_button_1 s_main_color_bgr" type="submit" onclick="kirim_review();return false"><span class="s_text">Kirim</span></button>
                <span class="clear"></span>
            </form>

          </div>

          <div id="product_gallery">
          <?php
            $num_rows = $images->num_rows();
            if($num_rows == 0):
          ?>
            <div>
              <h2 class="s_title_1 clearfix" ><span class="s_main_color">Belum ada</span> Foto terbaru</h2>
              <br><br>
            </div>
          <?php else: ?>
            <ul class="s_thumbs clearfix">
            <?php foreach ($images->result() as $img) { ?>
              <li>
                <a class="s_thumb" href="<?php echo image(base_url() . 'assets/web/images/foto_produk/' . $img->gambar,"image_details"); ?>" title="<?php echo $img->nama_produk;?>" rel="prettyPhoto[gallery]">
                  <img src="<?php echo image(base_url() . 'assets/web/images/foto_produk/' . $img->gambar,"image_details"); ?>" width="120" title="<?php echo $img->nama_produk;?>" alt="<?php echo $img->nama_produk;?>" />
                </a>
              </li>
            <?php } ?>
            </ul>
          <?php endif; ?>

          </div>
        </div>
      </div>

      <!--random produk-->
      <div id="related_products" class="grid_12 alpha omega">
        <h2 class="s_title_1"><span class="s_main_color">Produk</span> Lainnya</h2>
        <div class="clear"></div>
        <div class="s_grid_view s_listing clearfix">

        <?php foreach ($random_produk->result() as $r_produk) { ?>
          <div class="s_item grid_3">
            <a class="s_thumb" href="<?php echo base_url() .'produk/' . $r_produk->slug;?>">
              <img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $r_produk->gambar; ?>" title="<?php $r_produk->nama; ?>" alt="<?php $r_produk->nama; ?>" />
            </a>
            <h3><a href="<?php echo base_url() .'produk/' . $r_produk->slug;?>"><?php $r_produk->nama; ?></a></h3>

          <?php if($r_produk->promo == 'Y'): ?>
            <p class="s_price s_promo_price"><span class="s_old_price"><?php echo format_rupiah($r_produk->harga_lama);?><span class="s_currency s_after"> Rp</span></span> <?php echo format_rupiah($r_produk->harga);?><span class="s_currency s_after"> Rp</span></p>
          <?php else:?>
            <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($r_produk->harga);?></p>
          <?php endif;?>

            <a class="s_button_add_to_cart" href="<?php echo base_url() .'add-cart/' .$r_produk->slug; ?>"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
          </div>
        <?php } ?>
          <div class="clear"></div>
        </div>
      </div>
      <!--end random produk-->


  <?php endif;?>
    </div>


    <div id="right_col" class="grid_3">

      <!-- Keranjang Belanja -->
      <div id="cart_side" class="s_box_1 s_cart_holder">
        <h2 class="s_secondary_color">Keranjang Belanja</h2>
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
          <?php if($this->session->userdata('sudah_login') == 1) :?>
            <a class="s_button_1 s_secondary_color_bgr" href="<?php echo base_url() .'member/checkout';?>"><span class="s_text">Lanjut</span></a>
          <?php else: ?>
            <a class="s_button_1 s_secondary_color_bgr" href="<?php echo base_url() .'member/login'?>"><span class="s_text">Lanjut</span></a>
          <?php endif; ?>
          </div>

      <?php endif; ?>

        </div>
      </div>
      <!--end shoppingcart -->

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
