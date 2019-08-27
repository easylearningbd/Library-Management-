         <script>
          $(document).ready(function(){
          $("#department").change(function(){
            var dep =  $("#department").val();
                  $.ajax({
                   type: "POST",
                   url:"<?php echo base_url(); ?>manage/getBookByDepId/"+dep,
                   success:function(data){
                     $("#book").html(data);

                   }


                  });

              });
          }); 
         </script> 

 
  <H2>Issue Book </h2>
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
            <form action="<?php echo base_url(); ?>manage/addIssueForm" method="post">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="studentname" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Reg</label>
                    <input type="text" name="reg" class="form-control span12">
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <select name="dep" class="dep" id="department"> 
                   <option value=""> Select One </option>

                   <?php  
                       foreach ($depdata as $ddata) {
                           
                   ?>

                   <option value="<?php echo $ddata->depid; ?>"> <?php echo $ddata->depname; ?> </option>

                 <?php   } ?>

                     </select>



                </div>
                <div class="form-group">
                    <label>Book Name </label>
                    <select name="book" id="book" class="dep"> </select>
                </div>

                 <div class="form-group">
                    <label>Return Date (D/M/Y)</label>
                    <input type="text" name="return" class="form-control span12">
                </div>

				 
                 
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>	