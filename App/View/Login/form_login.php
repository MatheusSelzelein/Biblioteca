<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#17110d">
  <title>SisBiblioteca | Acesso</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="/Assets/css/library.css" rel="stylesheet">
  <link href="/Assets/img/icone-teste.PNG" rel="icon" type="image/PNG">
</head>
<body class="login-page">
  <main class="login-shell">
    <section class="login-story" aria-label="Apresentação">
      <span class="eyebrow">SisBiblioteca</span>
      <h1>Seu acervo, sempre bem cuidado.</h1>
      <p>Entre para administrar leitores, obras e empréstimos com praticidade.</p>
    </section>

    <section class="login-card" aria-labelledby="login-title">
      <span class="eyebrow">Área restrita</span>
      <h2 id="login-title">Bem-vindo de volta</h2>
      <p>Use suas credenciais para continuar.</p>

      <form method="post" action="/login">
        <div class="login-error" role="alert"><?= htmlspecialchars((string) ($erro ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" value="<?= htmlspecialchars((string) ($model->Email ?? ''), ENT_QUOTES, 'UTF-8') ?>" class="form-control" name="email" id="email" placeholder="seu@email.com" autocomplete="email" required autofocus>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <div class="input-wrap">
            <input type="password" class="form-control pe-5" name="senha" id="senha" placeholder="Digite sua senha" autocomplete="current-password" required>
            <button class="toggle-password" type="button" data-toggle-password aria-label="Mostrar ou ocultar senha" aria-pressed="false">Mostrar</button>
          </div>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" name="lembrar" id="lembrar">
          <label class="form-check-label" for="lembrar">Lembrar meu usuário</label>
        </div>
        <button type="submit" class="btn btn-login">Entrar no sistema <span aria-hidden="true">→</span></button>
      </form>
    </section>
  </main>
  <script src="/Assets/js/library.js"></script>
</body>
</html>
