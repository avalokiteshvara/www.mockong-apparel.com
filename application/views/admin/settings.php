<div class="content">
   <div class="container-fluid">
      <div class="row-fluid">
         <!-- content tengah -->
         <div class="span12">
	         <div class="span12 main-content">
	            <h2>Settings</h2>
							<?php if($setting->num_rows() == 0){ ?>
								 <div class="row"></div>
								 <div class="alert alert-info">
										<strong>Data tidak ditemukan.</strong>
								 </div>
								 <?php }else{ ?>
								 <table width="100%" class="table table-condensed">
										<thead>
											 <tr>
													<th style="text-align: left">No</th>
													<th style="text-align: left">Title</th>
													<th style="text-align: left">Tipe</th>
													<th style="text-align: left">Value</th>
											 </tr>
										</thead>
										<tbody>
											 <?php $nomor = 0;?>
											 <?php foreach($setting->result() as $r){ ?>
											 <tr>
													<td><?php echo $nomor + 1?></td>
													<td style="text-align:left"><?php echo $r->title;?></td>
													<td style="text-align:left"><?php echo $r->tipe;?></td>
													<td>
													<?php if($r->tipe === 'big-text'){?>
														<textarea id="<?php echo $r->title;?>" title="<?php echo $r->title;?>" class="update_me" style="width: 98%;height: 100%"><?php echo $r->value;?></textarea>
													<?php }elseif($r->tipe === 'small-text'){ ?>
														<input title="<?php echo $r->title;?>" class="update_me form-control" style="width: 100%;height: 100%" type="text" value="<?php echo $r->value;?>">
													<?php }elseif($r->tipe === 'image'){ ?>
														<img style="margin-bottom: 10px" src="<?php echo base_url() . 'timthumb?src=' . base_url() . 'assets/web/images/' . $r->value;?>&h=<?php echo $r->img_height?>&w=<?php echo $r->img_width?>&zc=0">
														<form action="<?php echo base_url() . 'admin/settings/upload/' . $r->title;?>" method="POST" enctype="multipart/form-data">
																	 <input class="upload" name="img" onchange="this.form.submit()" multiple="" type="file">
														 </form>
													<?php } ?>

													</td>
											 </tr>
											 <?php $nomor++;} ?>
										</tbody>
								 </table>
								 <?php } ?>
						</div>
					</div>
			</div>
		</div>
</div>


<script>
    <?php foreach($setting->result() as $r){ ?>
			<?php if($r->tipe === 'big-text'){?>
				CKEDITOR.replace( '<?php echo $r->title?>', {
					extraPlugins: 'imageuploader',
			    on: {
			        change: function( evt ) {
			            console.log( evt );
									var data = CKEDITOR.instances.<?php echo $r->title?>.getData();
									$.post( "<?php echo base_url() . 'admin/settings/edt/' . $r->title;?>",
						      	{ value: data }
						      );
			        }
		    		}
					}
				);
			<?php } ?>
		<?php } ?>


   $('.update_me').keyup( function() {
      var this_title = $(this).attr('title');
      var this_val = $(this).val();
      $.post( "<?php echo base_url() . 'admin/settings/edt/';?>" + this_title,
      	{ value: this_val }
      );
   });
</script>
