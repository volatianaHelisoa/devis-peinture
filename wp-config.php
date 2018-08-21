<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'devispeinture');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!QG7Uexk?QXU+_Dn*I(j+7ky8F*}Lkf_[rcN9MZEov==jmP<W)sr]2j;g~rV,wrf');
define('SECURE_AUTH_KEY',  '.Xu[6|OR6|a0Y1>h[XJVd!@Ynw]eJEpFY9#2K,WlEUP3>Jy@lRL0.K -;b?2cQ!9');
define('LOGGED_IN_KEY',    '8z*/yX;Zu_e-?$+HTl:F6&Ic2cIJtLj0D^4)Z4|-V@SIggN|I4v.}Al$DSSF]bGM');
define('NONCE_KEY',        'k~(p02+9/axS_QO9}|0qG >D[tY~+6CSR}eV`1&c}+wEV+wWG5C}^BXD f&|O{*~');
define('AUTH_SALT',        '9|o~~9SF:+_psb(=)-vz`BB3(}H|_7LW0D:nS][!{!$j(`eY!|R+7I|i~3sOgnS*');
define('SECURE_AUTH_SALT', 'StHQYh.^6]<L47aY&iXJ@nJ@Sf$dk^j(D4m-12*i.qhuJU:633.)$5]WwAP}wy*]');
define('LOGGED_IN_SALT',   '%wSjU+YGZYfBB@^Gn2N]!O>#eO<kLAPqg?xkyEeO[($.tZPUU7*_sMX).?ajgt|q');
define('NONCE_SALT',       '-i(*q/Z%DL`j|ci5h+@7/~b}_E.]HM_IGU@hp@C?p].8Zg3Vg%MqKEPYAbgU?f#6');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'dp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('PATH_URL', '/devispeinture/');
/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

