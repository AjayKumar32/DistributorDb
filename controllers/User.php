<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public $sectionPriv = array();
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('validated'))
    	{ 
        	redirect('welcome');
    	}
    	//$this->load->library('pagination');
    	$this->load->model('users');
    	$this->load->model('distributors');
    	$this->load->model('reps');
    	$this->load->model('countriesandterritories');
    	$this->load->model('items');
    	$this->load->model('dates');
    	$this->load->model('countriescleanup');  
    	$this->load->model('customerscleanup');
    	$this->load->model('itemscleanup');
    	$this->load->model('currencycleanup');
    	$this->load->model('postransactions');
    	$this->load->model('inventorytransactions');
    	$this->load->model('debittransactions');
    	$this->load->model('currencyexchangerates');
    	$this->load->model('pricebook');
    	$this->load->model('netpricepercent');
    	$this->load->model('pos');
    	$this->load->model('quotes');
    	$this->load->model('debits');
    	$this->load->helper("url");
    	$this->load->model("commissionrates");
    	$this->load->model("distisalestype");
    	$this->load->model("commissions");

    	require_once APPPATH.'third_party/PHPExcel/PHPExcel.php';
        $this->excel = new PHPExcel();
    	$this->sectionPriv = $this->users->getSectionPrivByAction($this->router->fetch_method());
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('home');
		$this->load->view('footer');
	}


	public function profile($msg=null){
		$data['user_profile'] = $this->users->get_user_profile();
		//print_r($data['user_profile']);die;
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('profile', $data);
		$this->load->view('footer');
	}


	public function update_user_profile(){
	  $msg = null; 
	  if($this->input->post()){	 
        $result = $this->users->update_user_profile();
        
        // Now we verify the result
        if(!$result) $this->session->set_flashdata('message_name', '<font color=red>User details not updated.</font><br />'); 
        else $this->session->set_flashdata('message_name', '<font color=green>User details are updated.</font><br />');
        redirect($this->router->class.'/profile');
      }
        $data['user_profile'] = $this->users->get_user_profile();
        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('user_profile', $data);
		$this->load->view('footer');
	}

	public function changepass($msg=null){
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('changepass', $data);
		$this->load->view('footer');
	}	

	public function change_profile_password(){
	if($this->input->post()){	 
        $result = $this->users->update_user_password();
        //print_r($result);die;
        // Now we verify the result
        if($result['status']=='1') {
        	$this->session->set_flashdata('message_name', '<font color=green>'.$result['msg'].'</font><br />'); 
        	redirect($this->router->class.'/profile');
        }	
        else{ 
        	$this->session->set_flashdata('message_name', '<font color=red>'.$result['msg'].'</font><br />');
       	  redirect($this->router->class.'/changepass');
    	}
      }
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('changepass');
		$this->load->view('footer');
	}

	public function logout(){
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    	$this->session->sess_destroy();
    	redirect('welcome');
	}

    // Disti functionalities start
	public function disti()
	{
		//print_r($this->input->post());
		$distributors = $this->distributors->fetch_data();
		$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;

		$data["results"] = $this->distributors->fetch_data($data);
	//	$data['disti_status'] = ($this->input->post('disti_status')=='')?'YES':$this->input->post('disti_status');

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('disti',$data);
		$this->load->view('footer');
	}

	public function disti_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('adddisti', $data);
		$this->load->view('footer');
	}

	public function delete_log()
	{

		$data["results"] = $this->distributors->fetch_deleted_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('deletelog', $data);
		$this->load->view('footer');
	}

	public function load_log()
	{

		$data["results"] = $this->distributors->fetch_loaded_files();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('loadlog', $data);
		$this->load->view('footer');
	}


	public function disti_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["results"] = $this->distributors->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editdisti', $data);
		$this->load->view('footer');
	}

	public function add_distributor(){
		
		$result = $this->distributors->add_distributor();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Distributor details not added.</font><br />';
        else $msg = '<font color=green>Distributor details added.</font><br />';
        $this->disti_add_view($msg);
	}

	public function update_distributor(){
		
		$result = $this->distributors->update_distributor();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Distributor details not update.</font><br />';
        else $msg = '<font color=green>Distributor details updated.</font><br />';
        $this->disti_edit_view($id,$msg);
	}


	public function delete_distributor(){
		if($this->distributors->delete_distributor()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function import_distributor_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importdistributor',$data);
		$this->load->view('footer');
	}

	public function export_distributor()
	{
		
		$query = $this->distributors->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Distributor_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_distributor()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Distributor'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   	
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->distributors->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Distributor' => $data['A'],
                'GP_Cust_Num' => $data['B'],
                'GP_Customer_Name' => $data['C'],
                'GP_Cust_Class' => $data['D'],
                'GP_SalesArea' => $data['E'],
                'GP_Sales_Territory' => $data['F'],
                'GP_Add_Code' => $data['G'],
                'GP_Country' => $data['H'],
                'CRM_Old_Name' => $data['I'],
                'CRM_Name' => $data['J'],
                'Consolidated_Name' => $data['K'],
                'Active' => $data['L'],
                'POS_Report' => $data['M'],
                'Cust_Price_Type' => $data['N'],
                'Calendar' => $data['O'],
                'POS_Currency' => $data['P']
                
        		);
        		$this->distributors->import_distributors($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Distributor details are updated.</font><br />';
        $this->import_distributor_view($msg);
	}

	public function disti_file_mapping_home_view($msg=null)
	{
		$data['msg'] = $msg;
		$data["results"] = $this->distributors->fetch_mapping_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('filemappinghome',$data);
		$this->load->view('footer');
	}


	public function disti_filemapping_view()
	{
		$data['header'] = array();
	    if($this->input->post()){	
		$file_info = pathinfo($_FILES["header_file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'HeaderFile'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["header_file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$header_data	= $objPHPExcel->getActiveSheet()->rangeToArray(
		        'A1:'.$objPHPExcel->getActiveSheet()->getHighestColumn().'1',
		        null,
		        false,
		        false,
		        true
		    );
		    if(!empty($header_data[1])){
		       foreach($header_data[1] as $key=>$header_name){	
  						$data['header'][] = array('header_name'=>$header_name,'header_position'=>$key);
  				}
		    }
    		//echo "<pre>";print_r($data['header']);die;
    		$this->users->insertFileHeader($data['header'],$this->input->post());
    	}
    }		

        $distributors = $this->distributors->fetch_data();
        //echo "<pre>";	print_r($distributors);die;		
        $distributor_list = array();
        $distributor_list[0] = '--Select Disti--';
        foreach($distributors as $distributor){
        	$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
        }
        $data['system_type'] = array('0'=>'--Select File Type--',1=>'Inventory',
        								  2=>'Pos',3=>'Debits');
        $data['distributor_list'] = $distributor_list;
        $data['distributor_id'] =  ($this->uri->segment(4))?$this->uri->segment(4):0;
        $data['file_type'] =  ($this->uri->segment(3))?$this->uri->segment(3):0;
        //$poslist = $this->pos->fetch_data();
        //print_r( $poslist);die;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('distifilemapping',$data);
		$this->load->view('footer');
	}
	
	// Disti Functionalities end

	public function repandsalesperson_view()
	{
		/*
		$config = array();
		$config["base_url"] = base_url() . "user/repandsalesperson_view";
		$total_row = $this->reps->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$config['use_page_numbers'] = TRUE;
		//$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) :1;
		$page = $page-1;
		$data["results"] = $this->reps->fetch_data($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['total_rows'] = $total_row;
		$show = $page*$config["per_page"];
		$data['from_show'] = $show+1;
		$data['to_show'] = $show+$config["per_page"];
		$data['page_no'] = $page;
*/

		$data["results"] = $this->reps->fetch_data();



		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('salesrep',$data);
		$this->load->view('footer');
	}

	public function salesperson_view()
	{

		$data["results"] = $this->reps->fetch_salespersons_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('salesperson',$data);
		$this->load->view('footer');

		
	}


	public function add_rep_salesperson_view($msg=null)
	{
		$data['msg'] = $msg;

		$salespersons = $this->reps->fetch_sales_persons();
		$repclasses = $this->reps->fetch_rep_class();
		//echo "<pre>";print_r($distributors);die;
		$salespersons_list = array("----Select Salesperson -----");
		$repclasses_list = array("----Select Rep Class -----");
		foreach ($salespersons as $key=>$salesperson) {
		  
			$salespersons_list[$salesperson->sales_person] = $salesperson->sales_person;
		
		}
		$data['salespersons_list'] = $salespersons_list;

		foreach ($repclasses as $key=>$repclass) {
		  
			$repclasses_list[$repclass->rep_class] = $repclass->rep_class;
		
		}
		$data['repclasses_list'] = $repclasses_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addrep',$data);
		$this->load->view('footer');
	}

	public function add_salesperson_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addsalesperson',$data);
		$this->load->view('footer');
	}

	public function add_salesperson(){
		
		$result = $this->reps->add_salesperson();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Sales person details not added.</font><br />';
        else $msg = '<font color=green> Sales person details added.</font><br />';
        $this->add_salesperson_view($msg);
	}

	public function add_rep(){
		
		$result = $this->reps->add_rep();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Rep and Sales person details not added.</font><br />';
        else $msg = '<font color=green>Rep and Sales person details added.</font><br />';
        $this->add_rep_salesperson_view($msg);
	}


	public function delete_rep(){
		if($this->reps->delete_rep()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function delete_salesperson(){
		if($this->reps->delete_salesperson()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}



	public function rep_edit_view($id,$msg=null){

		$data['msg'] = $msg;	
		$data['result'] = $this->reps->fetch_data_by_id($id)[0];

		$salespersons = $this->reps->fetch_sales_persons();
		$repclasses = $this->reps->fetch_rep_class();
		//echo "<pre>";print_r($distributors);die;
		
		foreach ($salespersons as $key=>$salesperson) {
		  
			$salespersons_list[$salesperson->sales_person] = $salesperson->sales_person;
		
		}
		$data['salespersons_list'] = $salespersons_list;

		foreach ($repclasses as $key=>$repclass) {
		  
			$repclasses_list[$repclass->rep_class] = $repclass->rep_class;
		
		}
		$data['repclasses_list'] = $repclasses_list;


		//var_dump($data['result'] ); die();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editrep',$data);
		$this->load->view('footer');

	}

	
	public function salesperson_edit_view($id,$msg=null){

		$data['msg'] = $msg;	
		$data['result'] = $this->reps->fetch_data_by_id_salesperson($id)[0];
		//var_dump($data['result'] ); die();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editsalesperson',$data);
		$this->load->view('footer');

	}

	public function update_rep(){

		$result = $this->reps->update_rep();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Rep details not update.</font><br />';
        else $msg = '<font color=green>Rep details updated.</font><br />';
        $this->rep_edit_view($id,$msg);


	}

	public function update_salesperson(){

		$result = $this->reps->update_salesperson();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>salesperson details not update.</font><br />';
        else $msg = '<font color=green>salesperson details updated.</font><br />';
        $this->salesperson_edit_view($id,$msg);


	}


	public function import_rep_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importrep',$data);
		$this->load->view('footer');
	}

	public function export_rep()
	{
		
		$query = $this->reps->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Reps_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_rep()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Rep'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->reps->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Sales_Rep' => $data['A'],
                'Rep_Class' => $data['B'],
                'Sales_Person' => $data['C']
                
        		);
        		$this->reps->import_reps($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Reps details are imported.</font><br />';
        $this->import_rep_view($msg);
	}




	public function salesterritories_view()
	{
		
		$data["results"] = $this->countriesandterritories->fetch_salesTerritory_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('salesterritories',$data);
		$this->load->view('footer');
	}

	public function countries_view()
	{
		
		$data["results"] = $this->countriesandterritories->fetch_countries_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('countries',$data);
		$this->load->view('footer');
	}

	public function add_territories_view($msg=null)
	{
		$data['msg'] = $msg;
		$sales_area_list=array("---Select Sales Area---");
		$salesareas = $this->countriesandterritories->fetch_sales_area_data();
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($salesareas as $key=>$salesareas) {
		  
			$sales_area_list[$salesareas->sales_area] = $salesareas->sales_area;
		
		}
		$data['sales_area_list'] = $sales_area_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addterritories',$data);
		$this->load->view('footer');
	}

	public function add_territories(){
		
		$result = $this->countriesandterritories->add_territories();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Sales Territory details not added.</font><br />';
        else $msg = '<font color=green>Sales Territory details added.</font><br />';
        $this->add_territories_view($msg);
	}

	public function delete_territories(){
		if($this->countriesandterritories->delete_territories()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function add_countries_view($msg=null)
	{
		$data['msg'] = $msg;
		$sales_territory_list=array("---Select Sales Territory---");
		$salesterritories = $this->countriesandterritories->fetch_territories_data();
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($salesterritories as $key=>$salesterritory) {
		  
			$sales_territory_list[$salesterritory->sales_territory] = $salesterritory->sales_territory;
		
		}
		$data['sales_territory_list'] = $sales_territory_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcountries',$data);
		$this->load->view('footer');
	}

	public function add_countries(){
		
		$result = $this->countriesandterritories->add_countries();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Country details not added.</font><br />';
        else $msg = '<font color=green>Country details added.</font><br />';
        $this->add_countries_view($msg);
	}

	public function delete_countries(){
		if($this->countriesandterritories->delete_countries()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	} 

	public function salesterritories_edit_view($id,$msg=null){

		$data['msg']=$msg;
		$data['result']= $this->countriesandterritories->fetch_data_by_id_sales_territory($id)[0];

		$salesareas = $this->countriesandterritories->fetch_sales_area_data();
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($salesareas as $key=>$salesareas) {
		  
			$sales_area_list[$salesareas->sales_area] = $salesareas->sales_area;
		
		}
		$data['sales_area_list'] = $sales_area_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editterritories',$data);
		$this->load->view('footer');

	}

	public function countries_edit_view($id,$msg=null){

		$data['msg']=$msg;
		$data['result']= $this->countriesandterritories->fetch_data_by_id_country($id)[0];

		$territories = $this->countriesandterritories->fetch_territories_data();
		//echo "<pre>";print_r($territories);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($territories as $key=>$territory) {
		  
			$sales_territory_list[trim($territory->sales_territory)] = $territory->sales_territory;
		
		}
		$data['sales_territory_list'] = $sales_territory_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editcountries',$data);
		$this->load->view('footer');

	}

	public function update_territories(){

		$result = $this->countriesandterritories->update_territories();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Territory details not update.</font><br />';
        else $msg = '<font color=green>Territory details updated.</font><br />';
        $this->salesterritories_edit_view($id,$msg);
	}

	public function update_countries(){

		$result = $this->countriesandterritories->update_countries();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Country details not update.</font><br />';
        else $msg = '<font color=green>Country details updated.</font><br />';
        $this->countries_edit_view($id,$msg);
	}

	public function import_countriesandterritories_view($msg=null)
	{
		$data['msg'] = $msg;

		//'<font color=green>Countriesandterritories details are imported.</font>';;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcountriesandterritories',$data);
		$this->load->view('footer');
	}

	public function export_countriesandterritories()
	{
		
		$query = $this->countriesandterritories->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Salesterritories_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_countriesandterritories()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Countriesandterritories'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->countriesandterritories->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Country' => $data['A'],
                'Territory' => $data['B'],
                'Sales_Area' => $data['C']
                
        		);
        		$this->countriesandterritories->import_countriesandterritories($result);        
    		}
    		$this->distributors->insert_load_log(); 
    		
		}	
		$msg = '<font color=green>Countriesandterritories details are imported.</font>';
        $this->import_countriesandterritories_view($msg);
        //redirect('User/import_countriesandterritories_view');

		
	}



	public function items_view()
	{

		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		

		$data['offset']			= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['limit']			= $config['per_page'];
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->items->getTotal($data);
		$data["results"] = $this->items->fetch_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		//$data["results"] = $this->items->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('items',$data);
		$this->load->view('footer');
	}

	public function add_items_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('additems',$data);
		$this->load->view('footer');
	}

	public function add_items(){
		
		$result = $this->items->add_items();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Item details not added.</font><br />';
        else $msg = '<font color=green>Item details added.</font><br />';
        $this->add_items_view($msg);
	}

	public function delete_items(){
		if($this->items->delete_items()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_items($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->items->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('edititems',$data);
		$this->load->view('footer');
			
	} 

	public function update_items(){

		$result = $this->items->update_items();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Item details not update.</font><br />';
        else $msg = '<font color=green>Item details updated.</font><br />';
        $this->edit_items($id,$msg);
	}

	public function import_items_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importitems',$data);
		$this->load->view('footer');
	}

	public function export_items()
	{
		
		$query = $this->items->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Items_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_items()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Items'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		//$this->items->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Item' => $data['A'],
                'Bulk_Output' => $data['B'],
                'Item_No_Pack' => $data['C'],
                'Item_NoCan_NoSL' => $data['D'],
                'Item_NoCan_NoSl_NoPack' => $data['E'],
                'Forecast_Item' => $data['F'],
                'Pack' => $data['G'],
                'Item_Class' => $data['H'],
                'Internal_Class' => $data['I'],
                'Mkt_Family' => $data['J'],
                'First_Segment' => $data['K'],
                'Density' => $data['L'],
                'Package' => $data['M'],
                'CANcode_SLcode' => $data['N'],
                'CANCode' => $data['O'],
                'SLCode' => $data['P'],
                'Die' => $data['Q'],
                'Fab' => $data['R'],
                'Fab_Origin' => $data['S'],
                'Leadtime_Type' => $data['T'],
                'Leadtime' => $data['U']
                
                
        		);
        		$this->items->import_items($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Items details are updated.</font><br />';
        $this->import_items_view($msg);
	}



	public function dates_view()
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		

		$data['offset']			= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['limit']			= $config['per_page'];
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->dates->getTotal($data);
		$data["results"] = $this->dates->fetch_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";


		//$data["results"] = $this->dates->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('dates',$data);
		$this->load->view('footer');
	}

	public function add_dates_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('adddates',$data);
		$this->load->view('footer');
	}

	public function add_dates(){
		
		$result = $this->dates->add_dates();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Date details not added.</font><br />';
        else $msg = '<font color=green>Date details added.</font><br />';
        $this->add_dates_view($msg);
	}

	public function delete_dates(){
		if($this->dates->delete_dates()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_dates($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->dates->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('editdates',$data);
		$this->load->view('footer');
			
	} 

	public function update_dates(){

		$result = $this->dates->update_dates();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Date details not update.</font><br />';
        else $msg = '<font color=green>Date details updated.</font><br />';
        $this->edit_dates($id,$msg);
	}

	public function import_dates_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importdates',$data);
		$this->load->view('footer');
	}

	public function export_dates()
	{
		
		$query = $this->dates->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Dates_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_dates()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Dates'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->dates->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Date' => $data['A'],
                'Year' => $data['B'],
                'WkNum' => $data['C'],
                'MthNum' => $data['D'],
                'QtrNum' => $data['E'],
                'WkAbs' => $data['F'],
                'MthAbs' => $data['G'],
                'QtrAbs' => $data['H'],
                'WkAbsNum' => $data['I'],
                'MthAbsNum' => $data['J'],
                'QtrAbsNum' => $data['K'],
                'WkInMthNum' => $data['L'],
                'WkInMthPer' => $data['M'],
                'WkInMthTot' => $data['N'],
                'WkInQtrNum' => $data['O'],
                'WkInQtrPer' => $data['P'],
                'WkInQtrTot' => $data['Q'],
                'WkInYrNum' => $data['R'],
                'WkInYrPer' => $data['S'],
                'WkInYrTot' => $data['T'],
                'MthInQtrNum' => $data['U'],

                'MthInQtrPer' => $data['V'],
                'MthInQtrTot' => $data['X'],
                'MthInYrNum' => $data['Y'],
                'MthInYrPer' => $data['Z'],
                'MthInYrTot' => $data['AA'],
                'QtrInYrNum' => $data['AB'],
                'QtrInYrPec' => $data['AC'],
                'QtrInYrTot' => $data['AD']
                
                
        		);
        		$this->dates->import_dates($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Dates details are updated.</font><br />';
        $this->import_dates_view($msg);
	}


	public function countriescleanup_view()
	{

		$data["results"] = $this->countriescleanup->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('countriescleanup',$data);
		$this->load->view('footer');
	}

	public function add_countries_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcountriescleanup',$data);
		$this->load->view('footer');
	}

	public function add_countries_cleanup(){
		
		$result = $this->countriescleanup->add_countries_cleanup();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Country cleanup details not added.</font><br />';
        else $msg = '<font color=green>Country cleanup details added.</font><br />';
        $this->add_countries_cleanup_view($msg);
	}

	public function check_for_new_countries(){
		
		$data["results"] = $this->countriescleanup->check_for_new_countries();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addnewcountriescleanup',$data);
		$this->load->view('footer');

	}

	public function delete_countriescleanup(){
		if($this->countriescleanup->delete_countriescleanup()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_countriescleanup($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->countriescleanup->fetch_data_by_id($id)[0];
		//print_r($data['result']);die();

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('editcountriescleanup',$data);
		$this->load->view('footer');
			
	} 

	public function addnew_countriescleanup($id,$table){

		$data['id']=$id;
		$data['table']=$table;
		$data['result']=$this->countriescleanup->fetch_data_by_id_table($id,$table)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('addsnewcountriescleanup',$data);
		$this->load->view('footer');
			
	} 

	public function update_countriescleanup(){

		$result = $this->countriescleanup->update_countries_cleanup();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Countries Cleanup details not updated.</font><br />';
        else $msg = '<font color=green>Countries Cleanup details are updated.</font><br />';
        $this->edit_countriescleanup($id,$msg);
	}

	public function import_countries_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcountriescleanup',$data);
		$this->load->view('footer');
	}

	public function export_countries_cleanup()
	{
		
		$query = $this->countriescleanup->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="CountriesCleanUp_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_countries_cleanup()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Country_Clean'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		//$this->countriescleanup->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'CountryOriginal' => $data['A'],
                'CountryNew' => $data['B']
        		);
        		$this->countriescleanup->import_countries_cleanup($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Countries Cleanup details are updated.</font><br />';
        $this->import_countries_cleanup_view($msg);
	}

	public function customerscleanup_view()
	{
	
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		

		$data['offset']			= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['limit']			= $config['per_page'];
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->customerscleanup->getTotal($data);
		$data["results"] = $this->customerscleanup->fetch_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('customerscleanup',$data);
		$this->load->view('footer');
	}

	public function add_customers_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcustomerscleanup',$data);
		$this->load->view('footer');
	}

	public function add_customers_cleanup(){
		//print_r($this->input->post());die;
		$result = $this->customerscleanup->add_customers_cleanup();

        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Customer cleanup details not added.</font><br />';
        else $msg = '<font color=green>Customer cleanup details added.</font><br />';

        if($this->input->post('mode')=='Ajax'){
			echo json_encode(array('status'=>$result,'msg'=>$msg));	exit;
		}
        $this->add_customers_cleanup_view($msg);
	}

	public function addnew_customerscleanup($id,$type){

		$data['id']=$id;
		$data['type']=$type;
		//$data['table']=$table;
		$data['result']=$this->customerscleanup->fetch_data_by_id_cleanup($id,$type)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('addsnewcustomerscleanup',$data);
		$this->load->view('footer');
			
	} 

	public function check_for_new_customers(){
		
		$data["results"] = $this->customerscleanup->check_for_new_customers();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addnewcustomerscleanup',$data);
		$this->load->view('footer');

	}

	public function delete_customerscleanup(){
		if($this->customerscleanup->delete_customerscleanup()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_customerscleanup($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->customerscleanup->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('editcustomerscleanup',$data);
		$this->load->view('footer');
			
	} 

	public function update_customerscleanup(){

		$result = $this->customerscleanup->update_customers_cleanup();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Customers Cleanup details not update.</font><br />';
        else $msg = '<font color=green>Customers Cleanup details updated.</font><br />';
        $this->edit_customerscleanup($id,$msg);
	}

	public function import_customers_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcustomerscleanup',$data);
		$this->load->view('footer');
	}

	public function import_customers_cleanup()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Customer_Clean'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		//$this->customerscleanup->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'CustomerOriginal' => $data['A'],
                'CustomerNew' => $data['B']
        		);
        		$this->customerscleanup->import_customers_cleanup($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Customers Cleanup details are updated.</font><br />';
        $this->import_customers_cleanup_view($msg);

		

	}

	public function export_customers_cleanup()
	{
		
		$query = $this->customerscleanup->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="CustomersCleanUp_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}


	public function itemscleanup_view()
	{


		$data["results"] = $this->itemscleanup->fetch_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('itemscleanup',$data);
		$this->load->view('footer');
	}

	public function add_items_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('additemscleanup',$data);
		$this->load->view('footer');
	}

	public function add_items_cleanup(){
		
		$result = $this->itemscleanup->add_items_cleanup();
		//print_r($result);die();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Item cleanup details not added.</font><br />';
        else $msg = '<font color=green>Item cleanup details added.</font><br />';
        $this->add_items_cleanup_view($msg);
	}

	public function addnew_itemscleanup($id,$table){ 

		$data['id']=$id;
		$data['table']=$table;
		$data['result']=$this->itemscleanup->fetch_data_by_id_table($id,$table)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('addsnewitemscleanup',$data);
		$this->load->view('footer');
			
	} 

	public function check_for_new_items(){
		
		$data["results"] = $this->itemscleanup->check_for_new_items();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addnewitemscleanup',$data);
		$this->load->view('footer');

	}

	public function delete_itemscleanup(){
		if($this->itemscleanup->delete_itemscleanup()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_itemscleanup($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->itemscleanup->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('edititemscleanup',$data);
		$this->load->view('footer');
			
	} 

	public function update_itemscleanup(){

		$result = $this->itemscleanup->update_items_cleanup();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Items Cleanup details not update.</font><br />';
        else $msg = '<font color=green>Items Cleanup details updated.</font><br />';
        $this->edit_itemscleanup($id,$msg);
	}

	public function import_items_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importitemscleanup',$data);
		$this->load->view('footer');
	}

	public function import_items_cleanup()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Items_Clean'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->itemscleanup->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'ItemOriginal' => $data['A'],
                'ItemNew' => $data['B']
        		);
        		$this->itemscleanup->import_items_cleanup($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Items Cleanup details are updated.</font><br />';
        $this->import_items_cleanup_view($msg);

	}

	public function export_items_cleanup()
	{
		
		$query = $this->itemscleanup->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ItemsCleanUp_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}



	public function currencycleanup_view()
	{

		$data["results"] = $this->currencycleanup->fetch_data();


		//echo "<pre>"; print_r($data["results"]);die();
		//echo "<pre>"; print_r(!empty($data["results"]));die();


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('currencycleanup',$data);
		$this->load->view('footer');
	}

	public function currency_view()
	{

		$data["results"] = $this->currencycleanup->fetch_currency_data();


		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('currency',$data);
		$this->load->view('footer');
	}

	public function add_currency_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;

		$currency_list=array("---Select Currency---");
		$currencies = $this->currencycleanup->fetch_currency_data();
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($currencies as $key=>$currency) {
		  
			$currency_list[$currency->currency] = $currency->currency;
		
		}
		$data['currency_list'] = $currency_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcurrencycleanup',$data);
		$this->load->view('footer');
	}

	public function add_currency_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcurrency',$data);
		$this->load->view('footer');
	}

	public function add_currency_cleanup(){
		
		$result = $this->currencycleanup->add_currency_cleanup();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Currency cleanup details not added.</font><br />';
        else $msg = '<font color=green> Currency cleanup details added.</font><br />';
        $this->add_currency_cleanup_view($msg);
	}

	public function add_currency(){
		
		$result = $this->currencycleanup->add_currency();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Currency details not added.</font><br />';
        else $msg = '<font color=green> Currency details added.</font><br />';
        $this->add_currency_view($msg);
	}


	public function addnew_currencycleanup($id,$table,$type){

		$data['id']=$id;
		$data['table']=$table;
		$data['type']=$type;
		$data['result']=$this->currencycleanup->fetch_data_by_id_table($id,$table,$type)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		
		$this->load->view('addsnewcurrencycleanup',$data);
		$this->load->view('footer');
			
	} 

	public function check_for_new_currency(){
		
		$data["results"] = $this->currencycleanup->check_for_new_currency();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addnewcurrencycleanup',$data);
		$this->load->view('footer');

	}


	public function delete_currencycleanup(){
		if($this->currencycleanup->delete_currencycleanup()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function delete_currency(){
		if($this->currencycleanup->delete_currency()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function edit_currencycleanup($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->currencycleanup->fetch_data_by_id($id)[0];

		$currency_list=array("---Select Currency---");
		$currencies = $this->currencycleanup->fetch_currency_data();
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		
		foreach ($currencies as $key=>$currency) {
		  
			$currency_list[$currency->currency] = $currency->currency;
		
		}
		$data['currency_list'] = $currency_list;


		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('editcurrencycleanup',$data);
		$this->load->view('footer');
			
	} 

	public function edit_currency($id,$msg=null){

		$data['msg']=$msg;
		$data['result']=$this->currencycleanup->fetch_currency_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('editcurrency',$data);
		$this->load->view('footer');
			
	} 

	public function update_currencycleanup(){

		$result = $this->currencycleanup->update_currency_cleanup();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Currency Cleanup details not update.</font><br />';
        else $msg = '<font color=green>Currency Cleanup details updated.</font><br />';
        $this->edit_currencycleanup($id,$msg);
	}

	public function update_currency(){

		$result = $this->currencycleanup->update_currency();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Currency  details not update.</font><br />';
        else $msg = '<font color=green>Currency  details updated.</font><br />';
        $this->edit_currency($id,$msg);
	}

	public function import_currency_cleanup_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcurrencycleanup',$data);
		$this->load->view('footer');
	}

	public function import_currency_cleanup()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);

		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Currency_Clean'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		//$this->currencycleanup->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'CurrencyOriginal' => $data['A'],
                'CurrencyNew' => $data['B'],
                'Currency_Decription' => $data['B']
        		);
        		$this->currencycleanup->import_currency_cleanup($result);        
    		}
    		$this->distributors->insert_load_log(); 
		}

		$msg = '<font color=green>Currency Cleanup details are updated.</font><br />';
        $this->import_currency_cleanup_view($msg);

	}

	public function export_currency_cleanup()
	{
		
		$query = $this->currencycleanup->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="CurrencyCleanUp_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function debitsapprovalrejectionreasons_view()
	{

		$data["results"] = $this->debits->fetch_debitsrejectionreasons_data();


		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitsrejectionreasons',$data);
		$this->load->view('footer');
	}

	public function add_debitsapprovalrejectionreasons_view($msg=null)
	{
		$data['msg'] = $msg;
		

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('adddebitsrejectionreasons',$data);
		$this->load->view('footer');
	}

	public function add_debitsapprovalrejectionreasons(){
		
		$result = $this->debits->add_debitsapprovalrejectionreasons();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Reason not added.</font><br />';
        else $msg = '<font color=green>Reason added.</font><br />';
        $this->add_debitsapprovalrejectionreasons_view($msg);
	}

	public function delete_debitsapprovalrejectionreasons(){
		if($this->debits->delete_debitsapprovalrejectionreasons()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	} 



	public function postransactions_view()
	{
		$data = array();
		$data = $this->users->prepareCommonFiltersData($this->input->post(),$this->uri->segment_array());//Pass Segment array here later
		// /echo "<pre>";print_r($data);die;
		$Total = $this->postransactions->get_total($data);
		$pagination = $this->users->getPagination($Total,$this->router->class,$this->router->method,$data,$this->uri->segment_array());
		$data = array_merge($data,$pagination);
		//echo "<pre>";print_r($data);die;
		$data["results"] = $this->postransactions->fetch_data($data);
		
		//echo "<pre>";print_r($data);die();
		$distributors = $this->distributors->fetch_data();
		$financialyears = $this->ajaxmodel->createFinancialYearDropdown();
		//echo "<pre>";print_r($distributors);die;
		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');

		if ($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;
		$data['years_list'] = $financialyears['Years'];
		$data['months_list'] = $financialyears['Months'];
		$data['quarter_list'] = $financialyears['Quarters'];
		//echo "<pre>";print_r($data);
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('postransactions',$data);
		$this->load->view('footer');
	}

	public function pos_load_view()
	{
		$data["results"] = $this->postransactions->fetch_posload_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('posload',$data);
		$this->load->view('footer');
	}

	public function pos_load_history_view()
	{
		$data["results"] = $this->postransactions->fetch_posload_history_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('posloadhistory',$data);
		$this->load->view('footer');
	}


	public function pos_cleaned_view()
	{
		$data["results"] = $this->postransactions->fetch_poscleaned_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('poscleaned',$data);
		$this->load->view('footer');
	}

	public function pos_cleaned_history_view()
	{
		$data["results"] = $this->postransactions->fetch_poscleaned_history_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('poscleanedhistory',$data);
		$this->load->view('footer');
	}

	public function add_postransaction_view($msg=null)
	{

		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();
		foreach ($distributors as $key=>$distributor) {
			if ($distributor->Sales_Territory!=''){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addpostransactions',$data);
		$this->load->view('footer');
	}

	public function add_postransaction(){
		
		$result = $this->postransactions->add_postransactions();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>POS Transaction details not added.</font><br />';
        else $msg = '<font color=green> POS Transaction details added.</font><br />';
        $this->add_postransaction_view($msg);
	}

	public function delete_postransactions(){
		if($this->postransactions->delete_postransaction()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function pos_delete_log()
	{

		$data["results"] = $this->postransactions->fetch_deleted_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('posdeletelog', $data);
		$this->load->view('footer');
	}

	public function pos_load_log()
	{

		$data["results"] = $this->postransactions->fetch_loaded_files();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('posloadlog', $data);
		$this->load->view('footer');
	}


	public function edit_postransactions($id,$msg=null){

		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
		//echo "<pre>"; print_r($distributors);die();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();


		foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;

		//$data['msg']=$msg;
		$data['result']=$this->postransactions->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('editpostransactions',$data);
		$this->load->view('footer');
			
	} 

	public function update_postransactions(){

		$result = $this->postransactions->update_postransactions();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>POS details not update.</font><br />';
        else $msg = '<font color=green>POS details updated.</font><br />';
        $this->edit_postransactions($id,$msg);
	}

	public function import_postransactions_view($msg=null)
	{
		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
		//echo "<pre>"; print_r($distributors);die();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();


		foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importpostransactions',$data);
		$this->load->view('footer');
	}

	public function import_postransactions()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//echo "<pre>";print_r($file_info);die();

		$DISTRIBUTOR = $this->input->post("distributor");
		$sales_territory = $this->input->post("sales_territory");
		$sales_region = $this->input->post("sales_region");
		$report_date_adesto = $this->input->post("report_date_adesto");
		//echo "<pre>";print_r($DISTRIBUTOR);die();

		$distributorTemplate = array();

		if($DISTRIBUTOR!=''){
			$this->load->model('ajaxmodel');

			$distributorTemplate = $this->ajaxmodel->getDistributorTemplate(array('system_type'=>2,'distributor_list'=>$DISTRIBUTOR));

			$importsetting = $this->ajaxmodel->getImportSetting(array('system_type'=>2,'distributor'=>$DISTRIBUTOR));
		}

		

		$file_directory = APPPATH."uploads/";
		$new_file_name = 'POS'.date("m-d-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);//?
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

    		$mappedtemplate = array();
    		$start_header_count = (isset($importsetting['start_header_count']))?$importsetting['start_header_count']:1;
    		$i=$start_header_count;
    		//$this->debittransactions->insert_load_log(array($start_header_count));
    		$rowcount=1;

    		//$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($rowcount>=$i){
	    			if($rowcount==$i) {

    				$mappedtemplate = $this->ajaxmodel->matchingTemplateWIthData($distributorTemplate['CrossMap'],$data);
    				$rowcount++;
    				continue;
    			}
    			if (!empty($mappedtemplate)){
    				
    				foreach ($mappedtemplate as $field => $column) {
    					$result[$field] = $data[$column];
    					if(strpos(strtoupper($field),'DATE')!==false && $result[$field]!=''){
    							$result[$field] = date('Y-m-d',strtotime($result[$field]));	
    					}
    				}
    			}
    				//$this->debittransactions->insert_load_log($result);
    			else{

        		$result = array(
                'Country'=>$data['C'],
                //'ReportDate' => $data['C'],
                'InvoiceDate' => $data['D'],
                'InvoiceNum' => $data['E'],
                'EndCust' => $data['F'],
                'PurchCust' => $data['G'],
                'PurchCustCity' => $data['H'],
                'PurchCustState' => $data['I'],
                'PurchCustZip' => $data['J'],
                'PurchCustCountry' => $data['K'],
                'End_Purch_Direct' => $data['L'],
                'Item' => $data['M'],
                'CustPartNumber' => $data['N'],
                'Quantity' => $data['O'],
                'DBC_Currency' => $data['P'],
                'DBC_Curr_Exch' => $data['Q'],
                'DBC_Unit_Orig' => $data['R'],
                'DBC_Unit_USD' => $data['S'],
                'DBC_Ext_USD' => $data['T'],
                'Debited_Cost_Currency' => $data['U'],
                'Debited_Cost_Curr_Exch' => $data['V'],
                'Debited_Cost_Unit_Orig' => $data['W'],
                'Debited_Cost_Unit_USD' => $data['X'],
                'Debited_Cost_Ext_USD' => $data['Y'],
                'Resale_Currency' => $data['Z'],
                'Resale_Curr_Exch' => $data['AA'],
                'Resale_Unit_Origin' => $data['AB'],
                'Resale_Unit_USD' => $data['AC'],
                'Resale_Ext_USD' => $data['AD']
                //'Debit_Percent' => $data['AE']

        		);
        	}

        		$result['Distributor'] = $DISTRIBUTOR;
        		$result['sales_territory'] = str_replace('_',' ',$sales_territory);
        		$result['sales_region'] = str_replace('_',' ',$sales_region);
				$result['report_date_adesto'] = ($report_date_adesto!='')?$report_date_adesto:date('Y-m-d');	
				$result['file_name'] = $_FILES["file"]["name"];
				$result['uploaded_by'] =  $this->session->userdata('fname');
				//echo "<pre>";print_r($result); die();
        		$result['Load_date'] =  date('Y-m-d');
        		$result['Country'] = $importsetting['Country'];

        		$default_values= $this->ajaxmodel->getDefaultImportValues(array('system_type'=>2,'distributor'=>$DISTRIBUTOR));
        	  	//echo "<pre>";print_r($default_values);die();

        	  	if(isset($default_values['DefaultValues']) && !empty($default_values['DefaultValues'])){

        	  		$result = array_merge($result,$default_values['DefaultValues']);
        	  	}

        	$this->postransactions->import_postransactions($result);        
    		}
    		$rowcount++;
    		
		}
		$this->postransactions->insert_load_log($file_info,$DISTRIBUTOR,$report_date_adesto);

		$msg = '<font color=green>Pos details are added to the POS Load table.</font><br />';
        $this->import_postransactions_view($msg);
     
	}
}
	

	public function export_postransactions()
	{
		
		$query = $this->postransactions->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pos_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function clean_pos()
	{
		$result = $this->postransactions->clean_pos();
        $msg = null;
       
        if(!$result) $msg = '<font color=red>POS records not cleaned.</font><br />';
        else $msg = '<font color=green>POS records cleaned.</font><br />';
        $this->import_postransactions_view($msg);
	}

	public function calculate_pos()
	{
		
		$result = $this->postransactions->calculate_pos();
        $msg = null;
       
        if(!$result) $msg = '<font color=red>POS records not calculated.</font><br />';
        else $msg = '<font color=green>POS records calculated.</font><br />';
        $this->import_postransactions_view($msg);
	}



	public function inventorytransactions_view()
	{
		$data = array();
		$data = $this->users->prepareCommonFiltersData($this->input->post(),$this->uri->segment_array());//Pass Segment array here later

		$Total = $this->inventorytransactions->get_total($data);
		//echo "<pre>";print_r($data);die;
		$pagination = $this->users->getPagination($Total,$this->router->class,$this->router->method,$data,$this->uri->segment_array());
		$data = array_merge($data,$pagination);
		//echo "<pre>";print_r($data);die;
		$data["results"] = $this->inventorytransactions->fetch_data($data);
		$distributors = $this->distributors->fetch_data();
		$financialyears = $this->ajaxmodel->createFinancialYearDropdown();
		//echo "<pre>";print_r($distributors);die;
		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');

		if($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;
		$data['years_list'] = $financialyears['Years'];
		$data['months_list'] = $financialyears['Months'];
		$data['quarter_list'] = $financialyears['Quarters'];

		//$data["results"] = $this->inventorytransactions->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventorytransactions',$data);
		$this->load->view('footer');
	}

	public function inventory_load_view()
	{
		$data["results"] = $this->inventorytransactions->fetch_inventoryload_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventoryload',$data);
		$this->load->view('footer');
	}

	public function inventory_load_history_view()
	{
		$data["results"] = $this->inventorytransactions->fetch_inventoryload_history_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventoryloadhistory',$data);
		$this->load->view('footer');
	}


	public function inventory_cleaned_view()
	{
		$data["results"] = $this->inventorytransactions->fetch_inventorycleaned_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventorycleaned',$data);
		$this->load->view('footer');
	}

	public function inventory_cleaned_history_view()
	{
		$data["results"] = $this->inventorytransactions->fetch_inventorycleaned_history_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventorycleanedhistory',$data);
		$this->load->view('footer');
	}


	public function add_inventorytransaction_view($msg=null)
	{
		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();
		foreach ($distributors as $key=>$distributor) {
			if ($distributor->Sales_Territory!=''){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addinventorytransactions',$data);
		$this->load->view('footer');
	}

	public function add_inventorytransactions(){
		
		$result = $this->inventorytransactions->add_inventorytransactions();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Inventory Transaction details not added.</font><br />';
        else $msg = '<font color=green> Inventory Transaction details added.</font><br />';
        $this->add_inventorytransaction_view($msg);
	}

	public function delete_inventorytransactions(){
		if($this->inventorytransactions->delete_inventorytransactions()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function inventory_delete_log()
	{

		$data["results"] = $this->inventorytransactions->fetch_deleted_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventorydeletelog', $data);
		$this->load->view('footer');
	}

	public function inventory_load_log()
	{

		$data["results"] = $this->inventorytransactions->fetch_loaded_files();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('inventoryloadlog', $data);
		$this->load->view('footer');
	}

	public function edit_inventorytransactions($id,$msg=null){

		$data['msg']=$msg;
		$distributors = $this->distributors->fetch_data();
		//echo "<pre>"; print_r($distributors);die();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();


		foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;

		//$data['msg']=$msg;
		$data['result']=$this->inventorytransactions->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('editinventorytransactions',$data);
		$this->load->view('footer');
			
	} 
	/**
	@name : update_inventorytransactions
	@params: No params
	@return: No retun
	@desc: This method controlls the Update inventory  transactions and send response to the view
	@call: editinvenorytransactions view
	**/

	public function update_inventorytransactions(){

		$result = $this->inventorytransactions->update_inventorytransactions();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Inventory details not update.</font><br />';
        else $msg = '<font color=green>Inventory details updated.</font><br />';
        $this->edit_inventorytransactions($id,$msg);
	}

	public function import_inventorytransactions_view($msg=null)
	{
		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
        $distributor_list = array();
        $sales_territory=array();
		$sales_region=array();

        foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importinventorytransactions',$data);
		$this->load->view('footer');
	}

	public function import_inventorytransactions()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//echo"<pre>";print_r($file_info);die();
		$DISTRIBUTOR  = $this->input->post("distributor");
		$sales_territory = $this->input->post("sales_territory");
		$sales_region = $this->input->post("sales_region");
		$report_date_adesto = $this->input->post("report_date_adesto");

		$distributorTemplate = array();
		if($DISTRIBUTOR!=''){
			$this->load->model('ajaxmodel');

			$distributorTemplate = $this->ajaxmodel->getDistributorTemplate(array('system_type'=>1,'distributor_list'=>$DISTRIBUTOR));
			$importsetting = $this->ajaxmodel->getImportSetting(array('system_type'=>1,'distributor'=>$DISTRIBUTOR));
		}
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Inventory'.date("m-d-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$start_header_count = (isset($importsetting['start_header_count']))?$importsetting['start_header_count']:1;
    		$i=$start_header_count;
    		//$this->debittransactions->insert_load_log(array($start_header_count));
    		$rowcount=1;
    		//$i=0;//echo "<pre>";print_r($sheet_data);die;
    		foreach($sheet_data as $data)
    		{
    			if($rowcount>=$i){
	    			if($rowcount==$i) {
    				
    				$mappedtemplate = $this->ajaxmodel->matchingTemplateWIthData($distributorTemplate['CrossMap'],$data);
    				$rowcount++;
    				continue;
    			}
    			if (!empty($mappedtemplate)){
    				
    				foreach ($mappedtemplate as $field => $column) {
    					$result[$field] = $data[$column];
    					if(strpos(strtoupper($field),'DATE')!==false && $result[$field]!=''){
    							$result[$field] = date('Y-m-d',strtotime($result[$field]));	
    					}
    				}
    				//$this->debittransactions->insert_load_log($result);
    			}else{
        		$result = array(
                //'ReportDate' => $data['C'],//taken from c index, can be changed to A
                'ItemOriginal' => $data['D'],
                'CustPartNumber' => $data['E'],
                'Quantity' => $data['F'],
                'DBC_Currency' => $data['G'],
                'DBC_Curr_Exch' => $data['H'],
                'DBC_Unit_Orig' => $data['I'],
                'DBC_Unit_USD' => $data['J'],
                'DBC_Ext_USD' => $data['K'],
                'Debited_Cost_Currency' => $data['L'],
                'Debited_Cost_Curr_Exch' => $data['M'],
                'Debited_Cost_Unit_Orig' => $data['N'],
                'Debited_Cost_Unit_USD' => $data['O'],
                'Debited_Cost_Ext_USD' => $data['P']
        		);
        	  }


				$result['Distributor'] = $DISTRIBUTOR;
				$result['sales_territory'] = str_replace('_',' ',$sales_territory);
        		$result['sales_region'] = str_replace('_',' ',$sales_region);
				$result['report_date_adesto'] = ($report_date_adesto!='')?$report_date_adesto:date('Y-m-d');
				$result['file_name'] = $_FILES["file"]["name"];
				$result['uploaded_by'] =  $this->session->userdata('fname');
				$result['Load_Date'] =date('Y-m-d');
				$default_values= $this->ajaxmodel->getDefaultImportValues(array('system_type'=>1,'distributor'=>$DISTRIBUTOR));
        	  	//echo "<pre>";print_r($default_values);die();

        	  	if(isset($default_values['DefaultValues']) && !empty($default_values['DefaultValues'])){

        	  		$result = array_merge($result,$default_values['DefaultValues']);
        	  	}
        		$this->inventorytransactions->import_inventorytransactions($result);        
    		}
    		$rowcount++;
    		
		}
		$this->inventorytransactions->insert_load_log($file_info,$DISTRIBUTOR,$report_date_adesto); 

		$msg = '<font color=green>Inventory records are added to the inventory load table.</font><br />';
        $this->import_inventorytransactions_view($msg);


	}
	}

	public function export_inventorytransactions()
	{
		
		$query = $this->inventorytransactions->get_data($this->input->get());
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Inventory_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function clean_inventory()
	{

		$result = $this->inventorytransactions->clean_inventory();
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Inventory records not cleaned.</font><br />';
        else $msg = '<font color=green>Inventory records cleaned.</font><br />';
        $this->import_inventorytransactions_view($msg);
	}

	public function calculate_inventory()
	{
		$result = $this->inventorytransactions->calculate_inventory();
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Inventory records not calculated.</font><br />';
        else $msg = '<font color=green>Inventory records calculated.</font><br />';
        $this->import_inventorytransactions_view($msg);
	}



	public function debitstransactions_view()
	{
		$data = array();
		$data = $this->users->prepareCommonFiltersData($this->input->post(),$this->uri->segment_array());//Pass Segment array here later
		$Total=$this->debittransactions->get_total($data);
		$pagination = $this->users->getPagination($Total,$this->router->class,$this->router->method,$data,$this->uri->segment_array());
		$data=array_merge($data,$pagination);
		//echo "<pre>";print_r($data);die;
		$data["results"] = $this->debittransactions->fetch_data($data);
		$distributors = $this->distributors->fetch_data();
		$financialyears = $this->ajaxmodel->createFinancialYearDropdown();
		//echo "<pre>";print_r($distributors);die;
		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');

		if ($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;
		$data['years_list'] = $financialyears['Years'];
		$data['months_list'] = $financialyears['Months'];
		$data['quarter_list'] = $financialyears['Quarters'];
		//$data["results"] = $this->debittransactions->fetch_data();
		//echo "<pre>";print_r($data); die();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitstransactions',$data);
		$this->load->view('footer');
	}

	public function debits_load_view()
	{
		$data["results"] = $this->debittransactions->fetch_debitsload_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitsload',$data);
		$this->load->view('footer');
	}

	public function debits_load_history_view()
	{
		$data["results"] = $this->debittransactions->fetch_debitsload_history_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitsloadhistory',$data);
		$this->load->view('footer');
	}

	public function add_debittransaction_view($msg=null)
	{
		$data['msg'] = $msg;
		$distributors = $this->distributors->fetch_data();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();
		foreach ($distributors as $key=>$distributor) {
			if ($distributor->Sales_Territory!=''){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('adddebitstransactions',$data);
		$this->load->view('footer');
	}

	public function add_debittransactions(){
		
		$result = $this->debittransactions->add_debittransactions();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Debit Transaction details not added.</font><br />';
        else $msg = '<font color=green> Debit Transaction details added.</font><br />';
        $this->add_debittransaction_view($msg);
	}

	public function delete_debittransactions(){
		if($this->debittransactions->delete_debittransactions()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function debits_delete_log()
	{

		$data["results"] = $this->debittransactions->fetch_deleted_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitsdeletelog', $data);
		$this->load->view('footer');
	}

	public function debits_load_log()
	{

		$data["results"] = $this->debittransactions->fetch_loaded_files();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitsloadlog', $data);
		$this->load->view('footer');
	}

	public function edit_debittransactions($id,$msg=null){

		$data['msg']=$msg;
		$distributors = $this->distributors->fetch_data();
		//echo "<pre>"; print_r($distributors);die();
		$distributor_list=array();
		$sales_territory=array();
		$sales_region=array();


		foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;

		//$data['msg']=$msg;

		$data['result']=$this->debittransactions->fetch_data_by_id($id)[0];

		$this->load->view('header');
		$this->load->view('sidebar');
		//var_dump($data); die();
		$this->load->view('editdebittransactions',$data);
		$this->load->view('footer');
			
	} 

	public function update_debittransactions(){

		$result = $this->debittransactions->update_debittransactions();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Debit details not update.</font><br />';
        else $msg = '<font color=green>Debit details updated.</font><br />';
        $this->edit_debittransactions($id,$msg);
	}

	public function import_debittransactions_view($msg=null)
	{
		$data['msg'] = $msg;

		$distributor_list=array();

		$distributors=$this->distributors->fetch_data();

		//echo "<pre>"; print_r($Distributors); die();

		$sales_territory=array();
		$sales_region=array();


		foreach ($distributors as $key=>$distributor) {
			if ($key == 0){
			$sales_territory[$distributor->Sales_Territory] = $distributor->Sales_Territory;
			$sales_region[$distributor->Sales_Area] = $distributor->Sales_Area;
		}

			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
		//echo "<pre>"; print_r($distributor_list);die();
		$data['distributor_list'] = $distributor_list;
		$data['sales_territory'] = $sales_territory;
		$data['sales_region'] = $sales_region;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importdebittransactions',$data);
		$this->load->view('footer');
	}

	public function import_debittransactions()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);

		$DISTRIBUTOR=$this->input->post('distributor');
		$sales_territory = $this->input->post("sales_territory");
		$sales_region = $this->input->post("sales_region");
		$report_date_adesto = $this->input->post("report_date_adesto");

		$distributorTemplate = array();

		if ($DISTRIBUTOR!=''){
			$this->load->model('ajaxmodel');

			$distributorTemplate = $this->ajaxmodel->getDistributorTemplate(array('system_type'=>3,'distributor_list'=>$DISTRIBUTOR));
			$importsetting = $this->ajaxmodel->getImportSetting(array('system_type'=>3,'distributor'=>$DISTRIBUTOR));
			
		}

		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Debits'.date("m-d-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$mappedtemplate = array();
    		$start_header_count = (isset($importsetting['start_header_count']))?$importsetting['start_header_count']:0;
    		$i=$start_header_count;
    		//$this->debittransactions->insert_load_log(array($start_header_count));
    		$rowcount=1;
    		foreach($sheet_data as $data)
    		{
    			if($rowcount>=$i){
	    			if($rowcount==$i) {    				
	    				//$i=$i+1;
	    				//$this->debittransactions->insert_load_log($sheet_data);
	    				//$this->debittransactions->insert_load_log($data);
	    				$mappedtemplate = $this->ajaxmodel->matchingTemplateWIthData($distributorTemplate['CrossMap'],$data);
	    				$rowcount++;
	    				continue;
	    			}
    			if (!empty($mappedtemplate)){
    				
    				foreach ($mappedtemplate as $field => $column) {
    					$result[$field] = $data[$column];
    					if(strpos(strtoupper($field),'DATE')!==false && $result[$field]!=''){
    							$result[$field] = date('Y-m-d',strtotime($result[$field]));	
    					}
    				}
    				//$this->debittransactions->insert_load_log($result);
    			}else
    			{
	        		$result = array(
	                
	                
	            	'report_date' => $data['C'],
	            	//'date_added' => $data['D'],
	            	'debit_memo' => $data['E'],
	            	'memo_date' => $data['F'],

	            	'branch_code' => $data['G'],
	            	'claim_date' => $data['H'],
	            	'Authorized_debit_number' => $data['I'],
	            	'invoice' => $data['J'],
	            	'line_number' => $data['K'],
	            	'part_number' => $data['L'],

	            	 'ship_date' => $data['M'],
	            	'resale' => $data['N'],
	            	'book_cost' => $data['O'],
	            	'approved_new' => $data['P'],
	            	'quantity' => $data['Q'],
	            	'total_credit_due' => $data['R']
	                
	        		);
        		}
        		$result['Distributor'] = $DISTRIBUTOR;
        		$result['sales_territory'] = str_replace('_',' ',$sales_territory);
        		$result['sales_region'] = str_replace('_',' ',$sales_region);
				$result['report_date_adesto'] = ($report_date_adesto!='')?$report_date_adesto:date('Y-m-d');
				$result['file_name'] = $_FILES["file"]["name"];
				$result['uploaded_by'] =  $this->session->userdata('fname');
				$result['Load_date'] =  date('Y-m-d');

				$default_values= $this->ajaxmodel->getDefaultImportValues(array('system_type'=>3,'distributor'=>$DISTRIBUTOR));
        	  	//echo "<pre>";print_r($default_values);die();

        	  	if(isset($default_values['DefaultValues']) && !empty($default_values['DefaultValues'])){

        	  		$result = array_merge($result,$default_values['DefaultValues']);
        	  	}

        		$this->debittransactions->import_debittransactions($result); 
        	  }
        		$rowcount++;	 
        	}      
    		
    		$this->debittransactions->insert_load_log($file_info,$DISTRIBUTOR,$report_date_adesto);
		}

		$msg = '<font color=green>Debits records are added to the Debits Load table.</font><br />';
        $this->import_debittransactions_view($msg);


	}

	public function export_debittransactions()
	{
		
		$query = $this->debittransactions->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Debits_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function clean_debits()
	{

		$result = $this->debittransactions->clean_debits();
        $msg = null;
       
        if(!$result) $msg = '<font color=red>Debit records not cleaned.</font><br />';
        else $msg = '<font color=green>Debit records cleaned.</font><br />';
        $this->import_debittransactions_view($msg);
	}

	

	public function currencyexchangerates_view($msg=null)
	{
		$data["results"] = $this->currencyexchangerates->fetch_data();
		$data["msg"] = $msg;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('currencyexchangerates',$data);
		$this->load->view('footer');
	}

	public function currencyexchangerates_history($msg=null)
	{

		$data = $this->users->prepareCommonFiltersData($this->input->post());
		
		$data["msg"] = $msg;


		$currencies = $this->currencyexchangerates->fetch_history_filters();
		$currency = array('All'=>'--Select Currency--');
		$currency_date = array('All'=>'--Select Currency Date--');
		//echo "<pre>";print_r($distributors);die;
		//$sales_area_list=array('0'=>'--Select Sales Area--');
		if ($currencies){
		
		foreach ($currencies as $key=>$Currency) {
		  
			$currency[$Currency->base_currency] = $Currency->base_currency;
			$currency_date[$Currency->currency_date_time] = $Currency->currency_date_time;
		
		}
	}
		$data['currencies_list'] = $currency;
		$data['date_list'] = $currency_date;

		$data["results"] = $this->currencyexchangerates->fetch_history_data($data);



		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('currencyexchangerates_history',$data);
		$this->load->view('footer');
	}

	public function add_currencyexchangerates_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcurrencyexchangerates',$data);
		$this->load->view('footer');
	}

	public function add_currencyexchangerates(){
		
		$result = $this->currencyexchangerates->add_currencyexchangerates();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Currency Exchnage details not added.</font><br />';
        else $msg = '<font color=green> Currency Exchnage details added.</font><br />';
        $this->add_currencyexchangerates_view($msg);
	}

	public function delete_currencyexchangerates(){
		if($this->currencyexchangerates->delete_currencyexchangerates()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function update_currencyexchangerates(){
		
		$this->currencyexchangerates->empty_table();
		$exchange_date = ($this->input->post('date')!='')?date('Y-m-d',strtotime($this->input->post('date'))):date('Y-m-d');
		//print_r($exchange_date);die();

		$data = file_get_contents('https://www.oanda.com/rates/api/v2/rates/spot.json?api_key=SlbL43frrGI3gmCuyudCihhB&base=AUD&base=BGN&base=BYR&base=CAD&base=CHF&base=CNY&base=CZK&base=DKK&base=EUR&base=GBP&base=HKD&base=HUF&base=ILS&base=JPY&base=KRW&base=NOK&base=PLN&base=RON&base=RUB&base=SEK&base=TRY&base=UAH&base=USD&base=ZAR&base=HRK&quote=USD&date_time='.$exchange_date);
		//echo "<pre>"; print_r($data);die();	
		$data = json_decode($data);
		//echo "<pre>"; print_r($data);die();	
		foreach ($data as $rarray) {
			if(is_array($rarray)){
				foreach ($rarray as $r) {
						$result = array(
                			'base_currency' => $r->base_currency,
                			'quote_currency' => $r->quote_currency,
                			'currency_date_time' => $exchange_date,
                			'currency_bid' => $r->bid,
                			'currency_ask' => $r->ask,
                			'currency_exchange' => $r->midpoint 
        				);
        				//print_r($result);die;
        				$this->currencyexchangerates->add_currencyexchangerates_from_api($result); 
				}
		    }
	    }
	    $this->currencyexchangerates->add_currencyexchangerates_null_row();

	    $this->currencyexchangerates_view('<font color=green> Currency Exchnage details updated.</font><br />');
	}

	public function import_currencyexchangerates_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcurrencyexchangerates',$data);
		$this->load->view('footer');
	}

	public function import_currencyexchangerates()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);

		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Currencyexchangerates_'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->currencyexchangerates->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Currency' => $data['A'],
                'Currency_Exchange' => $data['B']
                
                
        		);
        		$this->currencyexchangerates->import_currencyexchangerates($result);        
    		}
		}

		$msg = '<font color=green>Currencyexchangerates are updated.</font><br />';
        $this->import_currencyexchangerates_view($msg);


	}

	public function export_currencyexchangerates()
	{
		
		$query = $this->currencyexchangerates->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Currencyexchangerates_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}


	
	public function netpricepercent_view()
	{


		//$data["results"] = $this->netpricepercent->fetch_data();


		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] = 10;
				

		$data['offset']			= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['customer']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['Item']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : 'All';
		$data['limit']			= $config['per_page'];
		
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);
		
		$data['customer']	= ($this->input->post('customer')!='0' && $this->input->post('customer')) ? $this->input->post('customer') : $data['customer'];
		$data['Item']	= ($this->input->post('Item') && $this->input->post('Item')!='All') ? $this->input->post('Item') : urldecode($data['Item']);
		//print_r($data['Item']);die;
		//$data = array('search_word'=>'test');
		$data["total_record"] = $this->netpricepercent->getTotal($data);
		$data["results"] = $this->netpricepercent->fetch_data($data);
		//print_r($this->input->get());	
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode($data['search_word']).'/'.trim($data['customer']).'/'.urlencode($data['Item']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ?$data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";


        $customers = $this->netpricepercent->fetch_data_for_filters();
        //echo "<pre>";print_r($customers);die;
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$customer_list=array('0'=>'--Select Customer--');
		$Item_list=array('All'=>'--Select Item--');
		//$Date_Modified_list=array('All'=>'--Select Date Modified--');
		if($customers){
		foreach ($customers as $key=>$customer) {
		  	$customer_list[trim($customer->GP_Customer_Number)] = $customer->GP_Customer_Number;
		  	$Item_list[trim($customer->Item_Number)] = $customer->Item_Number;
		  	//$Date_Modified_list[$customer->date_added] = $customer->date_added;
		
		}
	}


		$data['customer_list'] = $customer_list;
		$data['Item_list'] = $Item_list;
		//$data['Date_Modified_list'] = $Date_Modified_list;

		//$data["results"] = $this->netpricepercent->fetch_data($data);



		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('netpricepercent',$data);
		$this->load->view('footer');
	}

	public function netpricepercent_history()
	{
		
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] = 10;
				

		$data['offset']			= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		//$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['customer']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['Item']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 'All';
		$data['limit']	= $config['per_page'];
		
		
		$data['customer']	= ($this->input->post('customer')!='0' && $this->input->post('customer')) ? $this->input->post('customer') : $data['customer'];
		$data['Item']	= ($this->input->post('Item') && $this->input->post('Item')!='All') ? $this->input->post('Item') : urldecode($data['Item']);
		//print_r($data['Item']);die;
		//$data = array('search_word'=>'test');
		$data["total_record"] = $this->netpricepercent->getHistoryTotal($data);
		$data["results"] = $this->netpricepercent->fetch_History_data($data);
		//print_r($this->input->get());	
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.trim($data['customer']).'/'.urlencode($data['Item']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ?$data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";


        $customers = $this->netpricepercent->fetch_data_for_history_filters();
        //echo "<pre>";print_r($customers);die;
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$customer=array('0'=>'--Select Customer--');
		$Item=array('All'=>'--Select Item--');
		//$Date_Modified_list=array('All'=>'--Select Date Modified--');
		if ($customers){
		foreach ($customers as $key=>$Customer) {
		  	$customer[trim($Customer->GP_Customer_Number)] = $Customer->GP_Customer_Number;
		  	$Item[trim($Customer->Item_Number)] = $Customer->Item_Number;
		  	//$Date_Modified_list[$customer->date_added] = $customer->date_added;
		
		}
	}


		$data['customer_list'] = $customer;
		$data['Item_list'] = $Item;
		//$data['Date_Modified_list'] = $Date_Modified_list;

		//$data["results"] = $this->netpricepercent->fetch_data($data);

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('netpricepercenthistory', $data);
		$this->load->view('footer');
	}

	public function netpricepercent_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addnetpricepercent', $data);
		$this->load->view('footer');
	}

	public function netpricepercent_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["results"] = $this->netpricepercent->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editnetpricepercent', $data);
		$this->load->view('footer');
	}

	public function add_netpricepercent(){
		
		$result = $this->netpricepercent->add_netpricepercent();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Net Price percent details not added.</font><br />';
        else $msg = '<font color=green>Net Price percent details added.</font><br />';
        $this->netpricepercent_add_view($msg);
	}

	public function update_netpricepercent(){
		
		$result = $this->netpricepercent->update_netpricepercent();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Net Price percent details not updated.</font><br />';
        else $msg = '<font color=green>Net Price percent details updated.</font><br />';
        $this->netpricepercent_edit_view($id,$msg);
	}


	public function delete_netpricepercent(){
		if($this->netpricepercent->delete_netpricepercent()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function import_netpricepercent_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importnetpricepercent',$data);
		$this->load->view('footer');
	}

	public function export_netpricepercent()
	{
		
		$query = $this->netpricepercent->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Netpricepercent_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_netpricepercent()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Netpricepercent'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->netpricepercent->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Item' => $data['A'],
                'Price_17M10' => $data['B'],
                'Currency' => $data['C']             
                
        		);
        		$this->netpricepercent->import_netpricepercent($result);        
    		}
    		$this->netpricepercent->insert_load_log(); 
		}

		$msg = '<font color=green>Net Price Percent details are updated.</font><br />';
        $this->import_netpricepercent_view($msg);
	}



	


	public function commisionmapping_view()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('commisionmapping');
		$this->load->view('footer');
	}

	public function pricebook_view()
	{


		$data["results"] = $this->pricebook->fetch_data();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('pricebook',$data);
		$this->load->view('footer');
	}

	public function pricebookHistory_view()
	{

		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] = 10;
				

		$data['offset']			= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['mod_date']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['Item']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 'All';
		$data['limit']			= $config['per_page'];
		
		
		$data['mod_date']	= ($this->input->post('mod_date')!='0' && $this->input->post('mod_date')) ? $this->input->post('mod_date') : urldecode($data['mod_date']);
		$data['Item']	= ($this->input->post('Item') && $this->input->post('Item')!='All') ? $this->input->post('Item') : urldecode($data['Item']);
		//print_r($data['Item']);die;
		//$data = array('search_word'=>'test');
		$data["total_record"] = $this->pricebook->getHistoryTotal($data);
		$data["results"] = $this->pricebook->fetch_History_data($data);
		//print_r($this->input->get());	
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.trim($data['mod_date']).'/'.urlencode($data['Item']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ?$data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";


        $items = $this->pricebook->fetch_data_for_filters();
        //echo "<pre>";print_r($customers);die;
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$mod_date=array('0'=>'--Select Date--');
		$Item=array('All'=>'--Select Item--');
		//$Date_Modified_list=array('All'=>'--Select Date Modified--');
		if ($items){
		foreach ($items as $key=>$items) {
		  	$mod_date[trim($items->date_added)] = $items->date_added;
		  	$Item[trim($items->Item)] = $items->Item;
		  	//$Date_Modified_list[$customer->date_added] = $customer->date_added;
		
		}
		}

		$data['date_list'] = $mod_date;
		$data['Item_list'] = $Item;


		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('pricebookHistory',$data);
		$this->load->view('footer');
	}


	public function pricebook_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addpricebook', $data);
		$this->load->view('footer');
	}

	


	public function pricebook_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["results"] = $this->pricebook->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editpricebook', $data);
		$this->load->view('footer');
	}

	public function add_pricebook(){
		
		$result = $this->pricebook->add_pricebook();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Pricebook details not added.</font><br />';
        else $msg = '<font color=green>Pricebook details added.</font><br />';
        $this->pricebook_add_view($msg);
	}

	public function update_pricebook(){
		
		$result = $this->pricebook->update_pricebook();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>pricebook details not update.</font><br />';
        else $msg = '<font color=green>pricebook details updated.</font><br />';
        $this->pricebook_edit_view($id,$msg);
	}


	public function delete_pricebook(){
		if($this->pricebook->delete_pricebook()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	public function import_pricebook_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importpricebook',$data);
		$this->load->view('footer');
	}

	public function export_pricebook()
	{
		
		$query = $this->pricebook->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pricebook_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_pricebook()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Pricebook'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->pricebook->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'product_family' => $data['A'],
                'Item' => $data['B'],
                'description' => $data['C'],
                'design_registration_product' => $data['E'],
                'recommended_for_new_design' => $data['F'],
                'pcn_no' => $data['G'],
                'alternative_part' => $data['H'],
                'ROHS_compliant' => $data['I'],
                'HTS_No' => $data['J'],
                'ECCN' => $data['K'],
                'material_status_plc' => $data['L'],
                'ordering_status' => $data['M'],
                'valid_from' => $data['N'],
                'mult' => $data['O'],
                'spq' => $data['P'],

                'currency' => $data['Q'],
                'moq' => $data['R'],
                'dbc' => $data['S'],
                'unit_price_1_99' => $data['T'],
                'unit_price_100_99' => $data['U'],
                'unit_price_1k' => $data['V'],
                'unit_price_10k' => $data['W'],
                'unit_price_25k' => $data['X'],    
                'unit_price_100k' => $data['Y']
                      
                           
                
        		);
        		$this->pricebook->import_pricebook($result);        
    		}
    		$this->pricebook->insert_load_log(); 
		}

		$msg = '<font color=green>Pricebook details are imported.</font><br />';
        $this->import_pricebook_view($msg);
	}


