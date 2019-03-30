<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/teams/show" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Team</h2>
    <form action="<?php echo URLROOT; ?>/teams/add" method="post">
      <div class="form-group">
        <label for="name">name : <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="mascot">mascot : <sup>*</sup></label>
        <input type="text" name="mascot" class="form-control form-control-lg <?php echo (!empty($data['mascot_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mascot']; ?>">
        <span class="invalid-feedback"><?php echo $data['mascot_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="sport">sport : <sup>*</sup></label>
        <input type="text" name="sport" class="form-control form-control-lg <?php echo (!empty($data['sport_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['sport']; ?>">
        <span class="invalid-feedback"><?php echo $data['sport_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="league">league : <sup>*</sup></label>
        <input type="text" name="league" class="form-control form-control-lg <?php echo (!empty($data['league_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['league']; ?>">
        <span class="invalid-feedback"><?php echo $data['league_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="season">season : <sup>*</sup></label>
        <input type="text" name="season" class="form-control form-control-lg <?php echo (!empty($data['season_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['season']; ?>">
        <span class="invalid-feedback"><?php echo $data['season_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="picture">picture : <sup>*</sup></label>
        <input type="text" name="picture" class="form-control form-control-lg <?php echo (!empty($data['picture_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['picture']; ?>">
        <span class="invalid-feedback"><?php echo $data['picture_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="homecolor">homecolor : <sup>*</sup></label>
        <input type="text" name="homecolor" class="form-control form-control-lg <?php echo (!empty($data['homecolor_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['homecolor']; ?>">
        <span class="invalid-feedback"><?php echo $data['homecolor_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="awaycolor">awaycolor : <sup>*</sup></label>
        <input type="text" name="awaycolor" class="form-control form-control-lg <?php echo (!empty($data['awaycolor_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['awaycolor']; ?>">
        <span class="invalid-feedback"><?php echo $data['awaycolor_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="maxplayers">maxplayers : <sup>*</sup></label>
        <input type="text" name="maxplayers" class="form-control form-control-lg <?php echo (!empty($data['maxplayers_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['maxplayers']; ?>">
        <span class="invalid-feedback"><?php echo $data['maxplayers_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>