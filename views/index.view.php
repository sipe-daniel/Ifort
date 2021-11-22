<?php $title = "Show review"; ?>
  
<?php 
 include('partials/_header.php');

?>

    <div class="main-content">
      <div class="container" >
        <div class="d-flex justify-content-center">
          <div>
            <div class="mt-3 center-elt">
              <a class="btn btn-primary mb-2" href="/add_reviews.php" role="button">Ajouter un avis</a>
              <form method="post" autocomplete="off">
              
                
                <select class="form-control mb-2" name="review_note">
                  <option value="">Note...</option>

                  <?php 
                  $notes = returnUniqueProperty($reviews, 'note');
                  foreach ($notes as $n): 
                  ?>
                  <option value="<?=$n?>"><?=$n?></option>
                  <?php endforeach; ?>
                </select>
                
                
                <select class="form-control" name="review_date">
                  <option value="">Avis de toutes les dates</option>

                  <?php 
                    $dates_created_at = datereturnUniqueProperty($reviews, 'created_at');
                    foreach ($dates_created_at as $date_created_at): 
                  ?>
                  <option value="<?=$date_created_at?>"><?=$date_created_at;?></option>

                  <?php endforeach; ?>
                </select>

                <input type="submit" class = "btn btn-primary mt-2" value = "trier" name="sort"/>

              </form>
            </div>

            <?php if($sort_by_note==NULL && $sort_by_date==NULL): ?>
              <?php foreach ($reviews as $review): ?>
              <?php if(!is_logged_in() && !$review->hide): ?>
      
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $review->name ?> </h5>
                      <div class="date"> Créer le : <?= $review->created_at ?></div>
                      <p class="card-text"><?= $review->content ?></p>
                      <p class="card-text">Note : <?= $review->note ?></p>
                    </div>
                  </div>
                </div>
                
                <?php elseif(is_logged_in()): ?> 
              
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $review->name ?> </h5>
                      <div class="date"> Créer le : <?= $review->created_at ?></div>
                      <p class="card-text"><?= $review->content ?></p>
                      <p class="card-text">Note : <?= $review->note ?></p>

                      <?php if(is_logged_in()):?>
    
                      <a class="btn <?= $review->hide?'btn-primary': 'btn-danger'; ?>" href="/index.php?id=<?=get_session('user_id')?>&change_status=<?=$review->id?>&status=<?=$review->hide?>" role="button">
                      <?= $review->hide? 'Afficher': 'Masquer'; ?>
                      </a>
                      
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

              <?php 
              endif; 
              endforeach; 
              ?>

            <?php elseif($sort_by_note!=NULL && $sort_by_date==NULL): ?>

              <?php foreach ($sort_by_note as $sbn): ?>
              <?php if(!is_logged_in() && !$sbn->hide): ?>
      
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbn->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbn->created_at ?></div>
                      <p class="card-text"><?= $sbn->content ?></p>
                      <p class="card-text">Note : <?= $sbn->note ?></p>
                    </div>
                  </div>
                </div>
                
                <?php elseif(is_logged_in()): ?> 
              
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbn->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbn->created_at ?></div>
                      <p class="card-text"><?= $sbn->content ?></p>
                      <p class="card-text">Note : <?= $sbn->note ?></p>

                      <?php if(is_logged_in()):?>
    
                      <a class="btn <?= $sbn->hide?'btn-primary': 'btn-danger'; ?>" href="/index.php?id=<?=get_session('user_id')?>&change_status=<?=$sbn->id?>&status=<?=$sbn->hide?>" role="button">
                      <?= $sbn->hide? 'Afficher': 'Masquer'; ?>
                      </a>
                      
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

              <?php 
                endif; 
                endforeach; 
              ?>

              <?php elseif($sort_by_note==NULL && $sort_by_date!=NULL): ?>
              
              <?php foreach ($sort_by_date as $sbd): ?>
              <?php if(!is_logged_in() && !$sbd->hide): ?>
      
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbd->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbd->created_at ?></div>
                      <p class="card-text"><?= $sbd->content ?></p>
                      <p class="card-text">Note : <?= $sbd->note ?></p>
                    </div>
                  </div>
                </div>
                
                <?php elseif(is_logged_in()): ?> 
              
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbd->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbd->created_at ?></div>
                      <p class="card-text"><?= $sbd->content ?></p>
                      <p class="card-text">Note : <?= $sbd->note ?></p>

                      <?php if(is_logged_in()):?>
    
                      <a class="btn <?= $sbd->hide?'btn-primary': 'btn-danger'; ?>" href="/index.php?id=<?=get_session('user_id')?>&change_status=<?=$sbd->id?>&status=<?=$sbd->hide?>" role="button">
                      <?= $sbd->hide? 'Afficher': 'Masquer'; ?>
                      </a>
                      
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

              <?php 
                endif; 
                endforeach; 
              ?>

            <?php elseif($sort_by_note!=NULL && $sort_by_date!=NULL): ?>
           <?php foreach ($sort_by_note as $sbn): ?>
              <?php if(!is_logged_in() && !$sbn->hide): ?>
      
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbn->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbn->created_at ?></div>
                      <p class="card-text"><?= $sbn->content ?></p>
                      <p class="card-text">Note : <?= $sbn->note ?></p>
                    </div>
                  </div>
                </div>
                
                <?php elseif(is_logged_in()): ?> 
              
                <div style="margin-top: 1rem;">
                  <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Auteur : <?= $sbn->name ?> </h5>
                      <div class="date"> Créer le : <?= $sbn->created_at ?></div>
                      <p class="card-text"><?= $sbn->content ?></p>
                      <p class="card-text">Note : <?= $sbn->note ?></p>

                      <?php if(is_logged_in()):?>
    
                      <a class="btn <?= $sbn->hide?'btn-primary': 'btn-danger'; ?>" href="/index.php?id=<?=get_session('user_id')?>&change_status=<?=$sbn->id?>&status=<?=$sbn->hide?>" role="button">
                      <?= $sbn->hide? 'Afficher': 'Masquer'; ?>
                      </a>
                      
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

              <?php 
                endif; 
                endforeach; 
              ?>


            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    
<?php include('partials/_footer.php'); ?>

