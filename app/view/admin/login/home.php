<div class="section">
  <div class="container">
    <div class="column">
      <div class="content">
        <form id="flogin" action="<?=base_url_admin('login/proses/')?>" method="post">
          <div class="form-group">
            <div class="col-md-12">
              <h1>Login</h1>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label for="iusername">Username</label>
              <input id="iusername" name="username" type="text" class="form-control" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label for="ipassword">Password</label>
              <input id="ipassword" name="password" type="password" class="form-control" required />
            </div>
          </div>
          <div class="form-group form-actions">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-submit">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
