<?php
session_start();


include "./utils/function.php";
include "./model/model_admin.php";

$bdd = DBconnect();


include "./view/admin/headerAdmin.php";
include "./view/admin/view_listeAnimaux.php";
include "./view/footer.php";
