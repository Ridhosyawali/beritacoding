<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); ?>

	<div class="container">
		<h1>Login</h1>
		<p>Masuk ke Dashboard</p>

		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form action="" method="post" style="max-width: 600px;">
			<div>
				<label for="name">Email/Username*</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
				</div>
			</div>
			<div>
				<label for="password">Password*</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>
	</div>
	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>

<style>
/* Form */
form {
	box-sizing: border-box;
	display:flex;
	flex-direction: column;
	gap: 1rem;
	margin: 2em 0;
}
label {
	display: inline-block;
	margin-bottom: 0.5rem;
}
input, textarea {
	display: inline-block;
	padding: 0.5rem;
	width: 100%;
}
input:focus, textarea:focus {
	outline-color: dodgerblue;
}

.invalid {
	border: 2px solid rgb(153, 16, 16);
}

.invalid::placeholder {
	color: rgb(153, 16, 16);
}

.invalid-feedback:empty {
	display: none;
}
.invalid-feedback {
	font-size: smaller;
	color: rgb(153, 16, 16);
}

/* Button */
.button {
	background-color: #e7e7e7;
	border: 2px solid transparent;
	border-radius: 8px;
	color: black;
	padding: 8px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 1rem;
	font-family: sans-serif;
}

.button:hover {
	opacity: 0.8;
}

.button:active {
	border: 2px solid rgba(0, 0, 0, 0.5);
}

.button-success {
	background-color: #4caf50;
	color: white;
}
.button-primary {
	background-color: #008cba;
	color: white;
}
.button-danger {
	background-color: #f44336;
	color: white;
}

.button-small {
	font-size: 0.7rem;
}


/* utilities */
.container {
	max-width: 1024px;
	margin: 0 auto;
	padding: 0 2em;
}</style>