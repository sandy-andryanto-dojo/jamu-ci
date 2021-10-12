<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url("brand");?>" class="btn btn-default">
				Kembali ke daftar
			</a>
		</div>
		<div class="col-md-6"></div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php echo form_open("brand/update",["class"=>"form-horizontal"]); ?>
		<?php echo form_hidden("id",$data->id); ?>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Nama</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name;?>" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="lastname" class="col-sm-2 control-label">Deskripsi</label>
		      <div class="col-sm-10">
		         <textarea name="description" id="description" class="form-control" rows="5"><?php echo $data->description;?></textarea>
		      </div>
		   </div>
		   <div class="form-group">
		      <div class="col-sm-offset-2 col-sm-10">
		         <button type="submit" class="btn btn-default">Simpan</button>
		      </div>
		   </div>
		<?php echo form_close(); ?>
	</div>
</div>