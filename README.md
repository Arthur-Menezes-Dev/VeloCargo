# VeloCargo
Trabalho de PHP da Faculdade 2 semestre

# Link do One Compiler PHP 
https://onecompiler.com/php/45a8mmfx7

## Codigo 

## info.php

``` php
// Somente para as Info mais importantes 


/*
    Os 3 Problemas:

- primeiro, motoristas saindo para rota com veículos incompatíveis com o tipo de carga (por exemplo, enviando insumos refrigerados
em utilitários comuns ou sobrecarregando motos de entrega rápida além do limite de peso);

    - segundo, a total incapacidade de rastrear o histórico completo de ocorrências de um pedido desde a coleta até a
entrega final;

    - terceiro, a demora de até três dias para calcular o valor exato de cada frete e consolidar o
faturamento diário, pois cada modalidade de transporte e cada perfil de carga possuem regras próprias
de tarifação e seguros obrigatórios. (podemos colocar a classe de kilometro e um if else para exemplo: 2k = 10R$ de frete 4 km = 20 R$
ou tb  a cada 1 km = 5 R$ )

-preparado para crescer sem precisar ser reescrito a cada nova
categoria de veículo ou serviço que a VeloCargo lançar no mercado.


-(placa, modelo, ano de fabricação, capacidade máxima de carga
em quilogramas e status de disponibilidade),

Cada motorista é uma classe com objeto e cada veiculo é um tb

*/

/*
frota heterogênea composta por três categorias operacionais distintas, todas
compartilhando identificadores comuns (placa, modelo, ano de fabricação, capacidade máxima de carga
em quilogramas e status de disponibilidade),

Motocicleta de Entrega Rápida: Possui cilindrada e indicador de baú térmico. Opera exclusivamente
em perímetro urbano e possui limite rígido de peso.

Utilitário Urbano (VUC): Possui volume interno (em m3) e indicador de eixo reforçado. Ideal para
cargas volumosas de comércio local.
Caminhão Refrigerado: Possui temperatura mínima suportada (em °C) e certificado sanitário vigente.
É o único veículo autorizado a transportar cargas perecíveis ou farmacêuticas.





Cada Volume cadastrado no pedido possui descrição, peso individual (kg) e classificação de
risco/natureza: Carga Geral, Carga Frágil ou Carga Refrigerada.

*/
```




