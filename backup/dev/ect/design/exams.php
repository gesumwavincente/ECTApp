<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="list_wrapper">
            <h2>Exams:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name" >
            <button class="open_form_button" onclick="openForm()"><i class="fas fa-plus"></i> Add Exam Result</button>
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>name</th>
                <th>course</th>
                <th>marks score</th>
                <th>practicals</th>
                <th></th>
              </tr>
              
            </table>
    </div>
    <div class="form-popup" id="myForm">
            <form action="" method="POST" class="form-container">
                  <input type="text" name="cname" placeholder="Name"><br>
                  <input type="text" name="course" placeholder="Course"><br>
                  <input type="text" name="score" placeholder="Marks score"><br>
                  <label style="margin-left:10px;">Practicals : </label><select type="text" name="practicals" >
                        <option>Pass</option>
                        <option>Fail</option>
                        </select><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Exam Result</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
              </form>
          
          </div>
          <div class="form-popup" id="updateForm">
                <form action="" method="POST" class="form-container">
                      <input type="text" name="cname" placeholder="Name"><br>
                      <input type="text" name="course" placeholder="Course"><br>
                      <input type="text" name="score" placeholder="Marks score"><br>
                      <label style="margin-left:10px;">Practicals : </label><select type="text" name="practicals" >
                            <option>Pass</option>
                            <option>Fail</option>
                            </select><br>
                      <button type="submit" name="submit" id="btn" class="btn">Update Exam Result</button>
                      <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                  </form>
              
              </div>

    </div>
<?php include_once 'footer.php'; ?>