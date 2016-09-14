Prueba test
<br>
<?php
    include_once "helloumi/helloumi.php";
    $helloumi = new Helloumi("9b9c7c261c71cb65165789bcee2e759d941dd8c2");
    $customer = $helloumi->getCustomer("34606665706");
    echo $customer->getName();
    $helloumi->send("34606665706", "Mensaje de pruebas");
    $customer->send("Mensaje de pruebas desde customer");
?>
<br>
End Test
