<?php
require __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

$cursos = [
  ['titulo'=>'Desenvolvimento de Sistemas','descricao'=>'Formação em programação, banco de dados e desenvolvimento web.'],
  ['titulo'=>'Informática','descricao'=>'Noções de hardware, software e suporte técnico.'],
  ['titulo'=>'Logística','descricao'=>'Processos logísticos, armazenamento e distribuição.'],
  ['titulo'=>'Fabricação Mecânica','descricao'=>'Técnicas de usinagem e produção industrial.'],
  ['titulo'=>'Energias Renováveis','descricao'=>'Conceitos e aplicações de energias limpas.'],
  ['titulo'=>'Segurança do Trabalho','descricao'=>'Normas de segurança e prevenção de acidentes.'],
  ['titulo'=>'Propedêutica','descricao'=>'Base para outros cursos técnicos.'],
  ['titulo'=>'Eletrônica','descricao'=>'Princípios de circuitos e eletrônica aplicada.']
];
?>
<h1>Cursos Oferecidos</h1>
<div class="row">
  <?php foreach($cursos as $curso): ?>
    <div class="col-md-3 mb-3">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= htmlspecialchars($curso['titulo']) ?></h5>
          <p class="card-text flex-grow-1"><?= htmlspecialchars($curso['descricao']) ?></p>
          <a href="#" class="btn btn-primary mt-2">Saiba mais</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
