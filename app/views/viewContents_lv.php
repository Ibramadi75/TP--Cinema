<?php

/**
 * Vue liste des contenus / Formulaire de recherche des contenus
 */

?>

<h1>Recherche de films</h1>

<label for="">Catégorie :</label>

<select name="list_categorie" id="list_categorie">
    <?php
        foreach ($monPdo->getCategories() as $categorie) 
        {
            echo'<option value="' . $categorie['cat']. '">' . $categorie['libelle'] . '</option>';
        }
    ?>
</select>


<label for="">Année :</label>
<select name="liste_annee" id="list_annee">
    <?php
        for($i = 1895;$i <= date("Y"); $i++)
        {
            echo'<option value="' . $i . '">'.$i.'</option>';
            $i++ ;
        }
    ?>
</select>

<fieldset>
    <legend>Durée:</legend>
    <div>
      <input type="radio" id="90" name="minute" value="90"
             checked>
      <label for="90">90</label>
    </div>
    <div>
      <input type="radio" id="120" name="minute" value="120">
      <label for="120">120</label>
    </div>
</fieldset>


