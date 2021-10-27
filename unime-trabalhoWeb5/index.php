<!doctype html>
<html>
    <head>
        <title>Guilda de Aventureiros</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <p>
                <hr>
                Unime - União Metropolitana de Educação e Cultura<br>
                Curso: Bacharelado em Sistemas de Informação<br>
                Disciplina: Programação Web II<br>
                Professor(a): Pablo Ricardo Roxo Silva<br>
                Aluno(a): Mikael Magalhães Ramos<br><hr><br>
            </p>
        </div>
        <h1>Lista de Aventureiros</h1>
        <div>
            <a href="add.php">Cadastrar Aventureiro</a>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Classe</th>
                    <th>Level</th>
                    <th>Data de Cadastro</th>
                </tr>

                <?php
                    $conexao = new mysqli('localhost', 'root', '', 'guilda');
                    $query = "SELECT * FROM aventureiros";
                    $lista = $conexao->query($query);

                    while($pessoa = $lista->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>' . $pessoa['nome'] . '</td>
                                <td>' . $pessoa['idade'] . ' anos</td>
                                <td>' . $pessoa['classe'] . '</td>
                                <td>' . $pessoa['nivel'] . '</td>
                                <td>' . $pessoa['datac'] . '</td>
                            </tr>
                        ';
                    }
                    /*
                    function formatarDataHora($dataHora) {
                        if($dataHora) {
                            $dataHora = DateTime::createFromFormat('Y-m-d H:i:s', $dataHora);
                            return $dataHora->format('d/m/Y') . ' às ' . $dataHora->format('H:i:s');
                        }
                    }*/
                ?>
            </table>
        </div>
    </body>
</html>