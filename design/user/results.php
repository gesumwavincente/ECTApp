<?php 
include_once 'header.php';

$id = 0;
$update = false;

$myTraineeInput = '';
$ccourse = '';
$cscore = '';
$cpracticals = '';
$cremarks = '';
$cresitpracticals = '';
$cresitscore = '';



    if(isset($_POST['submit'])){

        $myTraineeInput =  $_POST['myTraineeInput'];
        $ccourse =  $_POST['ccourse'];
        $cscore =  $_POST['cscore'];
        $cpracticals =  $_POST['cpracticals'];
        $cremarks = $_POST['cremarks'];
        $cresitscore = $_POST['cresitscore'];
        $cresitpracticals = $_POST['cresitpracticals'];

         if (($cscore >= 84) &&  ($cpracticals == 'pass') || ($cresitscore >= 84) &&  ($cresitpracticals == 'pass')) {
                    $year = (new DateTime)->format("Y-m-d");
                    $date=date_create($year);
                    date_add($date,date_interval_create_from_date_string("730 days"));
                    $npdate = date_format($date,"Y-m");
        }

                $result = $mysqli->query("SELECT * FROM clientele  WHERE fname = '$myTraineeInput';") or die($mysqli->error);
                      while ($row = $result->fetch_array()){
                          $tid = $row['training_id'];
                      }

      $mysqli->query("INSERT INTO result(clientele,training_id, course_id, marks, practicals, resit_marks, resit_prac, expiry_date, remarks) VALUES ('$myTraineeInput',$tid,'$ccourse','$cscore','$cpracticals','$cresitscore','$cresitpracticals','$npdate','$cremarks')")
       or die($mysqli->error());
      
     echo "<script>alert('Record inserted succcessful!')</script>";
    }

    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM result WHERE id=$id") or die($mysqli->error());

      //echo "<script>alert('Deleted succcessful!')</script>";
    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $id = 0;
      $update = true;
      $result = $mysqli->query("SELECT * FROM result WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $myTraineeInput = $row['clientele'];
        $ctrainingid= $row['training_id'];
        $ccourse = $row['course_id'];
        $cscore = $row['marks'];
        $cpracticals = $row['practicals'];
        $cresitscore = $row['resit_marks'];
        $cresitpracticals = $row['resit_prac'];
        $cremarks = $row['remarks'];
      }
    }

    if(isset($_POST['update'])){
        $myTraineeInput =  $_POST['myTraineeInput'];
        $ccourse =  $_POST['ccourse'];
        $cscore =  $_POST['cscore'];
        $cpracticals =  $_POST['cpracticals'];
        $cremarks = $_POST['cremarks'];
        $cresitscore = $_POST['cresitscore'];
        $cresitpracticals = $_POST['cresitpracticals'];

        if (($cscore >= 84) &&  ($cpracticals == 'pass') || ($cresitscore >= 84) &&  ($cresitpracticals == 'pass')) {
                    $year = (new DateTime)->format("Y-m-d");
                    $date=date_create($year);
                    date_add($date,date_interval_create_from_date_string("730 days"));
                    $npdate = date_format($date,"Y-m");
        }

        $result = $mysqli->query("SELECT * FROM clientele  WHERE fname = '$myTraineeInput';") or die($mysqli->error);
        while ($row = $result->fetch_array()){
            $tid = row['training_id'];
        }

      $mysqli->query("UPDATE result SET clientele='$myTraineeInput', training_id=$tid, course_id='$ccourse', marks='$cscore', practicals='$cpracticals', resit_marks='$cresitscore', resit_prac ='$cresitpracticals' , expiry_date='$npdate', remarks='$cremarks' WHERE id=$id") or die($mysqli->error());

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
    <div class="list_wrapper">
            <h2>Results List:</h2>
             <span> <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
         </span>
           <span class="rl_course" style="float: right; position: absolute; margin-left: 30px;">
            <form method="get" action="results.php">
            <label>Training name : </label>
            <select  name="trainindID" >
                <option value="">--</option>
                <?php
                $result = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
                while ($row = $result->fetch_array()):
                  $ci = $row['id'];
              ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['event_name'] ?></option>
              <?php endwhile; ?> 
            </select>
            <input type="submit" value="Get" class="open_form_button" style="margin-top: 8px;">
             </form>
            </span>
            <?php if($update == true): ?>
            <button class="open_form_button" style="width:auto; background-color: #e68a00;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Update Results</button>
            <?php else: ?>
            <button class="open_form_button" style="width:auto; background-color: #0b7dda;" onclick="document.getElementById('id01').style.display='block'"><i class="fas fa-plus"></i> Add Results</button>
            <?php endif; ?>
            <table id="myTable">
          <thead>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Brtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' 
        ]
    } );
} );
</script>  
              <tr class="header">
                <th>clientele</th>
                <th>training</th>
                <th>course</th>
                <th>marks</th>
                <th>practicals</th>
                <th>Certification</th>
                <th>Expiry date</th>
                <th>resit marks</th>
                <th>resit practicals</th>
                <th>remarks</th>
                <th>action</th>
              </tr>
