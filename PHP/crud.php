<?php
//CREAR CONEXIÓN A LA BASE DE DATOS
$conn = mysqli_connect("localhost", "root", "", "personas");

//VERIFICAR LA CONEXIÓN
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//CREAR LA TABLA SI NO EXISTE
$sql = "CREATE TABLE IF NOT EXISTS persona (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    CEDULA VARCHAR(10) NOT NULL,
    NOMBRE VARCHAR(10) NOT NULL,
    APELLIDO VARCHAR(10) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabla creada exitosamente";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

//INSERTAR DATOS
$sql = "INSERT INTO persona (ID, CEDULA, NOMBRE, APELLIDO) VALUES (2, '1804372432','JUAN', 'CASTRO')";

if (mysqli_query($conn, $sql)) {
    echo "Registro agregado exitosamente";
} else {
    echo "Error al agregar el registro: " . mysqli_error($conn);
}

//LEER DATOS
$sql = "SELECT * FROM persona";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["ID"] . " - CEDULA: " . $row["CEDULA"] . " - NOMBRE: " . $row["NOMBRE"] . " - APELLIDO: " . $row["APELLIDO"] . "<br>";
    }
} else {
    echo "No se encontraron registros";
}

//ACTUALIZAR DATOS
$sql = "UPDATE persona SET NOMBRE = 'CARLOS' WHERE NOMBRE = 'JUAN'";

if (mysqli_query($conn, $sql)) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error al actualizar el registro: " . mysqli_error($conn);
}

//ELIMINAR DATOS
$sql = "DELETE FROM persona WHERE NOMBRE = 'CARLOS'";

if (mysqli_query($conn, $sql)) {
    echo "Registro eliminado exitosamente";
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conn);
}

//CERRAR LA CONEXIÓN
mysqli_close($conn);

?>