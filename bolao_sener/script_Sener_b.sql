CREATE TABLE Cadastros
(
id_cadastrado int(10) AUTO_INCREMENT,
Nome VARCHAR(55) NOT NULL,
setor VARCHAR(30) NOT NULL,
diciplina VARCHAR (30) NOT NULL,
PRIMARY KEY(id_cadastrado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

select*from cadastros;

ALTER TABLE Cadastros
ADD COLUMN pagamento VARCHAR (4);