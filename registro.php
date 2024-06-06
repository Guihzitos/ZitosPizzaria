<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "cadastro"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nome = htmlspecialchars($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $rua = htmlspecialchars($_POST['rua']);


    $checkSql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email já cadastrado.";
    } else {
        $sql = "INSERT INTO users (nome, email, senha, rua) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $email, $senha, $rua);

        if ($stmt->execute()) {

            header("Location: login.php");
            exit();
        } else {
            echo "Erro no cadastro: " . $stmt->error;
        }
    }

    $conn->close();
}
?>