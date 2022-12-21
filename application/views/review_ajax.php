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