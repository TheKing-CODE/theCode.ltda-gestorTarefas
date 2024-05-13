<?php
	/**
	 * 
	 */
/*	session_start();*/
	include 'C:\xampp\htdocs\Gestor_Tarefas\app\model\model.php';
	include 'C:\xampp\htdocs\Gestor_Tarefas\app\Control\classComunicacao.php';
	class control
	{
		private $model; 
		private $comunicacao; 
		private $mensagem;
		private $chave;
		private $tarefas = array();		

		/*private function setMensagem($mensagem):void{
			$this->comunicacao = new Comunicacao($mensagem);
		}*/

		public function verificaAcaoDesejada($mensagem){			
			$retorno = $this->comunicacao->verificaAcaoDesejada($mensagem);		

			if ($retorno === "Criar") {    		
				//echo $mensagem;
    			$dados_tarefa = $this->comunicacao->extrair_dados($mensagem);    			    			
    			//var_dump($dados_tarefa);
    			//$nomeNovo = $dados_tarefa["nome:"];
    			//echo $nomeNovo;
    			$this->criarTarefa($dados_tarefa["nome:"], $dados_tarefa["descricao:"], $dados_tarefa["prazo:"]);
    			return "Tarefa criada com sucesso";
			}elseif ($retorno === "Consultar") {    						
    			$campoBuscar = $this->comunicacao->verifica_campos_consultar($mensagem);
    			return $this->model->consultarTarefa($campoBuscar);
    			/* foreach ($dados_tarefa as $tarefa => $conteudo) {
        			//Retorna o primeiro conteúdo encontrado
        			return $this->consultarTarefa($conteudo);
    			 };	*/
			} elseif ($retorno === "excluir") {    		
    			$dados_tarefas = $this->comunicacao->extrair_dados($retorno);
    			 foreach ($dados_tarefa as $tarefa => $conteudo) {
        			// Retorna o primeiro conteúdo encontrado
        			$this->excluirTarefa($conteudo);
        			return "Tarefa excluida com sucesso";
    			 };	
			} elseif($retorno == "todas tarefas"){
				return $this->mostrar_todas_tarefas();
			}
			else {    		
    			return $retorno;
			};
		}

		private function validarChave(int $chave){
			if($chave >= 0 and $chave <= 4){
				return $retorno = true;
			}else
				return $retorno = false;			
		}

		private function criarTarefa(string $nome, string $descricao, string $prazo/* int $chave = "0"*/){
			//($this->validarChave($chave))?$this->model->criarTarefa($nome, $descricao, $prazo, $chave):"erro";
//			if($this->validarChave($chave)){		
				$this->model->criarTarefa($nome, $descricao, $prazo, $this->chave);
				$this->chave++;
			/*}else	
				return "Limite de tarefas já foi atingido";*/
		}

		private function consultarTarefa($campo){
			$this->model->consultarTarefa($campo);	
		}

		private function excluirTarefa($campo){
			$this->model->excluirTarefa($campo);
		}

		private function mostrar_todas_tarefas(){
			return $this->model->mostrar_todas_tarefas();
		}

		private function consultar_tarefas_anteriores($campo){
			return $this->model->consultar_tarefas_anteriores($campo);			
		}

		public function setTarefas($tarefas){
			$this->model->setTarefas($tarefas);
		}

		public function __construct($mensagem){
			$this->mensagem = $mensagem;
			$this->model = new Model();
			$this->comunicacao = new Comunicacao($mensagem);
			$this->chave = 0;
/*			if($this->model->get_todas_tarefas()){
				$_SESSION['tarefas'] = $this->model->get_todas_tarefas();
			}*/
		}
	}
?>