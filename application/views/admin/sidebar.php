<div class="span4 sidebar">
   <div class="widget">
      <h2>Review Terbaru</h2>
      <ul class="cards">
      <?php foreach ($latest_review->result() as $review) { ?>
         <li>
            <div class="img">
               <img src="<?php echo base_url() .'assets/web/images/foto_produk/'.$review->gambar; ?>" />
               <div class="label label-info">Rating <?php echo $review->rating;?></div>
            </div>

            <p class="info-text"><?php echo $review->nama_produk;?></p>
            <p class="info-text"><?php echo $review->isi;?></p>
            <div class="stats">
               <p class="time"><?php echo $review->email;?></p>
               <!-- <span>15 <i class="icon-pushpin"></i></span>
               <span>27 <i class="icon-comment"></i></span> -->
               <span><?php echo $review->update_at;?> <i class="icon-eye-open"></i></span>
               <!-- <span></span> -->
            </div>
         </li>
      <?php } ?>
         <li class="more">
            <a href="<?php echo base_url() . 'admin/produk/review' ?>">Show All</a>
         </li>
      </ul>
   </div>

   <!-- <div class="widget">
      <ul id="myTab" class="nav nav-tabs three-tabs fancy">
         <li class="active"><a href="#home" data-toggle="tab">Orders</a></li>
         <li><a href="#promotions" data-toggle="tab">Promotions</a></li>
         <li class="dropdown">
            <a href="#deals" data-toggle="tab">Deals</a>
         </li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane fade in active" id="home">
            <ul class="cards">
               <li>
                  <p class="pull-right text-error">$20,500</p>
                  <a href="#">
                     <p class="title">Care Hospital</p>
                  </a>
                  <p class="info">Sales Rating: 86%</p>
               </li>
               <li>
                  <p class="pull-right text-info">$9,400</p>
                  <a href="#">
                     <p class="title">New Automotive</p>
                  </a>
                  <p class="info">Sales Rating: 72%</p>
               </li>
               <li>
                  <p class="pull-right text-success">$60,200</p>
                  <a href="#">
                     <p class="title">Money Financial</p>
                  </a>
                  <p class="info">Sales Rating: 92%</p>
               </li>
               <li>
                  <p class="pull-right text-important">$8,640</p>
                  <a href="#">
                     <p class="title">Custom Insurance</p>
                  </a>
                  <p class="info">Sales Rating: 84%</p>
               </li>
               <li>
                  <p class="pull-right text-warning">$36,700</p>
                  <a href="#">
                     <p class="title">New Technology</p>
                  </a>
                  <p class="info">Sales Rating: 66%</p>
               </li>
            </ul>
         </div>
         <div class="tab-pane fade" id="promotions">
            <ul class="cards">
               <li style="padding: 0em 1em;">
                  <h3>This is something interesting.</h3>
               </li>
               <li>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation labore velit, blog sartorial PBR leggings next level wes anderson artisan.</li>
               <li>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation labore velit, blog sartorial PBR leggings next level wes anderson artisan.</li>
               <li>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation labore velit, blog sartorial PBR leggings next level wes anderson artisan.</li>
            </ul>
         </div>
         <div class="tab-pane fade" id="deals">
            <ul class="cards">
               <li>
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid oranges apples banana.</p>
                  <a class="btn btn-mini" href="#">Show me</a>
               </li>
               <li>
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid oranges apples banana.</p>
                  <a class="btn btn-mini" href="#">Show me</a>
               </li>
               <li>
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid oranges apples banana.</p>
                  <a class="btn btn-mini" href="#">Show me</a>
               </li>
               <li>
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid oranges apples banana.</p>
                  <a class="btn btn-mini" href="#">Show me</a>
               </li>
            </ul>
         </div>
      </div>
   </div> -->

  <!--  <div class="widget">
      <ul class="nav nav-tabs two-tabs fancy">
         <li class="active"><a href="#upgrade" data-toggle="tab">Upgrade Account</a></li>
         <li><a href="#why-upgrade" data-toggle="tab">Why Upgrade?</a></li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane fade in active" id="upgrade">
            <ul class="unstyled cards not-bottom">
               <li>
                  <i class="icon-leaf pull-left text-info"></i>
                  <p class="title"><strong>More Features</strong></p>
                  <p class="info small">This is the kind of thing you really need.</p>
               </li>
               <li>
                  <i class="icon-group pull-left text-info"></i>
                  <p class="title"><strong>Unlimited Users</strong></p>
                  <p class="info small">This is the kind of thing you really need.</p>
               </li>
               <li>
                  <i class="icon-trophy pull-left text-info"></i>
                  <p class="title"><strong>Custom Database</strong></p>
                  <p class="info small">This is the kind of thing you really need.</p>
               </li>
               <li>
                  <i class="icon-book pull-left text-info"></i>
                  <p class="title"><strong>Enhanced Reporting</strong></p>
                  <p class="info small">This is the kind of thing you really need.</p>
               </li>
            </ul>
            <button class="btn btn-primary pull-right">Upgrade Now</button>
         </div>
         <div class="tab-pane fade" id="why-upgrade">
            <h3>This is something interesting.</h3>
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation labore velit, blog sartorial PBR leggings next level wes anderson artisan.</p>
            <button class="btn btn-primary pull-right">Upgrade Now</button>
         </div>
      </div>
   </div> -->

</div>
