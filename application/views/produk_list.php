<!-- ********************** -->
  <!--     I N T R O          -->
  <!-- ********************** -->

  <div id="intro">
    <div id="intro_wrap">
      <div class="container_12">
        <div id="breadcrumbs" class="grid_12">
        <a href="<?php echo base_url()?>">Home</a>
           &gt; <a href="">Produk</a>
        </div>
        <h1><?php echo $breadcrumbs ?></h1>
      </div>
    </div>
  </div>
  <!-- end of intro -->


  <!-- ********************** -->
  <!--      C O N T E N T     -->
  <!-- ********************** -->
  <div id="content" class="container_12">


    <div id="category" class="grid_9">

<!--       <div class="s_subcategories s_grid_view s_listing clearfix">
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="Digital Cameras" alt="Digital Cameras" style="margin-bottom: 3px;" /></a> <a href="">Digital Cameras</a> </div>
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="Home Audio" alt="Home Audio" style="margin-bottom: 3px;" /></a> <a href="">Home Audio</a> </div>
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="Home Cinema" alt="Home Cinema" style="margin-bottom: 3px;" /></a> <a href="">Home Cinema</a> </div>
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="Cell Phones" alt="Cell Phones" style="margin-bottom: 3px;" /></a> <a href="">Cell Phones</a> </div>
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="MP3 Players" alt="MP3 Players" style="margin-bottom: 3px;" /></a> <a href="">MP3 Players</a> </div>
        <div class="s_subcategory"> <a href=""><img src="images/category_100x100.jpg" title="Car-Audio" alt="Car-Audio" style="margin-bottom: 3px;" /></a> <a href="">Car-Audio</a> </div>
        <div class="clear"></div>
      </div> -->

    <?php if($products->num_rows == 0):?>

      <div id="welcome">
        <h2><span class="s_secondary_color">Produk Belum Tersedia</span></h2>
        <p>Kami mohon maaf, namun sepertinya produk yang anda cari belum tersedia </p>
      </div>
      <div class="clear"></div>

    <?php else:?>

      <div id="listing_options">
        <div id="listing_sort" class="s_switcher">
          <span class="s_selected">Default</span>
          <ul class="s_options" style="display: none;">
            <li <?php echo $sort_order === 'nama-asc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('nama-asc')">Name A - Z</a></li>
            <li <?php echo $sort_order === 'nama-desc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('nama-desc')">Name Z - A</a></li>
            <li <?php echo $sort_order === 'harga-desc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('harga-desc')">Price High &gt; Low</a></li>
            <li <?php echo $sort_order === 'harga-asc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('harga-asc')">Price Low &gt; High</a></li>
            <li <?php echo $sort_order === 'rating-asc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('rating-asc')">Rating Lowest &gt; Highest</a></li>
            <li <?php echo $sort_order === 'rating-desc' ? 'id="active"' : '';?>><a href="#" onclick="change_sort('rating-desc')">Rating Highest &gt; Lowest</a></li>
          </ul>
        </div>
        <div id="view_mode" class="s_nav">
          <ul class="clearfix">
            <li id="view_grid"><a href="#" onclick="change_view('grid')"><span class="s_icon"></span>Grid</a></li>
            <li id="view_list" class="s_selected"><a href="#" onclick="change_view('list')"><span class="s_icon"></span>List</a></li>
          </ul>
        </div>
      </div>

      <div class="clear"></div>

      <div id="content_ajax">
        <div id="data_ajax" class="s_listing s_list_view clearfix">

        <?php foreach ($products->result() as $products) { ?>
          <div class="s_item clearfix">
            <div class="grid_3 alpha"> <a class="s_thumb" href="<?php echo base_url() . 'produk/' . $products->slug;?>"><img src="<?php echo base_url() . 'assets/web/images/foto_produk/' . $products->gambar;?>" title="<?php echo $products->nama;?>" alt="<?php echo $products->nama;?>" /></a> </div>
            <div class="grid_6 omega">
              <h3><a href="<?php echo base_url() . 'produk/' . $products->slug;?>"><?php echo $products->nama;?></a></h3>

            <?php if($products->promo == 'N'):?>
              <p class="s_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($products->harga);?></p>
            <?php else: ?>
              <p class="s_price s_promo_price"><span class="s_old_price"><span class="s_currency s_before">Rp</span><?php echo format_rupiah($products->harga_lama);?></span> <span class="s_currency s_before">Rp</span><?php echo format_rupiah($products->harga);?></p>
            <?php endif; ?>

              <p class="s_description"><?php echo $products->deskripsi;?></p>
              <a class="s_button_add_to_cart" href="<?php echo base_url() .'produk/' . $products->slug;?>"><span class="s_icon_16"><span class="s_icon"></span>Beli</span></a>
            </div>
            <div class="clear"></div>
          </div>

        <?php } ?>
        </div>

        <div class="pagination" id="ajax_paging">
          <div class="links">
            <?php echo $this->pagination->create_links();?>
           </div>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <div id="right_col" class="grid_3">
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
