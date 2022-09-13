<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP</title>
    <style type="text/css">
        * {
        margin: 0;
        padding: 0;
        }

        header {
            width: 100%;
            height: 25vh;
            background: linear-gradient(9deg, rgba(27,48,18,1) 0%, rgba(5,26,52,1) 100%, rgba(90,68,128,1) 100%, rgba(161,0,33,1) 100%);


            display: flex;
            justify-content: center;
            align-items: center;
        }

        header h1 {
            color: white;
        }

        .conteudo {
            width: 100%;
            height: 75vh;
            display: flex;
            justify-content: center;
            background-color: #e8e8e8;

        }
        .conteudo form {
            margin-top: 4em;
            width: 40%;
            height: fit-content;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            padding: 2em;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }

        .conteudo form label {
            font-size: 1.2em;
        }

        .conteudo form input {
            padding: 1em;
            margin: 2em 0;

        }

        .botao {
            background-color: #5bc443;
            color: white;
            text-transform: uppercase;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .test {
        width: 19px;
        height: 33px;
        border: 10px solid #333;
        border-left: 0;
        border-top: 0;

        transform: rotate(45deg);
        }
    </style>
</head>
<body>
    <header>
        <h1>FOLHA DE PAGAMENTOS</h1>
    </header>
    <div class="conteudo">
        <form method="get" action="tabela.php">
            <label for="funcionario">Funcionário:</label>
            <input required id="funcionario" type="text" name="funcionario">

            <label for="horas">Horas trabalhadas:</label>
            <input required id="horas" type="text" name="horas">

            <label for="valor">Valor da hora:</label>
            <input required id="valor" type="text" name="valor">
            
            <input type="submit" class="botao" value="Enviar">
        </form>
    </div>
</body>
</html>