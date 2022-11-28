<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
 
        var date = new Date();
        
        navigator.geolocation.getCurrentPosition((posicion) => {
            $.post("http://localhost/Examen/comprobar.php", { fecha: date , latitude : posicion.coords.latitude, longitude : posicion.coords.longitude }, (response) => {
                console.log(response.results);
          });
        });
        
           </script>
    <form action="comprobar.php" method="POST">
        <label for="">Correo electronico:</label><br><input type="email" name="email" required><br>
        <label for="">Usuario:</label><br> <input type="text" name="usuario" required> <br>
        <br><input type="submit" value="login">
    </form>
</body>
</html>