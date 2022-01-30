// JavaScript Document
$(window).load(function(){
	//alert('hete');//checking
	$("#message").hide();
	//$("#stdtable1").hide();
	});
	

	
/*admin Login*/
$(document).on('click','#logbut',function(ev){
	//alert('here');
	ev.preventDefault();
   $('#loginform').validator('validate');	
	var adminlogid=$('#adminlogid').val();
	var adminpassword=$('#adminpassword').val();
	myformData='adminlogid='+adminlogid +'&adminpassword='+adminpassword;
	//alert(myformData);
	
$.ajax({
    url: 'script/adminloginscript.php',
    type: 'POST',
    data: myformData,
    //cache: false,
    dataType: 'html',
	beforeSend: function()
   { 
    $('#lognotice').fadeIn(200).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Authenticating.......</div>');
	 // $('#lognotice').fadeOut(2000).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Authenticating.......</div>');
   },
    success: function (logindata) {
		if(logindata=='valid')
		{	
			$('#lognotice').fadeIn(25000).html(' <div id="loginnotice" class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;Logged In.......redirecting</div>');
			window.location='admindashboard.php';
			
		}
		else 
		{			
			
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid User Id or Password detected<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('adminlogid').value='';	
			document.getElementById('adminpassword').value='';
			
		}
	 
    },
	error: function(logindata){
		
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid Credientials Supplied; Parse Error<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('adminlogid').value='';	
			document.getElementById('adminpassword').value='';
			 
		 }
  });return false;  
});
/*admin Login ends*/

/*Student registration*/
 $(document).on('click', '#regbut', function(e){
	 var validator = $("#stdform").data("bs.validator");
	 validator.validate();
		 e.preventDefault();
	 if (!validator.hasErrors()) 
	  {
	 //alert('here');//checking
	// e.preventDefault();
	// $('#stdform').validator('validate');
	 var $this=$(this);
	 $this.button('loading');		
	$("#message").empty();
	//var formData = new FormData($(this)[0]); //where this represent current form; since we have more than one use
	var formData = new FormData($('#stdform')[0]);
	var stdname= $('#lname').val();
	$.ajax({
	url: "script/addstdscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,   
	dataType: "JSON",          
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#stdform')[0].reset();
		$("#image_preview").empty();
		//location.reload();
		$.ajax({
		url: 'script/generatestdno.php',
		data: '',		
		dataType:'json',
		  success: function(returndata)
		  {
			  var stdno=parseInt(returndata[0]);
			  stdno=stdno + 1;
			  if(stdno==0){ stdno='000'+stdno;}
			  else if(stdno>=10){stdno='00'+stdno;}
			  else if(stdno>=100){stdno='0'+stdno;}
			  else if(stdno>=1000){stdno=stdno;}
			  $('#rollnum').val(stdno);
			  },
		  error: function(returndata)
		  {
			 alert('error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	}
});
return false;
	  }
	  else
	  {
		  setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	  }
});
/*Student resistration ends*/

/*Class add Begin*/
 $(document).on('click', '#addclassbut', function(ev){
	 //alert('now here');//checking
	 var validator = $("#newclassform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  {
	 $("#message").empty();	
	 //$('#newclassform').validator('validate');	
	 //ev.preventDefault();	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#newclassform')[0]);
	$.ajax({
	url: "script/classaddscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,       
	dataType: "JSON",      
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);		
		$("#display").load('script/subassignview.php');
		$("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#addclassbut").hide();
		//$('#newclassform')[0].reset();		
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		//$('#newclassform')[0].reset();
		}
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	}

});
return false;
	  }

});
/*Class add ends*/

/*Assign Subject Button
$(document).on('click', '#subassign', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 
	 $.ajax({
	  type:  'POST',
      url:   'script/subassignview.php',
	  //data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  $('#subModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#subModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
		
})
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
 });
/*Assign Subject Button ends*/

/*Add subject to class begins*/
$(document).on('click', '#addclsub', function(eb){
	
	eb.preventDefault();
	var subject = [];
	var classselect=subform.classselect.value;
	$('input:checked[name="subject[]"]:checked').each(function(){
		
			subject.push($(this).val());
			
		});
		//alert(classselect);
		$.ajax({
    url: 'script/addclsubscript.php',
    type: 'POST',
    data: {'subject':subject,'classselect':classselect},
	cache:  false,
	dataType: 'html',    
    success: function (returndata) {
		alert('Subject Added to Class Succesfully');		
    },
	error: function(returndata){
			 $('#message').html(returndata);			
		 }
  });return false;  
		
	});
/*subject add ends*/

/*Staff registration*/
 $(document).on('click', '#empregbut', function(e){
	 //alert('here');//checking	
	 var validator = $("#empform").data("bs.validator");
	 validator.validate();
		 e.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	$("#message").empty();
	 var $this=$(this);
	 $this.button('loading');
	//var formData = new FormData($(this)[0]); //where this represent current form; since we have more than one use
	var formData = new FormData($('#empform')[0]);
	var staffname= $('#staflname').val();
	$.ajax({
	url: "script/addstaffscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,  
	dataType: "JSON",           
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},10000);
		$("#message").fadeIn(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#empform')[0].reset();	
		$("#image_preview").empty();
		//location.reload();
		$.ajax({
		url: 'script/generatestaffno.php',
		data: '',		
		dataType:'json',
		  success: function(returndata)
		  {
			  var staffno=parseInt(returndata[0]);
			  staffno=staffno + 1;
			  if(staffno==0){ staffno='000'+staffno;}
			  else if(staffno>=10){staffno='00'+staffno;}
			  else if(staffno>=100){staffno='0'+staffno;}
			  else if(staffno>=1000){staffno=staffno;}
			  $('#stafnum').val(staffno);
			  },
		  error: function(returndata)
		  {
			 alert('An Just Occured error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
		}
		else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
});
return false;
	  }
});
/*Staff resistration ends*/

/*staff Attendance*/
$(document).on('click', '#staffattendbut', function(e){
	//alert('clicked');
	
	e.preventDefault();	
	
	$.ajax({
	url: "script/markattendance.php", 
	type: "POST",             
	data: new FormData($('#staffattform')[0]), 
	//data: {'staffname[]':staffname,'staffid[]':staffid,'appstatus[]':appstatus},
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		//alert('hereeee');
		//alert(formData);
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);	
	},
	error:function(responsendata)
	{
		
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);
	}
	});
	return false;
});
/*staff Attendance ends*/

