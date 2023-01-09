<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List Artikel</h1>

			<div class="toolbar">
				<a href="#" class="button button-primary" role="button">+ Tulis Artikel</a>
			</div>

			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th style="width: 15%;" class="text-center">Status</th>
						<th style="width: 25%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div>Hello World!</div>
							<div class="text-gray"><small>12 Jan 2021<small></div>
						</td>
						<td class="text-center text-gray">Draft</td>
						<td>
							<div class="action">
								<a href="#" class="button button-small" role="button">View</a>
								<a href="#" class="button button-small" role="button">Edit</a>
								<a href="#" class="button button-small button-danger" role="button">Delete</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>Hello World!</div>
							<div class="text-gray"><small>12 Jan 2021<small></div>
						</td>
						<td class="text-center text-green">Published</td>
						<td>
							<div class="action">
								<a href="#" class="button button-small" role="button">View</a>
								<a href="#" class="button button-small" role="button">Edit</a>
								<a href="#" class="button button-small button-danger" role="button">Delete</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>