<?php $this->titre = "Consommation Journalière"; ?>
<?php
    foreach($conso as $consos){
        echo $consos['valeur'];
    }
?>