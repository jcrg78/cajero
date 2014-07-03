<html>
<head>
    <title>Cajero</title>
</head>
<body>
    <form method="post">
        Entrada <input type="text" name="retiro">
        <input type="submit" value="Retirar">
    </form>
<?
    $denominaciones = array(100, 50, 20, 10);

//    print_r($denominaciones);

    $err=0;
    $msg="";

    if($retiro==""){
        $salida=null;
    }elseif($retiro<=0){
        $err=1;
        $msg="Argumento Inválido<br>";
    }else{
        $ok=1;
        while ($ok==1 && list($key, $val) = each($denominaciones)) {
            $div=(int)($retiro/$val);
            if($div>0)
                $sal_tmp[$val]=$div;
            $retiro-=$div*$val;
        }
        if($retiro!=0){
            $msg="Monto no disponible<br>";
            $salida=$sal_tmp=null;
        }
    }

    if($sal_tmp){
        $salida="[";
        while(list($key, $val) = each($sal_tmp)) {
            for($cant=1; $cant<=$val; $cant++)
                $salida.=number_format($key, 2).", ";
        }
        $salida=substr($salida, 0, -2)."]";
    }


?>
    <table>
        <tr>
            <td>Salida</td>
            <td><?print_r($salida)?></td>
        </tr>
        <tr>
            <td>Mensaje</td>
            <td><?=$msg?></td>
        </tr>
    </table>

</body>
</html>
