<?php
/**
*  
*/
class Custom_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	function load_pack_library()
	{
	return	$this->load->view('custom_library');

	}

    function checklogedin()
    {
        if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
     function checkadminlogedin()
    {
        if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checkdoctorlogedin()
    {
        if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checknurselogedin()
    {
       if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checkpharmacistlogedin()
    {
       if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checkreceptionlogedin()
    {
       if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
     function checktechnicianlogedin()
    {
        if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checkmanagerlogedin()
    {
       if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
    function checkpatientlogedin()
    {
       if(!empty($this->session->userdata('username')))
        {
            return true;

        }else
            return false;
    }
   
}
?>