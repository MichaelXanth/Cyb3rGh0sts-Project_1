<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * @version $Id: setup.php 11986 2008-11-24 11:05:40Z nijel $
 * @package phpMyAdmin-DBG
 */

if (preg_match('/\.php\//' , $_SERVER['PHP_SELF'])){
	header("Location: " . preg_replace('/\.php.*/' , '' , $_SERVER['PHP_SELF']) . ".php");
	exit();
}

if (! defined('PHPMYADMIN')) {
    exit;
}

/**
 * checks for DBG extension
 *
 * allways use $GLOBALS here, as this script is included by footer.inc.hp
 * which can also be included from inside a function
 */
if ($GLOBALS['cfg']['DBG']['php']) {
    /**
     * Loads the DBG extension if needed
     */
    if (! @extension_loaded('dbg') ) {
        $message = PMA_Message::error('strCantLoad');
        $message->addParam('DBG');
        $message->addMessage('<a href="./Documentation.html#faqdbg" target="documentation">', false);
        $message->addString('strDocu');
        $message->addMessage('</a>', false);
        $message->display();
    } else {
        $GLOBALS['DBG'] = true;
    }
}
?>
