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
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ' $K]3+nQ$Ek}G<<j%1+?Yjr#S<kav0NU~Wr9nd{G^bO-GD[=f|LPUoB*c<lT~iuv');
define('SECURE_AUTH_KEY',  'ydyp.6oV?-J?7u-S-o[tC6_MdG5o{.knL|;p/=2LTIdHA777A_Q Y&o0,^!vl!Ym');
define('LOGGED_IN_KEY',    'r8#AO{kdV6VH6LVV@(WKB5[8(^ctad>T*R}(;v^a[kuEun,KPau~*PV9BUg7>zi<');
define('NONCE_KEY',        'H=J)meL_mdfbp|ih^lb.G4Kn6q:reyLMnrK60Mu1J|3c?uT6+zbYY[jAiI5z}4mC');
define('AUTH_SALT',        'IwO}Kp`| us(/x8)T+M];w=mAD=v-$LKQ<H(d~y}S}M-< 9LZvMt%ALSJeaEQGUR');
define('SECURE_AUTH_SALT', 'pHu3:|mx}ks}y:M2T$++83sy~I}i_)N~WJ]qenjZN/f8`1R8I~OQLy{]Pa+X2clF');
define('LOGGED_IN_SALT',   '9`W+M)F2ubfH+D2VK^k++?7IH$pW2P8ql.`b{pA<z9|Du 2Q&F&FR{< I?*J/sPV');
define('NONCE_SALT',       'mH|H|*qU9#8R{#yUxV+O0vz$[O!zO~NsoBj 0u 8VIL=_Gc0R3%J5|RzjL]M4a_u');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
