<script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
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


            /*open and close form*/
                function openForm() {
                document.getElementById("myForm").style.display = "block";
                }
                    
                // 
                function openFormFilled() {
                  document.getElementById("updateForm").style.display = "block";
                //   var x = document.getElementById(elem).getAttribute('value');
                //   document.getElementById("txt").value=x;
                }

                function closeForm() {
                document.getElementById("myForm").style.display = "none";
                document.getElementById("updateForm").style.display = "none";
                }
            </script>
</body>
</html>