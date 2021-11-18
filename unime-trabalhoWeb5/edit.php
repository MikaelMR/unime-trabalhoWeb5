<!doctype html>
<html>
    <head>
        <title>Fábrica de Chocolate</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Editar visitante</h1>
        <div>
            <?php
                $conexao = new mysqli('localhost', 'root', '', 'guilda');
                
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
                        $query = "UPDATE aventureiros SET
                                        nome = '". addslashes($_POST['nome']) ."',
                                        idade = '". $_POST['idade'] ."',
                                        classe = '". $_POST['classe'] ."',
                                        nivel = '". $_POST['nivel'] ."',
                                        datac = '" . $_POST['datac'] . "'
                                    WHERE id = " . $_POST['id'] . ";";
                        // echo $query;
                        $conexao->query($query);
                        header('Location: index.php');
                    }
                }

                $query = "SELECT * FROM aventureiros WHERE id = " . $_GET['id'] . ";";
                $aventureiros = $conexao->query($query);
                $aventureiros = $aventureiros->fetch_assoc();
            ?>
            <form method="POST">
                <div>
                    Nome: <input name="nome" type="text" value="<?= $aventureiros['nome'] ?>" />
                </div>
                <div>
                    Idade: <input name="idade" type="number" value="<?= $aventureiros['idade'] ?>" />
                </div>
                <div>
                    Classe: <input name="classe" type="text" list="listc" value="<?= $aventureiros['classe'] ?>" />
                                <datalist id="listc">
                                    <option>Guerreiro</option>
                                    <option>Arqueiro</option>
                                    <option>Mago</option>
                                    <option>Ladino</option>
                                </datalist>
                </div>
                <div>
                    Level: <input name="nivel" type="number" value="<?= $aventureiros['nivel'] ?>" />
                </div>
                <div>
                    Data de Cadastro: <input name="datac" type="date" value="<?= $aventureiros['datac'] ?>" />
                </div>
                <div>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                    <input type="submit" />
                </div>
            </form>
        </div>
    </body>
</html>