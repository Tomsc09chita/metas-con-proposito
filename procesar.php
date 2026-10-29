
<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contacto.html");
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");

if (
    $nombre === "" ||
    strlen($nombre) > 240 ||
    strlen($correo) > 254 ||
    !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
    $mensaje === "" ||
    strlen($mensaje) > 6000
) {
    exit("Revisa los datos del formulario e inténtalo de nuevo.");
}

$nombreSeguro = htmlspecialchars(
    $nombre, ENT_QUOTES, "UTF-8"
);
$mensajeSeguro = htmlspecialchars(
    $mensaje, ENT_QUOTES, "UTF-8"
);

echo "<!DOCTYPE html><html lang='es'><meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "<title>Mensaje recibido</title><body>";
echo "<h1>¡Gracias por escribirnos!</h1>";
echo "<p>Hola, " . $nombreSeguro . ".</p>";
echo "<p>Tu formulario se procesó correctamente.</p>";
echo "<p>Tu mensaje: " . nl2br($mensajeSeguro) . "</p>";
echo "<a href='contacto.html'>Volver a contacto</a>";
echo "</body></html>";
?>
