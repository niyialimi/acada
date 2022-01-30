<?php
require_once('../../req/config.php');
session_start();
echo '<form action="addclsubscript.php" name="subform" class="addsubjectform" id="addclasssubjectform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        	<div style="background:#036; color:#FFF" align="center">Assign Subject To Class Created</div><br>
            
            <div class="row form-group">
			<div class="col-xs-10 col-md-5 col-lg-5">
            <label>Select Class</label><br>
            <select class="form-control" name="classselect" id="classselect">';
?>
             <?php
		   $output='';
		   $subquery="select * from class_tab order by class_id desc limit 1";
		   $classsubject=mysqli_query($con,$subquery);
		   if(mysqli_num_rows($classsubject))
		 		  {
			    while($crow=mysqli_fetch_assoc($classsubject))
	   				{
					
            
            	echo '<option value="'.$crow['class_id'].'">'.$crow['class_name']." ".$crow['class_arm'].'</option>';
                	
					}
				  }
          echo  '</select>
		  		</div>
            </div>
           <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
           <label>Subject</label><br>';
          
		   $output='';
		   $countsub="select count(subject_id) as total from subject_tab";
		   $countdata=mysqli_query($con,$countsub);
		   if(mysqli_num_rows($countdata))
		 		  {
			    while($row=mysqli_fetch_assoc($countdata))
	   				{
						$totalsub=$row['total'];
						
					}
				  }
				  $totalhalf=($totalsub/2);
		   $searchquery = "select subject_name,subject_id,subject_category,subject_mark from subject_tab where clientapp_id='".$_SESSION['clientappid']."' order by subject_id limit 0,$totalhalf";
			$searchData=mysqli_query($con,$searchquery);
			 if(mysqli_num_rows($searchData))
		 		  {
			    while($rows=mysqli_fetch_assoc($searchData))
	   				{
						$subject=$rows['subject_name'];
						$subjectid=$rows['subject_id'];
						$output.='<input type="checkbox" name="subject[]" id="subject" class="sub" value="'.$subject.'">'.$subject.'<br>';
					}
			   }
			   
			   echo $output;
		  
           echo '</div>
           <input type="hidden" name="subcount" id="subcount" value="<?php echo $totalsub; ?>">
           <div class="form-group col-xs-12 col-md-6 col-lg-6">
           <br>';
          
		   $output='';
		   $searchquery = "select * from subject_tab where clientapp_id='".$_SESSION['clientappid']."' order by subject_id limit $totalhalf,$totalsub";
			$searchData=mysqli_query($con,$searchquery);
			 if(mysqli_num_rows($searchData))
		 		  {
			    while($rows=mysqli_fetch_assoc($searchData))
	   				{
						$subject=$rows['subject_name'];
						$subjectid=$rows['subject_id'];
						$output.='<input type="checkbox" name="subject[]" id="subject" class="sub" value="'.$subject.'">'.$subject.'<br>';
					}
			   }
			   echo $output;
		   
         echo '</div>
           </div>
             <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"><div id="message" align="center"></div></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="addclsub" name="addclsub" class="btn btn-info">Add Class Subject&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
</button>
            </div><!-- /.col -->
            <div class="col-xs-12 col-md-3 col-lg-3"></div>
          </div>        
        </form>';
?>