/*student Attendance*/
$(document).on('click', '#stdattendbut', function(e){
	//alert('clicked');
	
	e.preventDefault();	
	
	$.ajax({
	url: "script/markattendance.php", 
	type: "POST",             
	data: new FormData($('#stdattform')[0]), 
	//data: {'staffname[]':staffname,'staffid[]':staffid,'appstatus[]':appstatus},
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		//alert('hereeee');
		//alert(formData);
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);	
	},
	error:function(responsendata)
	{
		
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);
	}
	});
	return false;
});
/*student Attendance ends*/

/*Subject add Begin*/
 $(document).on('click', '#addsubjectbut', function(ev){
	 //alert('now here');//checking
	 var validator = $("#newsubjectform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	 //$('#newsubjectform').validator('validate');	
	 //ev.preventDefault();	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#newsubjectform')[0]);
	$.ajax({
	url: "script/subjectaddscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,       
	dataType: "JSON",      
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},10000);
		$("#message").fadeIn(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#newsubjectform')[0].reset();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		//$('#newclassform')[0].reset();
		}
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	}

});
return false;
	  }

});
/*Subject add ends*/

/*parent populate field*/
   $(document).ready(function(e){
	   	$("#stdname").change(function(){
		//alert('wehere');//checking
			var stdname=$(this).val(); 
		$.ajax({
	  	type: 'POST',
		url: 'script/parentselectscript.php',
		data: {stdname:stdname},		
		dataType:'html',
		  success: function(returndata){
			// $('#parent').html(returndata);//working for division
			 $('#parentphone').val(returndata);

			  },
		  error: function(returndata)
		  {
			  //$('#parent').val(returndata);
		  }
		  
		}); return false;
			
		});
});
/*staff populate ends*/

/*parent populate field*/
   $(document).ready(function(e){
	   	$("#staffname").change(function(){
			var staffname=$(this).val(); 
		$.ajax({
	  	type: 'POST',
		url: 'script/staffselectscript.php',
		data: {staffname:staffname},		
		dataType:'html',
		  success: function(returndata){
			// $('#parent').html(returndata);//working for division
			 $('#staffphone').val(returndata);

			  },
		  error: function(returndata)
		  {
			  //$('#parent').val(returndata);
		  }
		  
		}); return false;
			
		});
});
/*staff populate ends*/

/*Parent assign Begin*/
 $(document).on('click', '#addprtbut', function(ev){
	 //alert('now here');//checking
	 var validator = $("#assignparentform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	 //$('#newsubjectform').validator('validate');	
	 //ev.preventDefault();	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#assignparentform')[0]);
	$.ajax({
	url: "script/assignparentscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,       
	dataType: "JSON",      
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(6000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#assignparentform')[0].reset();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#assignparentform')[0].reset();
		}
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#assignparentform')[0].reset();
	}

});
return false;
	  }

});
/*Parent assign ends*/

/*Staff Logiin Begin*/
 $(document).on('click', '#staffasslogin', function(ev){
	 //alert('now here');//checking
	 var validator = $("#assignstaffform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	 //$('#newsubjectform').validator('validate');	
	 //ev.preventDefault();	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#assignstaffform')[0]);
	$.ajax({
	url: "script/createstafflogin.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,       
	dataType: "JSON",      
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{alert('now here');
		setTimeout(function(){$this.button('reset');},10000);
		$("#message").fadeIn(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#assignstaffform')[0].reset();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#assignstaffform')[0].reset();
		}
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#assignstaffform')[0].reset();
	}

});
return false;
	  }

});
/*staff login ends*/

