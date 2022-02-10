<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="list_wrapper">
            <h2>Results List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <span class="rl_course"><label>Course : </label><select><option>MCQs CLS</option><option>MCQs BLS</option></select></span>
            <span class="rl_radio">
                <input type="radio" name="pf" value="Pass" checked>Pass
                <input type="radio" name="pf" value="Fail">Fail
            </span>
            <!-- <button class="open_form_button" onclick="openForm()"><i class="fas fa-plus"></i> Add Attendance</button> -->
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>clientele</th>
                <th>course</th>
                <th>marks</th>
                <th>practicals</th>
                <th>certificate status</th>
                <th>issued date</th>
                <th>expiry Date</th>
                <th>remarks</th>
              </tr>
              
              
            </table>
    </div>

    <div class="form-popup" id="updateForm">
            <form action="" method="POST" class="form-container">
                  <label>Attended..</label>
                  <select type="text" name="attended" required>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                    </select><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Attended</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
              </form>
          
          </div>
    </div>
<?php include_once 'footer.php'; ?>