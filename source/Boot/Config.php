<?php
/**
 * DATABASE LOCAL HOST
 */
define("CONF_DB_HOST", "kabum-mysql");
define("CONF_DB_USER", "kabum");
define("CONF_DB_PASS", "kabum");
define("CONF_DB_NAME", "kabum");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "http://www.localhost:8000"); // alterar depois para o original que vai ser publicado
define("CONF_URL_TEST", "http://www.localhost:8000");
define("CONF_URL_ADMIN", "/admin");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Kabum");
define("CONF_SITE_TITLE", "Teste de projeto para a Kabum");
define("CONF_SITE_DESC", "Teste para entrevista na kabum");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "*************");
define("CONF_SITE_ADDR_STREET", "*************");
define("CONF_SITE_ADDR_NUMBER", "*************");
define("CONF_SITE_ADDR_COMPLEMENT", "*************");
define("CONF_SITE_ADDR_CITY", "*************");
define("CONF_SITE_ADDR_STATE", "*************");
define("CONF_SITE_ADDR_ZIPCODE", "*************");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@erickcordeiroa");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@erickcordeiroa");
define("CONF_SOCIAL_FACEBOOK_APP", "1321853084649431");
define("CONF_SOCIAL_FACEBOOK_PAGE", "akazzostore");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "akazzostoreoficial");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "akazzostoreoficial");
define("CONF_SOCIAL_GOOGLE_PAGE", "erickcordeiroa");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "erickcordeiroa");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 6);
define("CONF_PASSWD_MAX_LEN", 10);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * MESSAGE
 */
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "trigger trigger-info icon-info");
define("CONF_MESSAGE_SUCCESS", "trigger trigger-success icon-success");
define("CONF_MESSAGE_WARNING", "trigger trigger-alert icon-warning");
define("CONF_MESSAGE_ERROR", "trigger trigger-error icon-danger");

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "kabum");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "******");
define("CONF_MAIL_PORT", "25");
define("CONF_MAIL_USER", "******");
define("CONF_MAIL_PASS", "******");
define("CONF_MAIL_SENDER", ["name" => "******", "address" => "******"]);
define("CONF_MAIL_SUPPORT", "******");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");


