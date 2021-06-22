<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?=$this->getTitle()?></title>

	<meta name="description" content="<?=$this->getDescription()?>">
	<meta name="keyword" content="<?=$this->getKeyword()?>"/>
	<meta name="author" content="<?=$this->getAuthor()?>">
	<meta name="robots" content="<?=$this->getRobots()?>" />


  <link rel="apple-touch-icon" sizes="180x180" href="<?=$this->cdn_url()?>skin/front/icon/apple-touch-icon.png?v=1">
<link rel="icon" type="image/png" sizes="32x32" href="<?=$this->cdn_url()?>skin/front/icon/favicon-32x32.png?v=1">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$this->cdn_url()?>skin/front/icon/favicon-16x16.png?v=1">
<link rel="manifest" href="<?=base_url()?>skin/front/icon/site.webmanifest?v=1">
<link rel="mask-icon" href="<?=$this->cdn_url()?>skin/front/icon/safari-pinned-tab.svg?v=1" color="#5bbad5">
<link rel="shortcut icon" href="<?=$this->cdn_url()?>skin/front/icon/favicon.ico?v=1">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-config" content="<?=$this->cdn_url()?>skin/front/icon/browserconfig.xml?v=1">
<meta name="theme-color" content="#353769">

	<?php $this->getAdditionalBefore()?>
	<?php $this->getAdditional()?>
	<?php $this->getAdditionalAfter()?>
</head>
