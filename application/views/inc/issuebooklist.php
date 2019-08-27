      
<script src="<?php echo base_url(); ?>lib/jquery.dataTables.js" type="text/javascript"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/jquery.dataTables.css">



      <h2>Issue Book List</h2>
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
      <th>Student Name</th>
      <th>Department</th>
       <th>Reg No</th>
       <th>Book Name</th>
       <th>Issue Date</th>
        <th>Return Date</th>
      <th style="width: 3.5em;"> Action</th>
    </tr>
  </thead>
  <tbody>
   

   <?php 
   $i = 0;
   foreach ($issuedata as $idata) {
     $i++;
    
  ?>
    <tr> 
      <td><?php echo $i; ?> </td>
      <td> <?php echo $idata->studentname;  ?></td>

      <td> <?php 

      $sdepid = $idata->dep;
      $getdep = $this->dep_model->getAllDepartment($sdepid);
      if (isset($getdep)) {
       echo $getdep->depname;
      } 
        ?></td>


       <td> <?php echo $idata->reg;  ?></td>

       <td>  <?php 

      $bookid = $idata->book;
      $getbook = $this->book_model->BookById($bookid);
      if (isset($getbook)) {  ?>
       
       <a href="<?php echo base_url(); ?>manage/viewbook/<?php echo $bookid;?>" target="_blank"><?php  echo $getbook->bookname; ?></a>
      

      <?php }  ?>
          
        </td>



       <td> <?php echo date("d/m/Y h:ia", strtotime($idata->date)) ;  ?></td>

       <td> <?php echo $idata->return;  ?></td>

      <td>  <a onclick="return confirm('Are You sure to delete'); " href="<?php echo base_url(); ?>manage/dellist/<?php echo $idata->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      || <a target="_blank" href="<?php echo base_url(); ?>manage/viewstudent/<?php echo $idata->reg;?>" role="button" data-toggle="modal"><i class="fa fa-eye"></i></a>

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