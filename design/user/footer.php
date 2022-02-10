<script type="text/javascript">
  function dell(){
    confirm('Are you sure you want to delete?');
  }
</script>
<script>  
//
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

            /*open and close form*/
                function openForm() {
                document.getElementById("myForm").style.display = "block";
                }
                    
                // 
                function openFormFilled(elem) {
                  document.getElementById("updateForm").style.display = "block";
                  var x = document.getElementById(elem).getAttribute('value');
                  document.getElementById("txt").value=x;
                }
                function closeFormCourse() {
                document.getElementById("updateForm").style.display = "none";
                }

                function closeForm() {
                document.getElementById("myForm").style.display = "none";
                document.getElementById("updateForm").style.display = "none";
                }

          /*training*/
  function funcCreateTG() {
  document.getElementById("myDropdown").classList.toggle("show");
}


function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) { 
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}


<?php 
      $result = mysqli_query($mysqli, 'SELECT * FROM clientele');
      while ($row = mysqli_fetch_array($result)) {

      $cliente[] = $row[1];
    }
    ?>
var clientee = <?php echo json_encode($cliente); ?>;  
autocomplete(document.getElementById("myClienteleInputName"), clientee);


<?php 
      $result = mysqli_query($mysqli, 'SELECT * FROM trainer');
      while ($row = mysqli_fetch_array($result)) {

      $traineer[] = $row[1];
    }
    ?>
var trainerr = <?php echo json_encode($traineer); ?>;  
autocomplete(document.getElementById("myTrainerInput"), trainerr);


            </script>
</body>
</html>