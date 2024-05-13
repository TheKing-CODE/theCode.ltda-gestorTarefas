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
			$this->tarefas = array($chave => new Tarefa);
			$this->tarefas[$chave]->criarTarefa($nome,$descricao,$prazo, false, $chave); 
			$this->atualizarDados();
		}

		public function excluirTarefa($campo){
			$chave = array_search($campo, $this->tarefas);
			unset($this->tarefas[$chave]);
			array_multisort($this->tarefas, SORT_ASC);
			$this->atualizarDados;
		}

		public function consultarTarefa($campo){
			$chave = array_search("testar", $this->tarefas);
			print_r($this->tarefas);
			//var_dump( $this->tarefas);
			/*if($chave !== false){
				return $this->tarefas[$chave];
			}else{
				return false;
			};*/
		}

		public function get_todas_tarefas(){
			if(isset($this->tarefas) && !empty($this->tarefas)){
				return $this->tarefas;	
			}else{			
				return false;
			};
		}

		public function setTarefas($tarefas){
			if(isset($tarefas) && !empty($tarefas))
				$this->tarefas = $tarefas;
		}

		public function consultar_tarefas_anteriores($campo){
			 $campo = $this->recuperarCampo($campo);
			 // Array para armazenar os itens filtrados
		    $itensFiltrados = array();

		    // Itera sobre o array fornecido
		    foreach ($this->tarefas as $item) {
		        // Verifica se o prazo do item é menor que a data limite
		        if (strtotime($item['prazo']) <= strtotime($campo)) {
		            // Se for, adiciona o item aos itens filtrados
		            $itensFiltrados[] = $item;
		        }
		    }

		    // Retorna os itens filtrados
		    return $itensFiltrados;
		}

		public function consultar_tarefas_posteriores($campo){
			 $campo = $this->recuperarCampo($campo);
			 // Array para armazenar os itens filtrados
		    $itensFiltrados = array();

		    // Itera sobre o array fornecido
		    foreach ($this->tarefas as $item) {
		        // Verifica se o prazo do item é menor que a data limite
		        if (strtotime($item['prazo']) >= strtotime($campo)) {
		            // Se for, adiciona o item aos itens filtrados
		            $itensFiltrados[] = $item;
		        }
		    }

		    // Retorna os itens filtrados
		    return $itensFiltrados;
		}

		private function recuperarCampo($string) {
		    // Divide a string em duas partes usando o ":"
		    $parts = explode(":", $string, 2);
		    
		    // Se houver duas partes, retorna a segunda parte sem espaços em branco
		    if (count($parts) == 2) {
		        return trim($parts[1]);
		    } else {
		        // Se não houver ":" na string, retorna false
		        return false;
		    }
		}

		private function atualizarDados(){
			$dados = serialize($this->tarefas);
			setcookie('tarefas', $dados, time() + 3600, '/');
		}

		public function __construct()
		{
			/*$this->tarefas = array(
				0 => new Tarefa);
				1 => new Tarefa,
				2 => new Tarefa,
				3 => new Tarefa, 
				4 => new Tarefa
			); */		
		}
	} 
?>