<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#17110d">
  <title>SisBiblioteca | Início</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="/assets/css/library.css" rel="stylesheet">
  <link href="/assets/img/icone-teste.PNG" rel="icon" type="image/png">
</head>
<body class="home-page">
  <?php include VIEWS . '/Includes/Menu.php' ?>

  <main>
    <section class="hero" aria-labelledby="hero-title">
      <div class="hero-content">
        <span class="eyebrow">Gestão inteligente do acervo</span>
        <h1 id="hero-title">Conhecimento que <em>atravessa o tempo.</em></h1>
        <p class="hero-text">Organize livros, leitores e empréstimos em um só lugar. Uma experiência simples e elegante para manter cada história ao alcance.</p>
        <div class="hero-actions">
          <a class="btn-gold" href="/livro">Explorar acervo <span aria-hidden="true">→</span></a>
          <a class="btn-ghost" href="/emprestimo/cadastro">Novo empréstimo</a>
        </div>
      </div>
    </section>

    <section class="quick-panel" aria-labelledby="quick-title">
      <div class="panel-heading">
        <div>
          <span class="eyebrow">Acesso rápido</span>
          <h2 id="quick-title">O que você deseja gerenciar?</h2>
        </div>
        <p>Selecione uma área para começar.</p>
      </div>
      <div class="quick-grid">
        <a class="quick-card" href="/livro"><span class="card-icon" aria-hidden="true">▤</span><strong>Livros</strong><span>Consulte e edite o acervo</span></a>
        <a class="quick-card" href="/emprestimo"><span class="card-icon" aria-hidden="true">↔</span><strong>Empréstimos</strong><span>Acompanhe movimentações</span></a>
        <a class="quick-card" href="/aluno"><span class="card-icon" aria-hidden="true">♙</span><strong>Alunos</strong><span>Gerencie os leitores</span></a>
        <a class="quick-card" href="/autor"><span class="card-icon" aria-hidden="true">✎</span><strong>Autores</strong><span>Organize os escritores</span></a>
        <a class="quick-card" href="/categoria"><span class="card-icon" aria-hidden="true">◇</span><strong>Categorias</strong><span>Classifique os títulos</span></a>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="/assets/js/library.js"></script>
</body>
</html>
