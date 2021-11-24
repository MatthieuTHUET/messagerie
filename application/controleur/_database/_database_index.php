        <h1>Script de création de la base de données</h1>
        <i>Copier/coller ici le script de création de votre base de données</i>
        <form method="post">
            <textarea name="sql" id="sql" rows="10" cols="80"><?= htmlspecialchars($sql, ENT_QUOTES) ?></textarea>
            <input type="submit" value="Ok" name="btSubmit">
        </form>
        
        <?php
        //affiche les messages d'erreurs
        if ($message!="")
            echo "<div id='message'>$message</div>";

        foreach($data as $table)
            arrayToHTML($table);        
        ?>