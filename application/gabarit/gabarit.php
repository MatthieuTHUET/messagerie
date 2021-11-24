<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require "../application/gabarit/inc_head.php"; ?>
</head>

<body>
    <a href="#main" class="sr-only">Allez au contenu principal</a>
    <!-- entete de page -->
    <header>
        <?php require "../application/gabarit/inc_entete.php"; ?>
    </header>
    <!-- liens de navigation -->
    <nav id="navigation">
        <?php require "../application/gabarit/inc_menu.php"; ?>
    </nav>
    <!-- contenu principal -->
    <div id="main">
        <?php require $vue; ?>
    </div>
    <!-- pied de page -->
    <footer>
        <?php require "../application/gabarit/inc_pied.php"; ?>
    </footer>
</body>

</html>