<!DOCTYPE html lang="en">
<link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
     <link rel="stylesheet" href="public/album.css">
     <link rel="stylesheet" href="public/index.css">
    <title>Album</title>
</head>
<body>
    <div class="gallery_1" unique-script-id="w-w-dm-id">
  <div class="responsive-container-block bigContainer">
    <div class="responsive-container-block Container">
      <p class="text-blk heading">
        Album Design
      </p>
      <!-- <p class="text-blk subHeading">
        Sachin Design
      </p> -->
      <div class="responsive-container-block imgContainer">
        <div class="project project1">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb2.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb2.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
        <div class="project project2">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb7.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb7.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
        <div class="project project3">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb3.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb3.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
        <div class="project project4">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb6.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb6.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
        <div class="project project5">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb4.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb4.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
        <div class="project project6">
          <img class="smallImage" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb5.png">
          <div class="overlay">
            <div class="overlay-inner">
              <button class="close">
                Close X
              </button>
              <div class="hdImgs">
                <img class="squareImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb5.png">
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="btn">
              View
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {

  $(`[unique-script-id="w-w-dm-id"] .btn-box`).click(function() {
    $(this).parent().children(".overlay").show();

  });


  $(`[unique-script-id="w-w-dm-id"] .close`).click(function() {
    $(".overlay").hide();
  });
});
</script>
</body>
</html>
