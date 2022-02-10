<?php include_once 'header.php'; 

?>
    <div class="body_wrapper">
    <div class="list_wrapper">
        <div class="roster_tbl1">
        <table class="table_roster">
        
        
<?php 
$parameter = $_SERVER['QUERY_STRING'];
$resulta = $mysqli->query("SELECT * FROM training WHERE id = $parameter ") or die($mysqli->error);
while ($rowa = $resulta->fetch_array()):

    ?>
        <tr><td style="font-weight: bold;">Roster ID:</td><td><?php echo 'R'.$parameter; ?></td></tr>
        <tr><td style="font-weight: bold;">Training ID:</td><td><?php echo $rowa['id'] ?></td></tr>
        <tr><td style="font-weight: bold;">Training Event Name:</td><td><?php echo $rowa['event_name'] ?></td></tr>
        <tr><td style="font-weight: bold;">Course:</td><td><?php echo $rowa['course_id'] ?></td></tr>
        <tr><td style="font-weight: bold;">Place:</td><td><?php echo $rowa['place'] ?></td></tr>
        <tr><td style="font-weight: bold;">Start Date:</td><td><?php echo $rowa['startdate'] ?></td></tr>
        <tr><td style="font-weight: bold;">End Date:</td><td><?php echo $rowa['enddate'] ?></td></tr>
        <tr><td style="font-weight: bold;">Next Possible Training:</td><td><?php echo substr($rowa['startdate'],0,7) ?></td></tr>
        <tr><td style="font-weight: bold;">Trainers:</td><td><?php 
          $resultb = $mysqli->query("SELECT * FROM trainer WHERE tevent = $parameter ") or die($mysqli->error);
          while ($rowb = $resultb->fetch_array()){
              echo $rowb['trainer'].'; ';
          }
        ?></td></tr>
       <?php endwhile; ?> 

           </table> 
       </div>
       <div>
       <table id="myTable">
              <tr class="header">
                <th style="padding: 7px";>Clientele Name</th>
                <th style="padding: 7px";>Phone No.</th>
                <th style="padding: 7px";>Email</th>
                <th style="padding: 7px";>institution</th>
                <th style="padding: 7px";>profession</th>
                <th style="padding: 7px";>marks</th>
                <th style="padding: 7px";>practicals</th>
                <th style="padding: 7px";>Certification</th>
                <th style="padding: 7px";>Expiry date</th>
                <th style="padding: 7px";>resit marks</th>
                <th style="padding: 7px";>resit practicals</th>
                <th style="padding: 7px";>remarks</th>
              </tr>   
              <?php
                  $resultc = $mysqli->query("SELECT * FROM clientele WHERE training_id=$parameter") or die($mysqli->error);
                  while ($rowc=$resultc->fetch_assoc()):
                    $cname = $rowc['fname'];
                ?>
                <tr>
                  <td style="padding: 0 5px; font-size: 13px;";><a href="clientele.php"><?php echo $cname  ?></a></td>
                    <td style="padding: 0 5px; font-size: 13px;";><?php echo $rowc['phone_no'] ?></td>
                    <td style="padding: 0 5px; font-size: 13px;";><?php echo $rowc['email'] ?></td>
                    <td style="padding: 0 5px; font-size: 13px;";><?php echo $rowc['institution'] ?></td>
                    <td style="padding: 0 5px; font-size: 13px;";><?php echo $rowc['proffesion'] ?></td>
                    <?php
                    $resulti = $mysqli->query("SELECT * FROM result WHERE training_id = $parameter AND clientele='$cname'") or die($mysqli->error);
                    while ($rowi=$resulti->fetch_assoc()){
                      $scr = $rowi['marks'];
                      $sts = $rowi['practicals'];
                      $rscr = $rowi['resit_marks'];
                      $rsts = $rowi['resit_prac'];
                      if ((($scr >= 84) &&  ($sts == 'pass')) || (($rscr >= 84) &&  ($rsts == 'pass')) || (($scr >= 84) &&  ($rsts == 'pass')) || (($sts == 'pass') && ($rscr >= 84))) {
                        $certification = 'Given';
                      }
                      else{
                        $certification ='Retained';
                      }
                      echo '<td style="padding: 0 5px; font-size: 13px;";> '.$rowi['marks'].'</td>
                    <td style="padding: 0 5px; font-size: 13px;";>'. $rowi['practicals'].'</td>
                    <td style="padding: 0 5px; font-size: 13px;";>'.$certification.'</td>
                   <td style="padding: 0 5px; font-size: 13px;";>'.substr($rowi['expiry_date'],0,7).'</td>
                    <td style="padding: 0 5px; font-size: 13px;";>'.$rowi['resit_marks'].'%</td>
                    <td style="padding: 0 5px; font-size: 13px;";>'.$rowi['resit_prac'].'</td>
                    <td style="padding: 0 5px; font-size: 13px;";>'.$rowi['remarks'].'</td>';
                    }?>
                </tr>
                <?php endwhile;?> 
            </table>
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