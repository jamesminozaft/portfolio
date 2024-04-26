<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editName']) && isset($_POST['editDescription']) && isset($_FILES['editImage'])) {
        require_once "../includes/conn.php"; 
        $id = $_POST['editWorkId'];
        $name = $_POST['editName'];
        $description = $_POST['editDescription'];
        $targetDirectory = "../external/uploads/";
        $targetFile = $targetDirectory . basename($_FILES["editImage"]["name"]);
        if (move_uploaded_file($_FILES["editImage"]["tmp_name"], $targetFile)) {
            $sql = "UPDATE works SET name = :name, description = :description, image = :image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $targetFile);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                // header("Location: ../index.php"); 
                exit();
            } else {
            }
        } else {
        }
    } else {
    }
} else {
}
?>
