
<script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css">

      <h2>Book List</h2>
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
      <th>Book Name</th>
      <th>Department Name </th>
       <th>Author Name </th>
       <th>Total Book </th>
        
      <th style="width: 3.5em;"> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   $i = 0;
   foreach ($allbook as $sdata) {
     $i++;
    
  ?>
 
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $sdata->bookname;  ?></td>


      <td><?php 

      $sdepid = $sdata->dep;
      $getdep = $this->dep_model->getAllDepartment($sdepid);
      if (isset($getdep)) {
       echo $getdep->depname;
      }
        ?></td>


     <td><?php 

      $adepid = $sdata->author;
      $getaut = $this->author_model->getAllAuthor($adepid);
      if (isset($getaut)) {
       echo $getaut->autname;
      }
        ?></td>

      <td><?php echo $sdata->totalbook;  ?></td>
      
      <td>
          <a href="<?php echo base_url(); ?>book/editbook/<?php echo $sdata->bookid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are You sure to delete'); " href="<?php echo base_url(); ?>book/delbook/<?php echo $sdata->bookid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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