<?php
return array(
	'logs'=>array(
		'path'=>'backup/logs',
		'type'=>'file'
	),
	'DB'=>array(
		'type'=>'mysqli',
        'tablePre'=>'iwebshop_',
		'read'=>array(
			array('host'=>'localhost:3306','user'=>'root','passwd'=>'123456','name'=>'test'),
		),

		'write'=>array(
			'host'=>'localhost:3306','user'=>'root','passwd'=>'123456','name'=>'test',
		),
	),
	'interceptor' => array('themeroute@onCreateController','layoutroute@onCreateView','plugin'),
	'langPath' => 'language',
	'viewPath' => 'views',
	'skinPath' => 'skin',
    'classes' => 'classes.*',
    'rewriteRule' =>'url',
	'theme' => array('pc' => array('huawei' => 'default','sysdm' => 'default','sysiseller' => 'default'),'mobile' => array('mobile' => 'default','sysdm' => 'default','sysiseller' => 'default')),
	'timezone'	=> 'Etc/GMT-8',
	'upload' => 'upload',
	'dbbackup' => 'backup/database',
	'safe' => 'cookie',
	'lang' => 'zh_sc',
	'debug'=> '0',
	'configExt'=> array('site_config'=>'config/site_config.php','plugin_config'=>'config/plugin_config.php'),
	'encryptKey'=>'6cbe0bf5f4e87c8a132c06a226f34a46',
	'authorizeCode' => '',
	'uploadSize' => '10',
	'low_withdraw' => '1',
	'low_bill' => '0',
);
?>