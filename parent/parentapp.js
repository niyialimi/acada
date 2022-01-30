// JavaScript Document
$(window).load(function(){
	//alert('here');
	});
/*Parent Login*/
$(document).on('click','#logbut',function(ev){
	//alert('here');
	ev.preventDefault();
   $('#loginform').validator('validate');	
	var parentlogid=$('#parentlogid').val();
	var parentpass=$('#parentpass').val();
	myformData='parentlogid='+parentlogid +'&parentpass='+parentpass;
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
   },
    success: function (logindata) {
		if(logindata=='valid')
		{	
			$('#lognotice').fadeIn(25000).html(' <div id="loginnotice" class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;Logged In.......redirecting</div>');
			window.location='ptdashboard.php';
			
		}
		else 
		{			
			
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid User Id or Password detected<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('parentlogid').value='';	
			document.getElementById('parentpass').value='';
			
		}
	 
    },
	error: function(logindata){
		
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;Invalid Credientials Supplied; Parse Error<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('parentlogid').value='';	
			document.getElementById('parentpass').value='';
			 
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
  
  
  /*Load Student Exam report*/
  
  $(document).ready(function(e){
	  
	  $("#stdid").change(function(){
			
		var stdid=$(this).val();
		
		var formElements = document.getElementById("historyform");
		var historysession=formElements.historysession.value;
		var historyterm=formElements.historyterm.value;
		var historyclass=formElements.historyclass.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidreportscript.php',
		data: {attendclass:historyclass,attendsession:historysession,attendterm:historyterm,stdid:stdid},		
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
			
		$("#historyterm").change(function(){
			
		var historyterm=$(this).val();
		
		var formElements = document.getElementById("historyform");
		var historysession=formElements.historysession.value;
		var stdid=formElements.stdid.value;
		var historyclass=formElements.historyclass.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidreportscript.php',
		data: {attendclass:historyclass,attendsession:historysession,attendterm:historyterm,stdid:stdid},		
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
		
		$("#historysession").change(function(){
			
		var historysession=$(this).val();
		
		var formElements = document.getElementById("historyform");
		var historyterm=formElements.historyterm.value;
		var stdid=formElements.stdid.value;
		var historyclass=formElements.historyclass.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidreportscript.php',
		data: {attendclass:historyclass,attendsession:historysession,attendterm:historyterm,stdid:stdid},		
		dataType:'html',
		  success: function(returndata){
			 // alert('wehere');
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
		$("#historyclass").change(function(){
		var historyclass=$(this).val();
		
		var formElements = document.getElementById("historyform");
		var historyterm=formElements.historyterm.value;
		var stdid=formElements.stdid.value;
		var historysession=formElements.historysession.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidreportscript.php',
		data: {attendclass:historyclass,attendsession:historysession,attendterm:historyterm,stdid:stdid},		
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
  
  /*Load exam report Ends*/
  
  
  /*Load Kid Attendance report*/
  
  $(document).ready(function(ev){
	  
	  $("#attendmonth").change(function(){
		var attendmonth=$(this).val();
		
		var formElements = document.getElementById("attform");
		var attdterm=formElements.attdterm.value;
		var stdid=formElements.stdid.value;
		var attdsession=formElements.attdsession.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidattscript.php',
		data: {attendmonth:attendmonth,attendsession:attdsession,attendterm:attdterm,stdid:stdid},		
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
		
		$("#attdsession").change(function(){
		var attdsession=$(this).val();
		
		var formElements = document.getElementById("attform");
		var attdterm=formElements.attdterm.value;
		var stdid=formElements.stdid.value;
		var attendmonth=formElements.attendmonth.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidattscript.php',
		data: {attendmonth:attendmonth,attendsession:attdsession,attendterm:attdterm,stdid:stdid},		
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
		
		
		$("#attdterm").change(function(){
		var attdterm=$(this).val();
		
		var formElements = document.getElementById("attform");
		var attdsession=formElements.attdsession.value;
		var stdid=formElements.stdid.value;
		var attendmonth=formElements.attendmonth.value;
			
		$.ajax({
	  	type: 'POST',
		url: 'script/kidattscript.php',
		data: {attendmonth:attendmonth,attendsession:attdsession,attendterm:attdterm,stdid:stdid},		
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
  
  /*Load kid Attendance Ends*/
  
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
		$("#message").fadeIn(7000).html('<strong>'+responsedata+'</strong>');
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

/*Change Parent Login*/
$(document).on('click','#changepwd',function(ev){
	alert('here');
	ev.preventDefault();	
	var oldpwd=$('#oldpwd').val();
	var newpwd=$('#newpwd').val();
	myformData='oldpwd='+oldpwd +'&newpwd='+newpwd;
	//alert(myformData);
	
$.ajax({
    url: 'script/passchangescript.php',
    type: 'POST',
    data: myformData,
    dataType: 'html',
	beforeSend: function()
   { 
    $('#lognotice').fadeIn(200).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;System Processing Change.......</div>');
   },
    success: function (logindata) {
		if(logindata=='Password Changed')
		{	
			$('#lognotice').fadeIn(25000).html(' <div id="loginnotice" class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;&nbsp;'+logindata+'</div>');
			window.setTimeout(function(){
					window.location='logout.php';
						},2000);
			
			
		}
		else 
		{			
			
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;'+logindata+'<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('oldpwd').value='';	
			document.getElementById('newpwd').value='';
			document.getElementById('cpwd').value='';
			
		}
	 
    },
	error: function(logindata){
		
			$('#lognotice').fadeIn(25000).html('<div id="errornotice" class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span>&nbsp;&nbsp;'+logindata+'<button type="button" style="color:#FFF;text-decoration:none;" class="close" data-dismiss="alert" aria-label="close">&times;</button> </div>');
			document.getElementById('oldpwd').value='';	
			document.getElementById('newpwd').value='';
			document.getElementById('cpwd').value='';
			 
		 }
  });return false;  
});
/*Change Parent Login ends*/

/*Payment*/
$(document).on('click', '#checkout', function(ev){
	  var email=paye.pemail.value;
	  var amount=paye.amountpaid.value;
	  amount=parseInt(amount*100);
var handler = PaystackPop.setup({
      key: 'pk_test_0c6ca1062c6e870e237704aaff1316d7486b31b5',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
	  
	  });

/*Payment Ends*/
