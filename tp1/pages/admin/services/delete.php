<?php
App::getInstance()->getTable('service')->delete($_POST['id']);
header('location: admin.php?p=services');