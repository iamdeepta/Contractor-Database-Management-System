<?php

require("config/connection.php");

function fetch_data(){

  //$msg1 = $_GET['msg'];
  $msg2 =$_GET['msg_contractor'];

  $msg2_length = strlen($msg2);

  $output = '';

  //require("config/json_db.php");

        
        $search_report_result = mysqli_query($conn,"SELECT tpd.id,tpd.ProjectName, SUBSTR(tc.contractor_id, INSTR(tc.contractor_id,'$msg2'),$msg2_length) as contractor_id, tc.tender_no, tc.TenderName, tc.official_estimate,tcr.ID,(SELECT ContractorName from tbl_contractor WHERE ID=$msg2) as ContractorName, tc.contract_amount, ta.AuthorityName, DATE_FORMAT(tc.DOA, '%d/%m/%Y') as doa, DATE_FORMAT(tc.NOA, '%d/%m/%Y') as noa, DATE_FORMAT(tc.DOCS, '%d/%m/%Y') as docs, DATE_FORMAT(tc.WCD, '%d/%m/%Y') as wcd, tc.bill_paid, tc.financial_progress, tc.physical_progress, tc.remarks FROM tbl_project_division as tpd,  tbl_contract AS tc, tbl_contractor AS tcr, tbl_approveauth AS ta WHERE tpd.id = tc.ProjectID AND tc.contractor_id = tcr.ID AND tc.approveauth_id = ta.ID AND FIND_IN_SET('$msg2', tc.contractor_id) AND tc.Remove_Status = 0 ") or die(mysqli_error($conn));

        //$search_report_result = json_decode($search_report, true);

    


        /*$office_name = getJSON("SELECT OfficeID, OfficeName FROM hrtoffice WHERE OfficeID = '$msg1' ");
        $office_name_result = json_decode($office_name, true);*/


       

                          while($report_result=mysqli_fetch_array($search_report_result)){

                      $output .='

                            <tr>
                            

                            <td>'.$report_result["ProjectName"].'</td>
                            <td>'.$report_result["tender_no"].'</td>
                            <td>'.$report_result["TenderName"].'</td>
                            <td>'.$report_result["official_estimate"].'</td>
                            <td>'.$report_result["ContractorName"].'</td>
                            <td>'.$report_result["contract_amount"].'</td>
                            <td>'.$report_result["AuthorityName"].'</td>
                            <td>'.$report_result["doa"].'</td>
                            <td>'.$report_result["noa"].'</td>
                            <td>'.$report_result["docs"].'</td>
                            <td>'.$report_result["wcd"].'</td>
                            <td>'.$report_result["bill_paid"].'</td>
                            <td>'.$report_result["financial_progress"].'</td>
                            <td>'.$report_result["physical_progress"].'</td>
                            <td>'.$report_result["remarks"].'</td>
                          
                          </tr>';
                         
                         
}

  
    return $output;
}

function fetch_data1(){

  //$msg1 = $_GET['msg'];

  $output1 = '';

  //require("config/json_db.php");

  /*$office_name = getJSON("SELECT OfficeID, OfficeName FROM hrtoffice WHERE OfficeID = '$msg1' ");
        $office_name_result = json_decode($office_name, true);*/

  //foreach ($office_name_result as $result) {
                        $output1 .='
                        <p style="font-weight: bold;">Report Date: '.date('d/m/yy').'</p> ';
                         
                         
//}

return $output1;


}

if (isset($_POST['report_pdf_btn'])) {
  require_once("tcpdf/tcpdf.php");
  $obj_pdf = new TCPDF('P', PDF_UNIT, [400,408], true, 'UTF-8', false);  //for standard format->PDF_PAGE_FORMAT
  $obj_pdf->SetCreator(PDF_CREATOR);
  $obj_pdf->SetTitle("PDF of  Contract Report");
  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'', PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'', PDF_FONT_SIZE_DATA));
  $obj_pdf->SetDefaultMonospacedFont('helvetica');
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
  $obj_pdf->setPrintHeader(false);
  $obj_pdf->setPrintFooter(false);
  $obj_pdf->SetAutoPageBreak(True, 10);
  $obj_pdf->SetFont('helvetica','', 10);

  

  $content1 ='';

  $content1 .= '<div class="card-header">
                    <h4>Contracts Report</h4>';

  $content1 .= fetch_data1();
  $content1 .= '</div>';



  $content = '';

                    $content .= '<div class="card-header">
                                      <h4>Contracts Report</h4>';

                    $content .= fetch_data1();
                    $content .= '</div>';

  $content .= '

      <table border="1" cellspacing="0" cellpadding="3">
      <tr style="background-color: #CCCDC6">
                            <th>Project Name</th>
                            <th style="width: 4%">Tender No.</th>
                            <th style="width: 12%">Description of Work</th>
                            <th style="width: 6.8%">Official Cost Estimate (In Lac)</th>
                            <th>Name of Contractor</th>
                            <th style="width: 6.8%">Contract Amount (In Lac)</th>
                            <th style="width: 7.0%">Approving Authority</th>
                            <th style="width: 5.8%">Approval Date</th>
                            <th style="width: 5.8%">NOA Date</th>
                            <th style="width: 5.8%">Contract Signing Date</th>
                            <th style="width: 5.8%">Completion Date</th>
                            <th>Bill Paid</th>
                            <th>Financial Progress</th>
                            <th>Physical Progress</th>
                            <th>Remarks</th>
          
                          </tr>
  ';

  $content .= fetch_data();

  $content .= '</table>';
  $obj_pdf->AddPage();

  $obj_pdf->writeHTML($content);
  $obj_pdf->Output("ContractReport.pdf", "I");


}
?>