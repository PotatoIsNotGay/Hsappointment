<html>
  <head>
    <?php
      include '../dbconn.php';


      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the count of specialists
        $query1 = 'SELECT * FROM doctors WHERE specialist_id = 1';
        $query_run1 = $conn->query($query1);
        $cardiologist = $query_run1->rowCount();

        $query2 = 'SELECT * FROM doctors WHERE specialist_id = 2';
        $query_run2 = $conn->query($query2);
        $cardiacsurgeon = $query_run2->rowCount();

        $query3 = 'SELECT * FROM doctors WHERE specialist_id = 3';
        $query_run3 = $conn->query($query3);
        $chestphysian = $query_run3->rowCount();

        $query4 = 'SELECT * FROM doctors WHERE specialist_id = 4';
        $query_run4 = $conn->query($query4);
        $chestsurgeon = $query_run4->rowCount();

        $query5 = 'SELECT * FROM doctors WHERE specialist_id = 5';
        $query_run5 = $conn->query($query5);
        $dermatologist = $query_run5->rowCount();

        $query6 = 'SELECT * FROM doctors WHERE specialist_id = 6';
        $query_run6 = $conn->query($query6);
        $dermatologistSTD = $query_run6->rowCount();

        $query7 = 'SELECT * FROM doctors WHERE specialist_id = 7';
        $query_run7 = $conn->query($query7);
        $earnosethroat = $query_run7->rowCount();

        $query8 = 'SELECT * FROM doctors WHERE specialist_id = 8';
        $query_run8 = $conn->query($query8);
        $generalphysician = $query_run8->rowCount();

        $query9 = 'SELECT * FROM doctors WHERE specialist_id = 9';
        $query_run9 = $conn->query($query9);
        $genendorcrinologist = $query_run9->rowCount();

        $query10 = 'SELECT * FROM doctors WHERE specialist_id = 10';
        $query_run10 = $conn->query($query10);
        $generalsurgeon = $query_run10->rowCount();

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var cardiacsurgeon = <?php echo $cardiacsurgeon; ?>;
        var chestphysian = <?php echo $chestphysian; ?>;
        var chestsurgeon = <?php echo $chestsurgeon; ?>;
        var dermatologist = <?php echo $dermatologist; ?>;
        var dermatologistSTD = <?php echo $dermatologistSTD; ?>;
        var earnosethroat = <?php echo $earnosethroat; ?>;
        var generalphysician = <?php echo $generalphysician; ?>;
        var genendorcrinologist = <?php echo $genendorcrinologist; ?>;
        var generalsurgeon = <?php echo $generalsurgeon; ?>;

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Cardiologist',  <?php echo $cardiologist; ?>],
          ['Cardiac Surgeon',  cardiacsurgeon],
          ['Chest Physian',  chestphysian],
          ['Chest Surgeon',  chestsurgeon],
          ['Dermatologist',  dermatologist],
          ['Dermatologist and STD',  dermatologistSTD],
          ['Ear , Nose and Throat',  earnosethroat],
          ['General Physician',  generalphysician],
          ['General Surgeon',  generalsurgeon],
          ['Gen & Endorcrinologist',  genendorcrinologist],
        ]);

        var options = {
          title: 'Specialists Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart"></div>
  </body>
</html>
