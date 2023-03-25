/* Tabelas Banco de Dados */

CREATE TABLE IF NOT EXISTS funcionarios_filial (
id int primary key auto_increment,
matricula int(10) unique,
id_cracha int(15) unique,
usuario varchar(15),
nome varchar(50) not null,
senha varchar(16),
id_cargo smallint not null );

CREATE TABLE IF NOT EXISTS cargos_filial(
id_cargo smallint primary key auto_increment,
descricao_cargo varchar(30) not null
);

CREATE TABLE IF NOT EXISTS retirada_sacolas (
id_registro int primary key auto_increment,
id_cracha int(15) not null, 
quantidade smallint(4) not null,
data date not null,
hora time
);

CREATE TABLE IF NOT EXISTS devolucao_sacolas (
id_registro int primary key auto_increment,
id_cracha int(15) not null, 
quantidade smallint(4) not null,
data date not null,
hora time
);

CREATE TABLE IF NOT EXISTS estoque_sacolas (
  quantidade int not null
);

CREATE TABLE IF NOT EXISTS reg_estoque_sacolas (
id_registro int primary key auto_increment, 
usuario varchar(15) not null,
quantidade int not null,
data date not null,
hora time not null
);


/* Dados Tabela: funcionarios_filial */
INSERT INTO funcionarios_filial (matricula, usuario, nome, id_cargo) VALUES (106979, 'thbcosta', 'THIAGO BARROS COSTA',1)
INSERT INTO funcionarios_filial (matricula, usuario, nome, id_cargo) VALUES (100905, 'gebarcellos', 'GUILHERME EZEQUIAS DE MORAES BARCELLOS',1)
INSERT INTO estoque_sacolas (quantidade) VALUES (1250);

/* Dados Tabela: usuarios_autenticação */
CREATE TABLE IF NOT EXISTS usuariosc (
	id INT(11) NOT NULL AUTO_INCREMENT,
	matricula VARCHAR(30) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	filial VARCHAR(30) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	nomusuario VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	datacadastro DATE NULL DEFAULT NULL,
	user VARCHAR(20) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	senha VARCHAR(20) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	bloqueio VARCHAR(3) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	descsetor VARCHAR(30) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (id) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1
;
