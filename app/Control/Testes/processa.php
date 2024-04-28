<?php
	include('classComunicacao.php');
	$mensagem = $_POST["mensagem"];	
	$comunicao = new Comunicacao($mensagem);


	   

/*
		    $this->content = file_get_contents('chavesParaCriarTarefas.txt');
			$this->content = iconv('ISO-8859-1', 'UTF-8', $content);

		$novo = str_word_count($content,1);
	    var_dump($novo);


	    $chavesParaCriarTarefa = file_get_contents('chavesParaCriarTarefas.txt');
		$chavesParaConsultaTarefa = file_get_contents('chavesParaConsultaTarefas.txt');
		$chavesParaExcluirTarefa = file_get_contents('chavesParaExcluirTarefas.txt');
		$chavesParaPerguntas = file_get_contents('chavesParaPerguntas.txt');
		$chavesSobreObjetivo = file_get_contents('chavesSobreObjetivos.txt');
		$chavesParaComandos = file_get_contents('chavesParaComandos.txt');
		$chavesSobreCriador = file_get_contents('chavesSobreCriador.txt');*/

	    /*private $chavesParaCriarTarefa = file_get_contents('chavesParaCriarTarefas.txt');
	    private $chavesParaConsultaTarefa = file_get_contents('chavesParaConsultaTarefa.txt');
	    private $chavesParaExcluirTarefa = file_get_contents('chavesParaExcluirTarefa.txt')
	    private $chavesParaPerguntas = file_get_contents('chavesParaPerguntas.txt');
	    private $chavesSobreObjetivo = file_get_contents('chavesSobreObjetivo.txt');
	    private $chavesParaComandos = file_get_contents('chavesParaComandos.txt');
	    private $chavesSobreCriador = file_get_contents('chavesSobreCriador.txt');*/



	    //$nvo = str_word_count($palavrasChavesParaCriar,1);	
	    //var_dump($nvo);
	    /*private $palavrasChavesParaConsultar = array(); 
	    private $palavrasChavesParaDeletar = array();
	    private $palavrasChavesParaPerguntas = array();
	    private $palavrasChavesSobreObjetivo = array();
	    private $palavrasChavesSobreCriador = array();
	    private $palavraTarefa = array();*/


/*	    class Example {
 		   	private $chavesParaCriarTarefa;
    		private $chavesParaConsultaTarefa;
    		private $chavesParaExcluirTarefa;
    		private $chavesParaPerguntas;
    		private $chavesSobreObjetivo;
   			private $chavesParaComandos;
    		private $chavesSobreCriador;

    		private function carregar_Arquivos(){
				$this->chavesParaCriarTarefa = file_get_contents('chavesParaCriarTarefas.txt');
        		$this->chavesParaCriarTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaCriarTarefa);

        		$this->chavesParaConsultaTarefa = file_get_contents('chavesParaConsultaTarefas.txt');
        		$this->chavesParaConsultaTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaConsultaTarefa);

        		$this->chavesParaExcluirTarefa = file_get_contents('chavesParaExcluirTarefas.txt');
        		$this->chavesParaExcluirTarefa = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaExcluirTarefa);

        		$this->chavesParaPerguntas = file_get_contents('chavesParaPerguntas.txt');
        		$this->chavesParaPerguntas = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaPerguntas);

        		$this->chavesSobreObjetivo = file_get_contents('chavesSobreObjetivos.txt');
        		$this->chavesSobreObjetivo = iconv('ISO-8859-1', 'UTF-8', $this->chavesSobreObjetivo);

        		$this->chavesParaComandos = file_get_contents('chavesParaComandos.txt');
        		$this->chavesParaComandos = iconv('ISO-8859-1', 'UTF-8', $this->chavesParaComandos);

		        $this->chavesSobreCriador = file_get_contents('chavesSobreCriador.txt');
		        $this->chavesSobreCriador = iconv('ISO-8859-1', 'UTF-8', $this->chavesSobreCriador);    							
    		}	
    		public function __construct() {        
    			$this->carregar_Arquivos();
    		}

    
	}

	$oi = new Example();*/

?>
