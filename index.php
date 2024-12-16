<?php

session_start();

if ( !isset($_SESSION['tasks']) ) {
    $_SESSION['tasks'] = array();
}

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <title>Gerenciador de Tarefas</title>
    </head>
    <body>

        <div class="container">
            <div class="header">
            <h1>Gerenciador de Tarefas</h1>
            </div>
            <div class="form">
                <form action="task.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="insert" value="insert">
                    <label for="task_name">Tarefa:</label>
                    <input type="text" name="task_name" placeholder="Nome da Tarefa">
                    <label for="task_description">Descrição:</label>
                    <input type="text" name="task_description" placeholder="Descrição da Tarefa">
                    <label for="task_date">Data</label>
                    <input type="date" name="task_date">
                    <label for="task_image">Imagem:</label>
                    <input type="file" name="task_image">
                    <button type="submit">Cadastrar</button>
                </form>
                <?php
                            // Verifique se existe uma mensagem na sessão
                    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
                            // Se houver, exiba a mensagem
                        echo "<p style='color: #EF5350;'>" . $_SESSION['message'] . "</p>";
                        unset($_SESSION['message']); // Remove a mensagem após exibição
                        }
                ?>
            </div>
            <div class="separator">
            </div>
            <div class="list-tasks">
                <?php
                    if ( isset($_SESSION['tasks']) ) {
                        echo "<ul>";

                        foreach ( $_SESSION['tasks'] as $key => $task ) {
                            echo "<li>
                                    <a href='details.php?key=$key'>" . $task['task_name'] . "</a>
                                    <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
                                    <script>
                                        function deletar$key(){
                                            if (confirm('Confirmar remoção?') ) {
                                                window.location = 'http://localhost:8000/task.php?key=$key';
                                            }
                                            return false;
                                        }
                                    </script>
                                </li>";
                        }

                        echo "</ul>";
                    }

                ?>
               
            </div>
            <div class="footer">
                <p>Desenvolvido por Karina</p>
            </div>
        </div>
    </body>
</html>
