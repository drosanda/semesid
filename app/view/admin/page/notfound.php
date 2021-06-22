<?php
//Example 1 column layout
?>
<!doctype html>
<html amp lang="en">
<?php $this->getThemeElement("page/html/head",$__forward); ?>
<?php $this->getBodyBefore(); ?>
<body class="">
  <?php $this->getThemeElement("page/html/header",$__forward);?>

  <div class="main-content">
    <!-- main content-->
    <div class="section">
      <div class="column">
        <div class="content">
          <h1 class="text-center">Error 404</h1>
          <p>Halaman yang anda cari tidak ditemukan</p>
          <br>
          <div class="form-group form-action">
            <a href="<?=base_url_admin()?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali </a>
          </div>
        </div>
      </div>
    </div>
    <!-- main content-->
  </div>

  <!--footer-->
  <?php $this->getThemeElement('page/html/footer',$__forward); ?>
  <!--end footer-->

  <!-- load JS in footer-->
  <?php $this->getJsFooter(); ?>
  <!-- End load JS in footer-->

  <!-- default JS Script-->
  <script>
  $(document).ready(function(e){
    <?php $this->getJsReady(); ?>
    <?php $this->getJsContent(); ?>
  });
  </script>
  <!-- default JS Script-->
</body>
</html>
