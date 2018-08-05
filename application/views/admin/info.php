<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $this->load->view('/template/head');
    $this->load->view('/admin/navbar');
?>



<div class="container">
	<div class="row">
   <div class="col-sm-6">
     <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-comments-o" style="font-size:30px"></i>Social Media
        </div>
        <div class="panel-body medsos">
          <form method="post" action="<?php echo base_url('admin/updateSosmed') ?>">
            <div class="input-group form-group">
              <span class="input-group-addon"><i class="fa fa-facebook-square" style="font-size: 20px;"> </i></span>
              <input  type="text" class="form-control" name="fb" value="<?php echo $info->fb; ?>">
            </div>
            <div class="input-group form-group">
              <span class="input-group-addon"><i class="fa fa-twitter" style="font-size: 20px"></i></span>
              <input type="passwordtext" class="form-control" name="twitter" value="<?php echo $info->twitter; ?>">
            </div>
             <div class="input-group form-group">
              <span class="input-group-addon"><i class="fa fa-instagram" style="font-size: 20px"></i></span>
              <input type="passwordtext" class="form-control" name="ig" value="<?php echo $info->ig; ?>">
            </div>
             <div class="input-group form-group">
              <span class="input-group-addon"><i class="fa fa-youtube" style="font-size: 20px"></i></span>
              <input type="passwordtext" class="form-control" name="yt" value="<?php echo $info->yt; ?>">
            </div> 
            <div class="form-group">        
              <div class="col-sm-offset-8 col-sm-4">
                <input type="submit" class="btn btn-danger btn-block" value="« Update »">
              </div>
            </div>  
          </form>
        </div>
      </div>
   </div>
   <div class="col-sm-6">
     <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-assistive-listening-systems" style="font-size:30px"></i>Announcement
        </div>
        <div class="panel-body medsos">
          <form method="post" action="<?php echo base_url('admin/updateNoun') ?>">
            <div class="form-group"> 
              <textarea name="noun" style="width:100%; height:180px; "><?php echo $info->noun; ?></textarea>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-8 col-sm-4">
                <input type="submit" class="btn btn-danger btn-block" value="« Update »">
            </div>
            </div> 
          </form>
        </div>
      </div>
   </div>  
  </div>

  <?php if($this->session->flashdata('success_msg')){ ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
  <?php } ?>
</div>
<br>
<?php
$this->load->view('/template/footer');
?>