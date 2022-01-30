// JavaScript Document

//Barchart for dashboard
$(document).ready(function(){
	$.ajax({
		url: "script/studentdata.php",
		method: "POST",
		success: function(data) {
			
			console.log(data);
			var p1male = []; var p1female = [];var p2male = []; var p2female = [];var p3male = []; var p3female = [];var p4male = []; var p4female = [];var p5male = []; var p5female = [];
			
			var n1male = []; var n1female = [];var n2male = []; var n2female = [];var n3male = []; var n3female = [];
			var c_class = [];
			//var total = [];

			for(var i in data) {
				p1male.push(data[i].p1male);p1female.push(data[i].p1female);
				p2male.push(data[i].p2male);p2female.push(data[i].p2female);
				p3male.push(data[i].p3male);p3female.push(data[i].p3female);	
				p4male.push(data[i].p4male);p4female.push(data[i].p4female);	
				p5male.push(data[i].p5male);p5female.push(data[i].p5female);
				n1male.push(data[i].n1male);n1female.push(data[i].n1female);
				n2male.push(data[i].n2male);n2female.push(data[i].n2female);
				n3male.push(data[i].n3male);n3female.push(data[i].n3female);		
				//total.push(data[i].total);
				c_class.push(data[i].current_class);
			}
			
			// Primary
			var chartdata = {
				//labels: ['Gender'],
				labels: ["Pry 1", "Pry 2", "Pry 3", "Pry 4", "Pry 5"],
				//labels: [c_class],
				datasets : [
					{
						label: 'Male',
						backgroundColor: ["#085796","#085796","#085796","#085796","#085796"],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						//hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						//hoverBorderColor: 'rgba(200, 200, 200, 1)',
						barStrokeWidth : 2,
						data: [p1male,p2male,p3male,p4male,p5male],
						//data: [65, 59, 80, 81, 56, 55, 40]
					},
					{
						label: 'Female',
						backgroundColor: ["#ef4315","#ef4315","#ef4315","#ef4315","#ef4315"],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						//hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						//hoverBorderColor: 'rgba(200, 200, 200, 1)',
						barStrokeWidth : 2,
						data: [p1female,p2female,p3female,p4female,p5female],
						//data: [65, 59, 80, 81, 56, 55, 40]
					},
				]
				
			};			
	
			var ctx = $("#barChart");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
			
			//Nur
			
			var nchartdata = {
				//labels: ['Gender'],
				labels: ["Nur 1", "Nur 2", "Nur 3"],
				//labels: [c_class],
				datasets : [
					{
						label: 'Male',
						backgroundColor: ["#085796","#085796","#085796"],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						//hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						//hoverBorderColor: 'rgba(200, 200, 200, 1)',
						barStrokeWidth : 2,
						data: [n1male,n2male,n3male],
						//data: [65, 59, 80, 81, 56, 55, 40]
					},
					{
						label: 'Female',
						backgroundColor: ["#ef4315","#ef4315","#ef4315"],
						borderColor: 'rgba(200, 200, 200, 0.75)',
						//hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						//hoverBorderColor: 'rgba(200, 200, 200, 1)',
						barStrokeWidth : 2,
						data: [n1female,n2female,n3female],
						//data: [65, 59, 80, 81, 56, 55, 40]
					},
				]
				
			};			
	
			var ctxn = $("#nbarChart");

			var barGraph = new Chart(ctxn, {
				type: 'bar',
				data: nchartdata
			});
			
		},
		error: function(data) {
			console.log(data);
		}
	});
});

//Pie Doughnut Chart for dashboard

$(document).ready(function(){
	$.ajax({
		url: "script/classdata.php",
		method: "POST",
		success: function(data) {
			
			console.log(data);
			var p1total = []; var p2total = []; var p3total = []; var p4total = []; var p5total = []; 
			
			var n1total = []; var n2total = []; var n3total = [];
			for(var i in data) {
				p1total.push(data[i].p1total);
				p2total.push(data[i].p2total);
				p3total.push(data[i].p3total);
				p4total.push(data[i].p4total);
				p5total.push(data[i].p5total);
				n1total.push(data[i].n1total);
				n2total.push(data[i].n2total);
				n3total.push(data[i].n3total);
				
			}
			 //get the doughnut chart canvas
    var ctx1 = $("#doughnut-chartcanvas-1");
    var ctx2 = $("#doughnut-chartcanvas-2");

    //doughnut chart data
    var data1 = {
        labels: ["Nur 1", "Nur 2", "Nur 3"],
        datasets: [
            {
                label: "Nursery Section",
                data: [n1total, n2total, n3total],
                backgroundColor: [
                    "#ec2607",
                    "#085796",
                    "#14d1eb",
                    "#F4A460",
                    "#2E8B57"
                ],
                borderColor: [
                    "#ec2607",
                    "#085796",
                    "#14d1eb",
                    "#E39371",
                    "#1D7A46"
                ],
                borderWidth: [1, 1, 1]
            }
        ]
    };

    //doughnut chart data
    var data2 = {
        labels: ["Pry 1", "Pry 2", "Pry 3", "Pry 4", "Pry 5"],
        datasets: [
            {
                label: "Primary Section",
                data: [p1total, p2total, p3total, p4total, p5total],
                backgroundColor: [
                    "#e60b0b",
                    "#14d1eb",
                    "#05ab94",
                    "#046f9d",
                    "#9d0465"
                ],
                borderColor: [
                    "#e60b0b",
                    "#14d1eb",
                    "#05ab94",
                    "#046f9d",
                    "#9d0465"
                ],
                borderWidth: [1, 1, 1, 1, 1]
            }
        ]
    };

    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: "Class Data",
            fontSize: 18,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 16
            }
        }
    };

    //create Chart class object
    var chart1 = new Chart(ctx1, {
        type: "doughnut",
        data: data1,
        options: options
    });

    //create Chart class object
    var chart2 = new Chart(ctx2, {
        type: "doughnut",
        data: data2,
        options: options
    });
			
		},
		error: function(data)
		{
			console.log(data);
		}
	});
	
	

   
});

//attendance staff summary doughnut

$(document).ready(function(){
	$.ajax({
		url: "script/staffattendancedata.php",
		method: "POST",
		success: function(data) {
			
			console.log(data);
			var p = []; var a = [];
			for(var i in data) {
				p.push(data[i].present);
				a.push(data[i].absent);				
				
			}
			
    var ctx1 = $("#doughnut-1");
   

    //doughnut chart data
    var data1 = {
        labels: ["Present", "Absent"],
        datasets: [
            {
                label: "Staff Summary",
                data: [p,a],
                backgroundColor: [
                    "#06cb18",
                    "#f82b12",
                    "#14d1eb",
                    "#F4A460",
                    "#2E8B57"
                ],
                borderColor: [
                    "#06cb18",
                    "#f82b12",
                    "#14d1eb",
                    "#E39371",
                    "#1D7A46"
                ],
                borderWidth: [1, 1]
            }
        ]
    };

   
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: "Attendance Data",
            fontSize: 18,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 16
            }
        }
    };

    //create Chart class object
    var chart1 = new Chart(ctx1, {
        type: "doughnut",
        data: data1,
        options: options
    });

   
			
		},
		error: function(data)
		{
			console.log(data);
		}
	});
	
	

   
});