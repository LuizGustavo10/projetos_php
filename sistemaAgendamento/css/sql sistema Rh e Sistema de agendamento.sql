CREATE TABLE funcionario (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(45),
  nome VARCHAR(45),
  salario VARCHAR(45),
  dataNascimento VARCHAR(45),
  funcao INT,
  cpf VARCHAR(45),
  senha VARCHAR(45)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO funcionario (id, codigo, nome, salario, dataNascimento, funcao, cpf, senha) VALUES
(1, '111', 'joão', '1000', '01-01-2000', 1, '12312312312', '123'),
(2, '222', 'Mara', '2000', '01-01-2000', 1, '12312312312', '123'),
(3, '333', 'luiz', '2000', '01-01-2000', 2, '12312312312', '123'),
(4, '444', 'lila', '3000', '01-01-2000', 1, '12312312312', '123');

CREATE TABLE funcoes (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  codigo INT,
  descricao VARCHAR(45)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO funcoes (id, codigo, descricao) VALUES
(1, 1, 'Programador Junior'),
(2, 2, 'Analista Pleno'),
(3, 3, 'Gerente de Projetos Master'),
(4, 6, 'Segurança');

CREATE TABLE usuario (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(45) NOT NULL,
  nome VARCHAR(45) NOT NULL,
  cpf VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO usuario (id, codigo, nome, cpf, senha)
VALUES (1, '1', 'adm', '12312312312','123');

CREATE TABLE agenda(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  data DATE,
  hora_inicio TIME,
  hora_fim TIME,
  horas TIME,
  curso VARCHAR(45),
  funcionario INT,
  obs VARCHAR(255)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

DELIMITER //
CREATE TRIGGER calcular_horas_trabalhadas
BEFORE INSERT ON agenda
FOR EACH ROW
BEGIN
  SET NEW.horas = TIMEDIFF(NEW.hora_fim, NEW.hora_inicio);
END;
//
DELIMITER ;

INSERT INTO agenda(id, data, hora_inicio, hora_fim, horas, curso, funcionario, obs) 
VALUES (1, '2023-10-28', '08:00:00','12:00:00', '', 'Programador Sistmas', 1, 'observacao');