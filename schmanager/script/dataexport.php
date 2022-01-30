<?php
//DATE_FORMAT('2009-10-04 22:23:00', '%Y-%m-%d')
require_once("../../req/config.php");
session_start();

	$exportquery = "select lname,fname,oname,semail,admission_year,grad_year,current_class,current_arm,rollnum,age,current_session,current_term,gender,nationality,state_origin,religion,student_address,city,dob,disability,parent_name,parent_oname,parent_title,pemail,address,parent_phone,current_city,occupation,relationship,std_hobby from student_tab";
	$exportData=mysqli_query($con,$exportquery);
	
	$columnHeader ='';
$columnHeader = "Surname"."\t"."Firstname"."\t"."Other Name"."\t"."Student Email"."\t"."Admission Year"."\t"."Graduation Year"."\t"."Class"."\t"."Section/Arm"."\t"."Student Number"."\t"."Age"."\t"."Session"."\t"."Term"."\t"."Gender"."\t"."Nationality"."\t"."State"."\t"."Religion"."\t"."Student Address"."\t"."City of Residence"."\t"."Date of Birth"."\t"."Disability"."\t"."Parent Full Name"."\t"."Parent Other Name"."\t"."Title"."\t"."Email"."\t"."Address"."\t"."Mobile Number"."\t"."City of Residence"."\t"."Occupation"."\t"."Relationship"."\t"."Student Hobby";
$header = '';
$result ='';
$sn=0;
$fields = mysqli_num_fields ( $exportData );
 
while( $row = mysqli_fetch_row( $exportData ) )
{
	$sn++;
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "Nil"."\t";
        }
        else
        {
            //$value = str_replace( '"' , '""' , $value );
            $value = '"' .$value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=StudentRecordsheet".rand().".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$columnHeader\n$result";

