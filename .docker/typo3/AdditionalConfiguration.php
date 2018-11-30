<?php

call_user_func(function ($exceptionHandling = 'whoops') {
    // Use whoops error handler for errors.
    if ($exceptionHandling === 'whoops') {
//        require_once '/home/pwolkiewicz/.config/composer/vendor/autoload.php';
        $handler = null;
        if (defined('TYPO3_cliMode') && TYPO3_cliMode) {
            // $handler = new \Whoops\Handler\PlainTextHandler();
        } else {
            $handler = new \Whoops\Handler\PrettyPageHandler();
            $handler->setApplicationPaths([
                'web' => realpath(PATH_site . '../web'),
                'typo3' => realpath(PATH_site . '../vendor/typo3/cms'),
                'typo3conf' => realpath(PATH_site . 'typo3conf'),
            ]);
        }
        if ($handler !== null) {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler($handler);
            $whoops->register();
        }
    }
    if ($exceptionHandling === 'xdebug' || $exceptionHandling === 'whoops') {
        // Disable original handler to use whoops or xdebug
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['productionExceptionHandler'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['debugExceptionHandler'] = '';
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['errorHandler'] = '';
    }
});

$GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem'] = true;

$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'file';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'devlog';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLog'] = 'error_log,,0;';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = true;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = true;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = true;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;

// Still show everything, but let website work.
$GLOBALS['TYPO3_CONF_VARS']['SYS']['errorHandlerErrors'] = E_ALL & ~(E_NOTICE | E_DEPRECATED);
$GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors']  = E_ALL & ~(E_STRICT | E_DEPRECATED | E_NOTICE);
