<?php
require 'conexao.php';
require 'inc/header.php';

$cursos = [
  ['title'=>'Desenvolvimento de Sistemas','desc'=>'Formação em programação e sistemas.'],
  ['title'=>'Informática','desc'=>'Fundamentos de hardware e software.'],
  ['title'=>'Logística','desc'=>'Gestão de cadeias e processos logísticos.'],
  ['title'=>'Fabricação Mecânica','desc'=>'Usinagem, desenho industrial e prática.'],
  ['title'=>'Energia Renováveis','desc'=>'Fontes limpas, solar e eólica.'],
  ['title'=>'Segurança do Trabalho','desc'=>'Prevenção e saúde ocupacional.'],
  ['title'=>'Propedêutica','desc'=>'Módulos preparatórios e introdutórios.'],
  ['title'=>'Eletrônica','desc'=>'Circuitos, sensores e automação.']
];
?>

<h2>Cursos</h2>
<div class="row">
  <?php foreach($cursos as $c): ?>
    <div class="col-md-6 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title"><?php echo $c['title']; ?></h5>
          <p class="card-text"><?php echo $c['desc']; ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require 'inc/footer.php'; ?>