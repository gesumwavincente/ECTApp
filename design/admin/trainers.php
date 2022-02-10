<?php 
include_once 'header.php'; 
   
$id = 0;

$update = false;
$fname = '';
$phone =  '';
$email = '';
$tevent = '';



    if(isset($_POST['submit'])){

      $fname = $_POST['tfname'];
      $phone = $_POST['tphone_no'];
      $email = $_POST['temail'];
      $tevent = $_POST['tevent'];

      $mysqli->query("INSERT INTO trainer(trainer, phone_no, email, tevent) VALUES ('$fname','$phone','$email','$tevent')")
       or die($mysqli->error());
      
      echo "<script>alert('Record added succcessful!')</script>";
    }

    if(isset($_GET['delete'])){

      $id = $_GET['delete'];
      $mysqli->query("DELETE FROM trainer WHERE id=$id") or die($mysqli->error());

      // echo "<script>alert('Deleted succcessful!')</script>";
    }

    if(isset($_GET['edit'])){
      $id = $_GET['edit'];
      $update = true;
      $result = $mysqli->query("SELECT * FROM trainer WHERE id=$id") or die($mysqli->error());
      if(count($result) == 1){
        $row = $result->fetch_array();
        $fname = $row['trainer'];
        $phone = $row['phone_no'];
        $email = $row['email'];
        $tevent = $row['tevent'];
      }
    }

    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $fname = $_POST['tfname'];
      $phone = $_POST['tphone_no'];
      $email = $_POST['temail'];
      $tevent = $_POST['tevent'];

      $mysqli->query("UPDATE trainer SET trainer='$fname', phone_no='$phone', email='$email', tevent='$tevent' WHERE id=$id") or 
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
    <div class="more_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Trainers List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            
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
                <th>name</th>
                <th>phone number</th>
                <th>email</th>
                <th>training</th>
                <th>Action</th>
              </tr>
</thead>
              <?php
                  $result = $mysqli->query("SELECT * FROM trainer") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['trainer'] ?></td>
                    <td><?php echo $row['phone_no'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><a href="roster.php?<?php echo $row['tevent']; ?>"><?php echo $row['tevent']; ?></a></td>
                    <td>
                          <span style="font-size: 20px; margin-left:10px"><a href="trainers.php?edit=<?php echo $row['id'] ?>"><i style=" color: #009688;" class="fas fa-edit"></i></a></span>
                          <span style="font-size: 20px; margin-left:10px"><a onclick='dell()' href="trainers.php?delete=<?php echo $row['id'] ?>"><i style=" color: red;"  class="fas fa-trash-alt"></i></a></span>
                    </td>
                </tr>
                <?php endwhile; ?> 
            </table>
    </div>
    <div class="form-popup more_form_popup">
        <h2>Add Trainer:</h2>
            <form action="trainers.php" method="POST" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label>Name: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span> </label>
                  <input type="text" name="tfname" value="<?php echo $fname ?>" placeholder="Full Name" required><br>
                  <label>Phone Number: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span> </label><br>
                  <input type="text" name="tphone_no" value="<?php echo $phone ?>" placeholder="Phone Number" required><br>
                  <label>Email:</label><br>
                  <input type="email" name="temail" value="<?php echo $email ?>" placeholder="Email"><br>
                  <label>Training Event: <span style="color: red; font-weight: bold; font-size: 20px;" >*</span></label>
                  <select type="text" name="tevent" required>
                    <option value="">--</option>
                    <?php
                      $result = $mysqli->query("SELECT * FROM training") or die($mysqli->error);
                      while ($row = $result->fetch_array()):
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['event_name'] ?></option>
                    <?php endwhile; ?> 
                  </select> <br>
                   
                  <?php if($update == true): ?>
                  <button type="submit" name="update" id="btn" class="btn btn-info">Update Trainer</button>
                  <?php else: ?>
                  <button type="submit" name="submit" id="btn" class="btn btn-primary">Add Trainer</button>
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