public function quotes_view()
	{

		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		

		$data['offset']			= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['limit']			= $config['per_page'];
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->getTotal($data);
		$data["results"] = $this->quotes->fetch_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";



		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('quotes',$data);
		$this->load->view('footer');
	}

public function debitvalidation_view($msg=null)
	{


		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(9)) ? $this->uri->segment(9) : '0';
		if($this->uri->segment(2) =='debitvalidation_view'){
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		} else ($data['distributor']='0');
		$data['claim_status']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['date_types']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['from_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['to_date']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';
		$data['search_word']	= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);

		$data['claim_status']	= ($this->input->post('claim_status')!='') ? $this->input->post('claim_status') : urldecode($data['claim_status']);

		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_debitvalidationTotal($data);
		$data["results"] = $this->quotes->fetch_debitvalidation_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['claim_status']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('debitvalidation',$data);
		$this->load->view('footer');
	}

	public function approveddebits_view($msg=null)
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		
		$data['date_types']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['from_date']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['to_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);


		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_approveddebitsTotal($data);
		$data["results"] = $this->quotes->fetch_approveddebits_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Rejection Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('approveddebits',$data);
		$this->load->view('footer');
	}

	public function approve_debits_view($id)
	{
		$result = $this->quotes->approve_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Debit not Approved.</font><br />';
        else $msg = '<font color=green>Debit Approved.</font><br />';
        $this->debitvalidation_view($msg);

		
	}

	public function reject_debits_view($id)
	{
		$result = $this->quotes->reject_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Debit not Rejected.</font><br />';
        else $msg = '<font color=green>Debit Rejected.</font><br />';
        $this->debitvalidation_view($msg);
		

		
	}

	public function finance_approve_debits_view($id)
	{
		$result = $this->quotes->finance_approve_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Debit claim not Approved by Finance.</font><br />';
        else $msg = '<font color=green>Debit claim Approved by Finance.</font><br />';
        $this->financially_processed_debits_view($msg);

		
	}

	public function finance_reject_debits_view($id)
	{
		$result = $this->quotes->finance_reject_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Debit claim not Rejected by Finance.</font><br />';
        else $msg = '<font color=green>Debit claim Rejected by Finance.</font><br />';
        $this->financially_processed_debits_view($msg);
		

		
	}

	public function update_debitclaim_notesandreason()
	{


		$this->quotes->UpdateDebits($this->input->post());


		
	}

	public function update_debitclaim_financenotesandreason()
	{


		$this->quotes->UpdateDebits1($this->input->post());


		
	}



	public function rejecteddebits_view($msg=null)
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		
		$data['date_types']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['from_date']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['to_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);


		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_rejecteddebitsTotal($data);
		$data["results"] = $this->quotes->fetch_rejecteddebits_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('rejecteddebits',$data);
		$this->load->view('footer');
	}

	public function financially_processed_debits_view($msg=null)
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';
		if($this->uri->segment(2) =='financially_processed_debits_view'){
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		} else ($data['distributor']='0');
		//$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		
		$data['date_types']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['from_date']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['to_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);


		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_financiallyprocesseddebitsTotal($data);
		$data["results"] = $this->quotes->fetch_financiallyprocesseddebits_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('financiallyprocesseddebits',$data);
		$this->load->view('footer');
	}

	public function financiallyprocess_debit($id)
	{
		$result = $this->quotes->financiallyprocess_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Not Sent to Finance.</font><br />';
        else $msg = '<font color=green>Sent to Finance.</font><br />';
        $this->financially_processed_debits_view($msg);

		
	}

	public function financially_approved_debits_view($msg=null)
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		
		$data['date_types']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['from_date']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['to_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);


		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_financiallyapproveddebitsTotal($data);
		$data["results"] = $this->quotes->fetch_financiallyapproveddebits_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Rejection Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('financiallyapproveddebits',$data);
		$this->load->view('footer');
	}

	public function financiallyapprove_debit($id)
	{
		$result = $this->quotes->financiallyprocess_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red> Finance Approved.</font><br />';
        else $msg = '<font color=green>Not Approved.</font><br />';
        $this->financially_approved_debits_view($msg);

		
	}


