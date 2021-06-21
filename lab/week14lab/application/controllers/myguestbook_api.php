<?php
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
  
class MyGuestBook_Api extends REST_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->database();
       $this->load->model('myguestbook_model');
    }
 
    // Insert your GET, POST, PUT and DELETE methods here
 
   //get all record in myguestbook table
   function guestbooks_get()
   {
       $result = $this->myguestbook_model->read(null, null, null);
         
       if($result)
       {
           $this->response($result, 200);
       }
    
       else
       {
           $this->response(array('status' => 'failed'), 404);
       }
   }

   //get one record with ID
   function guestbook_get()
   {
       if(!$this->uri->segment(3))
       {
           $this->response(array('status' => 'failed'), 400);
       }
    
       $data = array('id' => $this->uri->segment(3));
       $result = $this->myguestbook_model->read($data, null, null);
                 
       if($result)
       {
           $this->response($result, 200);
       }
    
       else
       {
           $this->response(array('status' => 'failed'), 404);
       }
   }

   //add new record
   function guestbook_post()
   {
       $postdate = date("Y-m-d",time());
       $posttime = date("H:i:s", time());
    
       $data = array(
           'user'   => $this->post('user'),
           'email'  => $this->post('email'),
           'comment' => $this->post('comment'),
           'postdate' => $postdate,
           'posttime' => $posttime
       );
     
       $result = $this->myguestbook_model->create($data);
                 
       if($result === TRUE)
       {
           $this->response(array('status' => 'success'), 200);
       }
       else
       {
           $this->response(array('status' => 'failed'), 200);
       }
   }

   //update record
   function guestbook_put()
   {
       if(!$this->uri->segment(3))
       {
           $this->response(array('status' => 'failed'), 400);
       }
    
       $postdate = date("Y-m-d",time());
       $posttime = date("H:i:s", time());
    
       $data = array(
           'user'   => $this->put('user'),
           'email'  => $this->put('email'),
           'comment' => $this->put('comment'),
           'postdate' => $postdate,
           'posttime' => $posttime
       );
     
       $result = $this->myguestbook_model->update($this->uri->segment(3), $data);
                 
       if($result === TRUE)
       {
           $this->response(array('status' => 'success'), 200);
       }
       else
       {
           $this->response(array('status' => 'failed'), 200);
       }
   }


   //delete record
   function guestbook_delete()
   {
       if(!$this->uri->segment(3))
       {
           $this->response(array('status' => 'failed'), 400);
       }
        
       $result = $this->myguestbook_model->delete($this->uri->segment(3));
                 
       if($result === TRUE)
       {
           $this->response(array('status' => 'success'));
       }
       else
       {
           $this->response(array('status' => 'failed'));
       }
   }
}
 
?>