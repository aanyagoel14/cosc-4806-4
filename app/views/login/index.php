<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>You are not logged in</h1>

								<?php if (isset($_SESSION['error'])): ?>
										<div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
										<?php unset($_SESSION['error']); ?>
								<?php endif; ?>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
		<form action="/login/verify" method="post" >
		<fieldset>
			<div class="form-group">
				<label for="username">Username</label>
				<input required type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input required type="password" class="form-control" name="password">
			</div>
            <br>
		    <button type="submit" class="btn btn-primary">Login</button>
		</fieldset>
		</form> 

	<p class="mt-3">Don't have an account? <a href="/create">Create one here</a></p>
	</div>
</div>
    <?php require_once 'app/views/templates/footer.php' ?>
