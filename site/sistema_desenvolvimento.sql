USE quiz_system;

CREATE TABLE respostas_quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_professor VARCHAR(255) NOT NULL,
    seguir_profissao VARCHAR(10) NOT NULL,
    fazer_faculdade VARCHAR(3) NOT NULL,
    fazer_concurso VARCHAR(3) NOT NULL,
    parar_estudar VARCHAR(3) NOT NULL,
    data_resposta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
