<?php

    class BD
    {

        const LOCALBD = __DIR__ ."/../bd/chamados.txt";
        public $id_usuario = null;

        public function __construct($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function adicionarChamado($titulo, $tipo, $descricao)
        {

            $arquivo = fopen(self::LOCALBD, 'a');
            $titulo = str_replace('|', '-', $titulo);
            $tipo = str_replace('|', '-', $tipo);
            $descricao = str_replace('|', '-', $descricao);

            if ($titulo === '' || $tipo === '' || $descricao === '') 
            {
                header("Location: ../abrir_chamado.php?status=0");
            }
            else 
            {
                $chamado = "0|" . $titulo . "|" . $tipo . "|" . $descricao . "|". $this->id_usuario .PHP_EOL;

                fwrite($arquivo, $chamado);

                fclose($arquivo);

                header("Location: ../abrir_chamado.php?status=1");
            }
            
            $this->indexarChamados();

        }

        public function pegarListaChamados($filtrarporusuario = false, $tipo_usuario = null)
        {
            $arquivo = fopen(self::LOCALBD, 'r');
            $chamados = array();

            while(!feof($arquivo)){
                $registro = fgets($arquivo); // Função que pega uma linha do documento

                $informacoes = explode('|', $registro);

                if (count($informacoes) < 4 ) { // Para pular linha em branco
                    continue;
                }
                if ($filtrarporusuario && $tipo_usuario === '1' && $informacoes[4] != $this->id_usuario ) {
                    continue;
                }
 
                $chamados[] = explode('|', $registro);

            }

            fclose($arquivo); // Fecha o arquivo

            return $chamados;
        }
        
        private function indexarChamados()
        {
            $chamados = $this->pegarListaChamados();
            $arquivo = fopen(self::LOCALBD, 'w');

            $chamados_indexados = array();

            foreach($chamados as $id => $registro)
            {
                $chamados_indexados[] = "$id|$registro[0]|$registro[1]|$registro[2]|$registro[3]";
                fwrite($arquivo, "$id|$registro[1]|$registro[2]|$registro[3]|$registro[4]");
            }

            fclose($arquivo);

        }
    }

?>
