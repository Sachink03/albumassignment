<?php
// Create 'images/' directory if it doesn't exist
if (!file_exists('images')) {
    mkdir('images', 0777, true);
}

// Image Upload Handling
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
    $file = $_FILES['image'];

    if (in_array($file['type'], $allowed) && $file['size'] <= 5 * 1024 * 1024) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('img_', true) . '.' . $ext;
        move_uploaded_file($file['tmp_name'], 'images/' . $newName);
    } else {
        $errors[] = "Invalid file type or size exceeds 5MB.";
    }
}

// Load Images and Paginate
$allImages = glob("images/*.{jpg,jpeg,png}", GLOB_BRACE);
$total = count($allImages);
$perPage = 6;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $perPage;
$images = array_slice(array_reverse($allImages), $start, $perPage);
$totalPages = ceil($total / $perPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Album</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Photo Album</h1>

    <form method="post" enctype="multipart/form-data" class="upload-form">
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="submit">Upload</button>
        <?php if ($errors): ?>
            <p class="error"><?= implode('<br>', $errors) ?></p>
        <?php endif; ?>
    </form>
    <img id="preview" src="#" alt="Image Preview">
    <div class="gallery">
        <div class="column left">
            <?php foreach (array_slice($images, 0, 3) as $img): ?>
                <img src="<?= $img ?>" alt="Image">
            <?php endforeach; ?>
        </div>
        <div class="column right">
            <?php foreach (array_slice($images, 3, 3) as $img): ?>
                <img src="<?= $img ?>" alt="Image">
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">&laquo; Prev</a>
        <?php endif; ?>
        <span>Page <?= $page ?> of <?= $totalPages ?></span>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>">Next &raquo;</a>
        <?php endif; ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
