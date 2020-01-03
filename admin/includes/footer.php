  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- text editor-->
    <script src="https://cdn.tiny.cloud/1/31sssmakrztk5b2q07safyvt5nsvcsyc1i0uheg57m6ewexp/tinymce/5/tinymce.min.js"></script>

    <script src="js/script.js"></script>


     <!-- Google Chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Fiels', 'Coutn of each item'],
          ['View',     <?php echo $session->count;?>],
          ['Photo',      <?php echo photo::count(); ?>],
          ['user', <?php echo user::count();?>],
          ['Comment', <?php echo comment::count();?>]
         
        ]);

        var options = {
          
          pieSliceText:'label',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    
</body>

</html>
