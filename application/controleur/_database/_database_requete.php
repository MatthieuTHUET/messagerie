        <h1>Requête SQL</h1>
        <form method="post">
            <textarea name="sql" id="sql" rows="10" cols="80"><?= htmlspecialchars($sql, ENT_QUOTES) ?></textarea>
            <input type="submit" value="Ok" name="btSubmit">
        </form>                
        <?php  
        //affiche les messages d'erreurs
        if ($message!="")
            echo "<div id='message'>$message</div>";

        //affiche le résultat de la requête
        if ($data)
            arrayToHTML($data);
        ?>