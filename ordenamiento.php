<?
    function burbuja($A,$n){
        for($i=1;$i<$n;$i++){
            for($j=0;$j<$n-$i;$j++){
                if($A[$j]>$A[$j+1]){
                    $k=$A[$j+1];
                    $A[$j+1]=$A[$j];
                    $A[$j]=$k;
                }
            }
        }
        return $A;
    }

?>
<html>
<head>
    <title>Ordenamiento</title>
</head>
<body>
<?

// Aqui se ingresa la lista a ordenar
    $lista = array(10, 1, -20,  14, 99, 136, 19, 20, 117, 22, 93,  120, 131);
//    $lista = array(10, 1, A,  14, 99, 133, 19, 20, 117, 22, 93,  120, 131);
?>
<form method="post">
    Lista: <?=implode(",", $lista)?><br>
    Rango <input type="text" name="rango">
    <input type="submit" value="Ordenar">
</form>
<?
    if($rango==""){
        $salida="";
    }elseif($rango){
    // Creo bloques
        while (list($key, $val) = each($lista)) {
            if(!is_numeric($val)){
                $err=1;
                $msg="Argumento Inválido<br>";
                break;
            }

             $indice=(int)($val / $rango);

             if($val % $rango == 0){
                if($val>0)
                    $indice--;
                else
                    $indice++;
             }
             $bloques[$indice][]=$val;
        }

        if(!$err){
            // Ordeno bloques
            while (list($key, $val) = each($bloques)) {
                $indices[]=$key;
            }
            $bloques_ordenados=burbuja($indices,sizeof($indices));

            // Ordeno contenido de bloques y preparo arreglo final
            while (list($key, $val) = each($bloques_ordenados)){
                $contenido_ordenado=burbuja($bloques[$val], sizeof($bloques[$val]));
                $salida.="[".implode(',', $contenido_ordenado)."], ";
            }

            $salida="{".substr($salida, 0, -2)."}";
        }
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
