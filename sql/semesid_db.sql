SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `a_modules`;
CREATE TABLE `a_modules` (
  `identifier` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT '',
  `level` int(1) unsigned NOT NULL DEFAULT 0 COMMENT 'depth level of menu, 0 mean outer 3 deeper submenu',
  `has_submenu` int(1) unsigned NOT NULL DEFAULT 0 COMMENT '1 mempunyai submenu, 2 tidak mempunyai submenu',
  `children_identifier` varchar(255) DEFAULT NULL,
  `priority` int(3) unsigned NOT NULL DEFAULT 0 COMMENT '0 mean higher 999 lower',
  `fa_icon` varchar(255) NOT NULL DEFAULT 'fa fa-home' COMMENT 'font-awesome icon on menu',
  `utype` varchar(48) NOT NULL DEFAULT 'internal' COMMENT 'type module : internal, external',
  `default_value` enum('allowed','denied') NOT NULL DEFAULT 'denied',
  `is_admin_only` int(1) unsigned NOT NULL DEFAULT 0,
  `is_visible` int(1) unsigned NOT NULL DEFAULT 1,
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`identifier`),
  KEY `children_identifier` (`children_identifier`),
  CONSTRAINT `a_modules_ibfk_1` FOREIGN KEY (`children_identifier`) REFERENCES `a_modules` (`identifier`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list modul yang ada dimenu atau tidak ada dimenu';
INSERT INTO `a_modules` (`identifier`, `name`, `path`, `level`, `has_submenu`, `children_identifier`, `priority`, `fa_icon`, `utype`, `default_value`, `is_admin_only`, `is_visible`, `is_active`)
VALUES
	('dashboard', 'Dashboard', '#', 0, 1, NULL, 0, 'fa fa-home', 'internal', 'denied', 0, 1, 1);


DROP TABLE IF EXISTS `a_pengguna`;
CREATE TABLE `a_pengguna` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fnama` varchar(78) NOT NULL DEFAULT '',
  `lnama` varchar(78) NOT NULL DEFAULT '',
  `foto` varchar(255) NOT NULL,
  `scope` enum('all','current_below','current_only','none') NOT NULL DEFAULT 'none',
  `is_active` int(1) unsigned NOT NULL DEFAULT 1,
  `a_pengguna_id` int(6) unsigned DEFAULT NULL COMMENT 'atasan langsung',
  PRIMARY KEY (`id`),
  UNIQUE KEY `a_pengguna_username_unq` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='tabel pengguna';

TRUNCATE TABLE `a_pengguna`;
INSERT INTO `a_pengguna` (`id`, `username`, `password`, `email`, `fnama`, `lnama`, `foto`, `scope`, `is_active`, `a_pengguna_id`)
VALUES
	(1, 'mimind', 'e10adc3949ba59abbe56e057f20f883e', 'drosanda@outlook.co.id', 'Administrator', '', 'media/pengguna/2021/05/c4ca4238a0b923820dcc509a6f75849b3151.jpg', 'all', 1, NULL);

DROP TABLE IF EXISTS `a_pengguna_module`;
CREATE TABLE `a_pengguna_module` (
  `id` int(8) UNSIGNED NOT NULL,
  `a_pengguna_id` int(6) UNSIGNED DEFAULT NULL,
  `a_modules_identifier` varchar(255) DEFAULT NULL,
  `rule` enum('allowed','disallowed','allowed_except','disallowed_except') NOT NULL DEFAULT 'allowed',
  `tmp_active` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='hak akses pengguna';

TRUNCATE TABLE `a_pengguna_module`;
INSERT INTO `a_pengguna_module` (`id`, `a_pengguna_id`, `a_modules_identifier`, `rule`, `tmp_active`) VALUES
(1, 1, NULL, 'allowed_except', 'N');


ALTER TABLE `a_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `a_pengguna_username_unq` (`username`),
  ADD KEY `a_company_id` (`a_company_id`),
  ADD KEY `a_jabatan_id` (`a_jabatan_id`),
  ADD KEY `nip` (`nip`);

ALTER TABLE `a_pengguna_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fka_modules_identifier` (`a_modules_identifier`);


ALTER TABLE `a_pengguna`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

ALTER TABLE `a_pengguna_module`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3189;


ALTER TABLE `a_pengguna_module`
  ADD CONSTRAINT `a_pengguna_module_ibfk_2` FOREIGN KEY (`a_modules_identifier`) REFERENCES `a_modules` (`identifier`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
