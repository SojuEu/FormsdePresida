<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscrição para Presidente dos EUA</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    body {
      background-color: #f0f4f8;
    }

    .header-banner {
      /* background: linear-gradient(135deg, #0d1b4b, #1a3a8f); */
      color: #fff;
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .fundo-aguia {
      background-image: url("./img/trump.jpg");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      position: relative;
      background-attachment: fixed;
    }

    .fundo-aguia::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2);
      z-index: 0;
    }

    .fundo-aguia>* {
      position: relative;
      z-index: 1;
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

    .btn-submit {
      background: linear-gradient(135deg, #0d1b4b, #1a3a8f);
      border: none;
      font-weight: 600;
    }

    .btn-submit:hover {
      opacity: 0.9;
    }

    .img-preview {
      display: none;
      width: 100%;
      max-width: 50%;
      height: auto;
      margin-top: 15px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-check-label {
      cursor: pointer;
    }
  </style>
</head>

<body class="py-4 fundo-aguia">
  <div class="container" style="max-width: 780px">
    <div class="header-banner">
      <div style="font-size: 2.5rem">Candidate-se</div>
      <h1 class="h4 fw-bold mt-2 mb-1">
        Inscrição para Candidato à Presidência dos EUA
      </h1>
      <p class="mb-0 small opacity-75">
        Preencha todos os campos obrigatórios para enviar seu formulário
      </p>
    </div>

    <form action="dados.php" method="POST" enctype="multipart/form-data">
      <!-- 1. DADOS PESSOAIS -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-person-fill me-1"></i> 1. Dados Pessoais
          </p>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Nome completo <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nome" required placeholder="Seu nome completo" />
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Data de nascimento <span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="data_nasc" required max="<?= date('Y-m-d') ?>" />
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Estado natal <span class="text-danger">*</span></label>
              <select class="form-select" name="estado_natal" required>
                <option value="">Selecione...</option>
                <?php foreach
                ([
                    'Alabama',
                    'Alaska',
                    'Arizona',
                    'Arkansas',
                    'California',
                    'Colorado',
                    'Connecticut',
                    'Delaware',
                    'Florida',
                    'Georgia',
                    'Hawaii',
                    'Idaho',
                    'Illinois',
                    'Indiana',
                    'Iowa',
                    'Kansas',
                    'Kentucky',
                    'Louisiana',
                    'Maine',
                    'Maryland',
                    'Massachusetts',
                    'Michigan',
                    'Minnesota',
                    'Mississippi',
                    'Missouri',
                    'Montana',
                    'Nebraska',
                    'Nevada',
                    'New
                  Hampshire',
                    'New Jersey',
                    'New Mexico',
                    'New York',
                    'North
                  Carolina',
                    'North
                  Dakota',
                    'Ohio',
                    'Oklahoma',
                    'Oregon',
                    'Pennsylvania',
                    'Rhode
                  Island',
                    'South Carolina',
                    'South
                  Dakota',
                    'Tennessee',
                    'Texas',
                    'Utah',
                    'Vermont',
                    'Virginia',
                    'Washington',
                    'West
                  Virginia',
                    'Wisconsin',
                    'Wyoming'
                  ] as $e): ?>
                  <option><?= $e ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">E-mail de contato <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="email" required placeholder="seu@email.com" />
            </div>
          </div>
        </div>
      </div>

      <!-- 2. ELEGIBILIDADE -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-shield-check-fill me-1"></i> 2. Requisitos de
            Elegibilidade
          </p>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Você é nativo dos EUA?
                <span class="text-danger">*</span></label>
              <div class="d-flex gap-4 mt-1">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cidadao_nato" value="Sim" required id="cn_sim" />
                  <label class="form-check-label" for="cn_sim">Sim</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cidadao_nato" value="Não" id="cn_nao" />
                  <label class="form-check-label" for="cn_nao">Não</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Anos residente nos EUA
                <span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="anos_residencia" min="0" max="100" placeholder="Ex: 30"
                required />
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Já ocupou cargo público?
                <span class="text-danger">*</span></label>
              <div class="d-flex gap-4 mt-1">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cargo_publico" value="Sim" required id="cp_sim" />
                  <label class="form-check-label" for="cp_sim">Sim</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cargo_publico" value="Não" id="cp_nao" />
                  <label class="form-check-label" for="cp_nao">Não</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Último cargo (se houver)</label>
              <input type="text" class="form-control" name="ultimo_cargo" placeholder="Ex: Senador, Governador..." />
            </div>
          </div>
        </div>
      </div>

      <!-- 3. PARTIDO E PLATAFORMA -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-flag-fill me-1"></i> 3. Partido e Plataforma
            Política
          </p>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Filiação partidária <span class="text-danger">*</span></label>
              <select class="form-select" name="partido" required>
                <option value="">Selecione...</option>
                <option>Partido Republicano</option>
                <option>Partido Libertário</option>
                <option>Partido Verde</option>
                <option>Independente</option>
                <option>Partido Democrata</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Slogan de campanha <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="slogan" required
                placeholder="Seu slogan em até 10 palavras" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Principais áreas de foco (marque até 3)</label>
              <div class="row g-2 mt-1">
                <?php foreach ([
                  'Economia',
                  'Saúde',
                  'Educação',
                  'Defesa e Segurança',
                  'Meio Ambiente',
                  'Imigração',
                  'Tecnologia',
                  'Direitos Civis'
                ] as $area): ?>
                  <div class="col-6 col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="areas[]" value="<?= $area ?>"
                        id="area_<?= md5($area) ?>" />
                      <label class="form-check-label" for="area_<?= md5($area) ?>"><?= $area ?></label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Proposta principal de governo
                <span class="text-danger">*</span></label>
              <textarea class="form-control" name="proposta_principal" rows="4" required
                placeholder="Descreva sua principal proposta em até 200 palavras..."></textarea>
            </div>
          </div>
        </div>
      </div>

      <!-- 4. EXPERIÊNCIA -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-briefcase-fill me-1"></i> 4. Formação e
            Experiência
          </p>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Formação acadêmica <span class="text-danger">*</span></label>
              <select class="form-select" name="formacao" required>
                <option value="">Selecione...</option>
                <option>Ensino médio</option>
                <option>Graduação</option>
                <option>Pós-graduação / MBA</option>
                <option>Mestrado</option>
                <option>Doutorado</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Área de formação</label>
              <input type="text" class="form-control" name="area_formacao"
                placeholder="Ex: Retirada de Imigrantes, Economia Alemã..." />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Resumo de experiência profissional
                <span class="text-danger">*</span></label>
              <textarea class="form-control" name="experiencia" rows="3" required
                placeholder="Liste cargos, se já expulsou algum mexicano..."></textarea>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Como avalia seu preparo para o cargo? (1–5)</label>
              <div class="d-flex gap-3 mt-1">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="autopreparo" value="<?= $i ?>" id="ap_<?= $i ?>" />
                    <label class="form-check-label" for="ap_<?= $i ?>"><?= $i ?></label>
                  </div>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. DECLARAÇÕES -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-pen-fill me-1"></i> 5. Declarações Finais
          </p>
          <div class="row g-3">
            <div class="col-12">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="declaracao_veracidade" value="Sim" id="dv"
                  required />
                <label class="form-check-label" for="dv">Confirmo que todas as informações fornecidas são
                  verdadeiras e precisas.
                  <span class="text-danger">*</span></label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="declaracao_elegibilidade" value="Sim" id="de"
                  required />
                <label class="form-check-label" for="de">Confirmo que tenho mais de 35 anos de idade.
                  <span class="text-danger">*</span></label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="declaracao_residencia" value="Sim" id="dr"
                  required />
                <label class="form-check-label" for="dr">Confirmo que resido nos EUA há pelo menos 14 anos.
                  <span class="text-danger">*</span></label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Candidato a vice-presidente</label>
              <input type="text" class="form-control" name="vice_presidente" placeholder="Nome completo do seu vice" />
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Observações adicionais</label>
              <textarea class="form-control" name="observacoes" rows="3"
                placeholder="Qualquer informação complementar..."></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <p class="section-title">
            <i class="bi bi-pen-fill me-1"></i> Foto do Candidato(a)
          </p>
          <label for="foto" class="form-label">Foto do Candidato(a):</label>
          <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
          <img id="preview" src="" alt="Preview da imagem" class="img-preview">
        </div>
      </div>

      <div class="d-grid mb-2">
        <button type="submit" class="btn btn-submit btn-lg text-white">
          <i class="bi bi-send-fill me-2"></i>Enviar Candidatura
        </button>
      </div>
      <p class="text-center text-white small mb-5">
        Formulário de demonstração. Dados analisados pela FEC.
      </p>
    </form>
  </div>
  <script>
    const imagemInput = document.getElementById('foto');
    const preview = document.getElementById('preview');

    imagemInput.addEventListener('change', function () {
      const arquivo = this.files[0];

      if (arquivo) {
        const reader = new FileReader();

        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };

        reader.readAsDataURL(arquivo);
      }
    });
  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>