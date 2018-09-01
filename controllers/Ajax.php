<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function __construct(){ 
		parent::__construct();		
    	$this->load->model('users');
    	$this->load->model('ajaxmodel');
        require_once APPPATH.'third_party/PHPExcel/PHPExcel.php';
        $this->excel = new PHPExcel();

    }
    
    public function getlocalfields(){
    	$system_type = $this->input->post('system_type');
		$distributor_list = $this->input->post('distributor_list');
		//echo $system_type;echo $distributor_list;die;
    	$inventoryColumn = $this->ajaxmodel->getColumnsList($system_type);
        //echo("<pre>"); print_r($inventoryColumn);
        $data['DefaultValues'] = $this->ajaxmodel->getDefaultImportValues($this->input->post());
    	$data['localheaders'] = $inventoryColumn;
        $data['fileheaders'] = $this->ajaxmodel->getFileHeaderList($this->input->post());
        $data['template'] = $this->ajaxmodel->getDistributorTemplate($this->input->post());
        $data['Mandatory'] = $this->ajaxmodel->getMandatoryFields($system_type);
        //echo("<pre>"); print_r($data['fileheaders']);die();
    	$this->load->view('mappingajax',$data);

    }

    public function getlocalfieldsandfilefields(){
        $system_type = $this->input->post('system_type');
        $distributor_list = $this->input->post('distributor_list');
        //echo $system_type;echo $distributor_list;die;
        $inventoryColumn = $this->ajaxmodel->getColumnsList($system_type);
        //echo("<pre>"); print_r($inventoryColumn);
        $data['DefaultValues'] = $this->ajaxmodel->getDefaultImportValues($this->input->post());
        $data['localheaders'] = $inventoryColumn;
        $data['fileheaders'] = $this->ajaxmodel->getFileHeaderList($this->input->post());
        $data['template'] = $this->ajaxmodel->getDistributorTemplate($this->input->post());
       $data['Mandatory'] = $this->ajaxmodel->getMandatoryFields($system_type);
        //echo("<pre>"); print_r($data['fileheaders']);die();
        $this->load->view('mappingajax',$data);

    }


    public function addupdatetemplate(){
         
         if($this->input->post()){
            $this->ajaxmodel->SaveTemplate($this->input->post());
            $this->ajaxmodel->SaveFixedDefaultValues($this->input->post());
            echo "Template Has been saved";exit;
         }
         echo "Something Went wrong Please try again!";exit;
        // echo "<pre>";print_r($this->input->post());die;

    }

    public function uploadlocalfile(){ //print_r($this->input->post()); die();
     if($this->input->post() && isset($_FILES["header_file"]["name"])){   
        $file_info = pathinfo($_FILES["header_file"]["name"]);
        //var_dump($file_info); die();
        $file_directory = APPPATH."uploads/";
        $new_file_name = 'HeaderFile'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

        if(move_uploaded_file($_FILES["header_file"]["tmp_name"], $file_directory . $new_file_name))                                
        {   
            $file_type  = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
            $objReader  = PHPExcel_IOFactory::createReader($file_type);
            $objPHPExcel = $objReader->load($file_directory . $new_file_name);
            $headerrow = ($this->input->post('header_row')!='' && $this->input->post('header_row')!='0')?$this->input->post('header_row'):1;

            $header_data    = $objPHPExcel->getActiveSheet()->rangeToArray(
                'A'.$headerrow.':'.$objPHPExcel->getActiveSheet()->getHighestColumn().$headerrow,
                null,
                false,
                false,
                true
            );
            //$header_data[8]
            //echo "<pre>";print_r($header_data);die();
            //$data['header'] = array();
            if(!empty($header_data[$headerrow])){
               foreach($header_data[$headerrow] as $key=>$header_name){
                    if($header_name!=''){  
                        $data['header'][] = array('header_name'=>$header_name,'header_position'=>$key);
                    }
                }
            }
            //echo "<pre>";print_r($data['header']);die();
            $this->users->insertFileHeader($data['header'],$this->input->post());
            $this->ajaxmodel->insertImportSettings($this->input->post());
            echo "file has been uploaded sucessfully!";exit;
            //echo "<pre>";print_r($data['header']);die;
        }
      }else{
        echo 'File is not selected or not found.';exit;
      }
    }

    public function deletemapping(){
        if($this->input->post()){
            $this->ajaxmodel->DeleteTemplate($this->input->post());
            $this->ajaxmodel->DeleteFixedDefaultValues($this->input->post());
            echo "Mapping has been deleted!";die;
        }
    }

    public function getregion(){
        if($this->input->post()){
            $this->ajaxmodel->getregionname($this->input->post('distributor'));
        }
    }

    public function getfilter(){
        $this->ajaxmodel->getFiltersList($this->input->post());
    }

     public function getFiltersfornetpricepercent(){
        $this->ajaxmodel->getFiltersList_for_netpricepercent($this->input->post());
    }

public function getFiltersforpricebebookhistory(){
        $this->ajaxmodel->getFiltersforpricebebookhistory($this->input->post());
    }

    public function default_import_values_operation(){//print_r($this->input->post());die;
        $mode = ($this->input->post('Mode')!='')?$this->input->post('Mode'):'GET';
        switch($mode){
            case 'GET':
                $data = $this->ajaxmodel->getDefaultImportValues($this->input->post());
                $this->load->view('importdefaultajax',$data);
            break;
            case 'POST':
                //$this->ajaxmodel->SaveFixedDefaultValues($this->input->post());
            break;
            case 'ADD':
                //echo "<pre>";print_r($this->input->post());die;
                $this->ajaxmodel->SaveFixedDefaultValues($this->input->post());
            break;
            case 'DEL':
                //echo "<pre>";print_r($this->input->post());die;
                $this->ajaxmodel->DeleteFixedDefaultValues($this->input->post());
            break;
        }

    }


}