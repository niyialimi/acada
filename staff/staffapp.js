// JavaScript Document
$(window).load(function(){
	//alert('hete');//checking
	$("#message").hide();
	$("#submitbut").hide();
	$("#submarkbut").hide();
	$("#subtstmarkbut").hide();
	//$("#stdtable1").hide();
	});
	
/*staff Login*/
$(document).on('click','#logbut',function(ev){
	//alert('here');
	ev.preventDefault();
   $('#loginform').validator('validate');	
	var stafflogid=$('#stafflogid').val();
	var staffpass=$('#staffpass').val();
	myformData='stafflogid='+stafflogid +'&staffpass='+staffpass;
	//alert(myformData);
	
$.ajax({
    url: 'script/loginscript.php',
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
			window.location='staffdashboard.php';
			
		}
		else 
		{			
			
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid User Id or Password detected<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('stafflogid').value='';	
			document.getElementById('staffpass').value='';
			
		}
	 
    },
	error: function(logindata){
		
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid Credientials Supplied; Parse Error<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('stafflogid').value='';	
			document.getElementById('staffpass').value='';
			 
		 }
  });return false;  
});
/*staff Login ends*/

/*Show attendance Sheet*/
   $(document).ready(function(e){
	   	$("#stdattclass").change(function(){
			var stdattclass=$(this).val(); 
		$.ajax({
	  	type: 'POST',
		url: 'script/attendancesheet.php',
		data: {stdattclass:stdattclass},		
		dataType:'html',
		  success: function(returndata){//alert('wehere');
			// $('#parent').html(returndata);//working for division
			 $('#stdtable1').html(returndata);
				$("#submitbut").show();
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
});
/*Show attendance Sheet ends*/

/*Show subject mark Sheet*/
   $(document).ready(function(e){
	   	$("#clsubname").change(function(){
			var clsubname=$(this).val(); 
			var formElements = document.getElementById("scoreviewform");
			var stdclasspick=formElements.stdclasspick.value;
			var msattsession=formElements.msattsession.value;
			var msatterm=formElements.msatterm.value;
			var msscoretype=formElements.msscoretype.value;
			//alert(msatterm);
		$.ajax({
	  	type: 'POST',
		url: 'script/subjectmarksheet.php',
		data: {clsubname:clsubname,stdclasspick:stdclasspick,clsubname:clsubname,msattsession:msattsession,msatterm:msatterm,msscoretype:msscoretype},		
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
		
		$("#msatterm").change(function(){
			var msatterm=$(this).val(); 
			var formElements = document.getElementById("scoreviewform");
			var stdclasspick=formElements.stdclasspick.value;
			var msattsession=formElements.msattsession.value;
			var clsubname=formElements.clsubname.value;
			var msscoretype=formElements.msscoretype.value;
			//alert(msatterm);
		$.ajax({
	  	type: 'POST',
		url: 'script/subjectmarksheet.php',
		data: {clsubname:clsubname,stdclasspick:stdclasspick,clsubname:clsubname,msattsession:msattsession,msatterm:msatterm,msscoretype:msscoretype},		
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
		
		$("#msscoretype").change(function(){
			var msscoretype=$(this).val(); 
			var formElements = document.getElementById("scoreviewform");
			var stdclasspick=formElements.stdclasspick.value;
			var msattsession=formElements.msattsession.value;
			var clsubname=formElements.clsubname.value;
			var msatterm=formElements.msatterm.value;
			//alert(msatterm);
		$.ajax({
	  	type: 'POST',
		url: 'script/subjectmarksheet.php',
		data: {clsubname:clsubname,stdclasspick:stdclasspick,clsubname:clsubname,msattsession:msattsession,msatterm:msatterm,msscoretype:msscoretype},		
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
		
		$("#msattsession").change(function(){
			var msattsession=$(this).val(); 
			var formElements = document.getElementById("scoreviewform");
			var stdclasspick=formElements.stdclasspick.value;
			var msscoretype=formElements.msscoretype.value;
			var clsubname=formElements.clsubname.value;
			var msatterm=formElements.msatterm.value;
			//alert(msatterm);
		$.ajax({
	  	type: 'POST',
		url: 'script/subjectmarksheet.php',
		data: {clsubname:clsubname,stdclasspick:stdclasspick,clsubname:clsubname,msattsession:msattsession,msatterm:msatterm,msscoretype:msscoretype},		
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
		
		$("#stdclasspick").change(function(){
			var stdclasspick=$(this).val(); 
			var formElements = document.getElementById("scoreviewform");
			var msattsession=formElements.msattsession.value;
			var msscoretype=formElements.msscoretype.value;
			var clsubname=formElements.clsubname.value;
			var msatterm=formElements.msatterm.value;
			//alert(msatterm);
		$.ajax({
	  	type: 'POST',
		url: 'script/subjectmarksheet.php',
		data: {clsubname:clsubname,stdclasspick:stdclasspick,clsubname:clsubname,msattsession:msattsession,msatterm:msatterm,msscoretype:msscoretype},		
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
/*Show subject mark Sheet ends*/


/*Show exam score sheet Sheet*/
$(document).on('click','#marksheetbut',function(ev){	
		//alert('wehere');//checking
		
		var clname=$('#clname').val();
		var classarm=$('#classarm').val();
		var subname=$('#subname').val();
		var subject=$('#subname').val();
		$('#subject').val(subject);		
		var session=$('#csession').val();
		var term=$('#cterm').val();
		var examdate=$('#cexamdate').val();
		myformData='clname='+clname +'&classarm='+classarm +'&subname='+subname;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/scoresheet.php',
		data: myformData,		
		dataType:'html',
		  success: function(returndata){
			 $('#showsubject').html('<strong>Score Sheet For '+subject+'</strong>');
			 $('#session').val(session);
			 $('#term').val(term);
			 $('#examdate').val(examdate);
			 $('#stdtable1').html(returndata);
			 $("#submarkbut").show();
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
		
});
/*Show exam score sheet Ends*/

/*Test score sheet*/
$(document).on('click','#testmarksheetbut',function(ev){	
		//alert('wehere');//checking
		
		var clname=$('#clname').val();
		var classarm=$('#classarm').val();
		var subname=$('#subname').val();
		var subject=$('#subname').val();
		$('#subject').val(subject);		
		var session=$('#csession').val();
		var term=$('#cterm').val();
		var examdate=$('#cexamdate').val();
		var type=$('#type').val();
		myformData='clname='+clname +'&classarm='+classarm +'&subname='+subname;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/scoresheet.php',
		data: myformData,		
		dataType:'html',
		  success: function(returndata){
			 $('#showsubject').html('<strong>Continuous Assessment (CA) Score Sheet For '+subject+'</strong>');
			 $('#session').val(session);
			 $('#term').val(term);
			 $('#examdate').val(examdate);
			 $('#examtype').val(type);
			 $('#stdtable1').html(returndata);
			 $("#subtstmarkbut").show();			 
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
		
});

/*Test score sheet*/


/*Load result student wise*/
$(document).ready(function(e){
	$("#studentname").change(function(){
           $('#studentname').val(); 		  
		   var newdata=$('#studentname').val();
		   var stdselectclass=$('#stdselectclass').val();
		   var stdsession=$('#stdsession').val();
		   var stdterm=$('#stdterm').val();
		   $.ajax({
			url:"script/scorereporsheet.php",  
            method:"POST",  
            data:{newdata:newdata,stdselectclass:stdselectclass,stdsession:stdsession,stdterm:stdterm},
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
	
	
	$("#stdsession").change(function(){
           $('#stdsession').val(); 		  
		   var newdata=$('#studentname').val();
		   var stdselectclass=$('#stdselectclass').val();
		   var stdsession=$('#stdsession').val();
		   var stdterm=$('#stdterm').val();
		   $.ajax({
			url:"script/scorereporsheet.php",  
            method:"POST",  
            data:{newdata:newdata,stdselectclass:stdselectclass,stdsession:stdsession,stdterm:stdterm},
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
	
	$("#stdterm").change(function(){
           $('#stdterm').val(); 		  
		   var newdata=$('#studentname').val();
		   var stdselectclass=$('#stdselectclass').val();
		   var stdsession=$('#stdsession').val();
		   var stdterm=$('#stdterm').val();
		   $.ajax({
			url:"script/scorereporsheet.php",  
            method:"POST",  
            data:{newdata:newdata,stdselectclass:stdselectclass,stdsession:stdsession,stdterm:stdterm},
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

/*submit Exam Score*/
$(document).on('click', '#submarkbut', function(e){
	e.preventDefault();	
	
	$.ajax({
	url: "script/submitscore.php", 
	type: "POST",             
	data: new FormData($('#stdmarkform')[0]), 
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
/*submit exam score ends*/

/*submit Continuous Assessment Test Score*/
$(document).on('click', '#subtstmarkbut', function(e){
	e.preventDefault();	
	
	$.ajax({
	url: "script/testscorescript.php", 
	type: "POST",             
	data: new FormData($('#testmarkform')[0]), 
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
/*submit Test score ends*/

/*Load Student Attendance Report*/
$(document).ready(function(e){
			
		$("#attendclass").change(function(){
		//checking
		var attendclass=$(this).val();
		
		var formElements = document.getElementById("attform");
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/eachclassattreport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass},		
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
		alert('wehere');//checking
		var formElements = document.getElementById("attform");
		var attendsession=formElements.attendsession.value;
		var attendterm=formElements.attendterm.value;
		var attendclass=formElements.attendclass.value;
			var attendmonth=$(this).val();
		$.ajax({
	  	type: 'POST',
		url: 'script/eachclassattreport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass},		
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
		var formElements = document.getElementById("attform");
		var attendclass=formElements.attendclass.value;
		var attendterm=formElements.attendterm.value;
		var attendmonth=formElements.attendmonth.value;
			var attendsession=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/eachclassattreport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass},		
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
		var formElements = document.getElementById("attform");
		var attendclass=formElements.attendclass.value;
		var attendsession=formElements.attendsession.value;
		var attendmonth=formElements.attendmonth.value;
			var attendterm=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/eachclassattreport.php',
		data: {attendmonth:attendmonth,attendsession:attendsession,attendterm:attendterm,attendclass:attendclass},		
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

/*Student attendance report*/
$(document).on('click','#attreportbut',function(ev){	
		var attclass=$('#attclass').val();
		var attmonth=$('#attmonth').val();		
		myformData='attclass='+attclass +'&attmonth='+attmonth;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/reportattendance.php',
		data: myformData,		
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
/*Student attendance report ends*/

/*Load Staff Attendance Report*/
$(document).ready(function(e){
	$("#staffattterm").change(function(){
		//checking
		var staffattterm=$(this).val();
		
		var formElements = document.getElementById("staffattform");
		var staffattsession=formElements.staffattsession.value;
		var staffattmonth=formElements.staffattmonth.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/myattendancereport.php',
		data: {staffattmonth:staffattmonth,staffattsession:staffattsession,staffattterm:staffattterm},		
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
			
		$("#staffattmonth").change(function(){
		//checking
		var staffattmonth=$(this).val();
		
		var formElements = document.getElementById("staffattform");
		var staffattsession=formElements.staffattsession.value;
		var staffattterm=formElements.staffattterm.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/myattendancereport.php',
		data: {staffattmonth:staffattmonth,staffattsession:staffattsession,staffattterm:staffattterm},		
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

/*Load Staff Attendance Report ends*/


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
/*********************************View/Edit Section****************************/

/*Student View Button*/
$(document).on('click', '#viewbut', function(evt){
	//alert('here');
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

/*show Score Edit modal*/
$(document).on('click', '#scoreeditbut', function(evt){
	evt.preventDefault();
	var id = $(this).data('id');
	var scoreid = $(this).data('scoreid');
	 var newformData='id='+id+'&scoreid='+scoreid;
	 $.ajax({
	  type:  'POST',
      url:   'script/editscorepage.php',
	  data: newformData,
      dataType:     'html', 
	  processData:false,     
	  success: function(editdata){
		  
		 $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(editdata);
		 });
			 
		  },
	  error: function(editdata)
	  {
		  
	  }
      
    }); return false;
 });
/* Show Score Edit modal ends*/

/*now editing score Score*/
$(document).on('click', '#editstdscore', function(evt){
	evt.preventDefault();
	 $.ajax({
	  type:  'POST',
      url:   'script/eachmarkedit.php',
	  data: new FormData($('#markform')[0]),contentType: false,       
	  cache: false, 
	  processData:false,     
	  success: function(editdata){
		  
		 if(editdata=='Mark Updated')
		 {
			 alert('Updated');
		 }
		 else
		 {
			alert('Mark Not Updated, Please Try Again');
		 }
			 
		  },
	  error: function(editdata)
	  {
		  alert('Parse Error.Mark Not Updated, Please Try Again');
	  }
      
    }); return false;
 });
/* Editing student score ends*/
