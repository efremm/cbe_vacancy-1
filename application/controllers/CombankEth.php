<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CombankEth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Vacancy_model');
        $this->load->model('Applicant_model');


	}
		
	private function _render_page($view, $data = null)
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
		$this->load->view('header.php', $this->viewdata);
		$this->load->view('nav',$profile_data);
		$vacancy['vacancies']=$this->Vacancy_model->display_jobs();
        $this->load->view('jobList',$vacancy);
		$this->load->view($view, $this->viewdata);
		$this->load->view('footer.php');
	}

	public function index()
	{
		$data = array(
			'page_title' => 'CombankEth job vacancy portal'
		);
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
		$this->_render_page('index.php', $data);
	}
	function contact_us(){
        $data = array(
            'page_title' => 'contact-us'
        );
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('contact_us');
        $this->load->view('footer');

    }
    function About(){
        $data = array(
            'page_title' => 'About-us'
        );
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('about');
        $this->load->view('footer');
    }


    function faq(){
        $data = array(
            'page_title' => 'Frequently asked questions'
        );
        $this->load->view('header',$data);
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('faq');

    }
    public function Branch(){
        $data = array(
            'page_title' => 'Branchs '
        );
        $this->load->view('header',$data);
        $id=$this->session->userdata('Id');
        $profile_data['info']=$this->Applicant_model->get_profile($id);
        $this->load->view('header',$data);
        $this->load->view('nav',$profile_data);
        $this->load->view('faq');

    }


}
