<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Folha de Pagamentos - tabela</title>
    <style type="text/css">
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(9deg, rgba(27,48,18,1) 0%, rgba(5,26,52,1) 100%, rgba(90,68,128,1) 100%, rgba(161,0,33,1) 100%);
            font-size: 1.2em;
            overflow: hidden;
        } 

        table {
            padding: 2em;
            border-radius: 8px;
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
            font-size: 1.1em;
        }
        table tr {
            line-height: 1.2em;
        }

        table th{
            text-align: left;
            padding-right: 2em;
        }
        table td {
            text-align: right;
        }

        #voltar {
            position: absolute;
            left: 0;
            top: 0;
            padding: 2.5em;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Funcionário</td>
                <?php 
                $funcionario = $_GET['funcionario'];
                echo "<td>$funcionario</td>"
                 ?>
            </tr>
            <tr>
                <th>Horas trabalhadas</td>
                <?php 
                $horas = $_GET['horas'];
                echo "<td>$horas</td>"
                 ?>
            </tr>
            <tr>
                <th>Valor da hora</td>
                <?php 
                $valor = $_GET['valor'];
                echo "<td>R$ $valor</td>"
                 ?>
            </tr>
            <tr>
                <th>Salário bruto</td>
                <?php 
                $salarioBruto = $horas*$valor;
                echo '<td>R$ ' .round($salarioBruto,2).'</td>'
                 ?>
            </tr>

            <tr>
                <th>INSS</td>
                <?php 
                    if ($salarioBruto < 7087.22){
                        if ($salarioBruto <= 1212){
                            $inss = $salarioBruto * 0.075;
                        } else if ($salarioBruto <= 2427.35){
                            $diferenca = $salarioBruto - 1212.01; 
                            $inss = ($diferenca * 0.09) + 90.90;
                        } else if ($salarioBruto <= 3641.03){
                            $diferenca = $salarioBruto - 2427.36; 
                            $inss = ($diferenca * 0.12) + 90.90 + 109.38;
                        } else {
                            $diferenca = $salarioBruto - 3641.04;
                            $inss = ($diferenca * 0.14) + 90.90 + 109.64 + 145.64;
                        }
                    } else {
                        $inss = 0;
                    }   
                echo '<td>R$ ' .round($inss, 2). '</td>'
                ?>
            </tr>

            <tr>
                <th>IR</td>
                <?php 
                
                if ($salarioBruto <= 1903.98){
                    $ir = 0;
                } else if ($salarioBruto <= 2826.65){
                    $aliquota = ($salarioBruto-$inss) * 0.075;
                    $ir =  $aliquota - 142.8;
                    if ($ir < 0){
                        $ir = 0;
                    }
                } else if ($salarioBruto <= 3751.05){
                    $aliquota = ($salarioBruto-$inss) * 0.15;
                    $ir =  $aliquota - 354.80;
                    if ($ir < 0){
                        $ir = 0;
                    }
                } else if ($salarioBruto < 4664.68){
                    $aliquota = ($salarioBruto-$inss) * 0.225;
                    $ir =  $aliquota - 636.13;
                    if ($ir < 0){
                        $ir = 0;
                    }
                } else if ($salarioBruto >= 4664.69){
                    $aliquota = ($salarioBruto-$inss) * 0.275;
                    $ir =  $aliquota - 869.36;
                    if ($ir < 0){
                        $ir = 0;
                    }
                }

                echo '<td>R$ ' .round($ir,2).'</td>' 
                ?> <!-- 6.000 salario bruto, IR deu certo --> <!-- restante salario bruto da diferença -->
            </tr>
            
            <tr>
                <th>FGTS</td>
                <?php 
                $fgts =  $salarioBruto*0.08;
                echo '<td>R$ ' .round($fgts,2). '</td>' 
                ?>
            </tr>
            <tr>
                <th>Salário Líquido</td>
                <?php 
                $salarioLiquido = $salarioBruto - $ir - $inss - $fgts;
                echo '<td>R$ '.round($salarioLiquido,2).'</td>'
                 ?>
            </tr>
        </table>
    </div>
    <a id="voltar" href="index.php">Voltar</a>
</body>
</html>