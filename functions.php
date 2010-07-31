<?php
//testcommit
include_once('alphaID.php');
$config = parse_ini_file('config.ini', true);

$functions = array('new_url', 'fetch_url');

if (in_array($_REQUEST['func'], $functions))
	$_REQUEST['func']();

function new_url() {
	global $config;

	$dbh = new PDO('dblib:host=' . $config['coolsitebro']['host'] . ';dbname=coolsitebro',
		$config['coolsitebro']['username'], $config['coolsitebro']['password']);

	$url = $_REQUEST['url'];
	$private = $_REQUEST['private'];
	
	$attributes = array('private'=>$_REQUEST['private'], 'count'=>0);
	
	$sth = $dbh->prepare("insert into redirects (url, attributes) values (?, ?)");
	$sth->execute(array($url, $attributes));

}

function fetch_url() {
}

?>