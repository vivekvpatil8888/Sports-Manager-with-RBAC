<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/seasons/show" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Season</h2>
    <form action="<?php echo URLROOT; ?>/seasons/edit/<?php echo $data['id']?>" method="post">
      <div class="form-group">
        <label for="year">Year : <sup>*</sup></label>
        <input type="text" name="year" class="form-control form-control-lg <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['year']; ?>">
        <span class="invalid-feedback"><?php echo $data['year_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="description">Description : <sup>*</sup></label>
        <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>">
        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>