   <H2>Edit Department </h2>
			<hr/>
			
       <?php
   $msg =  $this->session->flashdata('msg');
   if (isset($msg)) {
      echo $msg;
   }
            ?>
 

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>department/updateDepartment" method="post">
               <input type="hidden" name="depid" value="<?php echo $devById->depid; ?>" > 

                <div class="form-group">
                    <label>Department Name</label>
                    <input type="text" name="depname" value="<?php echo $devById->depname; ?>"  class="form-control span12">
                </div>
                 
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>	