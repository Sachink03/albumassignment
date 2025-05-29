<?php
// Handle file upload logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    $filename = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . time() . "_" . $filename;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            header("Location: uploads.php?success=1");
            exit();
        } else {
            $error = "Error uploading file.";
        }
    } else {
        $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photo Album</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.0/css/all.css" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      margin-bottom: 30px;
    }

    .profile-picture {
      width: 140px;
      height: 140px;
      margin: 0 auto;
      border: 2px dashed #999;
      border-radius: 50%;
      position: relative;
      background: #fff;
      transition: 0.3s ease;
    }

    .profile-picture:hover {
      border-color: #666;
    }

    .upload-icon {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      cursor: pointer;
    }

    .file-uploader {
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0;
      top: 0;
      left: 0;
      cursor: pointer;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      padding: 10px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .gallery img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.05);
    }

    .message {
      font-size: 16px;
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .success {
      color: green;
    }

    .error {
      color: red;
    }

    @media (max-width: 500px) {
      .profile-picture {
        width: 100px;
        height: 100px;
      }

      .upload-icon i {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <h1>📷 My Photo Album</h1>

  <!-- Success/Error Messages -->
  <?php
    if (isset($_GET['success'])) {
        echo "<p class='message success'>Image uploaded successfully!</p>";
    } elseif (!empty($error)) {
        echo "<p class='message error'>$error</p>";
    }
  ?>

  <!-- Upload Form -->
  <form action="uploads.php" method="POST" enctype="multipart/form-data">
    <div class="profile-picture">
      <label class="upload-icon" for="image">
        <i class="fas fa-plus fa-2x"></i>
      </label>
      <input
        id="image"
        name="image"
        class="file-uploader"
        type="file"
        accept="image/*"
        onchange="this.form.submit()"
        required
      />
    </div>
  </form>

  <!-- Gallery -->
  <div class="gallery">
    <?php
      $images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
      foreach ($images as $image) {
        echo "<img src='$image' alt='Photo'>";
      }
    ?>
  </div>

</body>
</html>
