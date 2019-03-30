<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/slscombos/show" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Combo</h2>
    <form action="<?php echo URLROOT; ?>/slscombos/edit/<?php echo $data['id']?>" method="post">
      <div class="form-group">
        <label for="sport">sport : <sup>*</sup></label>
        <input type="text" name="sport" class="form-control form-control-lg <?php echo (!empty($data['sport_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['sport']; ?>">
        <span class="invalid-feedback"><?php echo $data['year_err']; ?></span>
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
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>