<?php
$localize = array();
require("./lang/en-us.php");
$local_strings = $localize[$language];

putenv("LC_MESSAGES=$locale");
setlocale(LC_MESSAGES,$locale);
bindtextdomain("recipeboxr",dirname(__FILE__) . "/locale");
bind_textdomain_codeset("recipeboxr","UTF-8");
textdomain("recipeboxr");
?>