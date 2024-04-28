<?php
/**
 * 
 */
    include 'classTarefas.php';
	class Model
	{
		private $tarefas;

		private function validarChave(int $chave){
			if($chave >= 0 and $chave <= 4){
				return $retorno = true;
			}else 
				return $retorno = false;
		} 


		public function criarTarefa(string $nome, string $descricao, string $prazo, int $chave){
			//($this->validarChave($chave))?$this->tarefas[$chave]->criarTarefa($nome,$descricao,$prazo, false, $chave):"erro";			
			$this->tarefas[$chave]->criarTarefa($nome,$descricao,$prazo, false, $chave); 
		}

		public function excluirTarefa($campo){
			$chave = array_search($campo, $this->tarefas);
			unset($this->tarefas[$chave]);
			array_multisort($this->tarefas, SORT_ASC);
		}

		public function consultarTarefa($campo){
			$chave = array_search($campo, $this->tarefas);
			if($chave =! false){
				return $this->tarefas[$chave];
			}else{
				return false;
			};
		}

		public function get_todas_tarefas(){
			return "todas as tarefas";//$this->tarefas;
		}

		public function __construct()
		{
			$this->tarefas = array(
				0 => new Tarefa,	
				1 => new Tarefa,
				2 => new Tarefa,
				3 => new Tarefa, 
				4 => new Tarefa
			); 
		}
	} 
?>