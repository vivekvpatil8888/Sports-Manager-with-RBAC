<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/positions" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Position</h2>
    <form action="<?php echo URLROOT; ?>/positions/add" method="post">
      <div class="form-group">
        <label for="name">Position Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>