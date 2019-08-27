   <H2>Add Author </h2>
			<hr/>
			
            <?php
   $msg =  $this->session->flashdata('msg');
   if (isset($msg)) {
      echo $msg;
   }

            ?>
 

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>author/addAuthorForm" method="post">
                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="autname" class="form-control span12">
                </div>
                 
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>	