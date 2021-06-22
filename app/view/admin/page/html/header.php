<?php
	$admin_name = $sess->admin->username;
	if(isset($sess->admin->nama)) if(strlen($sess->admin->nama)>1) $admin_name = $sess->admin->nama;
	if(!isset($this->current_page)) $this->current_page = "";
	if(!isset($this->current_parent)) $this->current_parent = "";
	$current_page = $this->current_page;
	$current_parent = $this->current_parent;
	$parent = array();
	foreach($sess->admin->menus->left as $key=>$v){
		$parent[$v->identifier] = 0;
		if(count($v->childs)>0){
			foreach($v->childs as $f){
				if($current_page==$f->identifier){
					$current_page = $v->identifier;
					$parent[$v->identifier] = 1;
				}
			}
		}
	}
	$admin_foto = '';
	if(isset($sess->admin->foto))$admin_foto = $sess->admin->foto;
	if(empty($admin_foto)) $admin_foto = 'media/pengguna/default.png';
	$admin_foto = $this->cdn_url($admin_foto);
?>

<div class="top-menu">
  <div role="button" on="tap:sidebar1.toggle" tabindex="0" class="hamburger">☰</div>
</div>

<amp-sidebar id="sidebar1" layout="nodisplay" side="left">
  <div class="sidebar-section">
    <!-- Brand -->
		<a href="<?=base_url_admin(); ?>" class="sidebar-brand">
			<img src="<?=$this->cdn_url()?>skin/admin/img/logo.png" onerror="this.null;this.src='<?=base_url()?>media/default-logo.png';" />
		</a>
		<!-- END Brand -->
  </div>
  <ul>
    <?php foreach($sess->admin->menus->left as $key=>$v){ ?>
  		<?php if(count($v->childs)>0){ ?>
  			<li class="<?php if($parent[$v->identifier]==1) echo 'active'; ?>">
  				<a href="#" class="sidebar-nav-menu ">
  					<i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
  					<i class="<?=$v->fa_icon; ?> sidebar-nav-icon"></i>
  					<span class="sidebar-nav-mini-hide"><?=$v->name; ?></span>
  				</a>
  				<ul class="">
  				<?php foreach($v->childs as $f){ ?>
  					<?php if($f->utype=="external"){ ?>
  					<li>
  						<a href="<?=$f->path; ?>" class="<?php if($this->current_page==$f->identifier) echo 'active'; ?>">
  							<?=$f->name; ?>
  						</a>
  					</li>
  					<?php } else { ?>
  					<li >
  						<a href="<?=base_url_admin($f->path); ?>" class="<?php if($this->current_page==$f->identifier) echo 'active'; ?>">
  							<?=$f->name; ?>
  						</a>
  					</li>
  					<?php } ?>
  				<?php } ?>
  				</ul>
  			</li>
  		<?php }else{ ?>
  		<li class="<?php if($current_page==$key) echo 'active'; ?>"><a href="<?=base_url_admin($v->path); ?>" class="<?php if($current_page==$key) echo 'active'; ?>"><i class="<?=$v->fa_icon; ?>"></i> <span><?=$v->name; ?></span></a></li>
  		<?php } ?>
  	<?php } ?>
    <li>
      <a href="<?=base_url_admin()?>logout">Logout</a>
  </ul>
</amp-sidebar>