public function financially_rejected_debits_view($msg=null)
	{
		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] =4;
		
		$data['offset']			= ($this->uri->segment(8)) ? $this->uri->segment(8) : '0';
		$data['distributor']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		
		$data['date_types']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['from_date']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : '0';
		$data['to_date']	= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(7)) ? $this->uri->segment(7) : '0';

		$data['limit']			= $config['per_page'];

		$data['distributor']	= ($this->input->post('distributor')!='') ? $this->input->post('distributor') : urldecode($data['distributor']);


		$data['date_types']	= ($this->input->post('date_types')!='') ? $this->input->post('date_types') : urldecode($data['date_types']);

		$data['to_date']	= ($this->input->post('to_date')!='') ? $this->input->post('to_date') : urldecode($data['to_date']);

		$data['from_date']	= ($this->input->post('from_date')!='') ? $this->input->post('from_date') : urldecode($data['from_date']);

		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);

		$data["total_record"] = $this->quotes->get_financiallyrejecteddebitsTotal($data);
		$data["results"] = $this->quotes->fetch_financiallyrejecteddebits_data($data);
		//print_r($data);die;
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode ($data['distributor']).'/'.urlencode ($data['date_types']).'/'.urlencode ($data['from_date']).'/'.urlencode ($data['to_date']).'/'.urlencode ($data['search_word']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ? $data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";

		$data['msg'] = $msg;
		
		$notes = $this->debits->fetch_debitsrejectionreasons_data();
		//echo "<pre>";print_r($notes);die();
		$notes_list=array('0'=>'-Select Rejection Reason-');
		foreach ($notes as $key => $note) {
			$notes_list[$note->reason] = $note->reason;
		}

		$distributors = $this->distributors->fetch_data();
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select Distributor--');
		
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {		  	
			
		  $distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		}
	}

		$data['distributor_list']=$distributor_list;


		$data['notes_list']=$notes_list;


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('financiallyrejecteddebits',$data);
		$this->load->view('footer');
	}

	public function financiallyrejected_debit($id)
	{
		$result = $this->quotes->financiallyprocess_debit($id);
		
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red> Finance Rejected.</font><br />';
        else $msg = '<font color=green>Not Rejected.</font><br />';
        $this->financially_rejected_debits_view($msg);

		
	}

	public function export_approveddebits()
	{
		
		$query = $this->quotes->get_approveddebits_data();
 		
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ApprovedDebits_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}


