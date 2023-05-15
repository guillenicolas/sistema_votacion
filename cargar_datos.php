<?php
// Establecer conexión con la base de datos

$type = $_POST['type'];

if ($type == 'regiones') {
    // Obtener regiones desde la base de datos
    // $data = ... // Lógica para obtener las regiones desde la base de datos

    $response = array(
        'status' => 'success',
        'data' => $data
    );
} elseif ($type == 'comunas') {
    $regionId = $_POST['regionId'];
    // Obtener comunas de la región seleccionada desde la base de datos
    // $data = ... // Lógica para obtener las comunas de la región desde la base de datos

    $response = array(
        'status' => 'success',
        'data' => $data
    );
} elseif ($type == 'candidatos') {
    // Obtener candidatos desde la base de datos
    // $data = ... // Lógica para obtener los candidatos desde la base de datos

    $response = array(
        'status' => 'success',
        'data' => $data
    );
}

echo json_encode($response);
?>
<?php
// Establecer conexión con la base de datos

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$entero = $_POST['entero'];


// Consulta para obtener las regiones
$query = "SELECT * FROM regiones";
$statement = $conn->prepare($query);
$statement->execute();

// Obtener los resultados como un array asociativo
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados como JSON
echo json_encode($results);
// Validar que no exista duplicación de votos por RUT
// $duplicateVote = ... // Lógica para verificar si ya existe un voto con el mismo RUT en la base de datos

if ($duplicateVote) {
    echo "Ya has votado previamente. No se permite duplicación de votos.";
    exit;
}

// Validar que se hayan seleccionado al menos dos opciones en "¿Cómo se enteró de nosotros?"
if (count($entero) < 2) {
    echo "Debes seleccionar al menos dos opciones en '¿Cómo se enteró de nosotros?'";
    exit;
}

// Guardar los datos en la base de datos
// $query = ... // Lógica para insertar los datos del votante en la base de datos

if ($query) {
    echo "¡Voto registrado exitosamente!";
} else {
    echo "Error al registrar el voto. Inténtalo nuevamente.";
}
$query = "SELECT * FROM regiones";
$statement = $conn->prepare($query);
$statement->execute();

// Obtener los resultados como un array asociativo
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados como JSON
echo json_encode($results);
if (isset($_GET['regionId'])) {
    $regionId = $_GET['regionId'];

    // Conexión a la base de datos
    $host = 'nombre_host';
    $dbname = 'nombre_base_de_datos';
    $user = 'nombre_usuario';
    $password = 'contraseña';
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Consulta para obtener las comunas de la región seleccionada
    $query = "SELECT * FROM comunas WHERE region_id = :regionId";
    $statement = $conn->prepare($query);
    $statement->bindParam(':regionId', $regionId, PDO::PARAM_INT);
    $statement->execute();

    // Obtener los resultados como un array asociativo
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados como JSON
    echo json_encode($results);
}
?>

