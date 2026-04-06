<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidatura Recebida</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body { background-color: #f0f4f8; }
    .header-banner {
      background: linear-gradient(135deg, #0d1b4b, #1a3a8f);
      color: #fff;
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .section-title {
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      color: #0d1b4b;
      border-bottom: 2px solid #c8372d;
      padding-bottom: 0.4rem;
      margin-bottom: 1.25rem;
    }
    .info-label { font-size: 0.82rem; color: #6c757d; font-weight: 600; }
    .info-value { font-size: 0.95rem; color: #1a1a2e; }
    .stars { color: #f4a11e; font-size: 1.1rem; }
  </style>
</head>
<body class="py-4">
<div class="container" style="max-width: 780px;">

<?php
  function limpar($dado) {
    return htmlspecialchars(trim($dado ?? ''), ENT_QUOTES, 'UTF-8');
  }

  $nome            = limpar($_POST['nome'] ?? '');
  $data_nasc       = limpar($_POST['data_nasc'] ?? '');
  $estado_natal    = limpar($_POST['estado_natal'] ?? '');
  $email           = limpar($_POST['email'] ?? '');
  $cidadao_nato    = limpar($_POST['cidadao_nato'] ?? '');
  $anos_residencia = limpar($_POST['anos_residencia'] ?? '');
  $cargo_publico   = limpar($_POST['cargo_publico'] ?? '');
  $ultimo_cargo    = limpar($_POST['ultimo_cargo'] ?? '—');
  $partido         = limpar($_POST['partido'] ?? '');
  $slogan          = limpar($_POST['slogan'] ?? '');
  $areas           = $_POST['areas'] ?? [];
  $proposta        = limpar($_POST['proposta_principal'] ?? '');
  $formacao        = limpar($_POST['formacao'] ?? '');
  $area_formacao   = limpar($_POST['area_formacao'] ?? '—');
  $experiencia     = limpar($_POST['experiencia'] ?? '');
  $autopreparo     = (int)($_POST['autopreparo'] ?? 0);
  $vice            = limpar($_POST['vice_presidente'] ?? '—');
  $observacoes     = limpar($_POST['observacoes'] ?? '—');

  $decl_ver  = isset($_POST['declaracao_veracidade'])   ? true : false;
  $decl_ele  = isset($_POST['declaracao_elegibilidade']) ? true : false;
  $decl_res  = isset($_POST['declaracao_residencia'])   ? true : false;

  $idade = '';
  if ($data_nasc) {
    $nasc = new DateTime($data_nasc);
    $hoje = new DateTime();
    $idade = $nasc->diff($hoje)->y . ' anos';
  }

  $estrelas = str_repeat('★', $autopreparo) . str_repeat('☆', 5 - $autopreparo);

  if (empty($nome)) {
    echo '<div class="alert alert-warning text-center">Nenhum dado recebido. <a href="formulario.php">Voltar ao formulário</a></div>';
    exit;
  }

  function badge_bool($val, $label_ok = 'Confirmado', $label_no = 'Não confirmado') {
    $cls = $val ? 'success' : 'danger';
    $txt = $val ? $label_ok : $label_no;
    $ico = $val ? 'check-circle-fill' : 'x-circle-fill';
    return "<span class='badge bg-{$cls}'><i class='bi bi-{$ico} me-1'></i>{$txt}</span>";
  }
?>

  <div class="header-banner">
    <div style="font-size:2.5rem;">🗳️</div>
    <h1 class="h4 fw-bold mt-2 mb-1">Candidatura Recebida!</h1>
    <p class="mb-0 small opacity-75">Os dados de <strong><?= $nome ?></strong> foram registrados com sucesso.</p>
  </div>

  <!-- DADOS PESSOAIS -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p class="section-title"><i class="bi bi-person-fill me-1"></i> Dados Pessoais</p>
      <div class="row g-3">
        <div class="col-md-6">
          <p class="info-label mb-0">Nome completo</p>
          <p class="info-value"><?= $nome ?></p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Data de nascimento</p>
          <p class="info-value"><?= $data_nasc ?> <?= $idade ? "($idade)" : '' ?></p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Estado natal</p>
          <p class="info-value"><?= $estado_natal ?></p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">E-mail</p>
          <p class="info-value"><?= $email ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- ELEGIBILIDADE -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p class="section-title"><i class="bi bi-shield-check-fill me-1"></i> Requisitos de Elegibilidade</p>
      <div class="row g-3">
        <div class="col-md-6">
          <p class="info-label mb-1">Cidadão nato dos EUA</p>
          <span class="badge <?= $cidadao_nato === 'Sim' ? 'bg-success' : 'bg-danger' ?>"><?= $cidadao_nato ?></span>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Anos de residência</p>
          <p class="info-value"><?= $anos_residencia ?> anos</p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-1">Já ocupou cargo público</p>
          <span class="badge bg-secondary"><?= $cargo_publico ?></span>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Último cargo</p>
          <p class="info-value"><?= $ultimo_cargo ?: '—' ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- PARTIDO E PLATAFORMA -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p class="section-title"><i class="bi bi-flag-fill me-1"></i> Partido e Plataforma</p>
      <div class="row g-3">
        <div class="col-md-6">
          <p class="info-label mb-0">Partido</p>
          <p class="info-value"><?= $partido ?></p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Slogan</p>
          <p class="info-value fst-italic">"<?= $slogan ?>"</p>
        </div>
        <div class="col-12">
          <p class="info-label mb-1">Áreas de foco</p>
          <?php if (!empty($areas)): ?>
            <?php foreach ($areas as $a): ?>
              <span class="badge bg-primary me-1 mb-1"><?= limpar($a) ?></span>
            <?php endforeach; ?>
          <?php else: ?>
            <span class="text-muted small">Nenhuma selecionada</span>
          <?php endif; ?>
        </div>
        <div class="col-12">
          <p class="info-label mb-1">Proposta principal</p>
          <div class="bg-light rounded p-3 small"><?= nl2br($proposta) ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- EXPERIÊNCIA -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p class="section-title"><i class="bi bi-briefcase-fill me-1"></i> Formação e Experiência</p>
      <div class="row g-3">
        <div class="col-md-6">
          <p class="info-label mb-0">Formação acadêmica</p>
          <p class="info-value"><?= $formacao ?></p>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Área de formação</p>
          <p class="info-value"><?= $area_formacao ?: '—' ?></p>
        </div>
        <div class="col-12">
          <p class="info-label mb-1">Autopreparo (1–5)</p>
          <span class="stars"><?= $estrelas ?></span>
          <span class="text-muted small ms-1">(<?= $autopreparo ?>)</span>
        </div>
        <div class="col-12">
          <p class="info-label mb-1">Experiência profissional</p>
          <div class="bg-light rounded p-3 small"><?= nl2br($experiencia) ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- DECLARAÇÕES -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p class="section-title"><i class="bi bi-pen-fill me-1"></i> Declarações e Complementos</p>
      <div class="row g-3">
        <div class="col-12">
          <div class="d-flex flex-column gap-2">
            <div><?= badge_bool($decl_ver) ?> <span class="small ms-1">Veracidade das informações</span></div>
            <div><?= badge_bool($decl_ele) ?> <span class="small ms-1">Possui mais de 35 anos</span></div>
            <div><?= badge_bool($decl_res) ?> <span class="small ms-1">Reside há 14+ anos nos EUA</span></div>
          </div>
        </div>
        <div class="col-md-6">
          <p class="info-label mb-0">Vice-presidente indicado</p>
          <p class="info-value"><?= $vice ?: '—' ?></p>
        </div>
        <?php if ($observacoes && $observacoes !== '—'): ?>
        <div class="col-12">
          <p class="info-label mb-1">Observações</p>
          <div class="bg-light rounded p-3 small"><?= nl2br($observacoes) ?></div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="text-center pb-5">
    <a href="index.php" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left me-1"></i> Voltar ao Formulário
    </a>
  </div>

</div>
<script src="js\bootstrap.bundle.min.js"></script>
</body>
</html>
