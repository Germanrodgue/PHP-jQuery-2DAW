<?php
session_start();

include("view/include/header.php");
include("view/include/menu.php");
include("utils/utils.inc.php");
include("view/include/top_page.php");


if (!isset($_GET['module'])) {
		require_once("module/homepage/controller/controller_homepage.class.php");
	}  else  if ( (isset($_GET['module'])) && (!isset($_GET['view'])) ) {
		require_once("module/".$_GET['module']."/controller/controller_".$_GET['module'].".class.php");

	}

        if ( (isset($_GET['module'])) && (isset($_GET['view'])) ) {
            require_once("module/".$_GET['module']."/view/".$_GET['view'].".html");
        }

include("view/include/footer.php");
include("view/include/bottom_page.php"); ?>
