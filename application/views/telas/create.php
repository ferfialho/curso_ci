<?php

echo form_open('crud/create');

if ($this->session->flashdata('cadastrook')):
echo '<p>'. $this->session->flashdata('cadastrook').'</p>';
endif;
echo form_label('Nome Completo:');
echo form_input(array('id'=>'nome','name'=>'nome'),set_value('nome'),'autofocus');
echo form_error('nome','<span>','</span>');
echo form_label('Email:');
echo form_input(array('id'=>'email','name'=>'email'),set_value('email'));
echo form_label('Login:');
echo form_input(array('id'=>'login','name'=>'login'),set_value('login'));
echo form_label('Senha:');
echo form_password(array('id'=>'senha','name'=>'senha'),set_value('senha'));
echo form_label('Repita a Senha:');
echo form_password(array('id'=>'senha2','name'=>'senha2'),set_value('senha2'));
echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
echo form_close();
