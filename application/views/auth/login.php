<div class="col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="panel-heading">
        Please Sign In
    </div>
    <div class="panel-body">
        <?php if($this->session->flashdata('warning')): ?>
            <div class="alert alert-danger alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" 
                  aria-hidden="true">
                  &times;
               </button>
               <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php EndIf; ?>
        <p></p>
        <?php echo form_open("auth/check_login",["class"=>""]); ?>
            <form role="form">
               <div class="form-group">
                  <label for="name">Username atau Email</label>
                  <input type="text" class="form-control" id="auth" name="auth" required/>
               </div>
               <div class="form-group">
                  <label for="name">Kata Sandi</label>
                  <input type="password" class="form-control" id="password" name="password" required/>
               </div>
               <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </form>
        <?php echo form_close(); ?>
    </div>
  </div>
</div>