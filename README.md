# VeloCargo
Trabalho de PHP da Faculdade 2 semestre

# Link do One Compiler PHP 
https://onecompiler.com/php/45a8mmfx7

## Codigo 



# HelloWord
```
<?php
    /*Os 3 Problemas:
    - primeiro, motoristas saindo
para rota com veículos incompatíveis com o tipo de carga (por exemplo, enviando insumos refrigerados
em utilitários comuns ou sobrecarregando motos de entrega rápida além do limite de peso);
    - segundo, a
total incapacidade de rastrear o histórico completo de ocorrências de um pedido desde a coleta até a
entrega final;
    - terceiro, a demora de até três dias para calcular o valor exato de cada frete e consolidar o
faturamento diário, pois cada modalidade de transporte e cada perfil de carga possuem regras próprias
de tarifação e seguros obrigatórios.
-preparado para crescer sem precisar ser reescrito a cada nova
categoria de veículo ou serviço que a VeloCargo lançar no mercado.


-(placa, modelo, ano de fabricação, capacidade máxima de carga
em quilogramas e status de disponibilidade),


-
    */
```


``` php
// Usa-se require_once (e não "use") pois as classes não utilizam namespaces
require_once 'Moto.php';
require_once 'UtilitarioUrb.php';
require_once 'CaminhaoRefri.php';


// --- 2 OBJETOS DA CLASSE MOTO ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, cilindradas, bauTermico, statusDisponibilidade
$moto1 = new Moto('ABC-1234', 'Honda CG 160 Cargo', 2023, 20, 160, true, true);
$moto2 = new Moto('DEF-5678', 'Yamaha Factor 150', 2022, 15, 150, false, false);


// --- 2 OBJETOS DA CLASSE UTILITARIOURB ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, volume, statusDisponibilidade
$utilitario1 = new UtilitarioUrb('GHI-9012', 'Fiat Fiorino', 2024, 650, 3.3, true);
$utilitario2 = new UtilitarioUrb('JKL-3456', 'Renault Kangoo', 2021, 750, 2.8, false);


// --- 2 OBJETOS DA CLASSE CAMINHAOREFRI ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, tempMin, statusDisponibilidade
$caminhao1 = new CaminhaoRefri('MNO-7890', 'Mercedes-Benz Accelo 815', 2023, 4500, -18, true);
$caminhao2 = new CaminhaoRefri('PQR-1122', 'Volkswagen Delivery 9.170', 2024, 5200, -25, true);


// --- EXIBINDO OS DADOS PARA TESTAR ---
$frota = [$moto1, $moto2, $utilitario1, $utilitario2, $caminhao1, $caminhao2];


foreach ($frota as $veiculo) {
    echo "Modelo: " . $veiculo->getModelo() . " | Placa: " . $veiculo->getPlaca() . "\n";
    echo "Ano: " . $veiculo->getAnoFabricacao() . " | Carga Máx: " . $veiculo->getCapacidadeMaximaCargaQuilogramas() . " kg\n";
    echo "Disponível: " . ($veiculo->getStatusDisponibilidade() ? 'Sim' : 'Não') . "\n";


    // Verifica o tipo do objeto para chamar o getter específico de cada classe filha
    if ($veiculo instanceof Moto) {
        echo "Cilindradas: " . $veiculo->getCilindradas() . "cc | Baú Térmico: " . ($veiculo->getBauTermico() ? 'Sim' : 'Não') . "\n";
    } elseif ($veiculo instanceof UtilitarioUrb) {
        echo "Volume: " . $veiculo->getVolume() . " m³\n";
    } elseif ($veiculo instanceof CaminhaoRefri) {
        echo "Temperatura Mínima: " . $veiculo->getTempMin() . " °C\n";
    }


    echo "--------------------------------------------------\n";
}
?>
```

## Veiculo

```
<?php


class Veiculo {
    protected $placa;
    protected $modelo;
    protected $anoFabricacao;
    protected $capacidadeMaximaCargaQuilogramas;
    protected $statusDisponibilidade;


    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $statusDisponibilidade = true
    ) {
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->anoFabricacao = $anoFabricacao;
        $this->capacidadeMaximaCargaQuilogramas = $capacidadeMaximaCargaQuilogramas;
        $this->statusDisponibilidade = $statusDisponibilidade;
    }


    public function getPlaca() {
        return $this->placa;
    }


    public function getModelo() {
        return $this->modelo;
    }


    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }


    public function getCapacidadeMaximaCargaQuilogramas() {
        return $this->capacidadeMaximaCargaQuilogramas;
    }


    public function getStatusDisponibilidade() {
        return $this->statusDisponibilidade;
    }
}
```

## MOTO
```
<?php


require_once 'Veiculo.php';


class Moto extends Veiculo {
    protected $cilindradas;
    protected $bauTermico;


    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $cilindradas,
        $bauTermico = false,
        $statusDisponibilidade = true
    ) {
        parent::__construct(
            $placa,
            $modelo,
            $anoFabricacao,
            $capacidadeMaximaCargaQuilogramas,
            $statusDisponibilidade
        );


        $this->cilindradas = $cilindradas;
        $this->bauTermico = $bauTermico;
    }


    public function getCilindradas() {
        return $this->cilindradas;
    }


    public function getBauTermico() {
        return $this->bauTermico;
    }
}
```

# UtilitarioUrb

```
<?php


require_once 'Veiculo.php';


class UtilitarioUrb extends Veiculo {
    protected $volume;


    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $volume,
        $statusDisponibilidade = true
    ) {
        parent::__construct(
            $placa,
            $modelo,
            $anoFabricacao,
            $capacidadeMaximaCargaQuilogramas,
            $statusDisponibilidade
        );


        $this->volume = $volume;
    }


    public function getVolume() {
        return $this->volume;
    }
}
```

## CaminhaoRefri
```
<?php


require_once 'Veiculo.php';


class CaminhaoRefri extends Veiculo {
    protected $tempMin;


    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $tempMin,
        $statusDisponibilidade = true
    ) {
        parent::__construct(
            $placa,
            $modelo,
            $anoFabricacao,
            $capacidadeMaximaCargaQuilogramas,
            $statusDisponibilidade
        );


        $this->tempMin = $tempMin;
    }


    public function getTempMin() {
        return $this->tempMin;
    }




}
```
## ClienteRemetente
```
<?php


class ClienteRemetente {
    protected $nomeRazaoSocial;
    protected $documentoCpfCnpj;
    protected $enderecoColeta;


    public function __construct(
        $nomeRazaoSocial,
        $documentoCpfCnpj,
        $enderecoColeta
    ) {
        $this->nomeRazaoSocial = $nomeRazaoSocial;
        $this->documentoCpfCnpj = $documentoCpfCnpj;
        $this->enderecoColeta = $enderecoColeta;
    }


    public function getNomeRazaoSocial() {
        return $this->nomeRazaoSocial;
    }


    public function getDocumentoCpfCnpj() {
        return $this->documentoCpfCnpj;
    }


    public function getEnderecoColeta() {
        return $this->enderecoColeta;
    }
}
```
## Pedido 

```
<?php


class Pedido {
    protected $distanciaKm;


    public function __construct($distanciaKm) {
        $this->distanciaKm = $distanciaKm;
    }


    public function getDistanciaKm() {
        return $this->distanciaKm;
    }
}
```

## Item
```
<?php


class Item {
    protected $descricao;
    // Aguardando o(s) próximo(s) atributo(s)...


    public function __construct($descricao) {
        $this->descricao = $descricao;
    }


    public function getDescricao() {
        return $this->descricao;
    }
}
```




