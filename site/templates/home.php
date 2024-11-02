<?php snippet('header') ?>

<?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>


  <?php if ($photographyPage = page('photography')): ?>
  <ul class="carousel-container">
    <?php foreach ($photographyPage->children()->listed() as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <figure>
          <?php
          /*
            The `cover()` method defined in the `album.php`
            page model can be used everywhere across the site
            for this type of page

            We can automatically resize images to a useful
            size with Kirby's built-in image manipulation API
          */
          ?>
          <?php if ($cover = $album->cover()): ?>
          <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
          <?php endif ?>
          
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>











<script>
const images = document.querySelectorAll('.carousel-image');
let speeds = []; // Array to hold speed for each image
let directions = []; // Array to hold movement direction (-1 = left, 1 = right)
let positions = []; // Array to store the current positions of images

const maxSpeed = 0.02; // Maximum speed for image movement

// Function to initialize random speeds, directions, and positions for images
function initImageMovement() {
    images.forEach((img, index) => {
        speeds[index] = (Math.random() * maxSpeed) + 0.5; // Speed between 0.5 and maxSpeed
        directions[index] = Math.random() < 0.5 ? -1 : 1; // Randomize direction
        positions[index] = Math.random() * window.innerWidth; // Random starting position
        img.style.left = `${positions[index]}px`; // Set initial position
    });
}

// Function to update image positions based on their speed and direction
function updateImagePositions() {
    images.forEach((img, index) => {
        let speed = speeds[index];

        // Reverse direction if it reaches the screen edges
        if (positions[index] <= 0 || positions[index] >= window.innerWidth - img.width) {
            directions[index] *= -1; // Reverse direction
        }

        // Update position based on speed and direction
        positions[index] += speed * directions[index];
        img.style.left = `${positions[index]}px`;
    });

    // Request the next frame of the animation
    requestAnimationFrame(updateImagePositions);
}

// Function to add slight movement based on mouse position
function updateImagesOnMouseMove(e) {
    const mouseX = e.clientX - (window.innerWidth / 1); // Get mouse position relative to the center
    const mouseEffectFactor = 0.2; // Subtle mouse effect

    images.forEach((img, index) => {
        const movement = mouseX * mouseEffectFactor / (index + 1); // Slight movement for each image
        img.style.transform = `translateX(${movement}px)`; // Apply the subtle mouse movement
    });
}

// Initialize the movement and random positions on page load
window.addEventListener('load', () => {
    initImageMovement();
    updateImagePositions(); // Start the constant movement
});

// Listen for mouse movement to add a slight effect
document.addEventListener('mousemove', updateImagesOnMouseMove);
</script>



<!-- Your content here -->
    



  
<?php snippet('footer') ?>



