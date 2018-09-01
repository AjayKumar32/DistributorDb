<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Ajay
 * Description: Ajax Model which process logic for Ajax call
 */
class Reportsmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    public function getTopCustomes($filter=array()){
    	$where = '';//print_r($filter);die;
        
        if(isset($filter['year']) && $filter['year']!=''){
        	$where .= " AND YEAR(InvoiceDate_SOShipDate) = '".$filter['year']."'";
        }else{
        	$where .= " AND YEAR(InvoiceDate_SOShipDate) = '2017'";
        }
        if(isset($filter['report_type']) && $filter['report_type']!=''){
        	switch($filter['report_type']){
        		case 1:
        			$where .= " AND RecordSubType = 'Direct Sale'";
        		break;
        		case 2:
        			$where .= " AND RecordSubType = 'Disti Inventory'";
        		break;
        		case 3:
        			$where .= " AND RecordSubType = 'Disti Sale'";
        		break;
        		case 4:
        			$where .= " AND RecordSubType = 'POS Sale'";
        		break;
        		case 5:
        			$where .= " AND RecordSubType IN('Direct Sale','Disti Sale')";
        		break;
            case 6:
              $where .= " AND RecordSubType IN('Direct Sale','POS Sales')";
            break;
        	}
        }

        $sql1="SELECT TOP 10 End_Purch_Direct FROM [Adesto_Distributor].[dbo].[report_data_final] WHERE End_Purch_Direct NOT IN('-','N/A','n/a') AND YEAR(InvoiceDate_SOShipDate) = '2017'
    								  GROUP BY End_Purch_Direct,YEAR(InvoiceDate_SOShipDate) 
    								  ORDER BY SUM(Debited_Cost_Ext_USD) DESC";
    	//print_r($sql1);die();

