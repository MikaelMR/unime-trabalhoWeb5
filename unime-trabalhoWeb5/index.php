<!doctype html>
<html>
    <head>
        <title>Guilda de Aventureiros</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../unime-TrabalhoWeb5/css/style.css">
    </head>
    <body>
        <div id="cabecalho">
            <p>
                <hr>
                Unime - União Metropolitana de Educação e Cultura<br>
                Curso: Bacharelado em Sistemas de Informação<br>
                Disciplina: Programação Web II<br>
                Professor(a): Pablo Ricardo Roxo Silva<br>
                Aluno(a): Mikael Magalhães Ramos<br><hr>
            </p>
        </div>
        <br><br>
        <div id="conteudo">
            <h1 id="conteudoTitulo">Lista de Aventureiros</h1>
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
                        if(!empty($_GET['id'])) {
                            $query = "DELETE FROM aventureiros WHERE id = ".$_GET['id'].";";
                            $conexao->query($query);
                        }
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
                                    <td>
                                        <a href="edit.php ?id='.$pessoa['id'].'"> Editar </a>
                                        <a href="#" onclick="excluir('.$pessoa['id'].')"> Excluir </a>
                                    </td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
        </div>
        <script type="text/javascript">
            function excluir(id) {
                if(confirm("Deseja realmente apagar o/a aventureiro/a?")) {
                    window.location = '?id=' + id;
                }
            }
        </script>
    </body>
</html>