# HelloWord
``` php

<?php

require_once 'Moto.php';
require_once 'UtilitarioUrb.php';
require_once 'CaminhaoRefri.php';
require_once 'ClienteRemetente.php';
require_once 'Pedido.php';

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

// --- EXIBINDO A FROTA DE VEÍCULOS (UM ECHO POR ATRIBUTO) ---
$frota = [$moto1, $moto2, $utilitario1, $utilitario2, $caminhao1, $caminhao2];

echo "=== FROTA DE VEÍCULOS ===\n\n";

foreach ($frota as $veiculo) {
    echo "Modelo: " . $veiculo->getModelo() . "\n";
    echo "Placa: " . $veiculo->getPlaca() . "\n";
    echo "Ano de Fabricação: " . $veiculo->getAnoFabricacao() . "\n";
    echo "Carga Máxima: " . $veiculo->getCapacidadeMaximaCargaQuilogramas() . " kg\n";
    echo "Localização: " . $veiculo->getLocalizacao() . "\n";
    echo "Disponível: " . ($veiculo->getStatusDisponibilidade() ? 'Sim' : 'Não') . "\n";

    if ($veiculo instanceof Moto) {
        echo "Cilindradas: " . $veiculo->getCilindradas() . " cc\n";
        echo "Baú Térmico: " . ($veiculo->getBauTermico() ? 'Sim' : 'Não') . "\n";
    } elseif ($veiculo instanceof UtilitarioUrb) {
        echo "Volume: " . $veiculo->getVolume() . " m³\n";
    } elseif ($veiculo instanceof CaminhaoRefri) {
        echo "Temperatura Mínima: " . $veiculo->getTempMin() . " °C\n";
    }

    echo "--------------------------------------------------\n";
}

// --- 5 OBJETOS DA CLASSE CLIENTEREMETENTE ---
// Parâmetros: nomeRazaoSocial, documentoCpfCnpj, enderecoColeta
$cliente1 = new ClienteRemetente('Mercado São José Ltda', '12.345.678/0001-90', 'Rua das Flores, 120 - Centro');
$cliente2 = new ClienteRemetente('Ana Paula Ferreira', '123.456.789-00', 'Av. Paulista, 1500 - Bela Vista');
$cliente3 = new ClienteRemetente('Distribuidora FrioSul S.A.', '98.765.432/0001-10', 'Rod. Anhanguera, Km 25 - Galpão 4');
$cliente4 = new ClienteRemetente('Carlos Eduardo Mendes', '987.654.321-11', 'Rua Vergueiro, 890 - Liberdade');
$cliente5 = new ClienteRemetente('Padaria Pão Quente ME', '45.678.912/0001-33', 'Rua Augusta, 410 - Consolação');

// --- EXIBINDO OS CLIENTES (UM ECHO POR ATRIBUTO) ---
$clientes = [$cliente1, $cliente2, $cliente3, $cliente4, $cliente5];

echo "\n=== LISTA DE CLIENTES REMETENTES ===\n\n";

foreach ($clientes as $cliente) {
    echo "Nome/Razão Social: " . $cliente->getNomeRazaoSocial() . "\n";
    echo "CPF/CNPJ: " . $cliente->getDocumentoCpfCnpj() . "\n";
    echo "Endereço de Coleta: " . $cliente->getEnderecoColeta() . "\n";
    echo "--------------------------------------------------\n";
}

// --- 3 OBJETOS DA CLASSE PEDIDO ---
// Parâmetros: id, valorPedido, nome, classificacao, item, corporativo, distanciaKm, dataInicioPedido, dataDespacho, dataPrevisaoEntrega, pesoKg

// Pedido 1: Carga Geral (5 kg), não corporativo -> Moto
$itensPedido1 = [
    ['descricao' => 'Caixa de Documentos e Envelopes', 'valor' => 80.00, 'tipo' => 'Carga Geral'],
    ['descricao' => 'Kit Papelaria Escritório', 'valor' => 70.00, 'tipo' => 'Carga Geral']
];

$pedido1 = new Pedido(
    101,
    150.00,
    $cliente2->getNomeRazaoSocial(),
    'Carga Geral',
    $itensPedido1,
    false,
    12.5,
    '25/11/2026 08:30',
    '25/11/2026 09:15',
    '25/11/2026 10:30',
    5
);
$pedido1->atribuirVeiculo($moto1);

// Pedido 2: Carga Frágil (50 kg), corporativo -> Utilitário Urbano
$itensPedido2 = [
    ['descricao' => 'Jogo de Taças de Cristal (20 caixas)', 'valor' => 1200.00, 'tipo' => 'Carga Frágil'],
    ['descricao' => 'Aparelho de Jantar Porcelana (10 caixas)', 'valor' => 800.00, 'tipo' => 'Carga Frágil']
];

$pedido2 = new Pedido(
    102,
    2000.00,
    $cliente1->getNomeRazaoSocial(),
    'Carga Frágil',
    $itensPedido2,
    true,
    38.0,
    '25/11/2026 09:00',
    '25/11/2026 10:00',
    '25/11/2026 13:00',
    50
);
$pedido2->atribuirVeiculo($utilitario1);

// Pedido 3: Carga Refrigerada (200 kg), corporativo -> Caminhão Refrigerado
$itensPedido3 = [
    ['descricao' => 'Caixa de Filé de Salmão Congelado (100 kg)', 'valor' => 3200.00, 'tipo' => 'Carga Refrigerada'],
    ['descricao' => 'Caixa de Camarão Rosa Limpo (100 kg)', 'valor' => 2800.00, 'tipo' => 'Carga Refrigerada']
];

$pedido3 = new Pedido(
    103,
    6000.00,
    $cliente3->getNomeRazaoSocial(),
    'Carga Refrigerada',
    $itensPedido3,
    true,
    110.0,
    '25/11/2026 07:00',
    '25/11/2026 08:30',
    '25/11/2026 14:00',
    200
);
$pedido3->atribuirVeiculo($caminhao1);

// --- EXIBINDO OS PEDIDOS E VALORES FINAIS (UM ECHO POR ATRIBUTO) ---
$pedidos = [
    ['objeto' => $pedido1, 'valorKm' => 2.20],
    ['objeto' => $pedido2, 'valorKm' => 3.80],
    ['objeto' => $pedido3, 'valorKm' => 6.50]
];

echo "\n=== LISTA DE PEDIDOS E RESUMO FINANCEIRO ===\n\n";

foreach ($pedidos as $registro) {
    $pedido = $registro['objeto'];
    $valorKm = $registro['valorKm'];
    $frete = $pedido->calcularFrete($valorKm);
    $totalCompra = $pedido->valorTotalCompra($valorKm);

    echo "ID do Pedido: " . $pedido->getId() . "\n";
    echo "Valor Base do Pedido: R$ " . number_format($pedido->getValorPedido(), 2, ',', '.') . "\n";
    echo "Nome do Cliente: " . $pedido->getNome() . "\n";
    echo "Classificação: " . $pedido->getClassificacao() . "\n";
    echo "Seguro: " . $pedido->getSeguro() . "\n";
    echo "Valor do Seguro: " . $pedido->getValorSeguro() . "%\n";
    echo "Corporativo: " . ($pedido->getCorporativo() ? 'Sim (8% de desconto)' : 'Não') . "\n";
    echo "Distância: " . $pedido->getDistanciaKm() . " km\n";
    echo "Data de Início do Pedido: " . $pedido->getDataInicioPedido() . "\n";
    echo "Data de Despacho: " . $pedido->getDataDespacho() . "\n";
    echo "Data de Previsão da Entrega: " . $pedido->getDataPrevisaoEntrega() . "\n";
    echo "Peso: " . $pedido->getPesoKg() . " kg\n";
    echo "Refrigerado: " . ($pedido->getRefrigerado() ? 'Sim' : 'Não') . "\n";
    echo "Veículo de Entrega: " . $pedido->getVeiculoEntrega() . "\n";
    echo "Placa do Veículo: " . $pedido->getPlacaVeiculo() . "\n";

    echo "Itens do Pedido:\n";
    foreach ($pedido->getItem() as $produto) {
        echo "Descrição: " . $produto['descricao'] . "\n";
        echo "Valor: R$ " . number_format($produto['valor'], 2, ',', '.') . "\n";
    }

    echo "Valor do Frete: R$ " . number_format($frete, 2, ',', '.') . "\n";
    echo "Valor Total da Compra: R$ " . number_format($totalCompra, 2, ',', '.') . "\n";
    echo "--------------------------------------------------\n";
}

```




