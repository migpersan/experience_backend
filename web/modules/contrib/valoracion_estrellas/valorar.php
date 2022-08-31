<?php 
// namespace Drupal\Valorar;
// require_once("../../../core/lib/Drupal/Core/Command/ServerCommand.php");
// require_once("../../../core/modules/user/src/Entity/User.php");
// use Drupal\user\Entity\User;

$valoracion = $_POST['valoracion'];
// $usuario = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
// $usuario2 = \Drupal::service('user.auth')->authenticate('testusername', 'testpassword');
// $user = User::load(1);
// $user = User::load(\Drupal::currentUser()->id());
// $usuario = "PEPITA";
$usuario = '1';
// $libro = basename($_SERVER['REQUEST_URI']);
$libro = 1;


// echo "usuario: ".$usuario;

// exit;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "experience_backend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO valoraciones (usuario, libro, valoracion)
// VALUES ('$usuario', '$libro', '$valoracion')";

$sql = "REPLACE INTO
          valoraciones
        SET 
          usuario = '$usuario',
          libro = '$libro',
          valoracion = '$valoracion'
        ";
// echo $sql;exit;
$mensaje = "";
if ($conn->query($sql) === TRUE) {
  $mensaje = "Valoración guardada correctamente";
} else {
  $mensaje = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo json_encode($mensaje);