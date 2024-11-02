<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This note template renders a blog article. It uses the `$page->cover()`
  method from the `note.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/note.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
<?php snippet('header2') ?>






<article class="note">


  <header class="note-header h1">
    <h1 class="note-title"><?= $page->title()->esc() ?></h1>
    <?php if ($page->subheading()->isNotEmpty()): ?> </br>
    <p class="note-subheading"><small><?= $page->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>



  <div class="note text">
    <?= $page->text()->toBlocks() ?>
  </div>



  <footer class="note-footer">
    
            <time class="note-date" date="<?= $page->date()->toDate('c') ?>">Published <?= $page->date()->esc() ?></time>
  </footer>

  
</article>

<?php snippet('footer') ?>