## Veiculo.php

``` php
<?php

class Veiculo {
    protected $placa;
    protected $modelo;
    protected $anoFabricacao;
    protected $capacidadeMaximaCargaQuilogramas;
    protected $statusDisponibilidade;
    protected $localizacao;

    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $statusDisponibilidade = true,
        $localizacao = 'Terminal Santo Amaro'
    ) {
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->anoFabricacao = $anoFabricacao;
        $this->capacidadeMaximaCargaQuilogramas = $capacidadeMaximaCargaQuilogramas;
        $this->statusDisponibilidade = $statusDisponibilidade;
        $this->localizacao = $localizacao;
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

    public function getLocalizacao() {
        return $this->localizacao;
    }
}
```

## Moto.php
``` php
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
            $statusDisponibilidade,
            'Terminal Santo Amaro'
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

# UtilitarioUrb.php

``` php
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
            $statusDisponibilidade,
            'Terminal Santo Amaro'
        );

        $this->volume = $volume;
    }

    public function getVolume() {
        return $this->volume;
    }
}
```

## CaminhaoRefri.php
``` php
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
            $statusDisponibilidade,
            'Terminal Santo Amaro'
        );

        $this->tempMin = $tempMin;
    }

    public function getTempMin() {
        return $this->tempMin;
    }
}
```
## ClienteRemetente.php
``` php
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
## Pedido.php

