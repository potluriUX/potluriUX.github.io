<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Blog extends CI_Controller {


    function Blog()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        
       
    }

    function index()
    {

        $data['title'] = 'ravi';$data['heading'] = 'My blog heading';
        $data['query'] = $this->db->get('entries');
        $this->load->view('blog_view', $data);
        // echo 'Hello World';
    }
    function comment(){

        $data['title'] = 'ravi';$data['heading'] = 'Comments';
        $this->db->where('entry_id', $this->uri->segment(3));
        $data['query'] = $this->db->get('comment');
        $this->load->view('comment_view', $data);
    }
    function comment_insert(){
        $this->db->insert('comment', $_POST);
        redirect('blog/comment/'. $_POST['entry_id']);
    }
}

?>
