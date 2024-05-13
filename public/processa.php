<?php
/*        // Desserializa o cookie 'tarefas' e trata erros
        $tarefas = @unserialize($_COOKIE['tarefas']);
        if($tarefas === false) {
            // Tratar erro de desserialização do cookie, se necessário
            $tarefas = [];
        }
        // Instancia o controlador com a mensagem e as tarefas
        var_dump($tarefas);*/
include 'C:\xampp\htdocs\Gestor_Tarefas\app\Control\control.php';
// Verifica se a variável $_POST["mensagem"] está definida
if(isset($_POST["mensagem"])) {
    $mensagem = $_POST["mensagem"];

    // Verifica se o cookie 'tarefas' está definido
    if(isset($_COOKIE['tarefas'])){
        // Desserializa o cookie 'tarefas' e trata erros
        $tarefas = @unserialize($_COOKIE['tarefas']);
        if($tarefas === false) {
            // Tratar erro de desserialização do cookie, se necessário
            $tarefas = [];
        }
        // Instancia o controlador com a mensagem e as tarefas
        $controler = new control($mensagem);    
        $controler->setTarefas($tarefas);
        // Chama a função verificaAcaoDesejada e exibe o resultado
        echo $controler->verificaAcaoDesejada($mensagem);
    } else {
        // Se o cookie 'tarefas' não estiver definido, apenas exibe a mensagem
        $controler = new control($mensagem);
        echo $controler->verificaAcaoDesejada($mensagem);
    }
} else {
    // Se $_POST["mensagem"] não estiver definida, exibe uma mensagem de erro ou trata de outra forma
    echo "Mensagem não encontrada.";
}
?>