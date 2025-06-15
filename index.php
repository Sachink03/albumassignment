<?php
  // Get current page from URL or default to 1
  $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

  // Load image list
  $dir = "images/";
  $images = array_values(array_diff(scandir($dir), ['.', '..']));

  // Ensure even number of pages
  if (count($images) % 2 !== 0) $images[] = ''; // blank page if needed
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Flipbook Album</title>
 <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/turn.min.js"></script>
</head>
<body>

<!-- Page Navigation Buttons -->
<div>
  <button id="prevPage">⬅ Previous</button>
  <button id="nextPage">Next ➡</button>
</div>

<!-- Flipbook Album -->
<div id="flipbook">
  <?php foreach ($images as $img): ?>
    <div class="page" style="background-image: url('images/<?= $img ?>');"></div>
  <?php endforeach; ?>
</div>

<!-- Script to Initialize Turn.js & Page Navigation -->
<script>
  const totalPages = <?= count($images) ?>;
  const initialPage = <?= max(1, min(count($images), $currentPage)) ?>;

  $(function() {
    const flipbook = $('#flipbook');

    flipbook.turn({
      width: 800,
      height: 500,
      autoCenter: true,
      page: initialPage,
      when: {
        turned: function(event, page) {
          const newUrl = new URL(window.location.href);
          newUrl.searchParams.set('page', page);
          history.pushState(null, '', newUrl.toString());
        }
      }
    });

    $('#nextPage').click(() => flipbook.turn('next'));
    $('#prevPage').click(() => flipbook.turn('previous'));
  });
</script>

</body>
</html>
