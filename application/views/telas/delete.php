<?php
$iduser = $this->uri->segment(3);

if($iduser==NULL) redirect('crud/retrieve');
	$query = $this->crud_model->get_byid($iduser)->row();

echo form_open("crud/delete/$iduser");

echo form_label('Nome Completo:');
echo form_input(array('id'=>'nome','name'=>'nome'),set_value('nome',$query->nome),'disabled="disabled"');
echo form_error('nome','<span>','</span>');
echo form_label('Email:');
echo form_input(array('id'=>'email','name'=>'email'),set_value('email',$query->email),'disabled="disabled"');
echo form_label('Login:');
echo form_input(array('id'=>'login','name'=>'login'),set_value('login',$query->login),'disabled="disabled"');

echo form_submit(array('name'=>'cadastrar'),'Excluir');
echo form_hidden('idusuario',$query->id);
echo form_close();
