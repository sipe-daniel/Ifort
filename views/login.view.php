  
    <?php $title = "Connexion"; ?>
 
    <?php include('partials/_header.php');?>

    <div class="main-content ">
    	<div class="container">
			<div class="d-flex justify-content-center mt-5">
				<div class="col-6">
					<h1 class="lead">Connexion</h1>
					<?php include('partials/_errors.php'); ?>
					<form method="post" class="well" autocomplete="off">
						<div class="col-12 mb-3">
							<label class="control-label" for="identifiant">Pseudo ou Adresse electronique :</label>
							<Input type="text" data-parsley-minlength="3" value="<?=get_input('identifiant') ?>" class="form-control" id="identifiant" name="identifiant" required />	
						</div>

						<div class="col-12 mb-3">
							<label class="control-label" for="password">Mot de passe :</label>
							<Input type="password" class="form-control" id="password" name="password" required/>	
						</div>

						<button type="submit" class="btn btn-primary" value ="Connexion" name="login">Connexion</button>
					</form>
				</div>
			</div>
	    	
      </div>

    </div>

	
<?php include('partials/_footer.php'); ?>
 