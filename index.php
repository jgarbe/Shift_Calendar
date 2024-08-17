 <html>

		
		
<head><TITLE>Garbe Calendar</TITLE>


<script type="text/javascript"> 
	 function reload_page()
 {
    window.location.reload(true);
 }
 $(document).ready(function(){
	 //reload the page every hour
    setInterval(function(){ reload_page(); },60*60000);
 });



function rstFrm_Cal(){
<!--  This Year -->
<?php
	print("var Year = \"".date("Y")."\";");
?>
	if (document.calchoice.reset.value=="Reset") {
return	 Year;	}
}

</script>  


<style>
* {
  box-sizing: border-box;
}

.table {
  padding: 10px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  //width: 50%;
  padding: 10px;
  //height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>
<body onload="startTime()">




<!--  Sliding Time  -->
<script>
	
 function getShift(d){  //Get the colors for the nine day rotation
	 //0 Red-Blue-Red
// 1    Blue-Red-Blue 
//		2	 Red-Blue-Green
//			3	 Blue-Green-Blue
//				4	  Green-Blue-Green
//					5 	    Blue-Green-Red
//						6		 Green-Red-Green
//							7		   Red-Green-Red
//								8		   Green-Red-Blue 		
	   	//var priors;
	var priorsColor;
	//var percentage;
	var wcolor;
	//var nexts;
	var nextsColor;
  		   switch ( d % 9 ) {
	case 0:	

			priorsColor = "red";
			wcolor = "blue";
			nextsColor = "red";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 2:
			priorsColor = "red";
			wcolor = "blue";
			nextsColor = "green";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 4:

			priorsColor = "green";
			wcolor = "blue";
			nextsColor = "green";
		return [priorsColor, wcolor, nextsColor];
	break;
	
	
	case 3:
			priorsColor = "blue";
			wcolor = "green";
			nextsColor = "blue";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 5:
			priorsColor = "blue";
			wcolor = "green";
			nextsColor = "red";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 7:
			priorsColor = "red";
			wcolor = "green";
			nextsColor = "red";
		return [priorsColor, wcolor, nextsColor];
	break;
	
	
	case 1:
			priorsColor = "blue";
			wcolor = "red";
			nextsColor = "blue";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 6:
			priorsColor = "green";
			wcolor = "red";
			nextsColor = "green";
		return [priorsColor, wcolor, nextsColor];
	break;
	case 8:
			priorsColor = "green";
			wcolor = "red";
			nextsColor = "blue";
		return [priorsColor, wcolor, nextsColor];
	break;
	}
 }
 
function startTime() {
  const today = new Date();  //String for current date
  const cShift = new Date("2007-12-30T08:00:00");  //Start of C-Shift rotation -- our two week beginning
  let now = new Date();
  let mn = new Date(now.getFullYear(), now.getMonth(), now.getDate()).getTime(); // Milliseconds since Jan 1, 1970, 00:00:00.000 GMT for now year, now month, and day at 0hrs
  const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds for a day
  const diffDays = Math.round(Math.abs((cShift - today) / oneDay)); // Math.round = rounded to the nearest integer, Math.abs= absolute no. How many days since beginning of two week rotation?
  const eightToday = 8 * 60 * 60 * 1000;  //in milliseconds
  const eightDSTToday = 7 * 60 * 60 * 1000;  //in milliseconds
  let numpercentDay = now.getTime()-(mn + eightToday); // NOW in Milliseconds - (0000hrs today + 8hrs)   OR (How many millisecs since 0800hrs?)
  //if (numpercentDay < 0) {numpercentDay = now.getTime()-(mn + eightDSTToday)}; // NOW in Milliseconds - (0000hrs today + 7hrs (DST))
	let percentDay = numpercentDay/oneDay*50;// Half of "how many millis since 0800hrs divided by a WHOLE DAY of millis" in percent.
  let npercentDay = 50 - percentDay ;  //The other half of the millis since 0800hrs in percent.
    let eShift = getShift(diffDays);  //Get the colors of today's shift
    let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);

  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;

  document.getElementById('timer').innerHTML =  "<caption style=background-color:#322010;color:white;><strong>|</strong></caption><tr style=width:100%;><td  style=height:40px;width:" + npercentDay  + "%;background-color:" + eShift[0]  + ";></td><td style=height:40px;width:50%;background-color:" + eShift[1]  + ";color:white;font-size:2em;><strong>" + h + ":" + m + ":" + s + "</strong></td><td class=column style=height:40px;width:100%;background-color:" + eShift[2]  + ";></td></tr>";
  //document.getElementById('epoch').innerHTML =  "<div>" + percentDay + "</div>";
 // document.getElementById('epoch2').innerHTML =  "<div>" + eShift + "</div>";

   setTimeout(startTime, 1000);
} 


	  
  function getEndDate(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}


				
