 <script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css">


      <h2>Student List</h2>
			<hr/>

        <?php
   $msg =  $this->session->flashdata('msg');
   if (isset($msg)) {
      echo $msg;
   }

            ?>
            
<table class="display" id="ariyan">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Department</th>
       <th>Role</th>
       <th>Reg</th>
       <th>Phone</th>
      <th style="width: 3.5em;"> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   $i = 0;
   foreach ($studentdata as $sdata) {
     $i++;
    
  ?>
 
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->name;  ?></td>


      <td><?php 

      $sdepid = $sdata->dep;
      $getdep = $this->dep_model->getAllDepartment($sdepid);
      if (isset($getdep)) {
       echo $getdep->depname;
      } 
        ?></td>


      <td><?php echo $sdata->roll;  ?></td>
      <td><?php echo $sdata->reg;  ?></td>
      <td><?php echo $sdata->phone;  ?></td>
      <td>
          <a href="<?php echo base_url(); ?>student/editstudent/<?php echo $sdata->sid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are You sure to delete'); " href="<?php echo base_url(); ?>student/delstudent/<?php echo $sdata->sid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php }  ?> 


  </tbody>
</table>
<script>
          $(document).ready(function(){
            $("#ariyan").DataTable();
          }); 
         </script> 