public function export_rejecteddebits()
	{
		
		$query = $this->quotes->get_rejecteddebits_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="RejectedDebits'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function export_financiallyprocesseddebits()
	{
		
		$query = $this->quotes->get_financiallyprocesseddebits_data();
 		
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="FinanciallyProcessedDebits_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

public function export_financiallyapproveddebits()
	{
		
		$query = $this->quotes->get_financiallyapproveddebits_data();
 		
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="FinanciallyApprovedDebits_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function export_financiallyrejecteddebits()
	{
		
		$query = $this->quotes->get_financiallyrejecteddebits_data();
 		
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="FinanciallyRejectedDebits_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}


public function import_quotes_view($msg=null)
	{
		$data['msg'] = $msg;


		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importquotes',$data);
		$this->load->view('footer');
	}

	public function export_quotes()
	{
		
		$query = $this->quotes->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Quotes_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_quotes()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Quotes'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    		$this->quotes->empty_table();
    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
                'Customer' => $data['A'],
                'Quote' => $data['B'],
                'Design_Registration_Number' => $data['C'],

                'Quote_Date' => $data['D'],
                'Created_On' => $data['E'],
                'Quote_Expires' => $data['F'],
                'Debit_Valid' => $data['G'],
                'Quote_Type' => $data['H'],
                'Debit_Number' => $data['I'],
                'Rep_Contact' => $data['J'],
                'Currency' => $data['K'],
                'Contract_Manufacturer' => $data['L'],
                'Note_to_Recipient' => $data['M'],
                'Quote_To' => $data['N'],
                'Contact_Name' => $data['O'],
                'Address' => $data['P'],
                'City' => $data['Q'],
                'State' => $data['R'],
                'Country' => $data['S'],
                'Zip' => $data['T'],
                'Phone' => $data['U'],
                'Fax' => $data['V'],
                'Email' => $data['W'],
                'Part_Number' => $data['X'],
                'Material_Status_PLC' => $data['Y'],
                'Ordering_Status' => $data['Z'],
                'MOQ' => $data['AA'],
                'LeadTime' => $data['AB'],
                'DBC_Disti_Book_Cost' => $data['AC'],
                'Approved_Cost' => $data['AD'],
                'Suggested_Resale_Price' =>$data['AE'],
                'Line_Item_Status' =>$data['AF']

                
        		);
        		$this->quotes->import_quotes($result);        
    		}
    		$this->quotes->insert_load_log(); 
		}

		$msg = '<font color=green>quotes are updated.</font><br />';
        $this->import_quotes_view($msg);
	}


	public function disti_filemapping_default(){
		$distributors = $this->distributors->fetch_data();
        $distributor_list = array();
        $distributor_list[0] = '--Select Disti--';
        foreach($distributors as $distributor){
        	$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
        }
        $data['system_type'] = array('0'=>'--Select File Type--',1=>'Inventory',
        								  2=>'Pos',3=>'Debits');
        $data['distributor_list'] = $distributor_list;
        $data['distributor_id'] =  ($this->uri->segment(4))?$this->uri->segment(4):0;
        $data['file_type'] =  ($this->uri->segment(3))?$this->uri->segment(3):0;
        //$poslist = $this->pos->fetch_data();
        //print_r( $poslist);die;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('distifilemappingdefault',$data);
		$this->load->view('footer');
	}

	// Functioons for Commissions rates

	public function commission_rates_view()
	{

		$data['results'] =  $this->commissionrates->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('commissionrates',$data);
		$this->load->view('footer');
	}

	public function commission_rates_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcommisionrates', $data);
		$this->load->view('footer');
	}

	
	

	public function commission_rates_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["result"] = $this->commissionrates->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editcommissionrates', $data);
		$this->load->view('footer');
	}

	public function add_commission_rates(){
		
		$result = $this->commissionrates->add_commissionrates();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commision rates not added.</font><br />';
        else $msg = '<font color=green>Commision rates added.</font><br />';
        $this->commission_rates_add_view($msg);
	}

	public function update_commission_rates(){
		
		$result = $this->commissionrates->update_commissionrates();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commision rates not updated.</font><br />';
        else $msg = '<font color=green>Commision rates updated.</font><br />';
        $this->commission_rates_edit_view ($id,$msg);
	}


	public function delete_commissionrates(){
		if($this->commissionrates->delete_commissionrates()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	

	public function export_commission_rates()
	{
		
		$query = $this->commissionrates->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Commissionrates_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

// Functions for Disti sales type

	public function disti_sales_type_view()
	{


		//$data["results"] = $this->netpricepercent->fetch_data();


		$this->load->library('pagination');
		
		$config = array();
		$config['per_page'] = 100;
		//$config["uri_segment"] = 10;
				

		$data['offset']			= ($this->uri->segment(6)) ? $this->uri->segment(6) : '0';
		$data['search_word']	= ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
		$data['distributor']	= ($this->uri->segment(4)) ? $this->uri->segment(4) : '0';
		$data['Item']	= ($this->uri->segment(5)) ? $this->uri->segment(5) : 'All';
		$data['limit']			= $config['per_page'];
		
		$data['search_word']	= ($this->input->post('search_word')!='') ? $this->input->post('search_word') : urldecode($data['search_word']);
		
		$data['distributor']	= ($this->input->post('distributor')!='0' && $this->input->post('distributor')) ? $this->input->post('distributor') : $data['distributor'];
		$data['Item']	= ($this->input->post('Item') && $this->input->post('Item')!='All') ? $this->input->post('Item') : urldecode($data['Item']);
		//print_r($data['Item']);die;
		//$data = array('search_word'=>'test');
		$data["total_record"] = $this->distisalestype->getTotal($data);
		$data["results"] = $this->distisalestype->fetch_data($data);
		//print_r($this->input->get());	
		//print_r($this->uri->rsegment_array());die;
		$config['total_rows'] = $data["total_record"];
    	$config['base_url'] = base_url() . $this->router->class.'/'.$this->router->method.'/'.urlencode($data['search_word']).'/'.trim($data['distributor']).'/'.urlencode($data['Item']);
    	//$config['base_url'] .= $this->customerscleanup->queryParams($this->input->get());
    	$choice	= $config["total_rows"] / $config["per_page"];
    	$this->pagination->initialize($config); 
        $data["links"] = $this->pagination->create_links();
        
		$startRecord	= ($config["total_rows"]>0) ?$data['offset']+1 : $data['offset'];
		$endRecord		= $data['offset']+$config["per_page"];
		$endRecords		= ($config["total_rows"] < $endRecord) ? $config["total_rows"] : $endRecord;
		//$data['offset']	= $startRecord-1 ;	
        $data['paging']	= "Displaying (".$startRecord." - ".$endRecords.") of ".$config["total_rows"]." <b>|</b> ".$data['links'].' of '.ceil($choice)." pages";


        $distis = $this->distisalestype->fetch_data_for_filters();
        //echo "<pre>";print_r($customers);die;
		//$data = $this->users->prepareCommonFiltersData($this->input->post());

		$distributor_list=array('0'=>'--Select distributor--');
		$Item_list=array('All'=>'--Select Item--');
		//$Date_Modified_list=array('All'=>'--Select Date Modified--');
		if($distis){
		foreach ($distis as $key=>$disti) {
		  	$distributor_list[trim($disti->GP_Customer_Number)] = $disti->GP_Customer_Number;
		  	$Item_list[trim($disti->Item_Number)] = $disti->Item_Number;
		  	//$Date_Modified_list[$customer->date_added] = $customer->date_added;
		
		}
	}


		$data['distributor_list'] = $distributor_list;
		$data['Item_list'] = $Item_list;
		//$data['Date_Modified_list'] = $Date_Modified_list;

		//$data["results"] = $this->netpricepercent->fetch_data($data);



		//$data['results'] =  $this->distisalestype->fetch_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('distisalestype',$data);
		$this->load->view('footer');
	}

	public function disti_sales_type_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('adddistisalestype', $data);
		$this->load->view('footer');
	}

	
	

	public function disti_sales_type_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["result"] = $this->distisalestype->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editdistisalestype', $data);
		$this->load->view('footer');
	}

	public function add_disti_sales_type(){
		
		$result = $this->distisalestype->add_distisalestype();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Disti Sales type not added.</font><br />';
        else $msg = '<font color=green>Disti Sales type added.</font><br />';
        $this->disti_sales_type_add_view($msg);
	}

	public function update_disti_sales_type(){
		
		$result = $this->distisalestype->update_distisalestype();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Disti Sales type not updated.</font><br />';
        else $msg = '<font color=green>Disti Sales type updated.</font><br />';
        $this->disti_sales_type_edit_view ($id,$msg);
	}


	public function delete_distisalestype(){
		if($this->distisalestype->delete_distisalestype()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	

	public function export_disti_sales_type()
	{
		
		$query = $this->distisalestype->get_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Distisalestype_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}



	// Functions for Commisions data

	public function commisions_data_view()
	{

		$data = array();
		$data = $this->users->prepareCommonFiltersData($this->input->post(),$this->uri->segment_array());//Pass Segment array here later
		//echo "<pre>";print_r($this->input->post());die();
		//echo "<pre>";print_r($data);die;
		//echo "<pre>";print_r($data["search"]);die;
		$Total=$this->commissions->get_total($data);
		$pagination = $this->users->getPagination($Total,$this->router->class,$this->router->method,$data,$this->uri->segment_array());
		$data=array_merge($data,$pagination);
		//echo "<pre>";print_r($data);die();
		$data["results"] = $this->commissions->fetch_data($data);
		//echo "<pre>";print_r($data);die();
		$distributors = $this->distributors->fetch_data();
		$financialyears = $this->ajaxmodel->createFinancialYearDropdown();
		//echo "<pre>";print_r($distributors);die;
		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');

		if ($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;
		$data['years_list'] = $financialyears['Years'];
		$data['months_list'] = $financialyears['Months'];
		$data['quarter_list'] = $financialyears['Quarters'];

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('commissionsdata',$data);
		$this->load->view('footer');
	}

	public function commisions_data_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcommissionsdata', $data);
		$this->load->view('footer');
	}

	
	

	public function commisions_data_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["result"] = $this->commissions->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editcommissionsdata', $data);
		$this->load->view('footer');
	}

	public function add_commisions_data(){
		
		$result = $this->commissions->add_commissionsdata();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commissions data not added.</font><br />';
        else $msg = '<font color=green>Commissions data added.</font><br />';
        $this->commisions_data_add_view($msg);
	}

	public function update_commisions_data(){
		
		$result = $this->commissions->update_commissionsdata();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commissions data not updated.</font><br />';
        else $msg = '<font color=green>Commissions data updated.</font><br />';
        $this->commisions_data_edit_view ($id,$msg);
	}


	public function delete_commissionsdata(){
		if($this->commissions->delete_commissionsdata()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	

	public function export_commisions_data()
	{
		
		$query = $this->commissions->get_export_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
        	if($field != 'id'){
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
            	if($field != 'id'){
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);

        // Add Next Sheet
        $this->excel->createSheet();
        $sheet = $this->excel->setActiveSheetIndex(1);
        $sheet->setTitle("SalesPerson");
        $query = $this->commissions->get_export_salesrepperson_list();
 		$fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
        	if($field != 'id' && $field != 'date_added'){
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
            	if($field != 'id' && $field != 'date_added'){
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            }
 
            $row++;
        }
        $this->excel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Commissions_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_commisions_data_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcommissionsdata',$data);
		$this->load->view('footer');
	}

	public function import_commisions_data()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Commisions'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   	
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
        		'Distributor'=>$data['B'],
                'InvoiceNum' => $data['E'],
                'Item' => $data['M'],
                'Purchase_rep' => $data['AZ'],
                'Purchase_sales_person' => $data['BA'],
                'Design_rep' => $data['BB'],
                'Design_sales_person' => $data['BC'],
                'Reference_design_rep' => $data['BD'],
                'Reference_design_sales_person' => $data['BE'],
                'Transfer_type' => $data['BF'],
                'Debited_Cost_Ext_USD' => $data['Y']
                
        		);
        		$this->commissions->import_commissions($result);        
    		}
    		//$this->commissions->insert_load_log(); 
		}

		$msg = '<font color=green>Commissions data are imported.</font><br />';
        $this->import_commisions_data_view($msg);
	}



		// Functions for Commisions calculation

	public function commisions_data_calculated_view()
	{

		$data = array();
		$data = $this->users->prepareCommonFiltersData($this->input->post(),$this->uri->segment_array());//Pass Segment array here later
		//echo "<pre>";print_r($this->input->post());die();
		//echo "<pre>";print_r($data);die;
		//echo "<pre>";print_r($data["search"]);die;
		$Total=$this->commissions->get_total_calculated_data($data);
		$pagination = $this->users->getPagination($Total,$this->router->class,$this->router->method,$data,$this->uri->segment_array());
		$data=array_merge($data,$pagination);
		//echo "<pre>";print_r($data);die();
		$data["results"] = $this->commissions->fetch_calculated_data($data);
		//echo "<pre>";print_r($data);die();
		$distributors = $this->distributors->fetch_data();
		//echo "<pre>";print_r($distributors);die();
		$financialyears = $this->ajaxmodel->createFinancialYearDropdown();
		//echo "<pre>";print_r($distributors);die;
		$salesreps=$this->reps->fetch_sales_rep_data();
		//echo "<pre>";print_r($sales_rep[0]->Sales_Rep);die();
		$salespersons=$this->reps->fetch_sales_person_data();

		$distributor_list=array('0'=>'--Select Distributor--');
		$sales_territory=array('All'=>'--Select Territory--');
		$sales_region=array('All'=>'--Select Region--');
		$sales_rep_list=array('All'=>'--Select Sales Rep--');
		$sales_person_list=array('All'=>'--Select Sales Person--');

		if ($salesreps){
		foreach ($salesreps as $key=>$salesrep) {
			$sales_rep_list[$salesrep->Sales_Rep] = $salesrep->Sales_Rep;
		}}

		if ($salespersons){
		foreach ($salespersons as $key=>$salesperson) {
			$sales_person_list[$salesperson->Sales_Person] = $salesperson->Sales_Person;
		}}
		//echo "<pre>";print_r($sales_rep_list);die();
		if ($distributors){
		foreach ($distributors as $key=>$distributor) {
		  if($distributor->Sales_Territory!='' && $distributor->Sales_Area!=''){	
			$sales_territory[str_replace(' ','_',$distributor->Sales_Territory)] = $distributor->Sales_Territory;
			$sales_region[str_replace(' ','_',$distributor->Sales_Area)] = $distributor->Sales_Area;
		 	}	
			$distributor_list[$distributor->id] = $distributor->Consolidated_Name;
		
		}
	}

		//echo "<pre>"; print_r($distributor_list);die();
		//echo "<pre>"; print_r($sales_territory);die();
		//echo "<pre>"; print_r($sales_region);die();

		$data['distributor_list'] = $distributor_list;
		$data['sales_territory_list'] = $sales_territory;
		$data['sales_region_list'] = $sales_region;
		$data['years_list'] = $financialyears['Years'];
		$data['months_list'] = $financialyears['Months'];
		$data['quarter_list'] = $financialyears['Quarters'];
		$data['sales_rep_list'] = $sales_rep_list;
		$data['sales_person_list'] = $sales_person_list;	

		//echo "<pre>";print_r($sales_person_list);die();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('commissionsdata_calculated',$data);
		$this->load->view('footer');
	}

	public function commisions_data_calculated_add_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('addcommissionsdata', $data);
		$this->load->view('footer');
	}

	
	

	public function commisions_data_calculated_edit_view($id, $msg=null)
	{
		$data['msg'] = $msg;
		$data["result"] = $this->commissions->fetch_data_by_id($id)[0];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('editcommissionsdata', $data);
		$this->load->view('footer');
	}

	public function add_commisions_data_calculated(){
		
		$result = $this->commissions->add_commissionsdata();
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commissions data not added.</font><br />';
        else $msg = '<font color=green>Commissions data added.</font><br />';
        $this->commisions_data_add_view($msg);
	}

	public function update_commisions_data_calculated(){
		
		$result = $this->commissions->update_commissionsdata();
		$id = $this->security->xss_clean($this->input->post('id'));
        $msg = null;
        // Now we verify the result
        if(!$result) $msg = '<font color=red>Commissions data not updated.</font><br />';
        else $msg = '<font color=green>Commissions data updated.</font><br />';
        $this->commisions_data_edit_view ($id,$msg);
	}


	public function delete_commissionsdata_calculated(){
		if($this->commissions->delete_commissionsdata()){
			echo "Records deleted";
		} else{
			echo "error";
		}
	}

	

	public function export_commisions_data_calculated()
	{
		
		$query = $this->commissions->get_export_data();
 
        if(!$query)
            return false;
       
        $this->excel->getProperties()->setTitle("export")->setDescription("none");
 
        $this->excel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
        	if($field != 'id'){
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
            	if($field != 'id'){
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            }
 
            $row++;
        }
 
        $this->excel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Commissions_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');

	}

	public function import_commisions_data_calculated_view($msg=null)
	{
		$data['msg'] = $msg;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('importcommissionsdata',$data);
		$this->load->view('footer');
	}

	public function import_commisions_data_calculated()
	{
		$file_info = pathinfo($_FILES["file"]["name"]);
		//var_dump($file_info); die();
		$file_directory = APPPATH."uploads/";
		$new_file_name = 'Commisions'.date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . $new_file_name))								
		{   	
    		$file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    		$objReader	= PHPExcel_IOFactory::createReader($file_type);
    		$objPHPExcel = $objReader->load($file_directory . $new_file_name);
    		$sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

    		$i=0;
    		foreach($sheet_data as $data)
    		{
    			if($i==0) {
    				$i=$i+1;
    				continue;
    			}
        		$result = array(
        		'Distributor'=>$data['B'],
                'InvoiceNum' => $data['E'],
                'Item' => $data['M'],
                'Purchase_rep' => $data['AZ'],
                'Purchase_sales_person' => $data['BA'],
                'Design_rep' => $data['BB'],
                'Design_sales_person' => $data['BC'],
                'Reference_design_rep' => $data['BD'],
                'Reference_design_sales_person' => $data['BE'],
                'Transfer_type' => $data['BF'],
                'Debited_Cost_Ext_USD' => $data['Y']  
        		);
        		$this->commissions->import_commissions($result);        
    		}
    		$this->commissions->insert_load_log(); 
		}

		$msg = '<font color=green>Commissions data are imported.</font><br />';
        $this->import_commisions_data_view($msg);
	}

	
}
