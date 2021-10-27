<!doctype html>
<html>
    <head>
        <title>Guilda de Aventureiros</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Cadastrar Aventureiro</h1>
        <div>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(empty($_POST['nome'])) {
                        echo 'Nome não informado';
                    } else if(empty($_POST['idade'])) {
                        echo 'Idade não informada';
                    } else if(empty($_POST['classe'])) {
                        echo 'Classe não informada';
                    } else if(empty($_POST['nivel'])) {
                        echo 'Level não informado';
                    } else if(empty($_POST['datac'])) {
                        echo 'Data não informada';
                    } else {
                        $conexao = new mysqli('localhost', 'root', '', 'guilda');
                        $query = "INSERT INTO aventureiros (nome, idade, classe, nivel, datac) VALUES
                                        (
                                            '". addslashes($_POST['nome']) ."',
                                            '". $_POST['idade'] ."',
                                            '". $_POST['classe'] ."',
                                            '". $_POST['nivel'] ."',
                                            '". $_POST['datac'] ."'
                                        );";
                        //echo $query;
                        $conexao->query($query);
                        header('Location: index.php');
                    }
                }
            ?>
            <form method="POST">
                <div>
                    Nome: <input name="nome" type="text" />
                </div>
                <div>
                    Idade: <input name="idade" type="number" />
                </div>
                <div>
                    Classe: <input name="classe" type="text" list="listc" />
                                <datalist id="listc">
                                    <option>Guerreiro</option>
                                    <option>Arqueiro</option>
                                    <option>Mago</option>
                                    <option>Ladino</option>
                                </datalist>
                </div>
                <div>
                    Level: <input name="nivel" type="number" />
                </div>
                <div>
                    Data de Cadastro: <input name="datac" type="date" />
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
    </body>
</html>