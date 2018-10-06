<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calender View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  

</head>
<style type="text/css">
  
body{
  background: white;
}
.container{
  max-width: 800px;
  margin-top :30px;
  font-family: sans-serif;
}
.month{
  text-align: center;
  background:  #00616e;
  font-size: 2.5em;
  letter-spacing: 1px;
  color: white;
  padding: 25px;
  border: 1px solid skyblue;


}

table,th,td{
  width: 100%;
  table-layout: fixed;
  text-align: center;
  font-size: 17px;
  border-collapse: collapse;
  border: 1px solid skyblue;


}

tr,th,td{
  padding: 15px;

}
th{
  background: red;
  color: white;

}
td{
  background: white;
  color: green;

}
td:hover{
  background: orange;

}
</style>

<body>
    <div style="padding: 75px;">
    <div id="calendar">
                
                <form class="form-inline" method="post" action="index.php">
                    
                    <div class="form-group">
                        <label>Month: </label>
                        <select name="month" class="form-control" id='month'>
                            <option value='1'>January</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year: </label>
                        <input type='number' name='year' class='form-control' required="true" value="<?= isset($_POST['year']) ? $_POST['year'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit!"  class="btn btn-primary" />
                    </div>

                </form>
    </div>
</div>
</body>


<?php   
    if(isset($_POST["year"])&&isset($_POST["year"]))
    {
            $year = $_POST["year"]; 
            $month = $_POST["month"];
           /* $year = date("Y", $year);
            $month = date("m", $month);*/

            $firstDay = mktime(0, 0, 0, $month, 1, $year);


            $title = date("F", $firstDay);
             //echo $title;
            $dayOfWeek = date("D", $firstDay);//aug
//echo $dayOfWeek;//fri
            switch($dayOfWeek) {
                case "Sun": $blank = 0; break;
                case "Mon": $blank = 1; break;
                case "Tue": $blank = 2; break;
                case "Wed": $blank = 3; break;
                case "Thu": $blank = 4; break;
                case "Fri": $blank = 5; break;
                case "Sat": $blank = 6; break;
            }
            //echo $blank;//5

            $daysInMonth = cal_days_in_month(0, $month, $year);
            //echo $daysInMonth;//31
            echo " <div class='container'>";
            echo "<div class='month'>";
            echo "<strong>" . $title .'-'. $year . "</strong>";            
            echo "</div>";
            echo "<table>";
            
            echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";

            $dayCount = 1;
            while ($blank > 0) {
                echo "<td>*&nbsp;</td>";
                $blank--;
                $dayCount++;
            }

            $dayNum = 1;
            while ($dayNum <= $daysInMonth) {

                if (date("d") != $dayNum) {
                    echo "<td>" . $dayNum . "</td>";
                    $dayNum++;
                    $dayCount++;
                } else {
                    echo "<td class='currentdate'>" . $dayNum . "</td>";
                    $dayNum++;
                    $dayCount++;
                }
                if ($dayCount > 7) {
                    echo "</tr><tr>";
                    $dayCount = 1;
                }
            }

            while ($dayCount > 1 and $dayCount <= 7) {
                echo "<td>*&nbsp;</td>";
                $dayCount++;
            }

            echo "</tr></table>";
            echo "</div>";
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $( document ).ready(function() {
    document.getElementById('month').value = "<?php echo $_POST['month'];?>";
});
  
</script>
</html>

