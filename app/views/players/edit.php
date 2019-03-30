<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/players/show" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Player</h2>
    <form action="<?php echo URLROOT; ?>/players/edit/<?php echo $data['id']?>" method="post">
      <div class="form-group">
        <label for="firstname">First Name : <sup>*</sup></label>
        <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
        <span class="invalid-feedback"><?php echo $data['firstname_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name : <sup>*</sup></label>
        <input type="text" name="lastname" class="form-control form-control-lg <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
        <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="dateofbirth">Birth Date : <sup>*</sup></label>
        <input type="text" name="dateofbirth" class="form-control form-control-lg <?php echo (!empty($data['dateofbirth_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dateofbirth']; ?>">
        <span class="invalid-feedback"><?php echo $data['dateofbirth_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="jerseynumber">Jersey Number : <sup>*</sup></label>
        <input type="text" name="jerseynumber" class="form-control form-control-lg <?php echo (!empty($data['jerseynumber_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['jerseynumber']; ?>">
        <span class="invalid-feedback"><?php echo $data['jerseynumber_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>