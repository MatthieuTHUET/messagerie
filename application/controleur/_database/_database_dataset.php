        <h2>Génération de données</h2>
        <?=$message?>
        <?php if (!isset($btsubmit)) {?>
        <form method="post">
                <p>Est-vous sûr de vouloir lancer le script de génération d'un jeu de données ?</p>
                <input type="submit" name="btsubmit" value="OUI">
        </form>
        <?php } ?>
