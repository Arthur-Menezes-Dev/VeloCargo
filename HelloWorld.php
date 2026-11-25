<?php

    $i = 1;
    while($i != 0) {
        
		Sistema::limparTela();
        echo "VeloCargo Logística & Distribuição\n";
		$i = Sistema::menuPrincipal();

		if ($i==0) echo "\nSaindo do sistema...";
    }

?>

<?php

    class Sistema {
        

        public static function menuPrincipal () {
            echo "\n";
            echo "1 - Veículos em Rota\n";
			echo "0 - Sair\n";
			echo "Selecione a opção: ";
			return self::recebeResposta();
        }

		public static function limparTela() {
			echo str_repeat(PHP_EOL, 50); 
		}

		public static function recebeResposta () {
            return trim(fgets(STDIN));
        }
    }

?>

