<div class="container">
  <div class="progress"> <div class="determinate red lighten-4" style="width: 100%"></div></div>
  <div class="progress"> <div class="determinate red " style="width: 100%"></div></div>
  <div class="progress"> <div class="determinate red darken-4" style="width: 100%"></div></div>
</div>

<footer class="page-footer container red darken-4">
</footer>

    <!-- Vendor JS Files -->
    <script type="text/javascript" src="../assets/js/materialize.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
      });
    </script> 

    <script type="text/javascript">
      function valida_cedula() {
        var cad = document.getElementById("cedula").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;
        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }
          total = total % 10 ? 10 - total % 10 : 0;
          if (cad.charAt(longitud-1) != total) {
            document.getElementById("cedula").value = ("0");
          }
        }
      }
    </script>

    <script>
      function confirmar ( mensaje ) {
        return confirm( mensaje );
      }
    </script>
</body>
</html>