<?php
require 'conexao.php';
require 'inc/header.php';

// Texto sobre a escola
$texto_escola = "A Escola Estadual Presidente Dutra foi fundada com a missão de formar cidadãos e profissionais preparados para o mercado. Aqui oferecemos cursos técnicos e práticas voltadas ao desenvolvimento regional.";

// Carrossel usando imagens físicas em /assets/img/carrossel/img1.jpg ... img8.jpg
$imagens = [];
for ($i=1; $i<=8; $i++){
    $path = "assets/img/carrossel/img{$i}.jpg";
    if(file_exists($path)) $imagens[] = $path;
}

// Caso queira usar imagens cadastradas na tabela tb_carrossel (opcional)
try {
    $rows = $pdo->query("SELECT imagem FROM tb_carrossel")->fetchAll();
    if($rows){
        // Mescla sem duplicar: prioriza os arquivos físicos, adiciona os de DB se diferente
        foreach($rows as $r) if(!in_array($r['imagem'],$imagens)) $imagens[] = $r['imagem'];
    }
} catch (Exception $e){
    // sem problema, tabela pode estar vazia
}

shuffle($imagens);
$imagens = array_slice($imagens, 0, 8); // garante no máximo 8
?>

<div class="row">
  <div class="col-md-8">
    <h1>Bem-vindo à EEPD - BH</h1>
    <p><?php echo nl2br(htmlspecialchars($texto_escola)); ?></p>

    <?php if(count($imagens) > 0): ?>
      <div id="mainCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php for($i=0;$i<count($imagens);$i++): ?>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i===0?'active':''; ?>"></button>
          <?php endfor; ?>
        </div>
        <div class="carousel-inner">
          <?php foreach($imagens as $i => $src): ?>
            <div class="carousel-item <?php echo $i===0 ? 'active' : ''; ?>">
              <img src="<?php echo $src; ?>" class="d-block w-100" style="max-height:420px; object-fit:cover;">
            </div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">Nenhuma imagem encontrada em <code>/assets/img/carrossel/</code> ou tb_carrossel.</div>
    <?php endif; ?>

  </div>

  <div class="col-md-4">
    <h4>Cursos</h4>
    <ul class="list-group mb-3">
      <?php
      $cursos = [
        'Desenvolvimento de Sistemas','Informática','Logística','Fabricação Mecânica',
        'Energia Renováveis','Segurança do Trabalho','Propedêutica','Eletrônica'
      ];
      foreach($cursos as $c): ?>
        <li class="list-group-item"><?php echo htmlspecialchars($c); ?></li>
      <?php endforeach; ?>
    </ul>

    <div class="card">
      <div class="card-body">
        <h5>Contato Rápido</h5>
        <p>Endereço: Rua xxx Nº xxxx, Belo Horizonte - MG</p>
        <a href="/contato.php" class="btn btn-outline-primary btn-sm">Enviar mensagem</a>
      </div>
    </div>

  </div>
</div>

<?php require 'inc/footer.php'; ?>