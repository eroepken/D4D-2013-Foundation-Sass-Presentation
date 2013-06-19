<div class="row top">
  <div class="large-12 column">
    <h1 class="title"><?php print $site_name; ?></h1>
  </div>
</div>
<?php print render($page['page_header']); ?>
<div class="row" role="breadcrumb-container">
  <div class="large-12 columns">
    <?php if ($breadcrumb): ?>
      <nav class="breadcrumb"><?php print $breadcrumb; ?></nav>
    <?php endif; ?>

    <?php if ($messages): ?><?php print $messages; ?><?php endif; ?>
  </div>
</div>