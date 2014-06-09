<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	
	public function index()
	{	
		$dados = array(
			'titulo'=> 'Home',
			'view' => 'home',
		);
		$this->load->view('conteudo',$dados);
	}
	
	public function produto()
	{
		$dados = array(
				'titulo'=> 'Produto',
				'view' => 'produto',
		);
		$this->load->view('conteudo',$dados);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */