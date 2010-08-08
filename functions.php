<?php
//testcommit
include_once('alphaID.php');
$config = parse_ini_file('config.ini', true);

$functions = array('shorten', 'fetch');

if (in_array($_REQUEST['func'], $functions))
	$_REQUEST['func']();

function increment(){ // runtalan: incomplete and probably moving to the fetch function...
	global $config;
	
	$ret = array('status' => 'fail');

	$dbh = new PDO($config['coolsitebro']['driver'] . ':host=' . $config['coolsitebro']['host'] . ';dbname=' . $config['coolsitebro']['dbname'],
		$config['coolsitebro']['username'], $config['coolsitebro']['password']);
	
	$code = alphaID($_REQUEST['code'], true);
	
	$sth = $dbh->prepare("UPDATE redirects SET visit=visit+1 WHERE id=?");
}

function shorten() {
	global $config;

	$ret = array('status' => 'fail');

	$dbh = new PDO($config['coolsitebro']['driver'] . ':host=' . $config['coolsitebro']['host'] . ';dbname=' . $config['coolsitebro']['dbname'],
		$config['coolsitebro']['username'], $config['coolsitebro']['password']);

	$url = $_REQUEST['url'];
	$private = $_REQUEST['private'] || false;
	
	if ( !(strpos($url, "http://") === 0) || !(strpos($url, "https://") === 0) ) $url = "http://" . $url;
	
	$sth = $dbh->prepare("insert into redirects (url, private) values (?, ?)");

	if ( !$sth ) {
		$err = $dbh->errorInfo();
		$ret['reason'] = $err[2]; // $err is an array full of 2 useless items followed by descriptive text
	}

	else if ( !$sth->execute(array($url, $private)) ) {
		$err = $sth->errorInfo();
		$ret['reason'] = $err[2];
	}
	
	else {
		$ret['status'] = 'success';
		$ret['data'] = alphaID($dbh->lastInsertId());
	}

	echo json_encode($ret);
}

function fetch() {
	global $config;
	
	$ret = array('status' => 'fail');

	$dbh = new PDO($config['coolsitebro']['driver'] . ':host=' . $config['coolsitebro']['host'] . ';dbname=' . $config['coolsitebro']['dbname'],
		$config['coolsitebro']['username'], $config['coolsitebro']['password']);
	
	$code = alphaID($_REQUEST['code'], true);
	
	$sth = $dbh->prepare("select url from redirects where id=?");
	
	if ( !$sth ) {
		$err = $dbh->errorInfo();
		$ret['reason'] = $err[2]; // $err is an array full of 2 useless items followed by descriptive text
	}

	else if ( !$sth->execute(array($code)) ) {
		$err = $sth->errorInfo();
		$ret['reason'] = $err[2];
	}

	else {
		$ret['status'] = 'success';
		$url = $sth->fetchColumn();
	}
	
	if ( $ret['status'] == 'fail')
		echo json_encode($ret);
	else
		header("Location: " . $url);

}
?>