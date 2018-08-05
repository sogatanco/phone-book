<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $this->load->view('/template/head');
    $this->load->view('/template/navbar');
?>

<title>Phone Book Bandara Blang Bintang</title>
<div class="container book">
	<div class="row">
		<div class="col-sm-9 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"> 
					<div class="row">
						<div class="col-sm-4 hidden-xs">
							<i class="fa fa-address-card" style="font-size:30px"></i> Phone List
						</div>
						<div class="col-sm-8 col-xs-12">
							<?php 
        						$attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        						echo form_open("dashboard/search", $attr);
        					?>
							<div class="input-group stylish-input-group">
                    			<input id="book_name" name="book_name" type="text" class="form-control"  placeholder="Search" value="<?php echo set_value('book_name'); ?>" >
                    			<span class="input-group-addon">
                        			<button type="submit" id="btn_search" name="btn_search">
                            			<span class="glyphicon glyphicon-search"></span>
                        			</button>  
                    			</span>
                			</div>
                			<?php 
            		 			echo form_close(); 
            		 		?>
						</div>
					</div>
				</div>
				<div class="panel-body">
                    <div class="table-responsive">
            		 <table class="table table-striped table-hover">
                		<thead>
                    		<tr>
                    			<th>#</th>
                    			<th>Contact Name</th>
                    			<th>Number</th>
                    			<th>Location</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php for ($i = 0; $i < count($phonelist); ++$i) { ?>
                			<tr>
                    			<td><?php echo ($page+$i+1); ?></td>
                    			<td><?php echo $phonelist[$i]->contact_name; ?></td>
                    			<td><?php echo $phonelist[$i]->number; ?></td>
                    			<td><?php echo $phonelist[$i]->location; ?></td>
                			</tr>
                			<?php } ?>
                		</tbody>
            		</table>
                   </div>
				</div>
			</div>
			<div class="text-center">	
				 <?php 
				 	echo $pagination; 
				 ?>
			</div>
		</div>
		<div class="col-sm-3 hidden-xs">
			<div class="panel panel-default">
  				<div class="panel-heading">
  					<div class="text-center center-block">
                		<a href="<?php echo $info->fb; ?>"><i class="fa fa-facebook-square fa-3x social"></i></a>
	            		<a href="<?php echo $info->twitter; ?>"><i class="fa fa-twitter-square fa-3x social"></i></a>
	            		<a href="<?php echo $info->ig; ?>"><i class="fa fa-instagram fa-3x social"></i></a>
	            		<a href="<?php echo $info->yt; ?>"><i class="fa fa-youtube-square fa-3x social"></i></a>
					</div>
  				</div>
			</div>
			<div class="panel panel-default">
  				<div class="panel-heading"><i class="fa fa-assistive-listening-systems" style="font-size:30px"></i>Anouncement</div>
  				<div class="panel-body"><?php echo $info->noun; ?></div>
			</div>
		</div>
	</div>
</div>

<?php
$this->load->view('/template/footer');
?>


