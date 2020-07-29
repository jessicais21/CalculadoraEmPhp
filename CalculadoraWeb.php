<?php
   
   class Calculadora {
       
       //recebe os dados de entrada do usuario
        public $DadosDeEntrada;
       //devolve os dados de saida
        public $DadosDeSaida;
       
        public function getDadosDeEntrada() {
            return $this->DadosDeEntrada;
        }
    
        public function setDadosDeEntrada($DadosDeEntrada) {
            $this->DadosDeEntrada=$DadosDeEntrada;
        }
        
        public function getDadosDeSaida() {
            return $this->DadosDeSaida;   
        }
        
        public function setDadosDeSaida($DadosDeSaida){
            $this->DadosDeSaida=$DadosDeSaida;   
        }
       
        //ARRUMAR ESSA FUNÇÃO
        public function DadosDeEntradaTratamento($DadosDeEntradaDoInput) {

            $this->setDadosDeEntrada($DadosDeEntradaDoInput);

            //Tipo de operador para ser procurado na string
            $Soma   = '+';
            $Subtracao = '-';
            $Multiplicacao = '*';
            $Divisao = '/';

            //se o operador continuar 0 é pq foi digitado mais de um 
            //operador ou esta sem operador
            $buscandoOperador='0';

            //conta se foi encontrado mais de um operador diferente
            $contarOperadoresDiferentes = 0;

            //procura se tem determinado operador e conta a quantidade dos operadores encontrados
            //ele só entra no if se encontrar somente um tipo de operador e uma vez
            if (substr_count($this->getDadosDeEntrada(), $Soma) == 1) {
                $buscandoOperador='+';
                $contarOperadoresDiferentes++;
            }        

            if (substr_count($this->getDadosDeEntrada(), $Subtracao) == 1){
                $buscandoOperador='-'; 
                $contarOperadoresDiferentes++;
            }
        
            if (substr_count($this->getDadosDeEntrada(), $Multiplicacao) == 1){
                $buscandoOperador='*';
                $contarOperadoresDiferentes++;
            }

            if (substr_count($this->getDadosDeEntrada(), $Divisao) == 1){
                $buscandoOperador='/';
                $contarOperadoresDiferentes++;
            }

            //erro de operacao: se encontrar mais de um operador diferente
            if($buscandoOperador=='0' || $contarOperadoresDiferentes > 1){
                $this->setDadosDeSaida("voce digitou uma operacao invalida");
            }

            //operação sem erro de validação, se o operador é diferente do instanciado
            
            else{
                $this->setDadosDeSaida($this->QuebraDeStringParaRealizarAOperacao($this->getDadosDeEntrada(), $buscandoOperador));
            }               
              
            return $this->getDadosDeSaida();

         }
         
         
         public function QuebraDeStringParaRealizarAOperacao($DadosDeEntradaDoInput,$buscandoOperador) {
            //quebra a string antes dos operadores:+.-,*,/
            $VariavelAntesDaQuebra = strstr($DadosDeEntradaDoInput, $buscandoOperador, true); 

           //verifica a posicao dos operadores buscados:+.-,*,/
            $posicao = strpos($DadosDeEntradaDoInput, $buscandoOperador);

           //quebra a string depois da posição encontrada dos operadores:+.-,*,/
            $DepoisDaQuebra = substr($DadosDeEntradaDoInput, $posicao+1);

           //chama a função de realizar a operação efetuada pelo usuário
            $this->setDadosDeSaida($this->Operacao($buscandoOperador,$VariavelAntesDaQuebra,$DepoisDaQuebra));
            
            return $this->getDadosDeSaida();
         }
       
         //Realiza a operacao
         public function Operacao($buscandoOperador,$VariavelAntesDaQuebra,$DepoisDaQuebra){
                            
            if($buscandoOperador=="+"){
                $resultado = $VariavelAntesDaQuebra+$DepoisDaQuebra;  
             }

            if($buscandoOperador=="-"){
                $resultado = $VariavelAntesDaQuebra-$DepoisDaQuebra;                  
             }

            if($buscandoOperador=="*"){
                $resultado = $VariavelAntesDaQuebra*$DepoisDaQuebra;                  
             }

            if($buscandoOperador=="/"){
                $resultado = $VariavelAntesDaQuebra/$DepoisDaQuebra;                  
             }
                     
           return $resultado;
         }
   }


?>

