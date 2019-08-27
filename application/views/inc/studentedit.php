  <H2>Update Student</h2>
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
            <form action="<?php echo base_url(); ?>student/updateStudent" method="post">
            <input type="hidden" name="sid" value="<?php echo $stuById->sid; ?>" >    

                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" value="<?php echo $stuById->name; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dep" class="dep"> 
                   <option value=""> Select One </option>

                   <?php  
                       foreach ($departmentdata as $ddata) {

                        if ($stuById->dep == $ddata->depid ) { ?>
         <option 
          value="<?php echo $ddata->depid; ?>" selected="selected"> <?php echo $ddata->depname; ?> 
      </option>
                     <?php   } ?>

                   <option value="<?php echo $ddata->depid; ?>"> <?php echo $ddata->depname; ?> </option>

                 <?php   } ?>

                     </select>
                </div>
                <div class="form-group">
                    <label>Roll No.</label>
                    <input type="text"name="roll"  value="<?php echo $stuById->roll; ?>" class="form-control span12">
                </div>
				<div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" value="<?php echo $stuById->reg; ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Phone </label>
                    <input type="text" name="phone" value="<?php echo $stuById->phone; ?>" class="form-control span12">
                </div>
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Update"> 
                </div>
                   
            </form>
        </div>	