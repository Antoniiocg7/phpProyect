<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <a href="#" class="logo">logo</a>
        <ul>
            <li><a href="#"class="active">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Work</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </header>
    <section>
        <img src="../Imagenes/stars.png" id="stars">
        <img src="../Imagenes/moon.png" id="moon">
        <img src="../Imagenes/mountains_behind.png" id="mountains_behind">
        <h2 id="text">Muñon Dreams</h2>
        <a href="../view/cliente/index.php" id="btn">Explorar</a>
        <img src="../Imagenes/mountains_front.png" id="mountains_front">
    </section>
    <div class="sec" id="sec">
        <h2>Mejores Valoradas</h2>
        <div class="slider">
			<ul>
				<li>
                    <img src="../Imagenes/slider1.jpg" alt="">
                </li>
				<li>
                    <img src="../Imagenes/slider2.jpg" alt="">
                </li>
				<li>
                    <img src="../Imagenes/slider3.jpg" alt="">
                </li>
				<li>
                    <img src="../Imagenes/slider4.jpg" alt="">
                </li>
			</ul>
		</div>       
    </div>
    <div class="buscador">
        <h1>Buscador de Hoteles</h1>
        <form action="buscar.php" method="POST">
            <label for="numero-camas">Número de camas:</label>
            <select id="numero-camas" name="numero-camas" required>
                <option value="1">1 cama</option>
                <option value="2">2 camas</option>
                <option value="3">3 camas</option>
            </select>
                        
            <label for="maximo-personas">Máximo de personas:</label>
            <select id="maximo-personas" name="maximo-personas" required>
                <option value="1">1 persona</option>
                <option value="2">2 personas</option>
                <option value="3">3 personas</option>
            </select>
            <label for="precio-min">Precio mínimo:</label>
            <input type="number" id="precio-min" name="precio-min" min="0" max="120" required>
                    
            <label for="precio-max">Precio máximo:</label>
            <input type="number" id="precio-max" name="precio-max" min="0" max="120" required>
                        
            <label for="fecha-entrada">Fecha de entrada:</label>
            <input type="date" id="fecha-entrada" name="fecha-entrada" required>
                        
            <label for="fecha-salida">Fecha de salida:</label>
            <input type="date" id="fecha-salida" name="fecha-salida" required>
                        
            <button type="submit">Buscar</button>
        </form>
    </div>
    
    <script src="scrips.js"></script>
</body>
</html>