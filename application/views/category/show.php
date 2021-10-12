<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url("category");?>" class="btn btn-default">
				Kembali ke daftar
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php echo form_open("category/update",["class"=>"form-horizontal"]); ?>
		   <?php echo form_hidden("id",$data->id); ?>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Nama</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->name;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Deskripsi</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->description;?></strong>
		         </label>
		      </div>
		   </div>
		<?php echo form_close(); ?>
	</div>
</div>