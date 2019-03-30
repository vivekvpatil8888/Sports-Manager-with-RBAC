<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
            <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Role: <sup>*</sup></label>
            <!-- <input type="text" name="role" class="form-control form-control-lg <?php echo (!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['role']; ?>"> -->
            <select class="custom-select d-block w-100" id="role" name="role" required>
              <option value="<?php echo $data['role']; ?>">Select...</option>
              <option>Parent</option>
              <option>Coach</option>
              <option>Team Manager</option>
              <option>League Manager</option>
            </select>
            <span class="invalid-feedback"><?php echo $data['role_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Team: <sup>*</sup></label>
            <input type="text" name="team" class="form-control form-control-lg <?php echo (!empty($data['team_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['team']; ?>">
            <!-- <select class="custom-select d-block w-100" id="team" required>
              <option value="<?php echo $data['team']; ?>">Choose...</option>
              <option>India</option>
              <option>United States</option>
            </select> -->
            <span class="invalid-feedback"><?php echo $data['team_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">League: <sup>*</sup></label>
            <input type="text" name="league" class="form-control form-control-lg <?php echo (!empty($data['league_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['league']; ?>">
            <!-- <select class="custom-select d-block w-100" id="league" required>
              <option value="<?php echo $data['role']; ?>">Choose...</option>
              <option>IPL</option>
            </select> -->
            <span class="invalid-feedback"><?php echo $data['league_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>