/*News and Events message*/

 $(document).on('click', '#nebut', function(ev){
	 var validator = $("#newseventform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#newseventform')[0]);
	$.ajax({
	url: "script/newseventscript.php", 
	type: "POST",             
	data: new FormData($('#newseventform')[0]), 
	//data: {'staffname[]':staffname,'staffid[]':staffid,'appstatus[]':appstatus},
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<strong>'+responsedata+'</strong>');
		$("#message").fadeOut(30000).html('<strong>'+responsedata+'</strong>');	
		$('#newseventform')[0].reset();
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<strong>'+responsedata+'</strong>');
		$("#message").fadeOut(30000).html('<strong>'+responsedata+'</strong>');
		$('#newseventform')[0].reset();
	}
	});
	return false;
	  }

});

/*News and Events ends*/


/*internal message*/

 $(document).on('click', '#sendmsgbut', function(ev){
	 var validator = $("#messagesendform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#messagesendform')[0]);
	$.ajax({
	url: "script/messagescript.php", 
	type: "POST",             
	data: new FormData($('#messagesendform')[0]), 
	//data: {'staffname[]':staffname,'staffid[]':staffid,'appstatus[]':appstatus},
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<strong>'+responsedata+'</strong>');
		$("#message").fadeOut(30000).html('<strong>'+responsedata+'</strong>');	
		$('#messagesendform')[0].reset();
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<strong>'+responsedata+'</strong>');
		$("#message").fadeOut(30000).html('<strong>'+responsedata+'</strong>');
		$('#messagesendform')[0].reset();
	}
	});
	return false;
	  }

});

/*internal message ends*/

/*show pay list*/
$(document).on('click', '#createpaybut', function(e){
	 var validator = $("#createpayform").data("bs.validator");
	 validator.validate();
		 e.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 $("#message").empty();	
	
		var $this=$(this);
	 $this.button('loading');
	
	$.ajax({
	url: "script/createpayment.php", 
	type: "POST",             
	data: new FormData($('#createpayform')[0]), 
	//data: {'staffname[]':staffname,'staffid[]':staffid,'appstatus[]':appstatus},
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		//alert('hereeee');
		//alert(formData);
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);
		$('#createpayform')[0].reset();	
		location.reload();
	},
	error:function(responsendata)
	{
		
		$("#message").fadeIn(5000).html(responsedata);
		$("#message").fadeOut(30000).html(responsedata);
		$('#createpayform')[0].reset();
	}
	});
	return false;
	
	  }
});
/*show paylist ends*/


/*update setting*/

 $(document).on('click', '#settingbut', function(ev){
	 
	 var validator = $("#settingform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 	$("#message").empty();
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#settingform')[0]);
	$.ajax({
	url: "script/editsettings.php", 
	type: "POST",             
	data: new FormData($('#settingform')[0]), 
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<strong>'+responsedata+'</strong>');
		$("#message").fadeOut(15000).html('<strong>'+responsedata+'</strong>');	
		$('#settingform')[0].reset();
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<font color="#CC0000"><strong>'+responsedata+'</strong></font>');
		$("#message").fadeOut(15000).html('<font color="#CC0000"><strong>'+responsedata+'</strong></font>');
		$('#settingform')[0].reset();
	}
	});
	return false;
	  }

});

/*update settings*/

 /*payment confirm*/

 $(document).on('click', '#confirm', function(evt){
	 $("#message").empty();
	 if(confirm("Are you sure you want to Confirm Payment For This Student?")){
	 var id      = $(this).data('id');
	 var name      = $(this).data('name');
	 var amount      = $(this).data('amount');
	 evt.preventDefault();
	 //alert(id);alert(amount);
	 var newformData='id='+id+'&amount='+amount;
	 
	 $.ajax({
	  type:  'GET',
      url:   'script/makepayment.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(paymentdata){
		  
			  if(paymentdata=='Payment Confirmed')
			  {//alert(amount);
				  $("#message").fadeIn(5000).html('<strong>'+paymentdata+' for '+name+'</strong>');
				  $("#message").fadeOut(30000).html('<strong>'+paymentdata+' for '+name+'</strong>');
			   //location.reload();
			  }else
			  {
				  $("#message").fadeIn(5000).html('<strong>'+paymentdata+'</strong>');
				  $("#message").fadeOut(30000).html('<strong>'+paymentdata+'</strong>');
			  }
		  },
	  error: function(paymentdata)
	  {
		  $("#message").fadeIn(5000).html('<strong>'+paymentdata+'</strong>');
		  $("#message").fadeOut(30000).html('<strong>'+paymentdata+'</strong>');
	  }
      
    }); return false;
	 }
	 else{
        return false;
    }
 });
 /*payment confirm ends*/
 
