<?php

/*
* Configurações de rotas da aplicação
*/

define('SITE_URL', 'https://escoladefutebolnapoli.com.br/sistema/');

//assets
define('BOOTSTRAP_URL', SITE_URL . 'assets/css/bootstrap.min.css');
define('STYLE_URL', SITE_URL . 'assets/css/style.css');
define('FA_URL', SITE_URL . 'assets/css/font-awesome.min.css');
define('BS_DATATABLES_URL', SITE_URL . 'assets/css/dataTables.bootstrap4.min.css');
define('JQUERY_URL', SITE_URL . 'assets/js/jquery-3.4.1.min.js');
define('POPPER_URL', SITE_URL . 'assets/js/popper.min.js');
define('BOOTSTRAP_JS_URL', SITE_URL . 'assets/js/bootstrap.min.js');
define('BOOTSTRAP_JS_DATA_TABLE_URL', SITE_URL . 'assets/js/dataTables.bootstrap4.min.js');
define('BOOTSTRAP_JQ_DATA_TABLE_URL', SITE_URL . 'assets/js/jquery.dataTables.min.js');
define('PACE_JS_URL', SITE_URL . 'assets/js/pace.min.js');
define('JQ_MASK_URL', SITE_URL . 'assets/js/jquery.mask.min.js');
define('APP_JS_URL', SITE_URL . 'assets/js/app.js');
define('IMG_LOGO_URL', SITE_URL . 'assets/img/logo.png');

//páginas
define('PAG_HOME', SITE_URL . 'home');
define('PAG_LOGOUT', SITE_URL . 'logout');
define('PAG_404', SITE_URL . '404');

//Categorias
define('PAG_CATEGORIAS', SITE_URL . 'categorias');
define('PAG_NOVA_CATEGORIA', SITE_URL . 'nova-categoria');
define('PAG_EDT_CATEGORIA', SITE_URL . 'editar-categoria?cod=');
define('PAG_DEL_CATEGORIA', SITE_URL . 'excluir-categoria?cod=');

//Escolas
define('PAG_ESCOLAS', SITE_URL . 'escolas');
define('PAG_NOVA_ESCOLA', SITE_URL . 'nova-escola');
define('PAG_EDT_ESCOLA', SITE_URL . 'editar-escola?cod=');
define('PAG_DEL_ESCOLA', SITE_URL . 'excluir-escola?cod=');

//Times
define('PAG_TIMES', SITE_URL . 'times');
define('PAG_NOVO_TIME', SITE_URL . 'novo-time');
define('PAG_EDT_TIME', SITE_URL . 'editar-time?cod=');
define('PAG_DEL_TIME', SITE_URL . 'excluir-time?cod=');

//Alunos
define('PAG_ALUNOS', SITE_URL . 'alunos');
define('PAG_NOVO_ALUNO', SITE_URL . 'novo-aluno');
define('PAG_EDT_ALUNO', SITE_URL . 'editar-aluno?cod=');
define('PAG_DEL_ALUNO', SITE_URL . 'excluir-aluno?cod=');

//Alunos Time
define('PAG_ALUNOS_TIME', SITE_URL . 'alunos-time?cod_time=');
define('PAG_DEL_ALUNO_TIME', SITE_URL . 'excluir-aluno-time?cod_aluno_time=');

//Campeonatos
define('PAG_CAMPEONATOS', SITE_URL . 'campeonatos');
define('PAG_NOVO_CAMPEONATO', SITE_URL . 'novo-campeonato');
define('PAG_EDT_CAMPEONATO', SITE_URL . 'editar-campeonato?cod=');
define('PAG_DEL_CAMPEONATO', SITE_URL . 'excluir-campeonato?cod=');

//Rodadas Campeonato
define('PAG_RODADAS_CAMPEONATO', SITE_URL . 'rodadas-campeonato?cod_campeonato=');
define('PAG_DEL_RODADA_CAMPEONATO', SITE_URL . 'excluir-rodada-campeonato?cod_rodada=');

//Jogos Rodada
define('PAG_JOGOS_RODADA', SITE_URL . 'jogos-rodada?cod_rodada=');
define('PAG_LANCAR_JOGOS_RODADA', SITE_URL . 'jogos-rodada');
define('PAG_EDT_JOGO_RODADA', SITE_URL . 'editar-jogo-rodada?cod=');
define('PAG_DEL_JOGO_RODADA', SITE_URL . 'excluir-jogo-rodada?cod=');

//Tabela de Classificação
define('PAG_TABELA', SITE_URL . 'tabela');

//Artilharia
define('PAG_ARTILHARIA', SITE_URL . 'artilharia');
define('PAG_NOVO_ARTILHEIRO', SITE_URL . 'novo-artilheiro');
define('PAG_EDT_ARTILHEIRO', SITE_URL . 'editar-artilheiro?cod=');
define('PAG_DEL_ARTILHEIRO', SITE_URL . 'excluir-artilheiro?cod=');

//Usuários
define('PAG_USUARIOS', SITE_URL . 'usuarios');
define('PAG_NOVO_USUARIO', SITE_URL . 'novo-usuario');
define('PAG_EDT_USUARIO', SITE_URL . 'editar-usuario?cod=');
define('PAG_SENHA_USUARIO', SITE_URL . 'trocar-senha-usuario?cod=');
