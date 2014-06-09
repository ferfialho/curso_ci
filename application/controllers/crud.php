<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {
	
	public function index(){
		$dados = array(
			'titulo' => 'CRUD com Codeigbiter',
			'tela' => '',
		);
		
		$this->load->view('conteudo',$dados);
	}
	
	public function create(){
		
		$this->form_validation->set_rules('nome','NOME','trim|required|alpha|max_length[50]|ucwords');
		$this->form_validation->set_rules('email','Email','trim|required|max_length[50]|strtolower|valid_email|is_unique[curso_ci.email]');
		$this->form_validation->set_rules('login','Login','trim|required|max_length[25]|strtolower|is_unique[curso_ci.login]');
		$this->form_validation->set_rules('senha','Senha','trim|required|strtolower');
		$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|strtolower|matches[senha]');
		
		
		
		if($this->form_validation->run() == TRUE):
				$dados = elements(array('nome','email','login','senha'),$this->input->post());
		        $dados['senha'] = md5($dados['senha']);
				//$this->load->model('crud_model');
				$this->crud_model->do_insert($dados);
		endif;
		$dados = array(
				'titulo' => 'CRUD &raquo; Create',
				'tela' => 'create',
		);
	
		$this->load->view('conteudo',$dados);
	}
	public function retrieve(){
		$dados = array(
				'titulo' => 'CRUD &raquo; Retrive',
				'tela' => 'retrive',
				'usuarios'=>$this->crud_model->get_all()->result(),
		);
	
		$this->load->view('conteudo',$dados);
	}
	public function update(){
		
		$this->form_validation->set_rules('nome','NOME','trim|required|alpha|max_length[50]|ucwords');
		$this->form_validation->set_rules('senha','Senha','trim|required|strtolower');
		$this->form_validation->set_rules('senha2','Repita a Senha','trim|required|strtolower|matches[senha]');
		
		
		
		if($this->form_validation->run() == TRUE):
		$dados = elements(array('nome','senha'),$this->input->post());
		$dados['senha'] = md5($dados['senha']);
	
		$this->crud_model->do_update($dados,array('id'=>$this->input->post('idusuario')));
		endif;
		
		
		$dados = array(
				'titulo' => 'CRUD &raquo; Update',
				'tela' => 'update',
		);
	
		$this->load->view('conteudo',$dados);
	}
	public function delete(){
		
		if ($this->input->post('idusuario') > 0):
			$this->crud_model->do_delete(array('id'=>$this->input->post('idusuario')));
		endif;
		
		$dados = array(
				'titulo' => 'CRUD &raquo; Delete',
				'tela' => 'delete',
		);
	
		$this->load->view('conteudo',$dados);
	}
}