</script>
	<div id="txt"></div>
	<div id="epoch"></div>
	<div id="epoch2"></div>
	<table style="position:relative;width:100%;height:40px;text-align: center;" id="timer"></table>
	
	<!------------------------------End of Sliding Time------------------------------------->

<?php
/*************************************************************************************************
 * 
 * 
 * 1st Calendar
 * 
 * ******************************************************************************************************/
?>
	<div style="background-color : #004040; background-image: url(); font-family : Verdana, Geneva, Arial, Helvetica, sans-serif; color : white; margin: 0px;width:100%;">
<?php




empty($_POST['Cal'])?$Cal='1':$Cal=$_POST['Cal'];
  
empty($_POST['Year'])?$Year=date("Y"):$Year=$_POST['Year'];


print("<div style=text-align:left;>");



print ("<FORM method=post name=Cal id=Cal action=$PHP_SELF>\n");
print("<input type=\"radio\" name=\"Cal\" id=\"Cal1\" value=\"1\"  onchange=\"javascript:this.form.submit()\">\n");
print("<label for=\"Cal\">D-Shift</label><br/> ");

print("<input type=\"radio\" name=\"Cal\" id=\"Cal2\" value=\"2\"  onchange=\"javascript:this.form.submit()\"> \n");
print("<label for=\"Cal\">A-B-C Shifts</label> ");




print("</FORM>\n</center>");

print("</div>");

print("<div style=text-align:center;>");

$This_Year = date("Y");
$Last_Year = $This_Year-1;
$Next_Year = $This_Year+1;
$In_Two_Years = $This_Year+2;

print ("<FORM method=post name=calchoice id=calch action=$PHP_SELF>\n");
print ("<SELECT	NAME=Year id=\"year_select\" onchange=\"javascript:this.form.submit()\">  \n");

