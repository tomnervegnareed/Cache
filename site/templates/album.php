<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This example template makes use of the `$gallery` variable defined
  in the `album.php` controller (/site/controllers/album.php)

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('header2') ?>
<?php snippet('intro') ?>

<article>
  <div class="note">

   

    <div class="column" style="--columns: 8">
      <ul class="album-gallery">
        <?php foreach ($gallery as $image): ?>
        <li>
          <a href="<?= $image->url() ?>" data-lightbox>
            <figure class="img" style="--w:<?= $image->width() ?>;--h:<?= $image->height() ?>">
              <img src="<?= $image->url() ?>" alt="<?= $image->alt()->esc() ?>">
              
            </figure>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </div>




    <div class="column" style="--columns: 4">
      <div class="text">
        <?= $page->text()->toBlocks() ?>
      </div>
    </div>



</article>
<?php snippet('footer') ?>
