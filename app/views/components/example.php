<?php

/**
 * Example Component View
 * Components can have any number of slots, name them whatever you would like.
 * <?= $component->slot('title') ?>
 *
 */

?>

<?= $component->open() ?>
	<?= $component->slot('title') ?>
	<?= $component->slot('description') ?>
<?= $component->close() ?>