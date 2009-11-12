<?


/*

Please keep the following lines if you will use this script. Thanks!
---------------------------------------------------------------------------
	CALENDAR SCRIPT
Developed by : Steven Rebello (stevenrebello@indiatimes.com)
Developed on : 15 September 2001
Description : Prints a calendar for specified month and year in HTML

---------------------------------------------------------------------------


 To use this calendar script, just add the following  function 
 

print_calendar($mon,$year);

 
 into your code and
 place the function call print_calendar($month,$year) where you want the calendar to be printed.
 The function get_month_as_array
 
 $month and $year are integers.
 For eg. the following will print calendar for December 2001.
   
 print_calendar(12,2001); 

 You can tweak the table properties as you like.
 I did not want to complicate the function call with table property parameters like bordercolor etc..
 
*/


//----------------- This function prints calendar---------------------
function  print_calendar($link,$link_booking,$mon,$year)
	{
		global $dates, $first_day, $start_day;
			
		$first_day = mktime(0,0,0,$mon,1,$year);
		$start_day = date("w",$first_day);
		$res = getdate($first_day);
		$month_name = $res["month"];
		$no_days_in_month = date("t",$first_day);
		
		//If month's first day does not start with first Sunday, fill table cell with a space
		for ($i = 1; $i <= $start_day;$i++)
			$dates[1][$i] = " ";

		$row = 1;
		$col = $start_day+1;
		$num = 1;
		while($num<=31)
			{
				if ($num > $no_days_in_month)
					 break;
				else
					{
						$dates[$row][$col] = $num;
						if (($col + 1) > 7)
							{
								$row++;
								$col = 1;
							}
						else
							$col++;
						$num++;
					}//if-else
			}//while
		$mon_num = date("n",$first_day);
		$temp_yr = $next_yr = $prev_yr = $year;

		$prev = $mon_num - 1;
		$next = $mon_num + 1;

		//If January is currently displayed, month previous is December of previous year
		if ($mon_num == 1)
			{
				$prev_yr = $year - 1;
				$prev = 12;
			}
    
		//If December is currently displayed, month next is January of next year
		if ($mon_num == 12)
			{
				$next_yr = $year + 1;
				$next = 1;
			}

		echo "<DIV ALIGN='center'><TABLE BORDER=1 WIDTH=40% CELLSPACING=0 BORDERCOLOR='silver'>";

		echo 	"\n<TR ALIGN='center'><TD BGCOLOR='white'> ".
			 "<A HREF='$link?month=$prev&year=$prev_yr' STYLE=\"text-decoration: none\"><B><<</B></A> </TD>".
			 "<TD COLSPAN=5 BGCOLOR='#99CCFF'><B>".date("F",$first_day)." ".$temp_yr."</B></TD>".
			 "<TD BGCOLOR='white'> ".
			 "<A HREF='$link?month=$next&year=$next_yr' STYLE=\"text-decoration: none\"><B>>></B></A> </TD></TR>";

		echo "\n<TR ALIGN='center'><TD><B>Sun</B></TD><TD><B>Mon</B></TD><TD><B>Tue</B></TD>";
		echo "<TD><B>Wed</B></TD><TD><B>Thu</B></TD><TD><B>Fri</B></TD><TD><B>Sat</B></TD></TR>";
		echo "<TR><TD COLSPAN=7> </TR><TR ALIGN='center'>";
				
		$end = ($start_day > 4)? 6:5;
		for ($row=1;$row<=$end;$row++)
			{
				for ($col=1;$col<=7;$col++)
					{
						if ($dates[$row][$col] == "")
						$dates[$row][$col] = " ";
						
						if (!strcmp($dates[$row][$col]," "))
							$count++;
						
						$t = $dates[$row][$col];	
						
						//If date is today, highlight it
						$day = $t."-".$mon."-".$year; 
						if (($t == date("j")) && ($mon == date("n")) && ($year == date("Y")))
							echo "\n<TD BGCOLOR='aqua'><a href=\"$link_booking?date_in=$day\">".$t."</a></TD>";
						else
							//If the date is absent ie after 31, print space
							echo "\n<TD>".(($t == " " )? "&nbsp;" :"<a href=\"$link_booking?date_in=$day\">".$t."</a>")."</TD>";
					}// for -col
				
				if (($row + 1) != ($end+1))
					echo "</TR>\n<TR ALIGN='center'>";
				else
					echo "</TR>";
			}// for - row
		echo "\n</TABLE><BR><BR><A HREF=\"$link\">Show Current month</A>      </DIV>";
	}
?>