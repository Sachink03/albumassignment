<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Album</title>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Satisfy&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Public/upload.css">
</head>
<body>

<?php
// Enable error reporting (for development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include DB connection
@include("connect.php");

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $filename = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $filename;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO album (images) VALUES (?)");
            $stmt->bind_param("s", $filename);
            $stmt->execute();
            echo "<p style='color:green;text-align:center;'>Photo uploaded successfully!</p>";
        } else {
            echo "<p style='color:red;text-align:center;'>Error uploading file.</p>";
        }
    } else {
        echo "<p style='color:red;text-align:center;'>Only JPG, JPEG, PNG & GIF files are allowed.</p>";
    }
}

// Fetch latest 6 images
$result = $conn->query("SELECT * FROM album ORDER BY created_at DESC LIMIT 6");
?>

<section class="py-5">
  <div class="container text-center mb-5">
    <h2 class="display-3 fw-bolder mb-4">Upload Your Album</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <input class="form-control" type="file" name="image" required>
      <button type="submit" class="btn btn-primary mt-4">Upload</button>
    </form>
  </div>

  <div class="container overflow-hidden">
    <div class="row gy-4 gy-lg-0 gx-xxl-5">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
              <div class="card-body p-0">
                <figure class="m-0 p-0">
                  <img class="img-fluid" loading="lazy" src="uploads/<?php echo htmlspecialchars($row['images']); ?>" alt="Uploaded Image">
                  <figcaption class="m-0 p-4">
                    <h4 class="mb-1">Uploaded</h4>
                    <p class="text-secondary mb-0">
                      <?php echo isset($row['created_at']) ? date('d M Y', strtotime($row['created_at'])) : ''; ?>
                    </p>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-center">No images found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

</body>
</html>
