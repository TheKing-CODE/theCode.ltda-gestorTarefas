<?php
	/*	*
	 * 
	 */
	class Tarefa
	{
		private string $nome;
		private string $descricao;
		private string $prazo;
		private $status;
		private string $chave; 


		public function criarTarefa(string $nome, string $descricao, string $prazo, $status = false, string $chave):void{
			$this->nome=$nome;
			$this->descricao=$descricao;
			$this->prazo=$prazo;
			$this->status=$status;
			$this->chave=$chave; 			
		}

		public function getNome():string{
			return $this->nome;
		}

		public function getDescricao():string{
			return $this->descricao;
		}

		public function getPrazo():string{
			return $this->prazo;
		}

		public function getStatus(): string{
			return $this->status;
		}

		public function getChave():string{
			return $this->chave;
		}

/*		function __construct(string $nome, string $descricao, string $prazo, $status = false, string $chave)
		{
			$this->nome;
			$this->descricao;
			$this->prazo;
			$this->status;
			$this->chave; 
			// code...
		}
*/	}
?> 