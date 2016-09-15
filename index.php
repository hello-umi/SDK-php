Prueba test
<br>
<?php
    include_once "helloumi/helloumi.php";
    $helloumi = new Helloumi("3c46513a81802fdea0574a9e7db03d9780a69363");
    $customer = $helloumi->getCustomerFromPhone("34606665706");
    echo $customer->getName();
    $helloumi->sendPhone("34606665706", "Mensaje de pruebas");
    $customer->send("Mensaje de pruebas desde customer");
?>
<br>
End Test
