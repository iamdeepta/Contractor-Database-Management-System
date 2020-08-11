<?php 
$upload_dir="pp/";
$targetpath_pic= "projectpics/".$_SESSION['pid']."/";
$targetpath_doc= "projectdocs/";

		function getRecords( $q )
		{
			// database conneciton parameters 
			$host='192.168.253.15'; 
			$user='root';
			$pass='mysql@123';
			$database='pwdpms3'; /*pmsv3*/
			
	        if($dbconn = mysql_connect($host, $user, $pass))
				$dbh = mysql_select_db($database, $dbconn);		
			else
				echo "Cannot connect to MySQL Database Server.";
				$res = mysql_query($q) or die(mysql_error());
			
					//Closing Database connection
			mysql_close($dbconn);
			
			return $res;
		}
		
		
		//** funcion to format string **/
		function fFormatString( $str )
		{
			$changeQoute = trim(str_replace("'", "''", $str ));
			return $changeQoute;
		}
		
		//**  yyyy/mm/dd to dd/mm/yy  format string **/
		function date_eng_to_bd( $str )
		{
			if(trim($str) == "" || $str == "0000-00-00") 
				$str_date=NULL;
			else
			{				
				$lstdate=split("-",$str);
				$yy=$lstdate[0];
				$mm=$lstdate[1];
				$dd=$lstdate[2];
				$str_date=	$dd."-".$mm."-".$yy;		
			}
						
			return $str_date;
		}
		
		//** dd/mm/yy to yy/mm/dd format string **/
		function date_bd_to_eng( $str )
		{
			if(trim($str) == "" || is_null($str))
				$str_date=NULL;
			else
			{
				$lstdate=split("-",$str);
				$dd=$lstdate[0];
				$mm=$lstdate[1];
				$yy=$lstdate[2];
				$str_date=	$yy."-".$mm."-".$dd;
			}
						
			return $str_date;
		}

// ===================== ProjectAccess =======================================================================================

	function ProjectAccess($ProjectID)
	{
	/*
		This function checks whether the logged in user have access in the project
		which ID is given in the parameter.
		Returns true and false. Should be used in beginning of a secured page.
	*/
		$UID = $_SESSION['UserId'];
		$sql=getRecords("CALL spLstProjectByUserID($ProjectID, $UID)");
		$numrows=mysql_num_rows($sql);
		
		if($numrows > 0)
			return true;
		else
			//return false;
			return true;
	
	}//ProjectAccess()


 // ================================== PAGINATION FUNCTIONS CREATED BY AMIN ==========================================================================
# THIS FUNCTION CREATED THE URL
function pagination_link($id, $page_num){
	return $_SERVER['PHP_SELF'].'?page_num='.$page_num;
}
###### PAGINATION FUNCTION ###### 
function pagination($num_of_items, $items_per_page, $id, $page_num, $max_links){
	$total_pages = ceil($num_of_items/$items_per_page);
	if($page_num) {
		if($page_num >1){ 
			$prev = ' &nbsp; <a href="'.pagination_link($id, ($page_num -1 )).'">&lt; PREV</a> &nbsp; '; 
			$first = '<a href="'.$_SERVER['PHP_SELF'].'">First Page &lt;&lt;</a>'; 
		}
	}
	if($page_num <$total_pages){ 
		$next = ' &nbsp; <a href="'.pagination_link($id, ($page_num+1)).'">NEXT &gt;</a> &nbsp; '; 
		$last = ' &nbsp; <a href="'.pagination_link($id, $total_pages).'"> LAST PAGE &gt;&gt;</a> &nbsp; ';
	}
	echo $first;
	echo $prev;
	$loop = 0;
	if($page_num >= $max_links) {
		$page_counter = ceil($page_num - ($max_links-1));
	} else {
		$page_counter = 1;
	}
	if($total_pages < $max_links){
		$max_links = $total_pages;
	}
	do{ 
		if($page_counter == $page_num) {
			echo ' &nbsp; <strong>'.$page_counter.'</strong> &nbsp; '; 
		} else {
			echo '<a href="'.pagination_link($id, ($page_counter)).'">'.$page_counter.'</a> &nbsp; ';
		} 
		$page_counter++; $current_page=($page_counter+1);
		$loop++;
	} while ($max_links > $loop);
echo $next;
echo $last;
}
//  END OF  PAGINATION FUNCTIONS 


//FUNCTION FOR HIDING PROJECT RECURSIVELY 
function HideProject($pid)
{
function hide_recursive($pid)
	{	
	$sql=getRecords("SELECT pmsproject.ProjectID, pmsproject.ProjectName FROM pmsproject WHERE pmsproject.ParentProjectID = $pid");
	while($data=mysql_fetch_array($sql))
	{
		$result=getRecords("UPDATE pmsproject SET
					pmsproject.IsActive=0
					WHERE pmsproject.ProjectID='".$data["ProjectID"]."'");
		hide_recursive($data["ProjectID"]);
	}
	}
hide_recursive($pid);
$_SESSION['pid']='';
echo "<script>location.replace('home.php?msg=Project Hide Successfully Done');</script>";
exit();
}
//END FUNCTION FOR HIDING PROJECT RECURSIVELY


?>
