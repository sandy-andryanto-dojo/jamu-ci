<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url("product");?>" class="btn btn-default">
				Kembali ke daftar
			</a>
		</div>
		<div class="col-md-6"></div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php echo form_open("product/update",["class"=>"form-horizontal","enctype" => "multipart/form-data"]); ?>
		<?php echo form_hidden("id",$data->id); ?>
		   <div class="form-group">
		      <label for="code" class="col-sm-2 control-label">No Produk</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="code" name="code" value="<?php echo $data->code;?>" readonly="true" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="name" class="col-sm-2 control-label">Nama</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name;?>" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="price" class="col-sm-2 control-label">Harga</label>
		      <div class="col-sm-10">
		        <input type="number" class="form-control" id="price" min="0" value="<?php echo $data->price;?>" name="price" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="expired" class="col-sm-2 control-label">Tanggal Kadarluarsa</label>
		      <div class="col-sm-10">
		        <input type="date" class="form-control" id="expired" name="expired" value="<?php echo $data->expired;?>" />
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="brand" class="col-sm-2 control-label">Brand</label>
		      <div class="col-sm-10">
		         <select name="brand_id" class="form-control" required="true">
		         	 <option selected="true">Select Item</option>
		         	 <?php foreach($brands as $b): $selected = $b->id == $data->brand_id ? "selected" : "";  ?>
		         	 	<option value="<?php echo $b->id;?>" <?php echo $selected;?>  ><?php echo $b->name;?></option>
		         	 <?php EndForeach; ?>
		         </select>
		      </div>
		   </div>
		    <div class="form-group">
		      <label for="catgories" class="col-sm-2 control-label">Kategori</label>
		      <div class="col-sm-10">
		      		<?php foreach($categories as $c): ?>
			           <label class="checkbox-inline">
			           	  <?php $selected = ""; foreach($catSelected as $cs){  if($c->id == $cs->id){ $selected = "checked"; } } ?>
					      <input type="checkbox" name="categories[]" value="<?php echo $c->id;?>" <?php echo $selected;?>> <?php echo $c->name;?>
					   </label>
				   <?php EndForeach; ?>
		      </div>
		   </div>
		   <div class="form-group">
		      <label for="firstname" class="col-sm-2 control-label">Gambar</label>
		      <div class="col-sm-10">
		        <input type="file" class="form-control" id="images" name="file" />
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
		   <div class="form-group">
		      <div class="col-sm-offset-2 col-sm-10">
		         <button type="submit" class="btn btn-default">Simpan</button>
		      </div>
		   </div>
		<?php echo form_close(); ?>
	</div>
</div>