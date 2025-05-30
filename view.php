<?php
@include("connect.php");

// Fetch all images
$sql = "SELECT * FROM album ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Photo Album</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="album.css">
  <style>  
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background: #f5f5f5;
}

.title {
  text-align: center;
  font-size: 2em;
  margin-bottom: 30px;
}

.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
  max-width: 1200px;
  margin: auto;
}

.gallery-item {
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: transform 0.2s ease;
}

.gallery-img {
  width: 100%;
  height: auto;
  display: block;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-img {
  transform: scale(1.05);
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 9999;
  padding-top: 60px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.8);
}

.modal-content {
  display: block;
  margin: auto;
  max-width: 90%;
  max-height: 80vh;
  border-radius: 10px;
}

.modal-close {
  position: absolute;
  top: 30px;
  right: 50px;
  color: white;
  font-size: 30px;
  font-weight: bold;
  cursor: pointer;
}

  </style>
</head>
<body>

<h1 class="title">My Photo Album</h1>

<div class="gallery">
  <?php if ($result && $result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="gallery-item">
        <img src="uploads/<?php echo htmlspecialchars($row['images']); ?>" alt="Album Image" class="gallery-img" onclick="openModal(this.src)">
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No images found.</p>
  <?php endif; ?>
</div>

<!-- Modal -->
<div id="imageModal" class="modal" onclick="closeModal()">
  <span class="modal-close">&times;</span>
  <img class="modal-content" id="modalImg">
</div>

<script>
function openModal(src) {
  document.getElementById("imageModal").style.display = "block";
  document.getElementById("modalImg").src = src;
}
function closeModal() {
  document.getElementById("imageModal").style.display = "none";
}
</script>

</body>
</html>
