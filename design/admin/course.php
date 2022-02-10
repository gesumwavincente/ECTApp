<?php
require 'header.php';

$id = 0;
$update = false;
$fname = '';
$altname =  '';
$cid = '';



    if(isset($_POST['submit'])){

      $fname = $_POST['cfname'];
      $altname = $_POST['caltname'];
      $course_di = $_POST['ccourse_di'];

      $mysqli->query("INSERT INTO course(course_name, course_alt_name, course_id) VALUES ('$fname','$altname','$course_di')")
       or die($mysqli->error());
      echo "<script>alert('Record added succcessful!')</script>";
    }
    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM course WHERE id=$id") or die($mysqli->error());

      echo "<script>alert('Deleted succcessful!')</script>";
    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $mysqli->query("SELECT * FROM course WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $fname = $row['course_name'];
        $altname = $row['course_alt_name'];
        $cid = $row['course_id'];
      }
    }

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $fname = $_POST['cfname'];
      $altname = $_POST['caltname'];
      $course_di = $_POST['ccourse_di'];

      $mysqli->query("UPDATE course SET course_name='$fname', course_alt_name='$altname', course_id='$course_di' WHERE id=$id") or 
      die($mysqli->error());
      echo "<script>alert('Updated succcessful!')</script>";
    }
?>
    <div class="body_wrapper">
    <div class="more_wrapper">
    <div class="list_wrapper more_user_wrapper">

            <h2>Courses List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <table id="myTable">
              <tr class="header">
                <th>name</th>
                <th>Alt name</th>
                <th>course id</th>
                <th>Action</th>
              </tr>
                <?php
                  $result = $mysqli->query("SELECT * FROM course") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['course_name'] ?></td>
                    <td><?php echo $row['course_alt_name'] ?></td>
                    <td><?php echo $row['course_id'] ?></td>
                    <td>
                          <span style="font-size: 20px; margin-left:10px"><a href="course.php?edit=<?php echo $row['id'] ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                          <span style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="course.php?delete=<?php echo $row['id'] ?>"><i style=" color: red;" class="fas fa-trash-alt"></i></a></span>
                    </td>
                </tr>
                <?php endwhile; ?>          
            </table>
    </div>

    <div class="form-popup more_form_popup">
        <h2>Add Course:</h2>
            <form action="course.php" method="POST" class="form-container">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label>Course Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="cfname" value = "<?php echo $fname ?>" placeholder="Course Name" required><br>
                  <label>Alternative Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="caltname" value = "<?php echo $altname ?>" placeholder="Alt Name" required><br>
                  <label>Course ID: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <input type="text" name="ccourse_di" value = "<?php echo $cid ?>" placeholder="Course Id" required><br>
                  <?php if($update == true): ?>
                  <button type="submit" name="update" id="btn" class="btn btn-info">Update Course</button>
                  <?php else: ?>
                  <button type="submit" name="submit" id="btn" class="btn btn-primary">Add Course</button>
                  <?php endif; ?>
                  <button type="reset" class="btn cancel" onclick="clear()">Clear</button>
              </form>
          
          </div>
      </div>
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