</thead>    
              <?php
              $cid = $_GET['trainindID'];
              
                $result1 = $mysqli->query("SELECT * FROM training WHERE event_name = '$cid'") or die($mysqli->error);
                    while ($row1=$result1->fetch_assoc()){
                        $row1['course_id'];
                }
               

                  $result = $mysqli->query("SELECT * FROM result WHERE training_id='$cid'") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                     $scr = $row['marks'];
                      $sts = $row['practicals'];
                      $rscr = $row['resit_marks'];
                      $rsts = $row['resit_prac'];
                      if (($scr >= 84) &&  ($sts == 'pass') || ($rscr >= 84) &&  ($rsts == 'pass') || ($scr >= 84) &&  ($psts == 'pass') || ($rscr >= 84) &&  ($sts == 'pass')) {
                        $certification = 'Given';
                        
                      }
                      else{
                        $certification ='Retained';
                      }
                ?>
                <tr>
                    <td><?php echo $row['clientele'] ?></td>
                    <td><a href="roster.php?<?php echo $row['training_id']; ?>"><?php echo $row['training_id'] ?> </a></td>
                    <td><?php echo $row['course_id'] ?></td>
                    <td><?php echo $row['marks'] ?>%</td>
                    <td><?php echo $row['practicals'] ?></td>
                    <td><?php echo $certification; ?></td>
                    <td><?php echo $row['expiry_date'] ?></td>
                    <td><?php echo $row['resit_marks']?>%</td>
                    <td><?php echo $row['resit_prac']?></td>
                    <td><?php echo $row['remarks'] ?></td>
                    <td>
                          <!-- <span style="font-size: 20px; margin-left:10px"><a href="results.php?edit=<?php echo $row['id'] ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span> -->
                          <!-- <button title="<?php echo $row['id']; ?>" onclick="document.getElementById('id05').style.display='block'; openFormFilled(<?php echo $row['id']; ?>);" type="button" class="btn btn-info btn-lg" style="padding: 2px 4px;" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"> <i class="fa fa-edit"></i></button> -->
                         <span style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="results.php?delete=<?php echo $row['id'] ?>"><i style=" color: red;"  class="fas fa-trash-alt"></i></a></span> 
                   </td>
                </tr>
                <?php endwhile; ?>
            </table>
    </div>

  

    <div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="results.php">
  <div class="imgcontainer">
 <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
 </div>

 <div class="container">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <label>Clientele name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <select name="myTraineeInput" required>
                   <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM clientele WHERE training_id = $cid;") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['fname'] ?>"><?php echo $row['fname'] ?></option>
                    <?php endwhile; ?> 
                   </select>
                    <br>
                  <label>Course: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label><br>
                  <select name="ccourse" required>
                   <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM course;") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['course_name'] ?>"><?php echo $row['course_name'] ?></option>
                    <?php endwhile; ?> 
                   </select>
                  <br>
                  <label>Marks Score: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $cscore; ?>" name="cscore" placeholder=" %" required><br>
                  <label>Practicals: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label><br>
                  <select type="text"  name="cpracticals" required>
                        <option value="">--</option>
                        <option value="pass">Pass</option>
                        <option value="n/r">N/R</option>
                        </select><br>
                  <label>Resit Score: </label>
                  <input type="text" value="<?php echo $cresitscore; ?>" name="cresitscore" placeholder=" %"><br>
                  <label>Resit Practicals: </label><br>
                  <select type="text"  name="cresitpracticals">
                        <option value="">--</option>
                        <option value="pass">Pass</option>
                        <option value="n/r">N/R</option>
                        </select><br>
                    <label>Remarks: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                    <input value="<?php echo $cremarks; ?>" style="height: 100px;" type="text" name="cremarks" required>
                     <?php if($update == true): ?>
                    <!-- <button type="submit" name="update" id="btn" style="background-color: orange; color: #fff">Update Results</button> -->
                    <?php else: ?>
                    <button type="submit" name="submit" id="btn" style="background-color: dodgerblue; color: #fff">Add Results</button>
                    <?php endif; ?>
                  </div>
              </form>
          
          </div>
        

        <div id="id05" class="modal">
  
  <form class="modal-content animate" method="post" action="results.php">
  <div class="imgcontainer">
 <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
 </div>

 <div class="container">
  <?php
                      $result = $mysqli->query('SELECT * FROM training WHERE id = 8 ;') or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
  <input type="text" name="tid" id="txta" value="">
                <label>Clientele name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <select name="myTraineeInput" required>
                   <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM clientele WHERE training_id = $cid;") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['fname'] ?>"><?php echo $row['fname'] ?></option>
                    <?php endwhile; ?> 
                   </select>
                    <br>
                  <label>Course: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label><br>
                  <select name="ccourse" required>
                   <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM training;") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_id'] ?></option>
                    <?php endwhile; ?> 
                   </select>
                  <br>
                  <label>Marks Score: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" value="<?php echo $row['marks']; ?>" name="cscore" placeholder=" %" required><br>
                  <label>Practicals: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label><br>
                  <select type="text"  name="cpracticals" required>
                        <option value="">--</option>
                        <option value="pass">Pass</option>
                        <option value="n/r">N/R</option>
                        </select><br>
                  <label>Resit Score: </label>
                  <input type="text" value="<?php echo $row['resit_marks']; ?>" name="cresitscore" placeholder=" %"><br>
                  <label>Resit Practicals: </label><br>
                  <select type="text"  name="cresitpracticals">
                        <option value="">--</option>
                        <option value="pass">Pass</option>
                        <option value="n/r">N/R</option>
                        </select><br>
                    <label>Remarks: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                    <input value="<?php echo $row['remarks']; ?>" style="height: 100px;" type="text" name="cremarks" required>
                    <button type="submit" name="submit" id="btn" style="background-color: yellow; color: #fff">Update Results</button>
                    <?php endwhile; ?>
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
    td = tr[i].getElementsByTagName("td")[0];
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
    <script>          function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}</script>
<?php include_once 'footer.php'; ?>