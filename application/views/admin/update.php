


	<?php
    $this->load->view('/template/head');
    $this->load->view('/admin/navbar');
?>
<div class="container">
	<div class="row">
    <div class="col-sm-2 hidden-xs"></div>
    <div class="col-sm-8 col-xs-12 cons">
      <form method="post" action="<?php echo base_url('admin/saveUpdate') ?>">  
      	<input type="hidden" name="id" value="<?php echo $phone->id; ?>">
        <div class="form-group">  
          <label>Number</label>  
          <input type="text" name="number" class="form-control" value="<?php echo $phone->number; ?>"/>                 
        </div>  
        <div class="form-group">  
          <label>Contact Name</label>  
          <input type="text" name="name" class="form-control" value="<?php echo $phone->contact_name; ?>">  
        </div> 
        <div class="form-group">  
          <label>Location</label>  
         <textarea name="location" class="form-control"><?php echo $phone->location; ?></textarea> 
        </div> 
        <div class="form-group">  
           <a href="<?php echo base_url('admin') ?>" class="btn btn-default">Back</a> 
          <input type="submit" name="btnSave" value="Save" class="btn btn-danger" /> 
        </div>  
      </form>  
    </div>
    <div class="col-sm-2 hidden-xs"></div>
  </div>
</div>	