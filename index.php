<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery.min.js"></script>
    <link href="http://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.query.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <title>DNI</title>
</head>
<body>
    
    <a href="ruc.php">Consulta su RUC</a>
    <div class="container">
        <div class="dni-container">
            <div class="input">
                <span><i class="bx bxs-id-card"></i></span>
                <input type="text" id="dni" maxlength="8" placeholder="Ingrese su número de DNI" autocomplete="off" name="dni">
            </div>
            <button id="prueba">Consultar</button>
            <div class="card">
                <div class="foto">
                    <p>Carnet<br>Estudiantil</p>
                    <div class="img">
                         <i class="bx bx-user-circle"></i>
                    </div>
                    <!--img src="img/logo.png" alt=""-->
                </div>
                <div class="data">
                    <label id="nombre">Nombre</label>
                    <div class="apellido">
                        <label id="apellidop">A.Paterno</label>
                        <label id="apellidom">A.Materno</label>
                    </div>
                    <label>Ing. de Software con IA</label>
                    <label>DNI: <label id="Dni"></label></label>
                </div>
                <div class="hora" id="hora-actual"></div>
                <div>
                <img src="img/logo.png" class="somos">
                
                </div>
            </div>
        </div>
    </div>

    <script>

        $("#prueba").click(function(){

        var dni=$("#dni").val();


        $.ajax({           
            type:"POST",
            url: "consulta-dni-ajax.php",
            data: 'dni='+dni,
            dataType: 'json',
            success: function(data) {
        
        
                if(data==1)
                {
                    alert('DNI INVALIDO');
                }
            
            
                else{
                    console.log(data);
                    $("#nombre").html(data.nombres);
                    $("#apellidop").html(data.apellidoPaterno);
                    $("#apellidom").html(data.apellidoMaterno);
                    $("#Dni").html(data.dni); 
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