    	$sql = "SELECT * FROM (SELECT SUM(Debited_Cost_Ext_USD) AS quater_amount,
    								  End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate) AS qtr,YEAR(InvoiceDate_SOShipDate) as yr
    								  FROM report_data_final WHERE End_Purch_Direct NOT IN('-','N/A','n/a') and End_Purch_Direct IN(".$sql1.")".$where." 
    								  GROUP BY End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate),YEAR(InvoiceDate_SOShipDate) 
    								  ) AS sourceTable
  									  PIVOT(AVG([quater_amount]) FOR [qtr] IN([1],
                                                         [2],
                                                         [3],
                                                         [4])) AS PivotTable";	
         // $sql1  ="SELECT TOP 15 SUM(Debited_Cost_Ext_USD) AS quater_amount,
    					// 			  End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate) AS qtr,YEAR(InvoiceDate_SOShipDate) as yr
    					// 			  FROM report_data_final WHERE End_Purch_Direct NOT IN('-','N/A','n/a') 
    					// 			  GROUP BY End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate),YEAR(InvoiceDate_SOShipDate) 
    					// 			  ORDER BY SUM(Debited_Cost_Ext_USD) DESC";                                                		
  		 $query = $this->db->query($sql); 
  		 $FinalArr = array(); 	
  		 foreach($query->result_array() as $data){
  		 	$FinalArr['labels'][] = $data['End_Purch_Direct'];
  		 	$q1 = ($data[1]>0)?$data[1]:'0';
  		 	$q2 = ($data[2]>0)?$data[2]:'0';
  		 	$q3 = ($data[3]>0)?$data[3]:'0';
  		 	$q4 = ($data[4]>0)?$data[4]:'0';
  		 	$total = $q1+$q2+$q3+$q4;
  		 	$q1Arr[] = intval($q1);
  		 	$q2Arr[] = intval($q2);
  		 	$q3Arr[] = intval($q3);
  		 	$q4Arr[] = intval($q4);
  		 	$totalArr[] = intval($total);
  		 	//$year = 
  		 	//$FinalArr['datasets'][] = array('label'=>'Q1');
  		 	
  		 }
  		 $datasetArr = array();
  		 $datasetArr[] =array('label'=>$data['yr'].'Q1','backgroundColor'=>'#26B99A','data'=>$q1Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q2','backgroundColor'=>'#FF5733','data'=>$q2Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q3','backgroundColor'=>'#A93226','data'=>$q3Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q4','backgroundColor'=>'#3498DB','data'=>$q4Arr);
  		 $datasetArr[] =array('label'=>'Total','backgroundColor'=>'#03586A','data'=>$totalArr);
  		 
  		 $FinalArr['Dataset'] = $datasetArr;

  		 echo json_encode($FinalArr);die;
   		 				
    }

   public function getTopItems($filter=array()){
    	$where = '';//print_r($filter);die;

        if(isset($filter['year']) && $filter['year']!=''){
        	$where .= " AND YEAR(InvoiceDate_SOShipDate) = '".$filter['year']."'";
        }else{
        	$where .= " AND YEAR(InvoiceDate_SOShipDate) = '2017'";
        }
        
        if(isset($filter['report_type']) && $filter['report_type']!=''){
        	switch($filter['report_type']){
        		case 1:
        			$where .= " AND RecordSubType = 'Direct Sale'";
        		break;
        		case 2:
        			$where .= " AND RecordSubType = 'Disti Inventory'";
        		break;
        		case 3:
        			$where .= " AND RecordSubType = 'Disti Sale'";
        		break;
        		case 4:
        			$where .= " AND RecordSubType = 'POS Sale'";
        		break;
        		case 5:
        			$where .= " AND RecordSubType IN('Direct Sale','Disti Sale')";
        		break;
            case 6:
              $where .= " AND RecordSubType IN('Direct Sale','POS Sales')";
            break;
        	}
        }

        $sql1="SELECT TOP 15 Item FROM [Adesto_Distributor].[dbo].[report_data_final] WHERE YEAR(InvoiceDate_SOShipDate) = '2017'
    								  GROUP BY Item,YEAR(InvoiceDate_SOShipDate) 
    								  ORDER BY SUM(Debited_Cost_Ext_USD) DESC";
    	//print_r($sql1);die();

    	$sql = "SELECT * FROM (SELECT SUM(Debited_Cost_Ext_USD) AS quater_amount,
    								  Item,DATEPART(QUARTER,InvoiceDate_SOShipDate) AS qtr,YEAR(InvoiceDate_SOShipDate) as yr
    								  FROM report_data_final WHERE Item IN(".$sql1.")".$where." 
    								  GROUP BY Item,DATEPART(QUARTER,InvoiceDate_SOShipDate),YEAR(InvoiceDate_SOShipDate) 
    								  ) AS sourceTable
  									  PIVOT(AVG([quater_amount]) FOR [qtr] IN([1],
                                                         [2],
                                                         [3],
                                                         [4])) AS PivotTable";	
         // $sql1  ="SELECT TOP 15 SUM(Debited_Cost_Ext_USD) AS quater_amount,
    					// 			  End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate) AS qtr,YEAR(InvoiceDate_SOShipDate) as yr
    					// 			  FROM report_data_final WHERE End_Purch_Direct NOT IN('-','N/A','n/a') 
    					// 			  GROUP BY End_Purch_Direct,DATEPART(QUARTER,InvoiceDate_SOShipDate),YEAR(InvoiceDate_SOShipDate) 
    					// 			  ORDER BY SUM(Debited_Cost_Ext_USD) DESC";                                                		
  		 $query = $this->db->query($sql); 
  		 $FinalArr = array(); 	
  		 foreach($query->result_array() as $data){
  		 	$FinalArr['labels'][] = $data['Item'];
  		 	$q1 = ($data[1]>0)?$data[1]:'0';
  		 	$q2 = ($data[2]>0)?$data[2]:'0';
  		 	$q3 = ($data[3]>0)?$data[3]:'0';
  		 	$q4 = ($data[4]>0)?$data[4]:'0';
  		 	$total = $q1+$q2+$q3+$q4;
  		 	$q1Arr[] = intval($q1);
  		 	$q2Arr[] = intval($q2);
  		 	$q3Arr[] = intval($q3);
  		 	$q4Arr[] = intval($q4);
  		 	$totalArr[] = intval($total);
  		 	//$year = 
  		 	//$FinalArr['datasets'][] = array('label'=>'Q1');
  		 	
  		 }
  		 $datasetArr = array();
  		 $datasetArr[] =array('label'=>$data['yr'].'Q1','backgroundColor'=>'#26B99A','data'=>$q1Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q2','backgroundColor'=>'#FF5733','data'=>$q2Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q3','backgroundColor'=>'#A93226','data'=>$q3Arr);
  		 $datasetArr[] =array('label'=>$data['yr'].'Q4','backgroundColor'=>'#3498DB','data'=>$q4Arr);
  		 $datasetArr[] =array('label'=>'Total','backgroundColor'=>'#03586A','data'=>$totalArr);
  		 
  		 $FinalArr['Dataset'] = $datasetArr;

  		 echo json_encode($FinalArr);die;
   		 				
    }
 }  