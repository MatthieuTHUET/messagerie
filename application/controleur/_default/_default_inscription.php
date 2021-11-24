<?php if ($inscription_reussie) {?>
        <h2>Inscription réussié !</h2>
<?php } else { ?>
        <?=$message?>
        <h1>Inscription</h1>
        <form method="post" onsubmit="return verif()">
            <p><label for='uti_login'>uti_login : </label><input type='text' name='uti_login' id='uti_login' required></p>
            <p><label for='uti_mdp'>uti_mdp : </label><input type='text' name='uti_mdp' id='uti_mdp' required></p>
            <p><label for="uti_mdp2">Ressaisir votre mot de passe :</label><input type="password" name="uti_mdp2" id="uti_mdp2" required></p>
            <p><input type="submit" name="btSubmit" value="s'inscrire"></p>
        </form>

<script>
    function verif() {
        let obj=document.getElementById("uti_mdp");
        let obj2=document.getElementById("uti_mdp2");
        if (obj.value==obj2.value)
            return true;
        else {
            alert("erreur de confirmation du mot de passe");
            return false;
        }
    }

</script>
<?php } ?>