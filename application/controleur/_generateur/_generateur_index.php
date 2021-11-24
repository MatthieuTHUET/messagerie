        <h1>Générateur de CRUD</h1>
        <blockquote>
            Après utilisation, pensez à supprimer le module "_generateur" avant la mise en production.
        </blockquote>
        <div id="message">
        <?=$message?>
        </div>
        <h3>Liste des tables</h3>
        <form method="post" onsubmit="return confirm('Etes-vous sûr de vouloir écraser vos fichiers ?')">
			<p>
				<label for="prefixe">Longueur du préfixe pour les noms de champs : </label>
				<input type="number" name="prefixe" id="prefixe" value="<?=$prefixe?>">
			</p>
        <?php
        foreach($tables as $cle=>$table) { 
            //$ck=isset($_POST["table$cle"])? " checked " : "";
			$ck=" checked ";
            ?>			
            <p>                                
                <input type="checkbox" name="table<?=$cle?>" id="table<?=$cle?>" <?=$ck?>>
                <label for="table<?=$cle?>"><?=$table?></label>
            </p>
        <?php }
        ?>
        <input type="submit" name="btSubmit" value="Genérer !">
        </form>
