<?php
switch(isset($_POST))
        {
            case isset($_POST['no_of_contracts']):
              include 'contracts_info_by_div.php';
            break;

            case isset($_POST['no_of_contractors']):
              include 'contractors_info.php';
            break;

            case isset($_POST['no_of_projects']):
              include 'projects_info.php';
            break;
            
            case isset($_POST['contracts_today']):
              include 'contracts_info_by_div.php';
            break;
			
			default:
			include 'contracts_info_by_div.php';
        }
		?>