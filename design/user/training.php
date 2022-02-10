<?php 
include_once 'header.php'; 

$id = 0;
$update = false;
$teventname = '';
$tcourse =  '';
$tplace = '';
$tstartdate =  '';
$tenddate = '';

$fname = '';
$altname =  '';
$cid = '';

    if(isset($_POST['submit'])){

      $teventname = $_POST['teventname'];
      $tcourse = $_POST['tcourse'];
      $tplace = $_POST['tplace'];
      $tstartdate = $_POST['tstartdate'];
      $tenddate = $_POST['tenddate'];

        // $resultie=$mysqli->query('SELECT * FROM training') or die($mysqli->error());
        // $rowcount=mysqli_num_rows($resultie);
        // $year = (new DateTime)->format("Y");
        // $numa = $rowcount+2+($year*100);
        // mysqli_free_result($resultie);
        

      $mysqli->query("INSERT INTO training( event_name, course_id, place, startdate, enddate) VALUES('$teventname','$tcourse','$tplace','$tstartdate','$tenddate')")
       or die($mysqli->error());
      echo "<script>alert('Record added succcessful!')</script>";
    }

    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM training WHERE id=$id") or die($mysqli->error());
//echo "<script>alert('Deleted succcessful!')</script>";
    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $mysqli->query("SELECT * FROM training WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $teventname = $row['event_name'];
        $tcourse = $row['course_id'];
        $tplace = $row['place'];
        $tstartdate = $row['startdate'];
        $tenddate = $row['enddate'];
      }
    }

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $teventname = $_POST['teventname'];
      $tcourse = $_POST['tcourse'];
      $tplace = $_POST['tplace'];
      $tstartdate = $_POST['tstartdate'];
      $tenddate = $_POST['tenddate'];

      $mysqli->query("UPDATE training SET event_name='$teventname', course_id='$tcourse', place='$tplace', startdate='$tstartdate', enddate='$tenddate' WHERE id=$id") or 
      die($mysqli->error());

      echo "<script>alert('Updated succcessful!')</script>";
    }
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>




<div class="body_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Training Event List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <?php if($update == true): ?>
            <button class="open_form_button" style="width:auto; background-color: #e68a00;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Update Training</button>
            <?php else: ?>
            <button class="open_form_button" style="width:auto; background-color: #0b7dda;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Add Training</button>
            <?php endif; ?>
 
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Brtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' 
        ]
    } );
} );;
</script>           
            <table id="myTable">
 <thead>
            <tr class="header">
                <th>id</th>
                <th>training Event name</th>
                <th>course</th>
                <th>place</th>
                <th>start date</th>
                <th>ending date</th>
                <th>Next Training</th>
                <!-- <th>Roster</th> -->
                <th>Action</th>
              </tr> 
</thead>  
              <?php
                  $result = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                  <td><a href="roster.php?<?php echo $row['id']; ?>"><?php echo $row['id'] ?></a></td>
                    <td><?php echo $row['event_name'] ?></td>
                    <td><?php echo $row['course_id'] ?></td>
                    <td><?php echo $row['place'] ?></td>
                    <td><?php echo $row['startdate'] ?></td>
                    <td><?php echo $row['enddate'] ?></td>
                     <td><?php $date=date_create($row['startdate']);
                        date_add($date,date_interval_create_from_date_string("730 days"));
                            $npdate = date_format($date,"Y-m");
                            echo $npdate; 
                    ?></td>
                    <!-- <td><span style="font-size: 20px; margin-left:10px"><a href="#?roaster=<?php echo $row['id'] ?>"><i class="fas fa-address-card"></i></a></span></td> -->
                    <td>
                          <span style="font-size: 20px; margin-left:10px"><a href="training.php?edit=<?php echo $row['id'] ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                          <span style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="training.php?delete=<?php echo $row['id'] ?>"><i style=" color: red;"  class="fas fa-trash-alt"></i></a></span>
                    </td>
                </tr>
                <?php endwhile; ?> 
            </table>
    </div>

    <div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="training.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <label>Training Event Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="teventname" value="<?php echo $teventname; ?>" placeholder="Training Event Name" required><br>
                  <label>Course: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <!--<button class="open_form_button" style="float:right; padding: 2px; width:auto; background-color: rgba(0,0,0,0); color: dodgerblue;" onclick="document.getElementById('id02').style.display='block'"><i class="fas fa-plus"></i> Add Course</button>-->
                  <select name="tcourse" required>
                    <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM course") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['course_alt_name'] ?>"><?php echo $row['course_alt_name'] ?></option>
                    <?php endwhile; ?> 
                  </select> <br>
                  <label>Place: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="tplace" value="<?php echo $tplace; ?>" placeholder="Place" required><br>
                  <label >Start Date: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="date" name="tstartdate" value="<?php echo $tstartdate; ?>" required><br>
                  <label >End Date: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="date" name="tenddate" value="<?php echo $tenddate; ?>"  required><br>
                  <?php if($update == true): ?>
                  <button type="submit" name="update" id="btn" style="background-color: orange; color: #fff">Update Training Event</button>
                  <?php else: ?>
                  <button type="submit" name="submit" id="btn" style="background-color: dodgerblue; color: #fff">Add Training Event</button>
                  <?php endif; ?>
                  
    </div>

  </form>
</div>

<div id="id02" class="modal">
<form class="modal-content animate" method="post" action="../includes/addcourse.inc.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

  <div class="container">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label>Course Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="cfname" value = "<?php echo $fname; ?>" placeholder="Course Name" required><br>
                  <label>Alternative Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="caltname" value = "<?php echo $altname; ?>" placeholder="Alt Name" required><br>
                  <label>Course ID: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="ccourse_di" value = "<?php echo $cid; ?>" placeholder="Course Id" required><br>
                  <button onclick="document.getElementById('id02').style.display='none'" type="submit" name="submit2" id="btn" style="background-color: dodgerblue; color: #fff">Add Course</button>
  </div>
              </form>
          
          </div>
         
         <script>
           function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

    </div>
<?php include_once 'footer.php'; ?>

