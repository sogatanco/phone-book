<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $this->load->view('/template/head');
    $this->load->view('/admin/navbar');
?>
<div class="container book">
			<?php if($this->session->flashdata('success_msg')){ ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success_msg'); ?>
			</div>
			<?php } ?>
            <?php 
                $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                echo form_open("admin/search", $attr);
            ?>
            <div class="form-group">        
            <div class="col-sm-offset-4 col-sm-8">
            <div class="input-group stylish-input-group">
                <input id="book_name" name="book_name" type="text" class="form-control"  placeholder="Search" value="<?php echo set_value('book_name'); ?>" >
                <span class="input-group-addon">
                    <button type="submit" id="btn_search" name="btn_search">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
            </div>
            </div>
            </div>
            <?php 
                echo form_close(); 
            ?>
			<div class="panel panel-default">
				<div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-10 hidden-xs"><i class="fa fa-address-card" style="font-size:30px"></i> Phone List</div>
                        <div class="col-sm-2 col-xs-12"><a href="<?php echo base_url('admin/add'); ?>" class="btn btn-default">Add New</a></div>
                    </div>
						
				</div>
				<div class="panel-body">
                    <div class="table-responsive">
            		 <table class="table table-responsive table-striped table-hover">
                		<thead>
                    		<tr>
                    			<th>#</th>
                    			<th>Contact Name</th>
                    			<th>Number</th>
                    			<th>Location</th>
                    			<th>Action</th>
                    		</tr>
                		</thead>
                		<tbody>
                			<?php for ($i = 0; $i < count($phonelist); ++$i) { ?>
                			<tr>
                    			<td><?php echo ($page+$i+1); ?></td>
                    			<td><?php echo $phonelist[$i]->contact_name; ?></td>
                    			<td><?php echo $phonelist[$i]->number; ?></td>
                    			<td><?php echo $phonelist[$i]->location; ?></td>
                    			<td>
									<a href="<?php echo base_url('admin/update/'.$phonelist[$i]->id); ?>" class="btn btn-info">Edit</a>
									<a href="<?php echo base_url('admin/delete/'.$phonelist[$i]->id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');">Delete</a>
								</td>
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

<?php
$this->load->view('/template/footer');
?>
