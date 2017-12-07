<?php
	# require_once "DbConfigParser.lib.php";

	DbConfigParser::SetDbConfig('master', new DbConfigParser('mysql', 'localhost0', 'test', 'root', 'only@cat')); 
	DbConfigParser::SetDbConfig('slave', new DbConfigParser('mysql', '127.0.0.1', 'test', 'root', 'only@cat')); 
