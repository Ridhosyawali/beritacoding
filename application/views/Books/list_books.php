<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>

	<?php $this->load->view('_partials/navbar.php'); ?>

	<h1>Books List</h1>
	<ul>
    <?php foreach ($books as $book) : ?>
			<li>
				<a href="<?= site_url('books/'.$book->slug) ?>">
					<?= $book->title ? html_escape($book->title) : "No Title" ?>
				</a>
			</li>
		<?php endforeach ?>
	</ul>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>