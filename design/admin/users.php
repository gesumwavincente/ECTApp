<?php include_once 'header.php'; 
if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM users WHERE U_id=$id") or die($mysqli->error());
//echo "<script>alert('Deleted succcessful!')</script>";

}
?>
    <div class="body_wrapper">
    <div class="list_wrapper more_user_wrapper">
            <h2>Users</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
     

            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <!-- <th>Status</th> -->
                <th>Action</th>
              </tr>   
              <?php
                  $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                ?>
                <tr>
               
                  <td><?php echo $row['U_id'] ?></td>
                  <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['user_email'] ?></td>
                    <!-- <td></td> -->
                    <td><?php echo $row['phone_number'] ?></td>
        
                    <!-- <td><span style="font-size: 20px; margin-left:10px"><a href="#?roaster=<><i class="fas fa-address-card"></i></a></span></td> -->
                    <td>
                          <span style="font-size: 20px; margin-left:10px"><a  onclick='dell()' href="users.php?delete=<?php echo $row['U_id'] ?>"><i style=" color: red;"  class="fas fa-trash-alt"></i></a></span>
                    </td>
                </tr>
                <?php endwhile; ?> 
            </table>
    </div>

 



  </form>
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

