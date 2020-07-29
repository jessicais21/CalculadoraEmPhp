<!--
Arquivo com a pagina web da calculadora
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora</title>
    </head>
    
        <form action="" method="POST">  
            <label >Digite uma operação, exemplo: 5+5
             <br>
            <input name="UsuarioDigitou" type="text"><br>
            </label>
            <button>=</button>
        </form>
    
    <body>
        <?php
        
         include 'CalculadoraWeb.php';

         $calculadora = new Calculadora();

         //COLOCAR ISSO EM ORIENTAÇÃO A OBJETOS
         $OperacaoRecebida = $_POST['UsuarioDigitou'];  
         
         //colocando o dado recebido do usuário em orientação a objetos
         $calculadora->setDadosDeEntrada($OperacaoRecebida);
         
          echo "A operacao recebida é  {$calculadora->getDadosDeEntrada()}"; 

           echo '</br>';
      
           echo '</br>';
               
        
         echo "O resultado é  {$calculadora->DadosDeEntradaTratamento($calculadora->getDadosDeEntrada())}"; 
         ?>
    </body>
</html>
