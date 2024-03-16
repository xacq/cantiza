<footer class="page-footer container">
    
      <div class="row center">
          <img src="../../assets/img/logoblanco.png" alt="" width="80px;">
      </div>

      <div class="row center">
      <a class="grey-text text-darken-3" href="https://greenpc.online" target=_blanck>Made by Green PC</a>
      </div>

      </footer>

    <!-- Vendor JS Files -->

    <script type="text/javascript" src="../../assets/js/materialize.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>
    
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

</body>
</html>