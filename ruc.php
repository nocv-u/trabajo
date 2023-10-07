<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <script src="jquery.min.js"></script>
    <link href="http://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.query.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <title>RUC</title>
</head>
<body>
    <a href="index.php">Consulta su DNI</a>
    <div class="container">
        <div class="dni-container">
            <div class="input">
                <span><i class="bx bxs-id-card"></i></span>
                <input type="text" id="ruc" maxlength="11" placeholder="Ingrese su número de RUC" autocomplete="off" name="ruc">
            </div>
            <button id="pruebaruc">Consultar</button>
            <div class="card">
                <div class="foto">
                    <p>Carnet <br> RUC</p>
                    <div class="img">
                        <i class="bx bx-search-alt"></i>
                    </div>
                    <!--img src="img/logo.png" alt=""-->
                </div>
                <div class="data">

                <div >  
                    <label id="rucNumero">RUC: </label>
                </div>
                <div >
                    <label id="razonsocial">Razón social: </label >
                </div>
                <div> 
                    <label  id="estado">Estado: </label > 
                </div>
                <div> 
                    <label  id="direccion">Dirección:  </label > 
                </div>
                <div> 
                    <label  id="departamento">Departamento:  </label >
                </div> 

                </div>
                <div class="hora" id="hora-actual"></div>
                <div>
                <img src="img/logo.png" class="somos">
                
                </div>
            </div>
        </div>
    </div>

    <script>
$("#pruebaruc").click(function(){

var ruc=$("#ruc").val();


$.ajax({           
  type:"POST",
  url: "consultar-ruc-ajax.php",
  data: 'ruc='+ruc,
  dataType: 'json',
  success: function(data) {

  
      if(data==1)
      {
          alert('El RUC tiene que tener 11 digitos');
      }
      else{
          console.log(data);
        
          $("#rucNumero").html(data.numeroDocumento);
          $("#razonsocial").html(data.nombre);
          $("#estado").html(data.estado);

          $("#direccion").html(data.direccion);
          $("#departamento").html(data.departamento);
      }


  }
});

})
    </script>

        <script>
        function actualizarHora() {
        const divHora = document.getElementById("hora-actual");
        const fecha = new Date();
        const hora = fecha.getHours().toString().padStart(2, '0');
        const minutos = fecha.getMinutes().toString().padStart(2, '0');
        const segundos = fecha.getSeconds().toString().padStart(2, '0');
        const horaActual = `${hora}:${minutos}:${segundos}`;
        divHora.textContent = horaActual;
        }

        // Actualiza la hora cada segundo
        setInterval(actualizarHora, 1000);

        // Ejecuta la función una vez al cargar la página para mostrar la hora de inmediato
        actualizarHora();
        </script>
</body>
</html>