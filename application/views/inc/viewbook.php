  <H2>View Book</h2>
			<hr/>
		 
  <style>
      
.dep{
  border: 1px solid #ddd;
  padding: 5px;
  width: 450px;  
}

  </style>

        <div class="panel-body" style="width:600px;">
             
                <div class="form-group">
                    <label>Book Name</label>
           <input type="text" readonly="" value="<?php echo $bookbyid->bookname; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                  <?php 

                        $sdepid = $bookbyid->dep;
                        $getdep = $this->dep_model->getAllDepartment($sdepid);
                        if (isset($getdep)) {  ?>

     <input type="text" readonly="" value="<?php  echo $getdep->depname; ?>" class="form-control span12">          <?php }    ?> 
                 
                </div>



                <div class="form-group">
                    <label> Author Name </label>
        <?php 

      $adepid = $bookbyid->author;
      $getaut = $this->author_model->getAllAuthor($adepid);
      if (isset($getaut)) { ?>
      <input type="text" readonly="" value="<?php echo $getaut->autname; ?>" class="form-control span12">
   <?php  }  ?>      </div>



				<div class="form-group">
                    <label>Total Book </label>
                 <input type="text" readonly="" value="<?php echo $bookbyid->totalbook; ?>" class="form-control span12">
                </div>
                 
                  
        </div>	