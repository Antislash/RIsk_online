#script de création de la base de donnée (pour le moment c'est un test)
#Création en tapant mysql> source [chemin_absolue]
CREATE DATABASE test;
USE test;
CREATE TABLE IF NOT EXISTS `test` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(16) NOT NULL,
  `valeur` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;