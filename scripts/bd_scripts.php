<?php

    class BD
    {
        const LOCALBD = __DIR__ ."/../bd/chamados.txt";
        public $id_usuario = null;

        public function __construct() {
            if (session_status() == PHP_SESSION_NONE)
            {
                session_start();
            }
            
            $this->id_usuario = $_SESSION['id_usuario'];
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

        public function excluirChamado($indice)
        {
            $chamados = $this->pegarListaChamados();
            $arquivo = fopen(self::LOCALBD, 'w');
            $exclusao = false;

            $chamados_ajustados = array();

            foreach($chamados as $id => $registro)
            {
                if ($indice == $id)
                {
                    $exclusao = true;
                    continue;
                }
                else
                {
                    $chamados_ajustados[] = "$id|$registro[0]|$registro[1]|$registro[2]|$registro[3]";
                    fwrite($arquivo, "$id|$registro[1]|$registro[2]|$registro[3]|$registro[4]");
                }
                
            }

            fclose($arquivo);
            $this->indexarChamados();

            return $exclusao;
        }

        public function selecionarChamado($indice)
        {
            $chamados = $this->pegarListaChamados();
            $arquivo = fopen(self::LOCALBD, 'r');
            $chamado_selecionado = array();

            foreach($chamados as $id => $registro)
            {
                if ($indice == $id)
                {
                    $chamado_selecionado[] = $registro;
                    break;
                }
                
            }

            fclose($arquivo);

            return $chamado_selecionado;
        }
    }

?>
