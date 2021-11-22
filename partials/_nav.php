
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <?php if(!is_logged_in()):?>
      <a class="navbar-brand" href="index.php"><?php echo WEBSITE_NAME; ?></a>
      <?php else: ?>
      <a class="navbar-brand" href="index.php"><?php echo WEBSITE_NAME; ?></a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      <a class="nav-link" aria-current="page" href="add_reviews.php">Ajout avis</a>
      <?php if( is_logged_in() ):?>
        <a class="nav-link" href="logout.php">Déconnexion</a>
      <?php else: ?>  
          <div class="nav-link <?php echo set_active('login')?>"><a href="login.php">Connexion</a></div>
          <div class="nav-link <?php echo set_active('register')?>"><a href="register.php">Inscription </a></div>
      <?php endif; ?>
      </div>
    </div>
  </div>
</nav>



