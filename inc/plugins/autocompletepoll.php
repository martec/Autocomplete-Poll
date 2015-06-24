<?php
/**
 * Autocomplete Poll
 * https://github.com/martec
 *
 * Copyright (C) 2015-2015, Martec
 *
 * Autocomplete Poll is licensed under the GPL Version 3, 29 June 2007 license:
 *	http://www.gnu.org/copyleft/gpl.html
 *
 * @fileoverview Autocomplete Poll - Complete Poll using list
 * @author Martec
 * @requires jQuery and Mybb
 */

// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

define('AP_PLUGIN_VER', '0.6.0');

function autocompletepoll_info()
{
	global $lang;

	return array(
		'name'			=> 'Autocomplete Poll',
		'description'	=> 'Complete Poll using list',
		'website'		=> '',
		'author'		=> 'martec',
		'authorsite'	=> '',
		'version'		=> AP_PLUGIN_VER,
		'compatibility' => '18*'
	);

}

function autocompletepoll_activate()
{
	global $db;

	require_once MYBB_ROOT."inc/adminfunctions_templates.php";

	find_replace_templatesets(
		'polls_editpoll',
		'#' . preg_quote('{$header}') . '#i',
		'{$header}
<script type="text/javascript" src="{$mybb->asset_url}/jscripts/autocompletepoll.js?ver='.AP_PLUGIN_VER.'"></script>'
	);
	find_replace_templatesets(
		'polls_newpoll',
		'#' . preg_quote('{$header}') . '#i',
		'{$header}
<script type="text/javascript" src="{$mybb->asset_url}/jscripts/autocompletepoll.js?ver='.AP_PLUGIN_VER.'"></script>'
	);
}

function autocompletepoll_deactivate()
{
	global $db;
	include_once MYBB_ROOT."inc/adminfunctions_templates.php";

	find_replace_templatesets("polls_editpoll", '#'.preg_quote('{$header}
<script type="text/javascript" src="{$mybb->asset_url}/jscripts/autocompletepoll.js?ver='.AP_PLUGIN_VER.'"></script>').'#i', '{$header}');
	find_replace_templatesets("polls_newpoll", '#'.preg_quote('{$header}
<script type="text/javascript" src="{$mybb->asset_url}/jscripts/autocompletepoll.js?ver='.AP_PLUGIN_VER.'"></script>').'#i', '{$header}');
}
?>