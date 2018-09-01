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
    }

    // read the inbox
    function read_inbox() {
        $mailboxes = imap_list($this->conn, $this->server, '*');
        $count = 1;
        foreach($mailboxes as $mailboxe){
            if($count==1){
                $count++;
                continue;
            }
            
            imap_reopen($this->conn, $mailboxe)  or die('Error : '.imap_last_error());
            $this->msg_cnt = imap_num_msg($this->conn);
            
            //$emails = imap_search ( $this->conn, "unseen" );
            $date = date('d M Y', strtotime(date('Y-m-d').' -3 day'));
            //print_r($date);die;
            $emails = imap_search ( $this->conn, "SINCE \"$date\"");
            //echo "<pre>";print_r($emails);die;
            $in = array();
            
            
            if(isset($emails) && !empty($emails)){
            $emailcount = count($emails);
            //echo "<pre>";print_r($emailcount);    
             for($j=0;$j<$emailcount;$j++){ 
                $email = $emails[$j];
               if($this->checkProcessedEmail($email)){
                continue;
               }
               $headerinfo = imap_headerinfo($this->conn, $email);
               //echo "<pre>";print_r($email);
               $fromemail = $headerinfo->from[0]->mailbox.'@'.$headerinfo->from[0]->host;
               //echo "<pre>";print_r($fromemail);die;

               $this->getDistributorDetailByEmail($fromemail);
              
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
                foreach($attachments as $attachment)
                {
                    if($attachment['is_attachment'] == 1)
                    {
                        
                        //Checking file type(Systsem type)
                        $filename = $attachment['filename'];
                        $folder = 'debits';
                        if(strpos(strtolower($filename),'pos')!==false){
                            $folder = 'pos';
                        }
                        elseif(strpos(strtolower($filename),'debit')!==false){
                            $folder = 'debits';
                        }
                        elseif(strpos(strtolower($filename),'inventory')!==false || strpos(strtolower($filename),'inv')!==false){
                            $folder = 'inventory';
                        }
                        /* prefix the email number to the filename in case two emails
                         * have the attachment with the same file name.
                         */
                        $fp = fopen($folder.'/'. $filename, "w+");
                        fwrite($fp, $attachment['attachment']);
                        fclose($fp);
                        //Send the file to process and import them into their corresponding Table
                        $this->processImports($folder,$email,$fromemail);

                        $attachmentfile_name[] = $filename;
                        $filequeue[] = $folder.'/'.$email . "-" . $filename;
                    }
         
                }           

            }
        }
    }   
    echo "email Scan Completed!";
        //$this->inbox = $in;
    }
        
    
}

 ?>