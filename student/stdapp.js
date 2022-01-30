// JavaScript Document
/*Parent Login*/
$(document).on('click','#logbut',function(ev){
	//alert('here');
	ev.preventDefault();
	var stdlogid=$('#stdlogid').val();
	var stdpassword=$('#stdpassword').val();
	myformData='stdlogid='+stdlogid +'&stdpassword='+stdpassword;
	
$.ajax({
    url: 'script/loginscript.php',
    type: 'POST',
    data: myformData,
    //cache: false,
    dataType: 'html',
	beforeSend: function()
   { 
    $('#lognotice').fadeIn(200).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Authenticating.......</div>');
   },
    success: function (logindata) {
		if(logindata=='valid')
		{	
			$('#lognotice').fadeIn(25000).html(' <div id="loginnotice" class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;Logged In.......redirecting</div>');
			window.location='stdboard.php';
			
		}
		else 
		{			
			
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid User Id or Password detected<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('stdlogid').value='';	
			document.getElementById('stdpass').value='';
			
		}
	 
    },
	error: function(logindata){
		
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid Credientials Supplied; Parse Error<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('stdlogid').value='';	
			document.getElementById('stdpass').value='';
			 
		 }
  });return false;  
});
/*Parent Login ends*/

/*view kids*/ 
  $(document).on('click','#viewbut', function(e){
	   e.preventDefault();  
    // Get company information from database
	var id      = $(this).data('id');
	
     $.ajax({
	  type:         'GET',
      url:          'script/kidviewscript.php?id='+id,
      cache:        false,
      dataType:     'html',
      contentType:  'application/json; charset=utf-8',
	  success: function(returndata){
		  //alert(id);
		  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
			
		 //$('#display').load('proscript/viewscript.php').fadeIn("slow");   
})
		  },
	  error: function(returndata)
	  {
		  show_message('The Application just ecountered an error', 'error');
	  }
      
    }); return false;
	
	  
  });
  /*view kids ends*/ 