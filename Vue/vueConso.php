<?php $this->titre = "Consommation"; ?>
    <?php
    if (isset($_POST['showButton'])){
        foreach($consosDates as $valeur){
            $value = $valeur['conso_dates'];
            $quartier = $valeur['quartier'];
            echo "<input name='valeur' type='hidden' value='$value'>";
            echo "<input name='date' type='hidden' value='$quartier'>";
        }
    }
    else {
        foreach($conso as $valeur){
          $value = $valeur['conso_dernier_jour'];
          $quartier = $valeur['quartier'];
          echo "<input name='valeur' type='hidden' value='$value'>";
          echo "<input name='date' type='hidden' value='$quartier'>";
        }
    }
        if (isset($_POST['start-date'])){
          $startDate = htmlspecialchars($_POST['start-date']);
        }
        if (isset($_POST['end-date'])){
          $endDate = htmlspecialchars($_POST['end-date']);
        }
    ?>
<form action="index.php?action=changeconso" method="post">
  <input type="date" required id="start-date" name="start-date" value="<?=isset($startDate)?$startDate:""?>">
  <input type="date" required id="end-date" name="end-date" value="<?=isset($endDate)?$endDate:""?>">
  <input type="submit" name="showButton" value="show">
</form>
<div class="containerCanvas">
 <canvas id="myChart"></canvas>
</div>
<button id="download">Download</button>
<script src="chartjs/chart.js"></script>
<script src="chartjs/html2canvas.js"></script>
<script>
    const values = document.querySelectorAll("input[name='valeur']");
    const dates = document.querySelectorAll("input[name='date']");
    let valuesList = [];
    let datesList = [];
    const colors = ['rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'];

    values.forEach(val => {
        valuesList.push(val.value);
    });

    dates.forEach(date => {
        datesList.push(date.value);
    })

    const context = document.getElementById('myChart');

  new Chart(context, {
    type: 'polarArea',
    data: {
      labels:datesList,
      datasets: [{
        label: 'Consommation en m3',
        data: valuesList,
        backgroundColor: colors,
        borderWidth: 1
      }]
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // changer automatiquement le min de end-date
  const startDate =document.getElementById('start-date');
  const endDate =document.getElementById('end-date');

  startDate.addEventListener('change', function(){
    endDate.min = this.value;

    if (endDateInput.value < this.value) {
      endDateInput.value = this.value;
    }
  });

  const donwloadButton = document.getElementById('download');
  const containerCanvas =document.querySelector('.containerCanvas');
  console.log(containerCanvas);

  donwloadButton.addEventListener('click', function(){
    const captureArea = containerCanvas;

    html2canvas(captureArea).then(canvas => {
        // conversion du canvas en image
        const imgData = canvas.toDataURL("image/png");

        // lien du download
        const link = document.createElement('a');
        link.href = imgData;
        link.download = 'Consommation.png';

        // clic pour le download
        link.click();
    }).catch(error => {
        console.error("Erreur lors de la capture : ", error);
    });
  });
</script>