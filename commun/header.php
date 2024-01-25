    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/bsDropdownAnim.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<header>

<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-md">
    <a class="navbar-brand" href="index.php">Accueil</a>

    <!-- Bouton affichage menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Elements navbar -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                L'association
            </a>
            <ul class="dropdown-menu animate slideIn">
                <li><a class="dropdown-item" href="actualites.php">Actualités</a></li>
                <li><a class="dropdown-item" href="emplois.php">Offres d'emplois</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Adoption
            </a>
            <ul class="dropdown-menu animate slideIn">
                <li><a class="dropdown-item" href="#">Infos adoption</a></li>
                <li><a class="dropdown-item" href="chiens.php">Chiens</a></li>
                <li><a class="dropdown-item" href="chats.php">Chats</a></li>
                <li><a class="dropdown-item" href="autres.php">Autres</a></li>
                <li><a class="dropdown-item" href="#">Adoptions SOS</a></li>
                <li><a class="dropdown-item" href="#">Les adoptés</a></li>
                <li><a class="dropdown-item" href="#">Formation chien catégorisés</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Aider le refuge
            </a>
            <ul class="dropdown-menu animate slideIn">
                <li><a class="dropdown-item" href="benevolat.php">Bénévolat</a></li>
                <li><a class="dropdown-item" href="#">Famille d'accueil</a></li>
                <li><a class="dropdown-item" href="#">Devenir adhérent</a></li>
                <li><a class="dropdown-item" href="#">Parrainage</a></li>
                <li><a class="dropdown-item" href="#">Faire un don</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Conseils
            </a>
            <ul class="dropdown-menu animate slideIn">
                <li><a class="dropdown-item" href="#">Signaler une maltraitance</a></li>
                <li><a class="dropdown-item" href="#">Abandon</a></li>
            </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Nos partenaires</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/refugedereims51/" target="_blank">
            <img src="medias/images/logos/logo_fb.png" alt="Facebook Refuge Les Amis des Bêtes" class="navbarIcon">
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

</header>