print ("	<OPTION VALUE=".$Year.">".$Year."</OPTION>\n
	<OPTION VALUE=".$This_Year.">This Year</OPTION>\n
	<OPTION VALUE=".$Last_Year.">".$Last_Year."</OPTION>\n
	<OPTION VALUE=".$Next_Year.">".$Next_Year."</OPTION>\n
	<OPTION VALUE=".$In_Two_Years.">".$In_Two_Years."</OPTION>\n

</SELECT>\n");




print("</FORM>\n</center>");

print("</div>");






					//}
					
					print($bluedate3);
/*********************************************************************************************************************************************
 * 
 * 
 * 
 * Function   daycolor1(var)				gets the color for the days for A, B, C Shifts
 * 
 * 
 * 
 * ****************************************************************************************************************************************/
					
function daycolor1($quest) {	
	
		$fouteenDayWeek = 60*60*24*14;  //14 days
		$nineDayWeek = 60*60*24*9; //9 Days				
				 $bluedate1 = mktime(0,0,0,12,30,2007);  // The Beginning date is in format (hour,minute,second,month,day,year).
				 $bluedate4 = strtotime(date('d M Y ',$bluedate1)."- 1 hour"); //The DST.
				 $bluedate2 = strtotime(date('d M Y ',$bluedate1)."+ 2 days"); //The second day is two days later.
				 $bluedate5 = strtotime(date('d M Y ',$bluedate2)."- 1 hour"); //The second day DST
                 $bluedate3 = strtotime(date('d M Y ',$bluedate2)."+ 2 days"); //The third day is two more days later
                 $bluedate6 = strtotime(date('d M Y ',$bluedate3)."- 1 hour"); //The third day DST

                 $reddate1 = mktime(0,0,0,1,5,2008);  // The Beginning date is in format (hour,minute,second,month,day,year).
				 $reddate4 = strtotime(date('d M Y ',$reddate1)."- 1 hour"); //The DST.
				 $reddate2 = strtotime(date('d M Y ',$reddate1)."+ 2 days"); //The second day is two days later.
				 $reddate5 = strtotime(date('d M Y ',$reddate2)."- 1 hour"); //The second day DST
                 $reddate3 = strtotime(date('d M Y ',$reddate2)."+ 2 days"); //The third day is two more days later
                 $reddate6 = strtotime(date('d M Y ',$reddate3)."- 1 hour"); //The third day DST

		         $greendate1 = mktime(0,0,0,1,2,2008);  // The Beginning date is in format (hour,minute,second,month,day,year).
				 $greendate4 = strtotime(date('d M Y ',$greendate1)."- 1 hour"); //The DST.
				 $greendate2 = strtotime(date('d M Y ',$greendate1)."+ 2 days"); //The second day is two days later.
				 $greendate5 = strtotime(date('d M Y ',$greendate2)."- 1 hour"); //The second day DST
                 $greendate3 = strtotime(date('d M Y ',$greendate2)."+ 2 days"); //The third day is two more days later
                 $greendate6 = strtotime(date('d M Y ',$greendate3)."- 1 hour"); //The third day DST
					
					
						
	if ((($bluedate1-$quest) % $nineDayWeek == 0 ) || (($bluedate2-$quest) % $nineDayWeek == 0 )|| (($bluedate3-$quest) % $nineDayWeek == 0 )|| (($bluedate4-$quest) % $nineDayWeek == 0 )|| (($bluedate5-$quest) % $nineDayWeek == 0 )|| (($bluedate6-$quest) % $nineDayWeek == 0 )){
	
	if($quest == mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:blue;color:white;font-weight: bold;>";
	
	} elseif ($quest < mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:#CAD4FF;color:gray;font-weight: bold;>";
	
	} else {
	
	echo "<TD ALIGN=CENTER  style=background-color:#CAD4FF;color:blue;font-weight: bold;>";
	}
			}
	elseif ((($reddate1-$quest) % $nineDayWeek == 0 ) || (($reddate2-$quest) % $nineDayWeek == 0 )|| (($reddate3-$quest) % $nineDayWeek == 0 )|| (($reddate4-$quest) % $nineDayWeek == 0 )|| (($reddate5-$quest) % $nineDayWeek == 0 )|| (($reddate6-$quest) % $nineDayWeek == 0 )){
	if ($quest == mktime(0,0,0,date('m'),date('d'), date('Y'))) {
	echo "<TD ALIGN=CENTER  style=background-color:RED;color:white;font-weight: bold;>";
	} elseif ($quest < mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
echo "<TD ALIGN=CENTER  style=background-color:#FFD3C5;color:gray;font-weight: bold;>";
}
	else {
	echo "<TD ALIGN=CENTER  style=background-color:#FFD3C5;color:RED;font-weight: bold;>";
	}
}
	elseif ((($greendate1-$quest) % $nineDayWeek == 0 ) || (($greendate2-$quest) % $nineDayWeek == 0 )|| (($greendate3-$quest) % $nineDayWeek == 0 )|| (($greendate4-$quest) % $nineDayWeek == 0 )|| (($greendate5-$quest) % $nineDayWeek == 0 )|| (($greendate6-$quest) % $nineDayWeek == 0 )){
		
			if ($quest == mktime(0,0,0,date('m'),date('d'), date('Y'))) {
	echo "<TD ALIGN=CENTER  style=background-color:GREEn;color:white;font-weight: bold;>";
	}
	elseif ($quest < mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:#D0F4A9;color:gray;font-weight: bold;>";
}
	else {
	echo "<TD ALIGN=CENTER  style=background-color:#D0F4A9;color:GREEN;font-weight: bold;>";
	}
}
else {
		echo "<TD ALIGN=CENTER  style=background-color:#FFD3C5;color:RED;font-weight: bold;>";
	}
				}
				
/********************************************************************************************************************
 * 
 * DayColor for D Shift
 * 
 * ********************************************************************************************************************/
function daycolor($quest) {
	
		$fouteenDayWeek = 60*60*24*14;  //14 days
		$nineDayWeek = 60*60*24*9; //9 Days
	
	
	                 $royaldate1 = mktime(0,0,0,12,30,2007);  // The Beginning date is in format (hour,minute,second,month,day,year).   (Sunday)
				 $royaldate2 = strtotime(date('d M Y ',$royaldate1)."+ 3 days"); //The second day is three days later.					(Wed)
				 $royaldate7 = strtotime(date('d M Y ',$royaldate1)."+ 4 days"); //The third day is four days later.					(Thurs)	
				 $royaldate9 = strtotime(date('d M Y ',$royaldate1)."+ 8 days"); //The fourth day is eight days later.			 		(Mon)
				 $royaldate11 = strtotime(date('d M Y ',$royaldate1)."+ 9 days"); //The Fifth day is nine days later.					(Tues)
				 $royaldate13 = strtotime(date('d M Y ',$royaldate1)."+ 12 days"); //The Sixth day is two days later.					(Fri)
				 $royaldate15 = strtotime(date('d M Y ',$royaldate1)."+ 13 days"); //The Seventh day is two days later.					(Sat)
				 $royaldate4 = strtotime(date('d M Y ',$royaldate1)."- 1 hour"); //The DST.
				 $royaldate5 = strtotime(date('d M Y ',$royaldate2)."- 1 hour"); //The second day DST
				 $royaldate8 = strtotime(date('d M Y ',$royaldate7)."- 1 hour"); //The second day DST
				 $royaldate10 = strtotime(date('d M Y ',$royaldate9)."- 1 hour"); //The second day DST
				 $royaldate12 = strtotime(date('d M Y ',$royaldate11)."- 1 hour"); //The second day DST
				 $royaldate14 = strtotime(date('d M Y ',$royaldate13)."- 1 hour"); //The second day DST
				 $royaldate16 = strtotime(date('d M Y ',$royaldate15)."- 1 hour"); //The second day DST
	
	
	
	



	
	if((($royaldate1-$quest) % $fouteenDayWeek == 0 )|| (($royaldate4-$quest) % $fouteenDayWeek == 0 )|| (($royaldate2-$quest) % $fouteenDayWeek == 0 )|| (($royaldate5-$quest) % $fouteenDayWeek == 0 )|| (($royaldate7-$quest) % $fouteenDayWeek == 0 )|| (($royaldate8-$quest) % $fouteenDayWeek == 0 )|| (($royaldate9-$quest) % $fouteenDayWeek == 0 )|| (($royaldate10-$quest) % $fouteenDayWeek == 0 )|| (($royaldate11-$quest) % $fouteenDayWeek == 0 )|| (($royaldate12-$quest) % $fouteenDayWeek == 0 )|| (($royaldate13-$quest) % $fouteenDayWeek == 0 )|| (($royaldate14-$quest) % $fouteenDayWeek == 0 )|| (($royaldate15-$quest) % $fouteenDayWeek == 0 )|| (($royaldate16-$quest) % $fouteenDayWeek == 0 )){ 

		
			if($quest == mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:purple;color:white;font-weight: bold;>";
	
	} elseif ($quest < mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:#BF7FBF;color:gray;font-weight: bold;>";
	
	} else {
	
	echo "<TD ALIGN=CENTER  style=background-color:#A802F9;color:white;font-weight: bold;>";
	}
		
		
}
	else {
		
					if($quest == mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:yellow;color:black;font-weight: bold;>";
	
	} elseif ($quest < mktime(0,0,0,date('m'),date('d'), date('Y')))  {
	
	echo "<TD ALIGN=CENTER  style=background-color:#FBFEA0;color:gray;font-weight: bold;>";
	
	} else {
	
	echo "<TD ALIGN=CENTER  style=background-color:#F0FC44;color:black;font-weight: bold;>";
	}
	
		
	}
	}
/*******************************************************************************************************************************
 * 
 * 
 * 
 * End of the  function daycolor()
 * 
 * 
 * ****************************************************************************************************************************/
 
$MonthArray=array('January','February','March','April','May','June','July','August','September','October','November','December');
//print_r($MonthArray);


print("<div class=row>");


foreach($MonthArray as $mn => $MonthName){
	$mn=$mn+1;
	

/**********************************************************************88
 * 
 * For Each Month
 * 
 * **********************************************************************/	

	
		print("<div class=column>");   //div column for each month
$Timestamp=mktime (0,0,0,$mn,1,$Year);
	print("<div class=table>");			//div table for the month
print ("<TABLE  border=1 CELLPADDING=3 CELLSPACING=0 ALIGN=CENTER>");

print ("<TR BGCOLOR=#404040><TD COLSPAN=7 ALIGN=CENTER><FONT COLOR=WHITE><B>
	 $MonthName $Year</B></FONT></TD></TR>");

print ("<TR BGCOLOR=#606060>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>Su</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>M</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>Tu</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>W</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>Th</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>F</FONT></B></TD>
	<TD ALIGN=CENTER WIDTH=20><B>
	<FONT COLOR=WHITE>Sa</FONT></B></TD>
	</TR>\n");

$MonthStart=date("w",$Timestamp);

if ($MonthStart == 0)
	 {
	$MonthStart = 7;
	}


$LastDay = date("d",mktime (0,0,0,$mn+1,0,$Year));
$StartDate=-$MonthStart;
for($k=1; $k <=6; $k++) //begin the loop for rows.
	{
	print("<TR>");
	for ($i=1;$i <= 7; $i++) //begin the loop for columns.
		{
		$StartDate++;// Add one to the negative number before each loop print.
                  $quest=    mktime(0,0,0,$mn,$StartDate,$Year);


		if (($StartDate <=0) || ($StartDate > $LastDay))
			{
			print ("<TD style=\"background-color:#B8B870;\">&nbsp</TD>");    //Print background table boxes if $StartDate" is less than zero and bigger than the last day.
			}
		elseif (($StartDate >=1) && ($StartDate <=$LastDay))
			{
				if ($Cal == '2'){
			daycolor1($quest);
		} else {
			daycolor($quest);
		}
		print ("".$StartDate."</TD>");
 			}
		}
	print ("</TR>\n");
	
}
	

print ("</TABLE>\n");

	
		print("</div>"); //end of the div table
		
	//if($mn == 4 || $mn == 8 || $mn == 12){
		
		print("</div>"); //end of the month column
	//}
}

print("</div>");  //End of the Rows of Months


print("<div style=text-align:center;>");

$This_Year = date("Y");
$Last_Year = $This_Year-1;
$Next_Year = $This_Year+1;
$In_Two_Years = $This_Year+2;

print ("<FORM method=post name=calchoice id=calch action=$PHP_SELF>\n");
print ("<SELECT	NAME=Year id=\"year_select\" onchange=\"javascript:this.form.submit()\">  \n");

print ("		<OPTION VALUE=".$Year.">".$Year."</OPTION>\n
	<OPTION VALUE=".$This_Year.">This Year</OPTION>\n
	<OPTION VALUE=".$Last_Year.">".$Last_Year."</OPTION>\n
	<OPTION VALUE=".$Next_Year.">".$Next_Year."</OPTION>\n
	<OPTION VALUE=".$In_Two_Years.">".$In_Two_Years."</OPTION>\n

</SELECT>\n");




print("</FORM>\n</center>");

print("</div>");




/*****************************************************************************************
 * 
 * 
 * 
 * 
 * ******************************************************************************************/
?>
