   <H2>Edit Author </h2>
			<hr/>
			
             <?php
   $msg =  $this->session->flashdata('msg');
   if (isset($msg)) {
      echo $msg;
   }
            ?>
 

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>author/updateAuthor" method="post">
               <input type="hidden" name="autid" value="<?php echo $autById->autid; ?>" > 

                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="autname" value="<?php echo $autById->autname; ?>"  class="form-control span12">
                </div>
                 
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>	