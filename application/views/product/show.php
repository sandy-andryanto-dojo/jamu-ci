<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url("product");?>" class="btn btn-default">
				Kembali ke daftar
			</a>
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php echo form_open("product/update",["class"=>"form-horizontal"]); ?>
		<?php echo form_hidden("id",$data->id); ?>
		   <div class="form-group">
		      <label for="code" class="col-sm-2 control-label">No Produk</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->code;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="name" class="col-sm-2 control-label">Nama</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->name;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="price" class="col-sm-2 control-label">Harga</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->price;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="expired" class="col-sm-2 control-label">Tanggal Kadarluarsa</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $data->expired;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="brand" class="col-sm-2 control-label">Brand</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp<?php echo $brand->name;?></strong>
		         </label>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="categories" class="col-sm-2 control-label">Kategori</label>
		      <div class="col-sm-10">
		         <label class="control-label">
		         	<strong>:&nbsp <?php foreach($categories as $c) { echo $c->name.', '; }  ?> </strong>
		         </label>
		      </div>
		   </div>
		   <?php if ($data->image && file_exists($data->image)): ?>
	        <div class="form-group">
	            <label class="col-md-2 control-label" for="inputDefault"></label>
	            <div class="col-md-10">
	               <img class="img-responsive img-thumbnail" src="<?php echo "/" . $data->image; ?>" />
	            </div>
	        </div>
	        <?php endif; ?>
		<?php echo form_close(); ?>
	</div>
</div>