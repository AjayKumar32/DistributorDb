<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Ajay
 * Description: This model process request from AJax call and response back in string or html form.
 */
class Ajaxmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getColumnsList($system_type){
    	$table_name = '';//($system_type==2)?'pos':'inventory';
    	switch($system_type){
    		case '1':
    			$table_name = 'inventory_load';
    			break;
    		case '2':
    			$table_name = 'pos_load';
    			break;
    		case '3':
    			$table_name = 'debits_load';
    			break;

    		default:
    		$table_name = 'inventory_load';	
    	}
    	$local_headers = $this->db->list_fields($table_name);
        $finalHeader = array();
        foreach($local_headers as $local_header){
            if(!in_array($local_header,array('Distributor','id','report_date_adesto','file_name','uploaded_by','sales_territory','sales_region','Load_Date','Load_date'))){
                $finalHeader[] = $local_header;
            }
        }

      
    	//if(isset($local_headers[0])){
    		//unset($local_headers[0]);
    	//}
    	return $finalHeader;
    	//return "Ajaxmodel";


    }

    public function getMandatoryFields($system_type){
        switch($system_type){
          case '1':
            $mandatory = array('DBC_Currency','Debited_Cost_Currency','ItemOriginal');
            break;
          case '2':
            $mandatory = array('DBC_Currency','Debited_Cost_Currency','Resale_Currency','Item');
            break;
          case '3':
            $mandatory = array('Authorized_debit_number','part_number','Customer');
            break;

          default:
          $mandatory = array('DBC_Currency','Debited_Cost_Currency','Resale_Currency','Item'); 
      }
      return $mandatory;

    }

    public function getFileHeaderList($formData){
    	$this->db->select('*')
    			  ->from('temp_file_header');
    	if(isset($formData['system_type'])){
          $this->db->where('system_type',$formData['system_type']);	
        }
        if(isset($formData['distributor_list'])){
          $this->db->where('distributor',$formData['distributor_list']);	
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        //print_r($query->result_array());die;
        return $query->result_array();		  

    }

    public function SaveTemplate($postData){
    	if(isset($postData['local_header']) && !empty($postData['local_header'])){
    	 $system_tye = isset($postData['system_type'])?$postData['system_type']:0;
         $distributor_list= isset($postData['distributor_list'])?$postData['distributor_list']:0;

         //Check if element has been removed from template
          $templatesData = $this->getDistributorTemplate($postData);
          if(isset($templatesData['LocalHeader']) && !empty($templatesData['LocalHeader'])){
          	    $header_diff = array_diff($templatesData['LocalHeader'],$postData['local_header']);
          	   if(!empty($header_diff)){
          		$this->db->where('system_type',$system_tye);
	    		$this->db->where('distributor',$distributor_list);
	    		$this->db->where_in('local_header',$header_diff);
	            $this->db->delete('upload_template');
	           } 

          }
          //echo "<pre>";print_r(array_diff($templatesData['LocalHeader'],$postData['local_header']));die;

         //End	
    	
    	foreach($postData['local_header'] as $key=>$local_header){
    	   if($local_header!='' && $postData['file_header'][$key]!=''){	
	    		$this->db->select('*')
	    				->from('upload_template')
	    				->where('system_type',$system_tye)
	    				->where('distributor',$distributor_list)
	    				->where('local_header',trim($local_header));
	    		$query = $this->db->get();
	    	if($query->num_rows()>0){
	    		$updatetData = array(
	                                'file_header'=>$postData['file_header'][$key],
	                                'modify_date' =>date('Y-m-d H:i:s')
	                        );
	    		$this->db->where('system_type',$system_tye);
	    		$this->db->where('distributor',$distributor_list);
	    		$this->db->where('local_header',trim($local_header));
	            $this->db->update('upload_template', $updatetData);

	    	}else{			
	    		$insertData = array(
	                                'system_type'=>$system_tye,
	                                'distributor'=>$distributor_list,
	                                'local_header'=>$local_header,
	                                'file_header'=>$postData['file_header'][$key],
	                                'created_date' =>date('Y-m-d H:i:s')
	                        );
	    		
	            $this->db->insert('upload_template', $insertData);//die('done');
	           } 
        	 }
           } 
    	}
    }

    public function DeleteTemplate($postData){
    	$system_tye = isset($postData['system_type'])?$postData['system_type']:0;
        $distributor= isset($postData['distributor'])?$postData['distributor']:0;
    	$this->db->where('system_type',$system_tye);
		$this->db->where('distributor',$distributor);
        $this->db->delete('upload_template');
    }
    public function getDistributorTemplate($formData){
    	$this->db->select('*')
    			  ->from('upload_template');
    	if(isset($formData['system_type'])){
          $this->db->where('system_type',$formData['system_type']);	
        }
        if(isset($formData['distributor_list'])){
          $this->db->where('distributor',$formData['distributor_list']);	
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        //print_r($query->result_array());die;
        $templateheaders =  $query->result_array();
        $HeaderArr['LocalHeader']= array();
        $HeaderArr['FileHeader']=array();
        $HeaderArr['CrossMap']=array();
        if(!empty($templateheaders)){
        	foreach($templateheaders as $templateheader){
        		$HeaderArr['LocalHeader'][] = $templateheader['local_header'];
        		$HeaderArr['CrossMap'][$templateheader['local_header']] = $templateheader['file_header'];
        		$HeaderArr['FileHeader'][] = $templateheader['file_header'];
        	}

        }
        return $HeaderArr;
    }

    public function matchingTemplateWIthData($templateMaps,$excelheader){
            $mappededColumns = array();
            foreach($templateMaps as $localheader=>$fileheader){
                $mappededColumns[$localheader] = array_search($fileheader,$excelheader);
            }
            return $mappededColumns;
    }

    public function insertImportSettings($inputData){
       if($inputData['header_row']!='' && $inputData['header_row']!='0'){        
        $this->db->select('*')
                  ->from('upload_file_settings');
        if(isset($inputData['system_type'])){
          $this->db->where('system_type',$inputData['system_type']); 
        }
        if(isset($inputData['distributor'])){
          $this->db->where('distributor',$inputData['distributor']);    
        }
        $query = $this->db->get();
        $settings =  $query->result_array();
        if(empty( $settings)){
             $insertData = array(
                                    'system_type'=>$inputData['system_type'],
                                    'distributor'=>$inputData['distributor'],
                                    'start_header_count'=>$inputData['header_row']
                            );
                
             $this->db->insert('upload_file_settings', $insertData);
           }else{
                 $updateData = array(
                                    'start_header_count'=>$inputData['header_row']
                            );
             $this->db->where('distributor',$inputData['distributor']); 
             $this->db->where('system_type',$inputData['system_type']);    
             $this->db->update('upload_file_settings', $updateData);

           }  
        }     
     }
     public function getImportSetting($inputData){
        $this->db->select('US.*,DT.Country')
                  ->from('upload_file_settings US')
                  ->join('distributor_new AS DT',"DT.id=US.distributor","INNER");
        if(isset($inputData['system_type'])){
          $this->db->where('US.system_type',$inputData['system_type']); 
        }
        if(isset($inputData['distributor'])){
          $this->db->where('US.distributor',$inputData['distributor']);    
        }
        $query = $this->db->get();
        $settings =  $query->row_array();
        return $settings;

     }
     //This method used to valdate
     public function validateImport($system_type,$ImportData){
            $this->db->select('*')
                    ->from('upload_file_validation')
                    ->where('system_type',$system_type);
            $query = $this->db->get();
            $mandatoryfields = $query->result_array();
            
            foreach ($mandatoryfields as $key => $value) {
                      if(!isset($ImportData[$value['mandatory_field']]) || $ImportData[$value['mandatory_field']]==''){
                        return false;//if validation will fail then return false and record will not insert
                      } 
                    }
            return true;                
     }


     public function getregionname($distributor){ //echo "<pre>";print_r($distributor);die;
      $this->db->select('*')
                    ->from('distributor_new')
                    ->where('id',$distributor);
      $query = $this->db->get();   
      $result =  $query->row_array();//print_r($result);die;
       $sales_teritory = '';
       $sales_region = '';
        if(!empty( $result)){
             $sales_teritory = '<option value='.str_replace(' ','_',$result['Sales_Territory']).'>'.$result['Sales_Territory'].'</option>';
              $sales_region = '<option value='.str_replace(' ','_',$result['Sales_Area']).'>'.$result['Sales_Area'].'</option>';
           }
           echo json_encode(array('sales_teritory'=>$sales_teritory,'sales_region'=>$sales_region));   
     }

     public function getFiltersList($input){
       $where = '';
       $this->db->select('*')
                    ->from('distributor_new');
         $filter = 0;           
       switch($input['type']){
          case 1:
            if($input['filtervalue']!='All'){
              $this->db->where('Sales_Area',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          case 2:
            if($input['filtervalue']!='All'){
              $this->db->where('Sales_Territory',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          case 3:
           if($input['filtervalue']!='0'){
            $this->db->where('id',$input['filtervalue']);
            $filter = 1; 
          }
          break;
       }
      $query = $this->db->get();   
      $Dataresult =  $query->result_array();//print_r($result);die;
       $sales_teritory = '<option value="All">--Select Teritory--</option>';
       $sales_region = '<option value="All">--Select Region--</option>';
       $distributor_list= '<option value="0">--Select Distributor--</option>';
       $region = array();
       $terroritory = array();
        if(!empty( $Dataresult)){
          foreach($Dataresult as $result){
            if(!in_array($result['Sales_Territory'],$terroritory) && $result['Sales_Territory']!=''){
             $sales_teritory .= '<option value='.str_replace(' ','_',$result['Sales_Territory']).'>'.$result['Sales_Territory'].'</option>';
             $terroritory[] = $result['Sales_Territory'];
            }
            if(!in_array($result['Sales_Area'],$region) && $result['Sales_Area']!=''){
              $sales_region .= '<option value='.str_replace(' ','_',$result['Sales_Area']).'>'.$result['Sales_Area'].'</option>';
              $region[] = $result['Sales_Area'];
            }
              $distributor_list .= '<option value='.$result['id'].'>'.utf8_encode($result['Consolidated_Name']).'</option>';
             } 
           }
           echo json_encode(array('sales_teritory'=>$sales_teritory,'sales_region'=>$sales_region,'distributor'=>$distributor_list,'Filter'=>$filter)); 
     }


     public function getFiltersList_for_netpricepercent($input){
       $where = '';
       $this->db->select('*')
                    ->from('Net_price_percent_history');
         $filter = 0;           
       switch($input['type']){
          case 1:
            if($input['filtervalue']!='0'){
              $this->db->where('GP_Customer_Number',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          case 2:
            if($input['filtervalue']!='All'){
              $this->db->where('Item_Number',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          
       }
      $query = $this->db->get();   
      $Dataresult =  $query->result_array();//print_r($result);die;
       $customer = '<option value="0">--Select Customer--</option>';
       $Item = '<option value="All">--Select Item--</option>';
       $customers = array();
       $Items = array();
        if(!empty( $Dataresult)){
          foreach($Dataresult as $result){
            if(!in_array($result['GP_Customer_Number'],$customers) && $result['GP_Customer_Number']!=''){
             $customer .= '<option value='.$result['GP_Customer_Number'].'>'.$result['GP_Customer_Number'].'</option>';
             $customers[] = $result['GP_Customer_Number'];
            }
            if(!in_array($result['Item_Number'],$Items) && $result['Item_Number']!=''){
              $Item .= '<option value='.$result['Item_Number'].'>'.$result['Item_Number'].'</option>';
              $Items[] = $result['Item_Number'];
            }
             } 
           }
           echo json_encode(array('customer'=>$customer,'Item'=>$Item,'Filter'=>$filter)); 
     }

     public function getFiltersforpricebebookhistory($input){
       $where = '';
       $this->db->select('*')
                    ->from('PriceBook_History');
         $filter = 0;           
       switch($input['type']){
          case 1:
            if($input['filtervalue']!='All'){
              $this->db->where('Item',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          case 2:
            if($input['filtervalue']!='0'){
              $this->db->where('date_added',$input['filtervalue']);
              $filter = 1; 
            }
          break;
          
       }
      $query = $this->db->get();   
      $Dataresult =  $query->result_array();//print_r($result);die;
       $mod_date = '<option value="0">--Select Date--</option>';
       $Item = '<option value="All">--Select Item--</option>';
       $mod_dates = array();
       $Items = array();
        if(!empty( $Dataresult)){
          foreach($Dataresult as $result){
            if(!in_array($result['date_added'],$mod_dates) && $result['date_added']!=''){
             $mod_date .= '<option value='.$result['date_added'].'>'.$result['date_added'].'</option>';
             $mod_dates[] = $result['date_added'];
            }
            if(!in_array($result['Item'],$Items) && $result['Item']!=''){
              $Item .= '<option value='.$result['Item'].'>'.$result['Item'].'</option>';
              $Items[] = $result['Item'];
            }
             } 
           }
           echo json_encode(array('mod_date'=>$mod_date,'Item'=>$Item,'Filter'=>$filter)); 
     }

     public function createFinancialYearDropdown(){
          $years = array('0'=>'--Select Year');
          
          $quarters = array('0'=>'--Select Quarter','1'=>'Q1','2'=>'Q2','3'=>'Q3','4'=>'Q4');
         
          for($i=0;$i<=3;$i++){
             $years[(date('Y')-$i)]  = date('Y')-$i;
          }
          $months = array(
                          '0'=>'--Select Month',
                          '01'=>'January',
                          '02'=>'February',
                          '03'=>'March',
                          '04'=>'April',
                          '05'=>'May',
                          '06'=>'June',
                          '07'=>'July ',
                          '08'=>'August',
                          '09'=>'September',
                          '10'=>'October',
                          '11'=>'November',
                          '12'=>'December',
                      );

          return array('Years'=>$years,'Months'=>$months,'Quarters'=>$quarters);


     }

     public function getDefaultImportValues($inputData){
       $columns =  $this->getColumnsList($inputData['system_type']);

       $this->db->select('*')
                           ->from('upload_file_defaults');
        if(isset($inputData['system_type'])){
          $this->db->where('system_type',$inputData['system_type']); 
        }
        if(isset($inputData['distributor_list'])){
          $this->db->where('distributor',$inputData['distributor_list']);  
        }
        $query = $this->db->get();
        $defaultvalues =  $query->result_array();
        $getDefault = array();
        foreach ($defaultvalues as $key => $value) {
          $getDefault[$value['local_column']] = $value['default_value'];
        }
        return $getDefault;
        
   }

   public function SaveFixedDefaultValues($inputData){


       if(isset($inputData['system_type'])){
          $this->db->where('system_type',$inputData['system_type']); 
        }
        if(isset($inputData['distributor_list'])){
          $this->db->where('distributor',$inputData['distributor_list']);  
        }
       $this->db->delete('upload_file_defaults');        
        
        foreach ($inputData['default_values'] as $localheader => $default_value) {
          if ($default_value !=''){
            //$InsertData[$localheader]= $default_value;

            $data['local_column']=$localheader;
            $data['default_value']=$default_value;
            $data['system_type']=$inputData['system_type'];
            $data['distributor']=$inputData['distributor_list'];
     
            $this->db->insert('upload_file_defaults',$data);
          }
        }
        //ho "<pre>";print_r($InsertData);die();

        

        echo "Default values saved";die();
        
   }

  public function DeleteFixedDefaultValues($inputData){


       if(isset($inputData['system_type'])){
          $this->db->where('system_type',$inputData['system_type']); 
        }
        if(isset($inputData['distributor_list'])){
          $this->db->where('distributor',$inputData['distributor_list']);  
        }
       $this->db->delete('upload_file_defaults');        
        
        
        

        echo "Default values deleted";die();
        
   }

   } 

