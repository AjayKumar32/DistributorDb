<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Emails extends CI_Model{
    public $conn;

    // inbox storage and inbox message count
    public $inbox;
    private $msg_cnt;

    // email login credentials
    private $server = '{west.exch082.serverdata.net/imap/ssl/novalidate-cert}INBOX';
    private $user   = 'shipdebit@adestotech.com';
    private $pass   = '2q&W!FOSae';
    private $port   = 2095;
    function __construct(){
        parent::__construct();
    }

    public function fetch_data(){
         $query = $this->db->get("email_log");
         if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }

    public function fetch_processed_email_data(){
         $query = $this->db->get("email_reader");
         if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
    }


    public function SyncEmails(){
            $this->conn = imap_open($this->server, $this->user, $this->pass) or die('Error : '.imap_last_error());
            $this->read_inbox();
            return true;
    }

    // read the inbox
    public function read_inbox() {        
            
            $this->msg_cnt = imap_num_msg($this->conn);
            
            //$emails = imap_search ( $this->conn, "unseen" );
            $date = date('d M Y', strtotime(date('Y-m-d').' -15 day'));
            //print_r($date);die;
            $emails = imap_search ( $this->conn, "SINCE \"$date\"");
            //echo "<pre>";print_r($emails);die;
            $in = array();
            
            
            if(isset($emails) && !empty($emails)){
            $emailcount = count($emails);
            //echo "<pre>";print_r($emailcount);    
             for($j=0;$j<$emailcount;$j++){ 
                $email = $emails[$j];
               if($this->checkLoggedEmail($email)){
                continue;
               }
               $headerinfo = imap_headerinfo($this->conn, $email);
               
               $fromemail = $headerinfo->from[0]->mailbox.'@'.$headerinfo->from[0]->host;
               $cc_addres = array();
               if(isset($headerinfo->cc) && !empty($headerinfo->cc)){
                 foreach($headerinfo->cc as $ccaddress){
                    $cc_addres[] = $ccaddress->mailbox.'@'.$ccaddress->host;
                   } 

               }
               $subject = $headerinfo->subject;
               $emailDate = $headerinfo->date;
               

               //$this->getDistributorDetailByEmail($fromemail);
              
              //Structure of the email from IMAP
                $structure = imap_fetchstructure($this->conn, $email);
                //echo "<pre>";print_r($email);die;
                //echo "<pre>";print_r($structure);die;
                
                /* if any attachments found... */
                $attachments = array();
                if(isset($structure->parts) && count($structure->parts)) 
                {
                    for($i = 0; $i < count($structure->parts); $i++) 
                    {
                         
                        if($structure->parts[$i]->ifdparameters) 
                        {
                            foreach($structure->parts[$i]->dparameters as $object) 
                            {
                                if(strtolower($object->attribute) == 'filename') 
                                {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['filename'] = $object->value; // Get name of the file from email
                                }
                            }
                        }
                        
                        // Check if the attachment is availabe in email and get the contents of the attachment
                        if(isset($attachments[$i]['is_attachment']) && $attachments[$i]['is_attachment']) 
                        {
                            $attachments[$i]['attachment'] = imap_fetchbody($this->conn, $email, $i+1);
         
                            /* 3 = BASE64 encoding */
                            if($structure->parts[$i]->encoding == 3) 
                            { 
                                $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                            }
                            /* 4 = QUOTED-PRINTABLE encoding */
                            elseif($structure->parts[$i]->encoding == 4) 
                            { 
                                $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                            }
                        }
                    }
                }
           
                //Save THe attachment
                $filequeue = array();
                foreach($attachments as $attachment)
                {
                    if($attachment['is_attachment'] == 1)
                    {
                        
                        //Checking file type(Systsem type)
                        $filename = $attachment['filename'];
                        $folder = APPPATH.'uploads/debits';
                        $file_view = 'debits/'. $filename;
                        if(strpos(strtolower($filename),'pos')!==false){
                            $folder = APPPATH.'uploads/pos';
                            $file_view = 'pos/'. $filename;
                        }
                        elseif(strpos(strtolower($filename),'debit')!==false){
                            $folder = APPPATH.'uploads/debits';
                            $file_view = 'debits/'. $filename;
                        }
                        elseif(strpos(strtolower($filename),'inventory')!==false || strpos(strtolower($filename),'inv')!==false){
                            $folder = APPPATH.'uploads/inventory';
                            $file_view = 'inventory/'. $filename;
                        }
                        /* prefix the email number to the filename in case two emails
                         * have the attachment with the same file name.
                         */
                        
                        $fp = fopen($folder.'/'. $filename, "w+");
                        fwrite($fp, $attachment['attachment']);
                        fclose($fp);

                         //echo "<pre>";print_r($folder);die;
                        //Send the file to process and import them into their corresponding Table
                        //$this->processImports($folder,$email,$fromemail);

                        
                        $filequeue[] = $file_view;
                    }                    
         
                }
                $insert =array(
                                'email_number'=>$email,
                                'sender_email'=>$fromemail,
                                'receiver_email'=>'shipdebit@adestotech.com',
                                'carboncopy_email'=>implode(',',$cc_addres),
                                'subject'=>$subject,
                                'distributor'=>$this->getDistributorByEmail($fromemail),
                                'received_date'=>date('Y-m-d H:i:s',strtotime($emailDate)),
                                'attachments'=>implode(',',$filequeue)
                                );
                $this->db->insert('email_log',$insert);
                //echo "<pre>";print_r($insert);die;
            }
     
    }   
   
 }


    public function checkLoggedEmail($email_number){
        $this->db->select('COUNT(1) AS CNT')
                         ->from('email_log')
                         ->where('email_number',$email_number);
        $query = $this->db->get();
        $result = $query->row_array();
        if($result['CNT']>0){
            return true;
        }else{
            return false;
        }
                         
    }

    public function getDistributorByEmail($email){
        $this->db->select('*')
                         ->from('distributor_new')
                         ->where('distributor_email',$email);
        $query = $this->db->get();
        $result = $query->row_array();
        if(!empty($result)){
            return $result['id'];
        }else{
            return 0;
        }
    }
        
    
}

 ?>