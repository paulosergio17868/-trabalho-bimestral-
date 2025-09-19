<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desenvolvimento de Sistemas - Minha Jornada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Desenvolvimento de Sistemas</h1>
            <p class="subtitle">Minha Jornada no Mundo da Programação</p>
            <div class="ai-credit">
                <strong>Trabalho elaborado com auxílio das IAs Claude da Anthropic e Gemini do Google</strong><br>
                Conforme normas ABNT para apresentação de trabalhos acadêmicos
            </div>
            <nav class="nav-buttons">
                <button class="nav-btn active" onclick="showPage(1)">O que é Desenvolvimento</button>
                <button class="nav-btn" onclick="showPage(2)">Meu Aprendizado</button>
                <button class="nav-btn" onclick="showPage(3)">Quiz</button>
            </nav>
        </header>

        <!-- PÁGINA 1 -->
        <div class="page active" id="page1">
            <h2>O que é Desenvolvimento de Sistemas</h2>
            <h3>Definição e Conceitos</h3>
            <p>O desenvolvimento de sistemas é uma área da tecnologia da informação que envolve a criação, planejamento, implementação e manutenção de sistemas computacionais...</p>
            <p>Um desenvolvedor de sistemas atua como um solucionador de problemas...</p>

            <h3>Como a Informática Mudou Minha Vida</h3>
            <p>A informática revolucionou completamente minha perspectiva sobre o mundo...</p>
        </div>

        <!-- PÁGINA 2 -->
        <div class="page" id="page2">
            <h2>Meu Aprendizado em Desenvolvimento de Sistemas</h2>
            <h3>Jornada de Aprendizado</h3>
            <p>Durante o curso técnico, mergulhei profundamente no universo da programação...</p>

            <h3>Tecnologias Dominadas</h3>
            <div class="tech-grid">
                <div class="tech-item">
                    <h4>HTML</h4>
                    <p>Linguagem de marcação fundamental...</p>
                </div>
                <!-- repete para CSS, JS, React, etc -->
            </div>
        </div>

        <!-- PÁGINA 3 - QUIZ -->
        <div class="page" id="page3">
            <h2>Quiz - Avaliação do Curso</h2>
            <form class="quiz-form" id="quizForm">
                <div class="question">
                    <h4>1. Qual professor foi o melhor do 3º ano?</h4>
                    <input type="text" name="melhor_professor" required placeholder="Digite o nome do professor">
                </div>

                <!-- Outras perguntas do quiz -->

                <center>
                    <button type="submit" class="submit-btn">Enviar Respostas</button>
                </center>
            </form>

            <div class="quiz-results" id="quizResults">
                <h3>Respostas Registradas</h3>
                <div id="resultContent"></div>
                <p><strong>Obrigado por participar do quiz!</strong></p>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2024 - Trabalho de Desenvolvimento de Sistemas</p>
            <p>Elaborado seguindo normas ABNT com auxílio das IAs Claude da Anthropic e Gemini do Google</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>
