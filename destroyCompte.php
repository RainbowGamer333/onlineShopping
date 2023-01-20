<?php
require "global.php";

session_destroy();
header("Location: connexionCompte.php");