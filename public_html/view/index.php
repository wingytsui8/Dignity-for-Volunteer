<?php
	error_reporting(E_ALL); @ini_set('display_errors', true);
	@session_start();
	$tz = @date_default_timezone_get(); @date_default_timezone_set($tz ? $tz : 'UTC');
	require_once dirname(__FILE__).'/polyfill.php';
	$pages = array(
		'0'	=> array('id' => '1', 'alias' => 'Home', 'file' => 'home.php','controllers' => array()),
		'1'	=> array('id' => '4', 'alias' => 'Event', 'file' => 'event.php','controllers' => array()),
		'2'	=> array('id' => '2', 'alias' => 'Upcoming', 'file' => 'upcoming.php','controllers' => array()),
		'3'	=> array('id' => '3', 'alias' => 'Register', 'file' => 'register.php','controllers' => array())
	);
	$forms = array(
		'3'	=> array(
			'a9e12055' => Array( 'email' => '', 'emailFrom' => '', 'subject' => 'Enquire from the web page', 'sentMessage' => unserialize('s:14:"Form was sent.";'), 'object' => '', 'objectRenderer' => '', 'loggingHandler' => '', 'smtpEnable' => false, 'smtpHost' => null, 'smtpPort' => null, 'smtpEncryption' => null, 'smtpUsername' => null, 'smtpPassword' => null, 'recSiteKey' => null, 'recSecretKey' => null, 'maxFileSizeTotal' => '2', 'fields' => array( array( 'fidx' => '0', 'name' => 'Name', 'type' => 'input', 'required' => 1, 'options' => '' ), array( 'fidx' => '1', 'name' => 'E-mail', 'type' => 'input', 'required' => 1, 'options' => '' ), array( 'fidx' => '2', 'name' => 'Message', 'type' => 'textarea', 'required' => 1, 'options' => '' ) ) )
		)
	);
	$langs = null;
	$def_lang = null;
	$base_lang = 'en';
	$site_id = "aa9a347c";
	$websiteUID = "62704a08e28fd582b3ea58f53908d4d679ab5bf76e1b8040b004416c9aaa886cfda0b6e29baf674b";
	$base_dir = dirname(__FILE__);
	$base_url = '/';
	$user_domain = 'dignityforvolunteer.000webhostapp.com';
	$home_page = '1';
	$mod_rewrite = true;
	$show_comments = false;
	$comment_callback = "http://us.zyro.com/comment_callback/";
	$user_key = "6l/bIw0kz9xNyWVUiEuXOGOwYQSy2BQgteoqLC210RY+aISgEg==";
	$user_hash = "0befa7844535c35b";
	$ga_code = (is_file($ga_code_file = dirname(__FILE__).'/ga_code') ? file_get_contents($ga_code_file) : null);
	require_once dirname(__FILE__).'/src/SiteInfo.php';
	require_once dirname(__FILE__).'/src/SiteModule.php';
	require_once dirname(__FILE__).'/functions.inc.php';
	$siteInfo = SiteInfo::build(array('siteId' => $site_id, 'websiteUID' => $websiteUID, 'domain' => $user_domain, 'homePageId' => $home_page, 'baseDir' => $base_dir, 'baseUrl' => $base_url, 'defLang' => $def_lang, 'baseLang' => $base_lang, 'userKey' => $user_key, 'userHash' => $user_hash, 'commentsCallback' => $comment_callback, 'langs' => $langs, 'pages' => $pages, 'forms' => $forms, 'modRewrite' => $mod_rewrite, 'gaCode' => $ga_code, 'gaAnonymizeIp' => false, 'port' => null, 'pathPrefix' => null, 'useTrailingSlashes' => true,));
	$requestInfo = SiteRequestInfo::build(array('requestUri' => getRequestUri($siteInfo->baseUrl),));
	SiteModule::init(null, $siteInfo);
	list($page_id, $lang, $urlArgs, $route) = parse_uri($siteInfo, $requestInfo);
	$preview = false;
	$lang = empty($lang) ? $def_lang : $lang;
	$requestInfo->{'page'} = (isset($pages[$page_id]) ? $pages[$page_id] : null);
	$requestInfo->{'lang'} = $lang;
	$requestInfo->{'urlArgs'} = $urlArgs;
	$requestInfo->{'route'} = $route;
	handleTrailingSlashRedirect($siteInfo, $requestInfo);
	SiteModule::setLang($requestInfo->{'lang'});
	$hr_out = '';
	$page = $requestInfo->{'page'};
	if (!is_null($page)) {
		handleComments($page['id'], $siteInfo);
		if (isset($_POST["wb_form_id"])) handleForms($page['id'], $siteInfo);
	}
	ob_start();
	if ($page) {
		$fl = dirname(__FILE__).'/'.$page['file'];
		if (is_file($fl)) {
			ob_start();
			include $fl;
			$out = ob_get_clean();
			$ga_out = '';
			if ($lang && $langs) {
				foreach ($langs as $ln => $default) {
					$pageUri = getPageUri($page['id'], $ln, $siteInfo);
					$out = str_replace(urlencode('{{lang_'.$ln.'}}'), $pageUri, $out);
				}
			}
			if (is_file($ga_tpl = dirname(__FILE__).'/ga.php')) {
				ob_start(); include $ga_tpl; $ga_out = ob_get_clean();
			}
			$out = str_replace('<ga-code/>', $ga_out, $out);
			$out = str_replace('{{base_url}}', getBaseUrl(), $out);
			$out = str_replace('{{curr_url}}', getCurrUrl(), $out);
			$out = str_replace('{{hr_out}}', $hr_out, $out);
			header('Content-type: text/html; charset=utf-8', true);
			echo $out;
		}
	} else {
		header("Content-type: text/html; charset=utf-8", true, 404);
		if (is_file(dirname(__FILE__).'/404.html')) {
			include '404.html';
		} else {
			echo "<!DOCTYPE html>\n";
			echo "<html>\n";
			echo "<head>\n";
			echo "<title>404 Not found</title>\n";
			echo "</head>\n";
			echo "<body>\n";
			echo "404 Not found\n";
			echo "</body>\n";
			echo "</html>";
		}
	}
	ob_end_flush();

?>