</main>


<footer class="containerlogolarge">

  
<div class="containerlogolarge">

   <a class="logolarge" href="<?= $site->url() ?>">
   <?php echo file_get_contents('assets/icons/CacheLogo-Large.svg'); ?>
  
  </div>
   </a>

 


  </footer>











<?= js([
  'assets/js/prism.js',
  'assets/js/lightbox.js',
  'assets/js/index.js',
  '@auto'
]) ?>


</body>
</html>




