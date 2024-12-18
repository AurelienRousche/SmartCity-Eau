<?php $this->titre = "Consommation Journalière"; ?>
<div id="graph">
        <div class="graph">

    </div>
    <div class="date">
    <?php
        foreach($conso as $valeur){
            $value = $valeur['valeur_litres'];
            $date = $valeur['date'];
            echo "<input type='hidden' value='$value'>";
            echo "<p>$date</p>";
        }
    ?>   
    </div>
</div>

<script>
    const graph =document.querySelector('.graph');
    const values = document.querySelectorAll('.date input');
    console.log(values);

    values.forEach(val => {
        const box =document.createElement('div');
        box.classList.add('percentage');
        box.style.setProperty('--height', val.value / 10 + "px");
        graph.appendChild(box);
    });

</script>