/*delete message*/
$(document).on('click','#deletebut', function(e){ 
	   e.preventDefault();   
	    if(confirm("Are you sure you want to delete this Message?")){
        var id      = $(this).data('id');
	
     $.ajax({
	  type:         'GET',
      url:          'script/deletescript.php?msgid='+id,
	  //data: 		'msgid='+id,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
		 // alert(mid);
		  $('#alert').fadeIn(200).html('<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Message Deleted Successfully</strong></div>');
		   $("#alert").fadeOut(10000);
		   location.reload();
		  }
		  else
		  {
			  $('#alert').fadeIn(200).html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Message Could Not Be Deleted</strong></div>');
			  $("#alert").fadeOut(15000);
		  }
		  },
	  error: function(returndata)
	  {
		  $('#alert').fadeIn(200).html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>An Error Just Occured Please try Again</strong></div>');
			  $("#alert").fadeOut(15000);
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
/*delete ends*/

// AJAX call for autocomplete 
$(document).ready(function(){  
      $('#pname').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"script/readparentscript.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {    
					 	  //$("#countryList").css("background-color", "yellow");//for one value
						  $("#countryList").css({"background-color":"#fdfdfd","cursor":"pointer"});						  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '#plink', function(){  
           $('#pname').val($(this).text()); 
		  // $('#poname').val($(this).text()); 
           $('#countryList').fadeOut();  
		   var newdata=$('#pname').val();
		   
		   $.ajax({
			url:"script/readparentscript.php",  
            method:"POST",  
            data:{newdata:newdata},
			dataType:'json',
		  success: function(returndata)
		  {
			  var poname=(returndata[0]);
			  var pemail=(returndata[1]);
			  var pmobile=(returndata[3]);
			  var paddress=(returndata[2]);
			  var pcity=(returndata[4]);
			  var poccup=(returndata[5]);
			  var prel=(returndata[6]);
			  
			  $('#poname').val(poname);
			  $('#pemail').val(pemail);
			  $('#pmobile').val(pmobile);
			  $('#paddress').val(paddress);
			  $('#pcity').val(pcity);
			  $('#occup').val(poccup);
			  $('#rel').val(prel);
			  },
		  error: function(returndata)
		  {
			 alert('error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
		
      });  

 });  
//auto complete ends

/*Load parent data on Asssign Parent page*/
$(document).ready(function(e){
	$("#stdname").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   $.ajax({
			url:"script/parentselectscript.php",  
            method:"POST",  
            data:{newdata:newdata},
			dataType:'json',
		  success: function(returndata)
		  {
			  var stdid=(returndata[3]);
			  var stdno=(returndata[2]);
			  var parentphone=(returndata[1]);
			  var pname=(returndata[0]);
			 
			  $('#pname').val(pname);
			  $('#parentphone').val(parentphone);	
			  $('#stduname').val(stdno);		  
			  $('#parentuname').val(pname);
			  $('#stdid').val(stdid);
			 var length=10;
			 //var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
			 var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP";
    var pass = ""; var pass2="";
    for (var x = 0; x < length; x++) {//generate random password for student
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
		}
		for (var j = 0; j < length; j++) {//generate random password for parent
        var i = Math.floor(Math.random() * chars.length);
        pass2 += chars.charAt(i);
		}
			$('#stdlogpassword').val(pass);
			$('#parentpass').val(pass2);  
			
			  },
		  error: function(returndata)
		  {
			 alert('error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
	});
		
      });
/*parent load data ends*/

/*Load result student wise*/
$(document).ready(function(e){
	$("#stdname").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   var atclass=$('#attclass').val();
		   var atarm=$('#attarm').val();
		   var atsession=$('#attsession').val();
		   var atterm=$('#atterm').val();
		   $.ajax({
			url:"script/scorereporsheett.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#attsession").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   var atclass=$('#attclass').val();
		   var atarm=$('#attarm').val();
		   var atsession=$('#attsession').val();
		   var atterm=$('#atterm').val();
		   $.ajax({
			url:"script/scorereporsheett.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#atterm").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   var atclass=$('#attclass').val();
		   var atarm=$('#attarm').val();
		   var atsession=$('#attsession').val();
		   var atterm=$('#atterm').val();
		   $.ajax({
			url:"script/scorereporsheett.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#attclass").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   var atclass=$('#attclass').val();
		   var atarm=$('#attarm').val();
		   var atsession=$('#attsession').val();
		   var atterm=$('#atterm').val();
		   $.ajax({
			url:"script/scorereporsheett.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#attarm").change(function(){
           $('#stdname').val(); 		  
		   var newdata=$('#stdname').val();
		   var atclass=$('#attclass').val();
		   var atarm=$('#attarm').val();
		   var atsession=$('#attsession').val();
		   var atterm=$('#atterm').val();
		   $.ajax({
			url:"script/scorereporsheett.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
		
 });
/*Load result student wise ends*/

/*Load SPecific Subject Result Per Class*/

$(document).ready(function(e){
	$("#subjectname").change(function(){
          		  
		   var newdata=$('#subjectname').val();
		   var atclass=$('#msattclass').val();
		   var atarm=$('#msattarm').val();
		   var atsession=$('#msattsession').val();
		   var atterm=$('#msatterm').val();
		   $.ajax({
			url:"script/subjectmarksummary.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#msattsession").change(function(){
          		  
		   var newdata=$('#subjectname').val();
		   var atclass=$('#msattclass').val();
		   var atarm=$('#msattarm').val();
		   var atsession=$('#msattsession').val();
		   var atterm=$('#msatterm').val();
		   $.ajax({
			url:"script/subjectmarksummary.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#msatterm").change(function(){
          		  
		   var newdata=$('#subjectname').val();
		   var atclass=$('#msattclass').val();
		   var atarm=$('#msattarm').val();
		   var atsession=$('#msattsession').val();
		   var atterm=$('#msatterm').val();
		   $.ajax({
			url:"script/subjectmarksummary.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#msattclass").change(function(){
          		  
		   var newdata=$('#subjectname').val();
		   var atclass=$('#msattclass').val();
		   var atarm=$('#msattarm').val();
		   var atsession=$('#msattsession').val();
		   var atterm=$('#msatterm').val();
		   $.ajax({
			url:"script/subjectmarksummary.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
	$("#msattarm").change(function(){
          		  
		   var newdata=$('#subjectname').val();
		   var atclass=$('#msattclass').val();
		   var atarm=$('#msattarm').val();
		   var atsession=$('#msattsession').val();
		   var atterm=$('#msatterm').val();
		   $.ajax({
			url:"script/subjectmarksummary.php",  
            method:"POST",  
            data:{newdata:newdata,atclass:atclass,atarm:atarm,atsession:atsession,atterm:atterm},
			dataType:'html',
		  success: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
			  
			  },
		  error: function(returndata)
		  {
			 alert('error');
		  }
		  
		}); return false;
	});
	
});

/*Load Subjetc Result Per Class Ends*/

/*Load Student Attendance Report*/
$(document).ready(function(e){
	$("#attendarm").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendclass=formElements.attendclass.value;
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendarm=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancereport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass,attendarm:attendarm},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		
		$("#attendclass").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendclass=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancereport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass,attendarm:attendarm},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendmonth").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendclass=formElements.attendclass.value;
			var attendmonth=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancereport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass,attendarm:attendarm},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendsession").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendclass=formElements.attendclass.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendsession=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancereport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass,attendarm:attendarm},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendterm").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendclass=formElements.attendclass.value;
		var attendsession=formElements.attendsession.value;
		var attendmonth=formElements.attendmonth.value;
			var attendterm=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancereport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass,attendarm:attendarm},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		
});

/*Load Student Attendance Report Ends*/


/*Load Staff Attendance Report*/
$(document).ready(function(e){
	$("#staffattendtype").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var staffattendsession=formElements.staffattendsession.value;
		var staffattendterm=formElements.staffattendterm.value;
		var staffattendmonth=formElements.staffattendmonth.value;
			var staffattendtype=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/staffattendancereport.php',
		data: {staffattendmonth:staffattendmonth,staffattendsession:staffattendsession,staffattendterm:staffattendterm,staffattendtype:staffattendtype},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		
		$("#attendclass").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendclass=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/staffattendancereport.php',
		data: {staffattendmonth:staffattendmonth,staffattendsession:staffattendsession,staffattendterm:staffattendterm,staffattendtype:staffattendtype},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendmonth").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendclass=formElements.attendclass.value;
			var attendmonth=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/staffattendancereport.php',
		data: {staffattendmonth:staffattendmonth,staffattendsession:staffattendsession,staffattendterm:staffattendterm,staffattendtype:staffattendtype},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendsession").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendclass=formElements.attendclass.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendsession=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/staffattendancereport.php',
		data: {staffattendmonth:staffattendmonth,staffattendsession:staffattendsession,staffattendterm:staffattendterm,staffattendtype:staffattendtype},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#attendterm").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var attendarm=formElements.attendarm.value;
		var attendclass=formElements.attendclass.value;
		var attendsession=formElements.attendsession.value;
		var attendmonth=formElements.attendmonth.value;
			var attendterm=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/staffattendancereport.php',
		data: {staffattendmonth:staffattendmonth,staffattendsession:staffattendsession,staffattendterm:staffattendterm,staffattendtype:staffattendtype},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		
});

/*Load Staff Attendance Report Ends*/


/*send sms*/
$(document).on('click', '#sendsmsbut', function(evt){
		evt.preventDefault();
		var $this=$(this);
	 	$this.button('loading');
		var msgbody=$('#msgbody').val();
		var mobileno=$('#mobileno').val();
		var clientname=$('#clientname').val();
		$.ajax({
	  	type: 'POST',
		url: 'script/smsscript.php',
		data: {msgbody:msgbody,mobileno:mobileno,clientname:clientname},		
		dataType:'html',
		  success: function(returndata){			 
					 setTimeout(function(){$this.button('reset');},5000);
					 $("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+returndata+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+returndata+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#smsform')[0].reset();
				
			  },
		  error: function(returndata)
		  {
			  setTimeout(function(){$this.button('reset');},5000);
					 $("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+returndata+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+returndata+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#smsform')[0].reset();
		  }
		  
		}); return false;
			
});
/*sms ends*/


/*TimeTable Begin*/
 $(document).on('click', '#timetablebut', function(ev){
	// alert('now here');//checking
	 var validator = $("#timetableform").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  {
	 $("#message").empty();	
		var $this=$(this);
	 $this.button('loading');	 
	var formData = new FormData($('#timetableform')[0]);
	$.ajax({
	url: "script/timetablescript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,       
	dataType: "JSON",      
	processData:false, 
	    
	success: function(responsedata)   
	{
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);		
		$("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		
		//$('#newclassform')[0].reset();		
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		//$('#newclassform')[0].reset();
		}
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	}

});
return false;
	  }

});
/*Timetable ends*/

/*view Timetable*/

$(document).ready(function(e){
	$("#stdtableclass").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var term=formElements.term.value;
		var session=formElements.session.value;
			var stdtableclass=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/viewtimetablescript.php',
		data: {stdtableclass:stdtableclass,term:term,session:session},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#term").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var stdtableclass=formElements.stdtableclass.value;
		var session=formElements.session.value;
			var term=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/viewtimetablescript.php',
		data: {stdtableclass:stdtableclass,term:term,session:session},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#session").change(function(){
		//alert('wehere');//checking
		var formElements = document.getElementById("thisform");
		var stdtableclass=formElements.stdtableclass.value;
		var term=formElements.term.value;
			var session=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/viewtimetablescript.php',
		data: {stdtableclass:stdtableclass,term:term,session:session},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		
		
});

/*view Timetable Ends*/


/****************************Export and Import data***********************************/
/*data export*/
$(document).on('click', '#exportdata', function(evt){
	 $("#message").empty();	
	 var action      = $(this).data('action');	
	 evt.preventDefault();
	 
	 var newformData='action='+action;
	$.ajax({
	  type:  'POST',
      url:   'script/dataexport.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  window.location.replace('script/dataexport.php');
		  
		
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
 });
/*dataexport ends*/
/****************************Edit,View,Delete Session*********************************/

/*Student View Button*/
$(document).on('click', '#viewbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 //alert(id);
	 var newformData='id='+id;
	 
	 $.ajax({
	  type:  'POST',
      url:   'script/eachstdview.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
		
})
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
 });
 /*Student View ends*/

/*goto Edit details*/
$(document).on('click', '#editbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 
	  window.location='stdeditpage.php?id='+id;
	
	
 });
/*goto ends*/

/*Student Edit Button*/
$(document).on('click', '#studentedit', function(evt){
	var validator = $("#stdeditform").data("bs.validator");
	validator.validate();
	 $("#message").empty();	
	 evt.preventDefault();
	  if (!validator.hasErrors()) 
  	{
	
	  	if(confirm("Are you sure you want to Edit this Information?")){
		//	var lname=$('#lname').val();var fname=$('#fname').val();var oname=$('#oname').val();var email=$('#email').val();var gender=$('#gender:checked').val();var pdisable=$('#pdisable:checked').val();var nation=$('#nation').val();var stdreligion=$('#stdreligion').val();var stdaddress=$('#stdaddress').val();var stdcity=$('#stdcity').val();var state=$('#state').val();var stdclass=$('#stdclass').val();var stdarm=$('#stdarm').val();var stdhobby=$('#stdhobby').val();var pname=$('#pname').val();var poname=$('#poname').val();var pemail=$('#pemail').val();var ptitle=$('#ptitle').val();var pmobile=$('#pmobile').val();var paddress=$('#paddress').val();var pcity=$('#pcity').val();var occup=$('#occup').val();var rel=$('#rel').val(); var studentid=$('#studentid').val(); var profileImg=$('#profileImg').val();
		//	var ext=['jpg','jpeg','png'];
		//	var get_ext=profileImg.split('.'); get_ext=get_ext.reverse();
			
			var $this=$(this);
	 $this.button('loading');
	// var formData ='lname='+lname +'&fname='+fname+'&oname='+oname+'&email='+email+'&gender='+gender+'&pdisable='+pdisable+'&nation='+nation+'&stdreligion='+stdreligion+'&stdaddress='+stdaddress+'&stdcity='+stdcity+'&state='+state+'&stdclass='+stdclass+'&stdarm='+stdarm+'&stdhobby='+stdhobby+'&pname='+pname+'&poname='+poname+'&pemail='+pemail+'&ptitle='+ptitle+'&pmobile='+pmobile+'&paddress='+paddress+'&pcity='+pcity+'&occup='+occup+'&rel='+rel+'&studentid='+studentid+'profileImg='+profileImg;
	var stdname= $('#lname').val();
	 $.ajax({
	  type:  'POST',
      url:   'script/editstudent.php',
	  data: new FormData($('#stdeditform')[0]),
      contentType: false,
      cache: false,    
      //dataType:     'html', 
	  processData:false,     
	  success: function(editdata){
		  
		  if(editdata=='OK')
		  {	
			  setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+stdname+' Data Edited Succesfully'+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+stdname+' Data Edited Succesfully'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		//$('#stdeditform')[0].reset();
		  }else
		  {
			  setTimeout(function(){$this.button('reset');},5000);
			  $("#message").fadeIn(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+stdname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+stdname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		  }
			 
		  },
	  error: function(editdata)
	  {
		  
	  }
      
    }); return false;
		}
	}
	
 });
/*Student Edit Button ends*/

/*Student Delete Button*/
$(document).on('click','#stddelete', function(e){ 

	   e.preventDefault();   
	   var parent = $(this).closest("tr"); 
	    if(confirm("Are you sure you want to delete this Student?")){
        var stdid      = $(this).data('id');
     $.ajax({
	  type:         'GET',
      url:          'script/datadeletescript.php?stdid='+stdid,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
		  
		 /* $('#alert').fadeIn(200).html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Student Deleted Successfully</strong></div>');
		   $("#alert").fadeOut(10000);*/
		   alert('Student Deleted');
		  parent.slideUp(300,function() {
					parent.remove();});
		  }
		  else
		  {
			  alert('Student Cant Be Deleted; Please Try Again');
			  /*$('#alert').fadeIn(200).html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Student Could Not Be Deleted</strong></div>');
			  $("#alert").fadeOut(15000);*/
		  }
		  },
	  error: function(returndata)
	  {
		  $('#alert').fadeIn(200).html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>An Error Just Occured Please try Again</strong></div>');
			  $("#alert").fadeOut(15000);
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  
 /*Student Delete ends*/
 
 /*Staff View Button*/
$(document).on('click', '#staffviewbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 //alert(id);
	 var newformData='id='+id;
	 
	 $.ajax({
	  type:  'POST',
      url:   'script/eachstaffview.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
		
})
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
	
 });
/*Staff View Button ends*/

/*goto staff Edit details*/
$(document).on('click', '#staffeditbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 
	  window.location='staffedit.php?id='+id;
	
	
 });
/*goto staff edit ends*/

/*Staff Edit Button*/
$(document).on('click', '#staffedit', function(evt){
	
	 $("#message").empty();	
	 evt.preventDefault();
	
	  	if(confirm("Are you sure you want to Edit Staff Information?")){
			//var staflname=$('#staflname').val();var staffname=$('#staffname').val();var stafoname=$('#stafoname').val();var stafemail=$('#stafemail').val();var stafgender=$('#stafgender:checked').val();var spdisable=$('#spdisable:checked').val();var nation=$('#nation').val();var staffreligion=$('#staffreligion').val();var stafaddress=$('#stafaddress').val();var state=$('#state').val();var staffqualify=$('#staffqualify').val();var spostaddress=$('#spostaddress').val(); var staffmstatus=$('#staffmstatus:checked').val();var staftype=$('#staftype').val();var staftitle=$('#staftitle').val();var gname=$('#gname').val();var goname=$('#goname').val();var gemail=$('#gemail').val();var gtitle=$('#gtitle').val();var gmobile=$('#gmobile').val();var gaddress=$('#gaddress').val();var gcity=$('#gcity').val();var goccup=$('#goccup').val();var grel=$('#grel').val(); var staffid=$('#staffid').val();var stafmobile= $('#stafmobile').val();
		var staflname=$('#staflname').val();
	var $this=$(this);
	 $this.button('loading');
	// var formData ='staflname='+staflname +'&staffname='+staffname+'&stafoname='+stafoname+'&stafemail='+stafemail+'&stafgender='+stafgender+'&spdisable='+spdisable+'&nation='+nation+'&staffreligion='+staffreligion+'&stafaddress='+stafaddress+'&staffmstatus='+staffmstatus+'&state='+state+'&staffqualify='+staffqualify+'&spostaddress='+spostaddress+'&staftype='+staftype+'&staftitle='+staftitle+'&gname='+gname+'&goname='+goname+'&gemail='+gemail+'&gtitle='+gtitle+'&gmobile='+gmobile+'&gaddress='+gaddress+'&gcity='+gcity+'&goccup='+goccup+'&grel='+grel+'&staffid='+staffid+'&stafmobile='+stafmobile;
	
	 $.ajax({
	  type:  'POST',
      url:   'script/editstaffscript.php',
	  data: new FormData($('#staffeditform')[0]),
      contentType: false,
      cache: false,    
      //dataType:     'html', 
	  processData:false,       
	  success: function(editdata){	
	  //alert('my work '+formData);	  
		  if(editdata=='OK')
		  {	
		  	
			  setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+staflname+' Data Edited Succesfully'+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+staflname+' Data Edited Succesfully'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		//$('#stdeditform')[0].reset();
		  }else
		  {
			  setTimeout(function(){$this.button('reset');},5000);
			  $("#message").fadeIn(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+staflname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+staflname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		  }
			 
		  },
	  error: function(editdata)
	  {
		  
	  }
      
    }); return false;
		}
	 
	
 });
/*Staff Edit Button ends*/

/*Staff Delete Button*/
$(document).on('click','#staffdelete', function(e){ 
	   e.preventDefault();   
	   var parent = $(this).closest("tr"); 
	    if(confirm("Are you sure you want to delete this Student?")){
        var staffid      = $(this).data('id');
     $.ajax({
	  type:         'GET',
      url:          'script/datadeletescript.php?staffid='+staffid,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
		  	alert('Staff Deleted');
		 
		  parent.slideUp(300,function() {
					parent.remove();});
		  }
		  else
		  {
			  alert('Staff Cannot Be Deleted; Please try Again');
			 
		  }
		  },
	  error: function(returndata)
	  {
		  alert('An Error Just Occured');
		  /*$('#alert').fadeIn(200).html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>An Error Just Occured Please try Again</strong></div>');
			  $("#alert").fadeOut(15000);*/
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  
 /*Staff Delete ends*/
 
 /*CLass View Button*/
$(document).on('click', '#classviewbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 //alert(id);
	 var newformData='id='+id;
	 
	 $.ajax({
	  type:  'POST',
      url:   'script/eachclassview.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
		
})
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
 });
/*Class View Button ends*/

/*goto Class Edit details*/
$(document).on('click', '#classeditbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 
	  window.location='classedit.php?id='+id;
	
	
 });
/*goto Class edit ends*/

/*Edit Class Detail  begins*/
$(document).on('click', '#cleditbut', function(eb){
	
	eb.preventDefault();
	var asubject = [];
	var classselect=cleditform.classselect.value;
	var clcategory=cleditform.clcategory.value;
	var clteacher=cleditform.clteacher.value;
	$('input:checked[name="asubject[]"]:checked').each(function(){
		
			asubject.push($(this).val());
			
		});
		//alert(classselect);
		$.ajax({
    url: 'script/editclassinfo.php',
    type: 'POST',
    data: {'asubject':asubject,'classselect':classselect,'clcategory':clcategory,'clteacher':clteacher},
	cache:  false,
	dataType: 'html',    
    success: function (returndata) {
		//alert('ahere');
		alert('Class Information Edited Succesfully');		
    },
	error: function(returndata){
			 alert('Error Editing Class Information,Please Try Again');			
		 }
  });return false;  
		
	});
/*Edit Class info ends*/


/*Class Delete Button*/
$(document).on('click','#classdelete', function(e){ 
	   e.preventDefault();   
	   var parent = $(this).closest("tr"); 
	    if(confirm("Are you sure you want to delete this Student?")){
        var classid      = $(this).data('id');
     $.ajax({
	  type:         'GET',
      url:          'script/datadeletescript.php?classid='+classid,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
		  	alert('Class Deleted');
		 
		  parent.slideUp(300,function() {
					parent.remove();});
		  }
		  else
		  {
			  alert('Class Cannot Be Deleted; Please try Again');
			 
		  }
		  },
	  error: function(returndata)
	  {
		  alert('An Error Just Occured');
		  
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  
 /*Class Delete ends*/
 
 /*Subject View Button*/
$(document).on('click', '#subjectviewbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 var newformData='id='+id;
	 
	 $.ajax({
	  type:  'POST',
      url:   'script/eachsubjectview.php',
	  data:	 newformData,     
      dataType:     'html',      
	  success: function(returndata){
		  
			  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
		
})
		  },
	  error: function(returndata)
	  {
		  
	  }
      
    }); return false;
	
 });
/*Subject View Button ends*/

/*goto ssubject Edit details*/
 $(document).on('click', '#subjecteditbut', function(evt){
	 $("#message").empty();	
	 var id      = $(this).data('id');	
	 evt.preventDefault();
	 
	  window.location='subjectedit.php?id='+id;
	
	
 });
/*goto subject edit ends*/


/*subject Edit Button*/
$(document).on('click', '#subjectedit', function(evt){
	
	 $("#message").empty();	
	 evt.preventDefault();
	
	  	if(confirm("Are you sure you want to Edit Staff Information?")){
			var subname=$('#subname').val();var subcategory=$('#subcategory').val();var subalias=$('#subalias').val();var submark=$('#submark').val(); var subjectid=$('#subjectid').val();
			
	var $this=$(this);
	 $this.button('loading');
	 var formData ='subname='+subname +'&subcategory='+subcategory+'&subalias='+subalias+'&submark='+submark+'&subjectid='+subjectid;
	
	 $.ajax({
	  type:  'POST',
      url:   'script/editsubjectscript.php',
	  data:	 formData,     
      dataType:     'html',      
	  success: function(editdata){	
	  //alert('my work '+formData);	  
		  if(editdata=='OK')
		  {	
		  	
			  setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+subname+' Data Edited Succesfully'+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>'+subname+' Data Edited Succesfully'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		//$('#stdeditform')[0].reset();
		  }else
		  {
			  $("#message").fadeIn(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+subname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>Error Editing '+subname+' Data'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		  }
			 
		  },
	  error: function(editdata)
	  {
		  
	  }
      
    }); return false;
		}
	 
	
 });
/*Subject Edit Button ends*/

/*Subject Delete Button*/
$(document).on('click','#subjectdelete', function(e){ 
	   e.preventDefault();   
	   var parent = $(this).closest("tr"); 
	    if(confirm("Are you sure you want to delete this Student?")){
        var subjectid      = $(this).data('id');
     $.ajax({
	  type:         'GET',
      url:          'script/datadeletescript.php?subjectid='+subjectid,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
		  	alert('Subject Deleted');
		 
		  parent.slideUp(300,function() {
					parent.remove();});
		  }
		  else
		  {
			  alert('Subject Cannot Be Deleted; Please try Again');
			 
		  }
		  },
	  error: function(returndata)
	  {
		  alert('An Error Just Occured');
		  
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  
 /*Subject Delete ends*/