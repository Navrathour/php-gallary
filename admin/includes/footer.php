  </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <script  type="text/javascript" src="js/scripts.js"></script>
    <script  type="text/javascript" src="js/dropzone.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',       <?php echo $session->count; ?>],
          ['Comments',    <?php echo Commment::count_all(); ?>],
          ['Users',       <?php echo User::count_all(); ?>],
          ['Photos',       <?php echo Photo::count_all(); ?>]
        ]);

        var options = {
          legend:'none',
          pieSliceText:'label',
          title: 'My Daily Activities',
          backgroudColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
     /******** delete_link**************************/
      $(".delete_link").click(function(){    
          return confirm("Are you sure want to delete this item");
      });
      
    </script>

</body>

</html>
