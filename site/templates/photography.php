<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all all the subpages of the `phototography`
  page with title and cover image.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>



<?php snippet('header') ?>
<?php snippet('header2') ?>





<ul class="menu2" style="--gutter: 0rem">
  <?php foreach ($page->children()->listed() as $project): ?>
    <?php $cover = $project->cover() ? $project->cover()->url() : ''; ?>
    <li class="menu2container" style="--gutter: 0rem">
      <a href="<?= $project->url() ?>" class="project-link" data-cover="<?= $cover ?>">
        <div class="project-title"><?= $project->title()->esc() ?></div>
        <div class="project-subtitle"><?= $project->subheadline()->esc() ?></div>
        <div class="project-subtitle"><?= $project->curator()->esc() ?></div>
        <div class="project-subtitle"><?= $project->date()->esc() ?></div>
      </a>
    </li>
  <?php endforeach ?>



</nav>

<?php snippet('footer') ?>

 

