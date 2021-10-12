<div class="panel">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url('product/create');?>" class="btn btn-default">
				Tambah
			</a>
			<a href="<?php echo site_url('product/index');?>" class="btn btn-default">
				Refresh
			</a>
		</div>
		<div class="col-md-6">
			<?php echo form_open("product"); ?>
				<div class="input-group">
	               <input type="text" class="form-control" name="search"  value="<?php echo isset($_GET['search']) ? $_GET['search'] : '';?>"  />
	               <span class="input-group-btn">
	                  <button class="btn btn-default" type="submit">
	                    Cari
	                  </button>
	               </span>
	            </div>
			<?php echo form_close(); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<?php if($this->session->flashdata('message')): ?>
			<div class="alert alert-success alert-dismissable">
			   <button type="button" class="close" data-dismiss="alert" 
			      aria-hidden="true">
			      &times;
			   </button>
			   Success! , <?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php EndIf; ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="50">No</th>
						<th width="150">Tanggal Record</th>
						<th>No Produk</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Brand</th>
						<th>Gambar</th>
						<th>Tanggal Kadarluarsa</th>
						<th class="text-center" width="200">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php if($results && count($results) > 0): $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;  ?>
					<?php foreach($results as $row): ?>
						<tr>
							<td><?php echo $page+=1; ?></td>
							<td><?php echo $row->created_at;?></td>
							<td><?php echo $row->code;?></td>
							<td><?php echo $row->product_name;?></td>
							<td><?php echo $row->price;?></td>
							<td><?php echo $row->brand_name;?></td>
							<td>
								<?php if(file_exists($row->image)): ?>
									<img src="<?php echo site_url($row->image);?>" class="thumbnail" width="100" alt="<?php echo $row->product_name;?>">
								<?php Else: ?>
									<label>Tidak ada gambar</label>
								<?php EndIf; ?>
							</td>
							<td><?php echo $row->expired;?></td>
							<td class="text-center">
								<a href="<?php echo site_url('product/edit/'.$row->id);?>" class="btn btn-sm btn-default">Ubah</a>
								<a href="<?php echo site_url('product/show/'.$row->id);?>" class="btn btn-sm btn-default">Lihat</a>
								<a onclick="return confirm('Apakah anda yakin ?');" href="<?php echo site_url('product/delete/'.$row->id);?>" class="btn btn-sm btn-default">
									Hapus
								</a>
							</td>
						</tr>
					<?php  EndForeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="9" class="text-center">Tidak ada data.</td>
				</tr>
				<?php EndIf; ?>
				</tbody>
			</table>
			<ul class="pagination pull-right">
                <?php foreach ($links as $link) { echo "<li>" . $link . "</li>"; } ?>
            </ul>
		</div>
	</div>
</div>