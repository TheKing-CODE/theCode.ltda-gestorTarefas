<?php
	/**
	 * 
	 */
	class Comunicacao
	{
	    private $mensagemRecebidaOriginal; 
	    private $mensagemRecebida = array();
	    private $chavesParaCriarTarefa;
    	private $chavesParaConsultaTarefa;
    	private $chavesParaExcluirTarefa;
   		private $chavesParaPerguntas;
    	private $chavesSobreObjetivo;
   		private $chavesParaComandos;
    	private $chavesSobreCriador;
    	private $chavesParaExemplos;
    	private $chavesParaExibirExemplos;
    	private $chavesParaExibirTodasAsTarefas;


    	private $exemploConsultar = "";
    	private $exemploCriar = "";
    	private $exemploExcluir = "";
	    private $palavrasChavesParaCriar = array();
	    private $palavrasChavesParaConsultar = array(); 
	    private $palavrasChavesParaDeletar = array();
	    private $palavrasChavesParaPerguntas = array();
	    private $palavrasChavesSobreObjetivo = array();
	    private $palavrasChavesSobreCriador = array();
	    private $palavraTarefa = array();
	    private $palavrasChavesParaExemplos = array();
	    private $palavrasChavesParaExibirExemplos = array();
	   	private $palavrasChavesParaComandos = array();
	   	private $palavrasChavesParaExibirTodasAsTarefas = array();	
		
		//Criar Tarefa 
		private function verificar_campos_criar($string) {
    		$campos_necessarios = array('nome', 'descrição', 'prazo');
    		foreach ($campos_necessarios as $campo) {
        		if (!strpos($string, $campo . ':')) {
            		return $campo;
        		}
    		}
   			 	return null;
		}	    

	    private function validarMsgParaCriarTarefa($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaCriar) and $this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavraTarefa) ){
	    		//echo "tudo ok";
	    		return true;
	    	}
	    	return false;
	    }		

	    //private function formatarMsgParaCriarTarefa($mensagem){

	    //ConsultaTarefa
	    private function verifica_campos_consultar($mensagem){
			// Define os padrões a serem procurados
    		$padroes = array('/\bnome:\s*(\S+)/i', '/\bdescrição:\s*(\S+)/i', '/\bprazo\s*:\s*(\S+)/i');
    
    		// Percorre os padrões e busca pelo primeiro campo encontrado
    		foreach ($padroes as $padrao) {
        		if (preg_match($padrao, $mensagem, $matches)) {
            		return $matches[1]; // Retorna o primeiro campo encontrado
        		}
    		}    
    		// Se nenhum padrão for encontrado, retorna null
    		return null;		
	    }

	    private function validarMsgParaConsultar($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaConsultar))	{
	    		//echo "tudo ok";
	    		return true;
	    	}
	    	return false;	    				
	    }

	    //Deleta Tarefa
	    private function validarMsgParaDeletar($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaDeletar))	{	    		
	    		return true;
	    	}
	    	return false;	    				
	    }

	    private function verifica_campos_deletar($mensagem){
			//Define os padrões a serem procurados
    		$padroes = array('/\bnome:\s*(\S+)/i', '/\bdescrição:\s*(\S+)/i', '/\bprazo\s*:\s*(\S+)/i');
    		// Percorre os padrões e busca pelo primeiro campo encontrado
    		foreach ($padroes as $padrao) {
        		if (preg_match($padrao, $mensagem, $matches)) {
            		return $matches[1]; // Retorna o primeiro campo encontrado
        		}
    		}    
    		// Se nenhum padrão for encontrado, retorna null
    		return null;		
	    }

	    //Outras interações
	    private function interacao_sobre_acao($mensagem){	    	
	    	if($this->validarMsgParaCriarTarefa($mensagem) and $this->verificar_campos_criar($mensagem) == true and ($this-> verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaPerguntas))){
				return "Para criar uma tarefa, siga o padrão abaixo. 
				<br/>Ex.: criar tarefa nome: ** descrição: ** prazo:**";
			}elseif($this->validarMsgParaConsultar($mensagem) and $this->verifica_campos_consultar($mensagem) == null){
				return "Para realizar um consulta você precisa informa, pelo menos, um campo de busca. <br/> Ex.: Consultar nome:**";
			}elseif($this->validarMsgParaDeletar($mensagem) and $this->verifica_campos_deletar($mensagem) == null){	
				return "Para excluir uma tarefa você precisa informa, pelo menos, um campo de busca. <br/> Ex.: Consultar nome:**";
			}else{	
				return false;					    	
			}
	    }

		private function interacao_sobre_objetivo($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem, 1),$this->palavrasChavesSobreObjetivo) and $this->verificarValoresIguais(str_word_count($mensagem, 1), $this->palavrasChavesParaPerguntas) ){
				return "Fui desenvolvida para gerência tarefas apenas por promts de comandos. <br/>".$this->exemploCriar;
			};
	    	return false;				    	
	    }	    

	    private function interacao_sobre_criador($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaPerguntas) and $this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesSobreCriador))	{
	    		return $msg = "Fui desenvolida por 'Allan Christian' Git(Link) Insta(Link)" ;
	    	};
	    	return false;
	    }

	    private function interacao_sobre_exemplo($mensagem){
	    	if($this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaExemplos) and $this->verificarValoresIguais(str_word_count($mensagem,1), $this->palavrasChavesParaExibirExemplos) and $this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaCriar)){
	    			return $this->exemploCriar;			
	    	}elseif(  $this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaExemplos) /*and $this->verificarValoresIguais(str_word_count($mensagem,1), $this->palavrasChavesParaExibirExemplos)*/ and $this->verificarValoresIguais(str_word_count($mensagem,1),$this->palavrasChavesParaDeletar)) {
	    		return $this->exemploExcluir;
	    	}else {
	    		return false;
	    	};	    	    
	    }

	    private function interacao_para_exibir_todas_tarefas($mensagem){
	    	$arrayMsg = str_word_count($mensagem,1);
	    	if($this->verificarValoresIguais($arrayMsg, $this->palavrasChavesParaComandos) and $this->verificarValoresIguais($arrayMsg, $this->palavrasChavesParaExibirTodasAsTarefas) and $this->verificarValoresIguais($arrayMsg,$this->palavraTarefa)){
	    		return "todas as tarefas";
	    	};
	    }
	    

	    //Padrão
	    private function primeiraMsg(string $mensagem): void{
	    	$this->mensagemRecebida = str_word_count($mensagem, 1);
	    }

		private function verificarValoresIguais($array1, $array2) { //verifica se na mensagem tem as palavras chaves desejdas
    		// Percorre cada elemento do primeiro array
    		foreach ($array1 as $elemento1) {
        	// Percorre cada elemento do segundo array
        		foreach ($array2 as $elemento2) {
            		// Se os valores dos elementos forem iguais, retorna verdadeiro
            		if ($elemento1 == $elemento2) {
                		return true;
                		//break; 
            		}
        		}
    		}
    		// Se nenhum valor igual for encontrado, retorna falso
  			return false;
		}

		public function extrair_dados($string, $campos = "") { //campos ex.: array('nome', 'descricao', 'prazo');//
    		$padrao = '/nome: (.*?) descrição: (.*?) prazo: (.*?)/i';
    		if($campos != ""){
    			$padrao = '/(?:' . implode('|', $campos) . '): (.*?)(?=' . implode('|', $campos) . '|$)/i';
   				preg_match_all($padrao, $string, $matches);
    			$dados = array();
    			foreach ($campos as $indice => $campo) {
        			$dados[$campo] = isset($matches[$indice + 1][0]) ? $matches[$indice + 1][0] : null;
    			}
    			return $dados;
    		}else{     			    			
    			preg_match($padrao, $string, $matches);
    			if (count($matches) > 0) {
        			$nome = $matches[1];
        			$descricao = $matches[2];
        			$prazo = $matches[3];
        			return array('nome' => $nome, 'descrição' => $descricao, 'prazo' => $prazo);
    			} else {
        			return null;
    			}
			}
		}

		public function verificaAcaoDesejada($mensagem){
			$mensagem = $this->formatarMensagem($mensagem);
			if ($this->verifica_qnt_acoes($mensagem) > 1) {
   				return false;
			} else {
    			if ($this->interacao_sobre_acao($mensagem)) {
        			return $this->interacao_sobre_acao($mensagem);
    			} else if ($this->interacao_sobre_criador($mensagem)) {
        			return $this->interacao_sobre_criador($mensagem);
    			} else if ($this->interacao_sobre_objetivo($mensagem)) {
        			return $this->interacao_sobre_objetivo($mensagem);
    			} else if ($this->interacao_sobre_exemplo($mensagem)) {
	        		return $this->interacao_sobre_exemplo($mensagem);
    			} elseif ($this->interacao_para_exibir_todas_tarefas($mensagem)) {
    				return $this->interacao_para_exibir_todas_tarefas($mensagem);
				}else if ($this->validarMsgParaCriarTarefa($mensagem) == true and $this->verificar_campos_criar($mensagem) == null) {
			        return "Criar";
    			} else if ($this->verificar_campos_criar($mensagem) and $this->validarMsgParaCriarTarefa($mensagem) == true) {
        			return "faltando: " . $campo_faltando = $this->verificar_campos_criar($mensagem);
    			} else if ($this->validarMsgParaConsultar($mensagem) == true and $this->verifica_campos_consultar($mensagem) != null) {
        			return $this->verifica_campos_consultar($mensagem);
    			} else if ($this->validarMsgParaDeletar($mensagem) == true and $this->verifica_campos_deletar($mensagem) != null) {
        			return $this->verifica_campos_deletar($mensagem);
    			};
    			return "Não comprendi sua mensagem. <br/> Por favor! tente novamente";
			}
		}		

		private function formatarMensagem($mensagem){
			return $mensagem = strtolower($mensagem);
		}			

		private function verifica_qnt_acoes($mensagem){
			$qnt = 0;
			if($this->validarMsgParaCriarTarefa($mensagem)){
				$qnt++;		
			};
			if($this->validarMsgParaConsultar($mensagem)){
				$qnt++;		
			};
			if($this->validarMsgParaDeletar($mensagem)){
				$qnt++;		
			};			
			return $qnt;			
		}

		private function carregar_Arquivos(){
				$this->chavesParaCriarTarefa = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaCriarTarefas.txt');
        		$this->chavesParaCriarTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaCriarTarefa);

        		$this->chavesParaConsultaTarefa = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaConsultaTarefas.txt');
        		$this->chavesParaConsultaTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaConsultaTarefa);

        		$this->chavesParaExcluirTarefa = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaExcluirTarefas.txt');
        		$this->chavesParaExcluirTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaExcluirTarefa);

        		$this->chavesParaPerguntas = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaPerguntas.txt');
        		$this->chavesParaPerguntas = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaPerguntas);

        		$this->chavesSobreObjetivo = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesSobreObjetivos.txt');
        		$this->chavesSobreObjetivo = iconv('ISO-8859-1', 'UTF-8', $this->chavesSobreObjetivo);

        		$this->chavesParaComandos = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaComandos.txt');
        		$this->chavesParaComandos = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaComandos);

		        $this->chavesSobreCriador = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesSobreCriador.txt');
		        $this->chavesSobreCriador = iconv('ISO-8859-1', 'UTF-8', $this->chavesSobreCriador);    

		        $this->chavesParaExemplos = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaExemplos.txt');
		        $this->chavesParaExemplos = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaExemplos);

		        $this->exemploConsultar = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\exemploConsultar.txt');
		        $this->exemploConsultar = iconv('ISO-8859-1', 'UTF-8', $this->exemploConsultar);		        

		        $this->exemploCriar = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\exemploCriar.txt');
		        $this->exemploCriar = iconv('ISO-8859-1', 'UTF-8', $this->exemploCriar);		        

		        $this->exemploExcluir = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\exemploExcluir.txt');
		        $this->exemploExcluir = iconv('ISO-8859-1', 'UTF-8', $this->exemploExcluir);		            	

		        $this->chavesParaExibirExemplos  = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaExibirExemplos.txt');
		        $this->chavesParaExibirExemplos = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaExibirExemplos);		

    		    $this->chavesParaExibirTodasAsTarefas  = file_get_contents('C:\xampp\htdocs\Gestor_Tarefas\app\Control\chavesParaExibirTodasAsTarefas.txt');
		        $this->chavesParaExibirTodasAsTarefas = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaExibirTodasAsTarefas);         
    	}		

		function __construct(string $mensagem = "")
		{					
				$msg = $this->formatarMensagem($mensagem);						
				$this->primeiraMsg($msg);			
				$this->carregar_Arquivos();
				$this->palavrasChavesParaCriar = str_word_count($this->chavesParaCriarTarefa,1);
				$this->palavrasChavesParaConsultar = str_word_count($this->chavesParaConsultaTarefa,1);
				$this->palavrasChavesParaDeletar = str_word_count($this->chavesParaExcluirTarefa,1);
				$this->palavrasChavesParaPerguntas = str_word_count($this->chavesParaPerguntas,1); 
				$this->palavrasChavesSobreObjetivo = str_word_count($this->chavesSobreObjetivo,1); 
				$this->palavrasChavesSobreCriador = str_word_count($this->chavesSobreCriador,1);	
				$this->palavrasChavesParaComandos = str_word_count($this->chavesParaComandos,1);				
				$this->palavrasChavesParaExibirTodasAsTarefas = str_word_count($this->chavesParaExibirTodasAsTarefas,1);

				$this->palavrasChavesParaExemplos = str_word_count($this->chavesParaExemplos,1);
				$this->palavrasChavesParaExibirExemplos = str_word_count($this->chavesParaExibirExemplos,1);
				$this->palavraTarefa = str_word_count("tarefa, tarefas",1);
				
		}
	}	
?>