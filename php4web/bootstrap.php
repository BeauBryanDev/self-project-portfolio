<?php

require_once __DIR__ . '/vendor/autoload.php';
//session_start();
require_once __DIR__ . '/frmwrk/helpers.php';
require_once __DIR__ . '/frmwrk/Router.php';
require_once __DIR__ . '/frmwrk/validator.php';

use frmwrk\SessionMngr as SessionMngr;


SessionMngr::start_session();