``` php
<?php

class Pedido {
    protected $id;
    protected $valorPedido;
    protected $nome;
    protected $classificacao;
    protected $item;
    protected $seguro;
    protected $valorSeguro;
    protected $corporativo;
    protected $distanciaKm;
    protected $dataInicioPedido;
    protected $dataDespacho;
    protected $dataPrevisaoEntrega;
    protected $pesoKg;
    protected $refrigerado;
    protected $veiculoEntrega;
    protected $placaVeiculo;

    public function __construct(
        $id,
        $valorPedido,
        $nome,
        $classificacao,
        $item,
        $corporativo,
        $distanciaKm,
        $dataInicioPedido,
        $dataDespacho,
        $dataPrevisaoEntrega,
        $pesoKg,
        $veiculoEntrega = null,
        $placaVeiculo = null
    ) {
        $classificacoesPermitidas = ['Carga Geral', 'Carga Frágil', 'Carga Refrigerada'];
        if (!in_array($classificacao, $classificacoesPermitidas)) {
            throw new InvalidArgumentException("Classificação inválida. Use apenas: Carga Geral, Carga Frágil ou Carga Refrigerada.");
        }

        $this->id = $id;
        $this->valorPedido = $valorPedido;
        $this->nome = $nome;
        $this->classificacao = $classificacao;
        $this->item = $item;
        $this->corporativo = $corporativo;
        $this->distanciaKm = $distanciaKm;
        $this->dataInicioPedido = $dataInicioPedido;
        $this->dataDespacho = $dataDespacho;
        $this->dataPrevisaoEntrega = $dataPrevisaoEntrega;
        $this->pesoKg = $pesoKg;
        $this->refrigerado = ($classificacao === 'Carga Refrigerada');
        $this->veiculoEntrega = $veiculoEntrega;
        $this->placaVeiculo = $placaVeiculo;

        // Define automaticamente o seguro e o percentual do valorSeguro
        $this->configurarSeguro();
    }

    protected function configurarSeguro() {
        $temFragil = ($this->classificacao === 'Carga Frágil');
        $temRefrigerado = ($this->classificacao === 'Carga Refrigerada');

        if (is_array($this->item)) {
            foreach ($this->item as $produto) {
                $tipo = $produto['tipo'] ?? $this->classificacao;
                if ($tipo === 'Carga Frágil') {
                    $temFragil = true;
                }
                if ($tipo === 'Carga Refrigerada') {
                    $temRefrigerado = true;
                }
            }
        }

        if ($temFragil && $temRefrigerado) {
            $this->seguro = 'Sim';
            $this->valorSeguro = 15; // 10% frágil + 5% refrigerado
        } elseif ($temFragil) {
            $this->seguro = 'Sim';
            $this->valorSeguro = 10; // 10%
        } elseif ($temRefrigerado) {
            $this->seguro = 'Sim';
            $this->valorSeguro = 5;  // 5%
        } else {
            $this->seguro = 'Não';
            $this->valorSeguro = 0;  // 0%
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getValorPedido() {
        return $this->valorPedido;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getClassificacao() {
        return $this->classificacao;
    }

    public function getItem() {
        return $this->item;
    }

    public function getSeguro() {
        return $this->seguro;
    }

    public function getValorSeguro() {
        return $this->valorSeguro;
    }

    public function getCorporativo() {
        return $this->corporativo;
    }

    public function getDistanciaKm() {
        return $this->distanciaKm;
    }

    public function getDataInicioPedido() {
        return $this->dataInicioPedido;
    }

    public function getDataDespacho() {
        return $this->dataDespacho;
    }

    public function getDataPrevisaoEntrega() {
        return $this->dataPrevisaoEntrega;
    }

    public function getPesoKg() {
        return $this->pesoKg;
    }

    public function getRefrigerado() {
        return $this->refrigerado;
    }

    public function getVeiculoEntrega() {
        return $this->veiculoEntrega;
    }

    public function getPlacaVeiculo() {
        return $this->placaVeiculo;
    }

    public function calcularFrete($valorKm) {
        return $this->distanciaKm * $valorKm;
    }

    // Calcula o adicional de seguro item a item (10% por item frágil, 5% por item refrigerado)
    public function calcularAdicionalSeguroItens() {
        $adicional = 0;

        if (is_array($this->item)) {
            foreach ($this->item as $produto) {
                $valorItem = $produto['valor'] ?? 0;
                $tipoItem = $produto['tipo'] ?? $this->classificacao;

                if ($tipoItem === 'Carga Frágil') {
                    $adicional += $valorItem * 0.10;
                } elseif ($tipoItem === 'Carga Refrigerada') {
                    $adicional += $valorItem * 0.05;
                }
            }
        } else {
            $adicional = $this->valorPedido * ($this->valorSeguro / 100);
        }

        return $adicional;
    }

    // Soma o valor do pedido + frete + taxa da classificação + seguro - desconto corporativo
    public function valorTotalCompra($valorKm) {
        $frete = $this->calcularFrete($valorKm);
        $subtotal = $this->valorPedido + $frete;

        // Taxa por classificação: +12% Carga Frágil | +18% Carga Refrigerada
        $taxaClassificacao = 0;
        if ($this->classificacao === 'Carga Frágil') {
            $taxaClassificacao = $subtotal * 0.12;
        } elseif ($this->classificacao === 'Carga Refrigerada') {
            $taxaClassificacao = $subtotal * 0.18;
        }

        // Adicional de seguro (10% por item frágil, 5% por item refrigerado)
        $adicionalSeguro = $this->calcularAdicionalSeguroItens();

        $totalBruto = $subtotal + $taxaClassificacao + $adicionalSeguro;

        // Desconto corporativo: 8% se corporativo = true
        $desconto = $this->corporativo ? ($totalBruto * 0.08) : 0;

        return $totalBruto - $desconto;
    }

    public function verificarTipoVeiculoEntrega() {
        if ($this->refrigerado || $this->classificacao === 'Carga Refrigerada') {
            return "Caminhão Refrigerado (CaminhaoRefri) - carga refrigerada de {$this->pesoKg} kg";
        }

        if ($this->pesoKg > 20) {
            return "Utilitário Urbano (UtilitarioUrb) ou Caminhão - carga de {$this->pesoKg} kg excede o limite de Moto";
        }

        return "Moto - carga leve de {$this->pesoKg} kg sem refrigeração";
    }

    public function atribuirVeiculo(Veiculo $veiculo) {
        if (($this->refrigerado || $this->classificacao === 'Carga Refrigerada') && !($veiculo instanceof CaminhaoRefri)) {
            return "Erro: Este pedido é refrigerado e exige um CaminhaoRefri.";
        }

        if ($this->pesoKg >= 200 && ($veiculo instanceof Moto)) {
            return "Erro: Pedido de {$this->pesoKg} kg não pode ser entregue por Moto.";
        }

        if ($this->pesoKg > $veiculo->getCapacidadeMaximaCargaQuilogramas()) {
            return "Erro: O peso do pedido ({$this->pesoKg} kg) excede a capacidade máxima do veículo ({$veiculo->getCapacidadeMaximaCargaQuilogramas()} kg).";
        }

        $this->veiculoEntrega = $veiculo->getModelo();
        $this->placaVeiculo = $veiculo->getPlaca();

        return "Veículo {$this->veiculoEntrega} (Placa: {$this->placaVeiculo}) atribuído com sucesso ao Pedido #{$this->id}.";
    }
}
```

## Item
``` php
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




