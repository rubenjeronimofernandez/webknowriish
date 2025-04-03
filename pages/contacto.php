<?php
include '../includes/header.php';

// Database connection details
$servername = "localhost";
$username = "myequiposq24";
$password = "pG98NtIB";
$dbname = "knowriish";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status = ""; // Variable to store success/error message

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $empresa = $_POST['empresa'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, empresa, telefono, mensaje) VALUES (?, ?, ?, ?, ?)");  
    $stmt->bind_param("sssss", $name, $email, $empresa,$phone, $message);

    // Execute
    if ($stmt->execute()) {
        $status = "success";
    } else {
        $status = "error";
        $errorMessage = $stmt->error;
    }

    $stmt->close();
}

?>
<meta charset="UTF-8">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="contact-image">
                <img src="/knowriish/assets/img/contacto.png" alt="Contact Image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h2>¿Hablamos?</h2>
                <p>Déjanos tus datos y nos pondremos en contacto contigo en muy poco tiempo</p>
                <?php if ($status == "success"): ?>
                    <div class="alert alert-success">¡Hemos recibido tu mensaje! Gracias por contactar con Knowriish.</div>
                <?php endif; ?>
                <?php if ($status == "error"): ?>
                    <div class="alert alert-danger">Error: <?php echo $errorMessage; ?></div>
                <?php endif; ?>
                <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        <input type="text" class="form-control" id="empresa" name="empresa">
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
            <div class="contact-info">
                <h2>Información de contacto</h2>
                <p>Dirección: C/ Río Sequillo 13-103, 05004 Ávila</p>
                <p>Teléfono: (+34) 624 31 38 77</p>
                <p>Email: hola@equiposqueaprenden.es</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
</div>

<?php
include '../includes/footer.php';

// Close connection
$conn->close();
?>
