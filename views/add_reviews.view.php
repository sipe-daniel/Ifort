<?php $title = "Ajout des reviews"; ?>
<?php include('partials/_header.php');?>

    <div class="main-content ">
    	<div class="container">
			<div class="d-flex justify-content-center mt-5">
				<div class="col-6">
                    <h1 class="center-elt"> Ajouter un avis</h1>
                    <form method="post" class="well"  autocomplete="off">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="votre email" name="email">
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="content" style="height: 100px" name="content"></textarea>
                            <label for="content">Votre avis</label>
                        </div>

                        <div class="select-size">
                            <select class="form-control" name="note">
                                <option value="zero">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
 
  
                        <button type="submit" class="btn btn-primary mt-2" value="add_reviews" name="add_reviews">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('partials/_footer.php'); ?>