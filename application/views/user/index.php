<div class="panel">
	<div class="panel-heading">
		<div class="col-md-6">
			<a href="<?php echo site_url('user/create');?>" class="btn btn-default">
				Tambah
			</a>
			<a href="<?php echo site_url('user/index');?>" class="btn btn-default">
				Refresh
			</a>
		</div>
		<div class="col-md-6">
			<?php echo form_open("user"); ?>
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
						<th>Username</th>
						<th>Email</th>
						<th class="text-center" width="200">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php if($results && count($results) > 0): $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;  ?>
					<?php foreach($results as $row): ?>
						<tr>
							<td><?php echo $page+=1; ?></td>
							<td><?php echo $row->created_at;?></td>
							<td><?php echo $row->username;?></td>
							<td><?php echo $row->email;?></td>
							<td class="text-center">
								<a href="<?php echo site_url('user/edit/'.$row->id);?>" class="btn btn-sm btn-default">Ubah</a>
								<a href="<?php echo site_url('user/show/'.$row->id);?>" class="btn btn-sm btn-default">Lihat</a>
								<a onclick="return confirm('Apakah anda yakin ?');" href="<?php echo site_url('user/delete/'.$row->id);?>" class="btn btn-sm btn-default">
									Hapus
								</a>
							</td>
						</tr>
					<?php  EndForeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="5" class="text-center">Tidak ada data.</td>
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