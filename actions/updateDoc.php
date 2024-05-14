<?php
session_start();

if (isset($_SESSION['admin_name'])) {
    include '../dbconn.php';  // Assuming your database connection file

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set PDO error mode to exception
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();  // Stop execution if database connection fails
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $doctor_id = $_POST['doctor_id']; // Retrieving doctor ID from form input
        $new_image = $_FILES['image'];  // Assuming file upload field name is "image"
        $new_name = $_POST['name'];
        $new_age = $_POST['age'];
        $new_qualification = $_POST['qualification'];
        $new_specialists = $_POST['specialists'];
        $new_sch1 = $_POST['sch1'];
        $new_sch2 = $_POST['sch2'];

        // Image upload (consider adding validations and error handling)
        if (!empty($new_image['name'])) {
            $upload_dir = "../Photos/";
            $image_name = $new_image["name"];  // Get original file name
            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);  // Get file extension
            $target_path = $upload_dir . $new_name . "." . $image_extension;  // Construct new file name
            if (move_uploaded_file($new_image["tmp_name"], $target_path)) {
                $image_path = $new_name . "." . $image_extension;  // Update image path if upload succeeds
            } else {
                // Handle upload failure (e.g., display error message)
                echo "Image upload failed.";
                exit();  // Optionally, prevent further execution
            }
        } else {
            $image_path = null;  // No new image provided, keep existing value
        }
        // Update doctor information in the database
        try {
            $sql = "UPDATE doctors SET
                    image = :image,
                    name = :name,
                    age = :age,
                    qualification = :qualification,
                    specialist_id = :specialist_id,
                    schedule2_id = :schedule2_id,
                    schedule1_id = :schedule1_id
            WHERE id = :doctor_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image', $image_path);
            $stmt->bindParam(':name', $new_name);
            $stmt->bindParam(':age', $new_age);
            $stmt->bindParam(':qualification', $new_qualification);
            $stmt->bindParam(':specialist_id', $new_specialists);
            $stmt->bindParam(':schedule2_id', $new_sch2);
            $stmt->bindParam(':schedule1_id', $new_sch1);
            $stmt->bindParam(':doctor_id', $doctor_id);
            $stmt->execute();

            // Set session status message
            $_SESSION['status'] = "<div class='alert alert-success text-start' role='alert'>Doctor information updated successfully!</div>";

            // Redirect to viewdoctor.php
            header("Location: ../views/viewDoc.php");
            exit();
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
} else {
    // Redirect to login page if admin is not logged in
    header("Location: ../views/etpForm.php");  // Assuming your login page path
    exit();
}
?>
