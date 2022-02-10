<?php include_once 'header.php'; ?>
    <div class="body_wrapper" style="margin-left: 200px;">
    <div class="list_wrapper">
            <h2>Referral List:</h2>
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
            <button class="open_form_button" onclick="openForm()"><i class="fas fa-plus"></i> Add Referral</button>
            <table id="myTable">
              <tr class="header">
                <th>id</th>
                <th>referrer</th>
                <th>referrees'</th>
                <th>phone</th>
                <th>email</th>
                <th>remarks</th>
                <th></th>
              </tr>
              
            </table>
    </div>
    <div class="form-popup" id="myForm">
            <form action="" method="POST" class="form-container">
                  <input type="text" name="referree" placeholder="Referree" required><br>
                  <input type="text" name="referred" placeholder="Referrers" required><br>
                  <input type="text" name="phone" placeholder="Phone Number" required><br>
                  <input type="email" name="email" placeholder="Email" required><br>
                  <textarea type="text" name="remarks" placeholder="Remarks" style="height:100px;"></textarea><br>
                  <button type="submit" name="submit" id="btn" class="btn">Add Referral</button>
                  <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
              </form>
          
          </div>

          <div class="form-popup" id="updateForm">
                <form action="" method="POST" class="form-container">
                      <input type="text" name="referree" placeholder="Referree" required><br>
                      <input type="text" name="referred" placeholder="Referrers" required><br>
                      <input type="text" name="phone" placeholder="Phone Number" required><br>
                      <input type="email" name="email" placeholder="Email" required><br>
                      <textarea type="text" name="remarks" placeholder="Remarks" style="height:100px;"></textarea><br>
                      <button type="submit" name="submit" id="btn" class="btn">Update Referral</button>
                      <button type="button" class="btn cancel" onclick="closeForm()">Cancel & Close</button>
                  </form>
              
              </div>
    </div>
<?php include_once 'footer.php'; ?>