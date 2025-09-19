function showPage(pageNum) {
    document.querySelectorAll('.page').forEach(page => {
        page.classList.remove('active');
    });

    document.querySelectorAll('.nav-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    document.getElementById('page' + pageNum).classList.add('active');
    document.querySelectorAll('.nav-btn')[pageNum - 1].classList.add('active');
}

document.getElementById('quizForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    let resultHTML = '<ul>';
    
    resultHTML += `<li><strong>Melhor Professor:</strong> ${formData.get('melhor_professor')}</li>`;
    resultHTML += `<li><strong>Seguir carreira de desenvolvedor:</strong> ${formData.get('seguir_dev') === 'verdadeiro' ? 'Verdadeiro' : 'Falso'}</li>`;
    resultHTML += `<li><strong>Fazer faculdade:</strong> ${formData.get('faculdade') === 'sim' ? 'Sim' : 'Não'}</li>`;
    resultHTML += `<li><strong>Fazer concurso público:</strong> ${formData.get('concurso') === 'sim' ? 'Sim' : 'Não'}</li>`;
    resultHTML += `<li><strong>Parar de estudar:</strong> ${formData.get('parar_estudar') === 'sim' ? 'Sim' : 'Não'}</li>`;
    resultHTML += '</ul>';
    
    document.getElementById('resultContent').innerHTML = resultHTML;
    document.getElementById('quizResults').style.display = 'block';
    document.getElementById('quizResults').scrollIntoView({ behavior: 'smooth' });
});

document.addEventListener('DOMContentLoaded', function() {
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease-in';
        document.body.style.opacity = '1';
    }, 100);
});
