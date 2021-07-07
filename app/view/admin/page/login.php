<?php
//Example 1 column layout
?>
<!doctype html>
<html amp lang="en">
<?php $this->getThemeElement("page/html/head",$__forward); ?>
<?php $this->getBodyBefore(); ?>
<body class="">

  <div class="main-content">
    <!-- main content-->
    <?php $this->getThemeContent(); ?>
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

    NProgress.start();
    $.get('<?=base_url('api_web/notif/count')?>').done(function(dt){
      $("#notif_count").html('');
      dt.data = Number(dt.data);
      if(dt.status == 200 && dt.data>0){
        $("#notif_count").html(dt.data);
      }
      NProgress.done();
    }).fail(function(){
      NProgress.done();
    })
  });
  </script>
  <!-- default JS Script-->
</body>
</html>
