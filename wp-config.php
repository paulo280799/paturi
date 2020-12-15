<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'paturi' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z2lo1v{kJE282H%.RT={ZKD{)/g/^e^fcTc$ZuW-j^^*.jr@Yn0w}&~OSz lR`cD' );
define( 'SECURE_AUTH_KEY',  'FdAp- (>c;:#y?fHY=mt0hO>?5 Wx$9/]`CrN;$YU>>@P)^&nF#dzxlO!hZP3ULH' );
define( 'LOGGED_IN_KEY',    '<zqXN*n_.:Xnv(HRBgu+ML^4vY+p1vZEX<37{cjrL2BRS@j!G^Dp]M!n%6Lixjw^' );
define( 'NONCE_KEY',        'VPapa*SMS!`%wu~-cv1Kg*}I;qRE)727qU1-~XQxHI_f*cOEJCp@k!%`7d6qQ9ZN' );
define( 'AUTH_SALT',        'agXE?;1i4fRHgo7OSLq+WG8bgc@__vlLsQ^RUGW#9w3KXlbvtFG|s9&N?+[OirM^' );
define( 'SECURE_AUTH_SALT', 'MbK3@|DZ2q*%R5UxUF2bilHBPi|2}i)~}{Y)-<W<j=nb.v^y?Hk;d}3f/E^R-_Bu' );
define( 'LOGGED_IN_SALT',   'm~8E>iJr*(goO=0y0L2iTf}S,P3rl{,WDWUten/w(4=8;kCjGL*,]T%8Sq/&1A&Y' );
define( 'NONCE_SALT',       'c_*opN8.U.r>h?H*.n+MrQ{AAkqZ>B#y)@,/QQCDHPGFO9Lm]3;?B+qK4vg0yyD ' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
