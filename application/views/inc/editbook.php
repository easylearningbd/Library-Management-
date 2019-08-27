   <H2>Edit Book</h2>
			<hr/>
			
      <?php
   $msg =  $this->session->flashdata('msg');
   if (isset($msg)) {
      echo $msg;
   }

            ?>


  <style>
      
.dep{
  border: 1px solid #ddd;
  padding: 5px;
  width: 450px;  

}

  </style>

        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>book/updateBookForm" method="post">
                <input type="hidden" name="bookid" value="<?php echo $bookbyid->bookid; ?>" />

                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" value="<?php echo $bookbyid->bookname; ?>" class="form-control span12">
                </div>
              

              <div class="form-group">
                    <label>Department</label>
                    <select name="dep" class="dep"> 
                   <option value=""> Select One </option>

                   <?php  
                       foreach ($departmentdata as $ddata) {

                        if ($bookbyid->dep == $ddata->depid ) { ?>
         <option 
          value="<?php echo $ddata->depid; ?>" selected="selected"> <?php echo $ddata->depname; ?> 
        </option>
                     <?php   } ?>

                   <option value="<?php echo $ddata->depid; ?>"> <?php echo $ddata->depname; ?> </option>

                 <?php   } ?>

                     </select>
                </div>



                <div class="form-group">
                    <label>Author</label>
                    <select name="author" class="dep"> 
                   <option value=""> Select One </option>

                   <?php  
                       foreach ($authordata as $adata) {

                        if ($bookbyid->author == $adata->autid ) { ?>
         <option 
          value="<?php echo $adata->autid; ?>" selected="selected"> <?php echo $adata->autname; ?> 
        </option>
                     <?php   } ?>

                   <option value="<?php echo $adata->autid; ?>"> <?php echo $adata->autname; ?> </option>

                 <?php   } ?>

                     </select>
                </div>





				<div class="form-group">
                    <label>Total Book.</label>
                    <input type="text" name="totalbook" value="<?php echo $bookbyid->totalbook; ?>" class="form-control span12">
                </div>
                 
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>	