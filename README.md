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

// --- 5 OBJETOS DA CLASSE MOTO ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, cilindradas, bauTermico, statusDisponibilidade
$moto1 = new Moto('ABC-1234', 'Honda CG 160 Cargo', 2023, 20, 160, true, true);
$moto2 = new Moto('DEF-5678', 'Yamaha Factor 150', 2022, 15, 150, false, false);
$moto3 = new Moto('STU-1020', 'Honda Biz 125', 2024, 15, 125, true, true);
$moto4 = new Moto('VWX-3040', 'Yamaha Fazer 150', 2023, 20, 150, false, true);
$moto5 = new Moto('YZA-5060', 'Honda Pop 110i', 2025, 12, 110, false, true);

// --- 5 OBJETOS DA CLASSE UTILITARIOURB ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, volume, statusDisponibilidade
$utilitario1 = new UtilitarioUrb('GHI-9012', 'Fiat Fiorino', 2024, 650, 3.3, true);
$utilitario2 = new UtilitarioUrb('JKL-3456', 'Renault Kangoo', 2021, 750, 2.8, false);
$utilitario3 = new UtilitarioUrb('BCD-7080', 'Peugeot Partner Rapid', 2024, 650, 3.3, true);
$utilitario4 = new UtilitarioUrb('EFG-9010', 'Chevrolet Montana Cargo', 2023, 600, 2.5, true);
$utilitario5 = new UtilitarioUrb('HIJ-1120', 'Citroen Jumpy', 2025, 1500, 6.1, true);

// --- 5 OBJETOS DA CLASSE CAMINHAOREFRI ---
// Parâmetros: placa, modelo, anoFabricacao, capacidadeMaximaCargaQuilogramas, tempMin, statusDisponibilidade
$caminhao1 = new CaminhaoRefri('MNO-7890', 'Mercedes-Benz Accelo 815', 2023, 4500, -18, true);
$caminhao2 = new CaminhaoRefri('PQR-1122', 'Volkswagen Delivery 9.170', 2024, 5200, -25, true);
$caminhao3 = new CaminhaoRefri('KLM-3344', 'Iveco Daily 35-160', 2023, 1800, -15, true);
$caminhao4 = new CaminhaoRefri('NOP-5566', 'Hyundai HR Refrigerado', 2022, 1500, -10, true);
$caminhao5 = new CaminhaoRefri('QRS-7788', 'Ford Cargo 816 Frigorífico', 2024, 4800, -22, true);

// --- EXIBINDO A FROTA DE VEÍCULOS (UM ECHO POR ATRIBUTO) ---
$frota = [
    $moto1, $moto2, $moto3, $moto4, $moto5,
    $utilitario1, $utilitario2, $utilitario3, $utilitario4, $utilitario5,
    $caminhao1, $caminhao2, $caminhao3, $caminhao4, $caminhao5
];

echo "==================================================\n";
echo "=== FROTA DE VEÍCULOS ===\n";
echo "==================================================\n\n";

foreach ($frota as $veiculo) {
    echo "Categoria: " . $veiculo->getCategoria() . "\n";
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

    echo "--------------------------------------------------\n\n";
}


// --- 8 OBJETOS DA CLASSE CLIENTEREMETENTE ---
// Parâmetros: nomeRazaoSocial, email, telefone, documentoCpfCnpj, enderecoColeta
$cliente1 = new ClienteRemetente('Mercado São José Ltda', 'contato@mercadosaojose.com.br', '(11) 3241-8890', '12.345.678/0001-90', 'Rua das Flores, 120 - Centro');
$cliente2 = new ClienteRemetente('Ana Paula Ferreira', 'ana.ferreira@email.com', '(11) 98765-4321', '123.456.789-00', 'Av. Paulista, 1500 - Bela Vista');
$cliente3 = new ClienteRemetente('Distribuidora FrioSul S.A.', 'logistica@friosul.com.br', '(11) 4002-8922', '98.765.432/0001-10', 'Rod. Anhanguera, Km 25 - Galpão 4');
$cliente4 = new ClienteRemetente('Carlos Eduardo Mendes', 'carlos.mendes@email.com', '(11) 99123-4567', '987.654.321-11', 'Rua Vergueiro, 890 - Liberdade');
$cliente5 = new ClienteRemetente('Padaria Pão Quente ME', 'pedidos@padariapaoquente.com.br', '(11) 3156-7744', '45.678.912/0001-33', 'Rua Augusta, 410 - Consolação');
$cliente6 = new ClienteRemetente('Farmácia Vida Saudável Ltda', 'compras@vidasaudavel.com.br', '(11) 3889-1020', '33.444.555/0001-66', 'Av. Brigadeiro Luís Antônio, 2200 - Jardim Paulista');
$cliente7 = new ClienteRemetente('Juliana Costa Rocha', 'juliana.rocha@email.com', '(11) 97654-3210', '456.789.123-22', 'Rua Oscar Freire, 750 - Pinheiros');
$cliente8 = new ClienteRemetente('Supermercado Bom Preço S.A.', 'recebimento@bompreco.com.br', '(11) 5543-9900', '77.888.999/0001-44', 'Av. Santo Amaro, 3500 - Brooklin');

// --- EXIBINDO OS CLIENTES (UM ECHO POR ATRIBUTO) ---
$clientes = [$cliente1, $cliente2, $cliente3, $cliente4, $cliente5, $cliente6, $cliente7, $cliente8];

echo "\n\n\n\n\n\n";
echo "==================================================\n";
echo "=== LISTA DE CLIENTES REMETENTES ===\n";
echo "==================================================\n\n";

foreach ($clientes as $cliente) {
    echo "Nome/Razão Social: " . $cliente->getNomeRazaoSocial() . "\n";
    echo "E-mail: " . $cliente->getEmail() . "\n";
    echo "Telefone: " . $cliente->getTelefone() . "\n";
    echo "CPF/CNPJ: " . $cliente->getDocumentoCpfCnpj() . "\n";
    echo "Endereço de Coleta: " . $cliente->getEnderecoColeta() . "\n";
    echo "--------------------------------------------------\n\n";
}


// --- 20 OBJETOS DA CLASSE PEDIDO ---
// Parâmetros: id, valorPedido, nome, classificacao, item, corporativo, distanciaKm, dataInicioPedido, dataDespacho, dataPrevisaoEntrega, pesoKg

// Pedido 101: Carga Geral (5 kg), não corporativo, 12.5 km -> Moto
$pedido1 = new Pedido(
    101,
    150.00,
    $cliente2->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Caixa de Documentos e Envelopes', 'valor' => 80.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Kit Papelaria Escritório', 'valor' => 70.00, 'tipo' => 'Carga Geral']
    ],
    false,
    12.5,
    '25/11/2026 08:30',
    '25/11/2026 09:15',
    '25/11/2026 10:30',
    5
);
$pedido1->atribuirVeiculo($moto1);
$pedido1->atualizarStatus('Em Trânsito', '25/11/2026 09:20');
$pedido1->atualizarStatus('Ocorrência: Chuva Intensa', '25/11/2026 09:50');
$pedido1->atualizarStatus('Entregue', '25/11/2026 10:25');

// Pedido 102: Carga Frágil (50 kg), corporativo, 38 km -> Utilitário Urbano
$pedido2 = new Pedido(
    102,
    2000.00,
    $cliente1->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Jogo de Taças de Cristal (20 caixas)', 'valor' => 1200.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Aparelho de Jantar Porcelana (10 caixas)', 'valor' => 800.00, 'tipo' => 'Carga Frágil']
    ],
    true,
    38.0,
    '25/11/2026 09:00',
    '25/11/2026 10:00',
    '25/11/2026 13:00',
    50
);
$pedido2->atribuirVeiculo($utilitario1);
$pedido2->atualizarStatus('Em Trânsito', '25/11/2026 10:15');
$pedido2->atualizarStatus('Entregue', '25/11/2026 12:40');

// Pedido 103: Carga Refrigerada (200 kg), corporativo, 110 km -> Caminhão Refrigerado
$pedido3 = new Pedido(
    103,
    6000.00,
    $cliente3->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Caixa de Filé de Salmão Congelado (100 kg)', 'valor' => 3200.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Caixa de Camarão Rosa Limpo (100 kg)', 'valor' => 2800.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    110.0,
    '25/11/2026 07:00',
    '25/11/2026 08:30',
    '25/11/2026 14:00',
    200
);
$pedido3->atribuirVeiculo($caminhao1);
$pedido3->atualizarStatus('Em Trânsito', '25/11/2026 08:45');
$pedido3->atualizarStatus('Ocorrência: Congestionamento na Rodovia', '25/11/2026 11:10');
$pedido3->atualizarStatus('Entregue', '25/11/2026 13:55');

// Pedido 104: Carga Geral (8 kg), não corporativo, 15 km -> Moto
$pedido4 = new Pedido(
    104,
    220.00,
    $cliente4->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Caixa de Ferramentas Manuais', 'valor' => 140.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Rolo de Cabos Elétricos', 'valor' => 80.00, 'tipo' => 'Carga Geral']
    ],
    false,
    15.0,
    '26/11/2026 08:00',
    '26/11/2026 08:45',
    '26/11/2026 10:00',
    8
);
$pedido4->atribuirVeiculo($moto3);
$pedido4->atualizarStatus('Em Trânsito', '26/11/2026 08:50');
$pedido4->atualizarStatus('Entregue', '26/11/2026 09:48');

// Pedido 105: Carga Frágil (12 kg), não corporativo, 18 km -> Moto
$pedido5 = new Pedido(
    105,
    480.00,
    $cliente7->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Vaso Decorativo de Cerâmica Artesanal', 'valor' => 300.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Luminária de Mesa em Vidro', 'valor' => 180.00, 'tipo' => 'Carga Frágil']
    ],
    false,
    18.0,
    '26/11/2026 09:10',
    '26/11/2026 09:50',
    '26/11/2026 11:20',
    12
);
$pedido5->atribuirVeiculo($moto4);
$pedido5->atualizarStatus('Em Trânsito', '26/11/2026 10:00');
$pedido5->atualizarStatus('Entregue', '26/11/2026 11:05');

// Pedido 106: Carga Refrigerada (180 kg), corporativo, 65 km -> Caminhão Refrigerado
$pedido6 = new Pedido(
    106,
    4500.00,
    $cliente6->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Lote de Insulinas Termolábeis', 'valor' => 2700.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Vacinas Refrigeradas (Caixa Térmica)', 'valor' => 1800.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    65.0,
    '26/11/2026 07:30',
    '26/11/2026 08:15',
    '26/11/2026 11:30',
    180
);
$pedido6->atribuirVeiculo($caminhao3);
$pedido6->atualizarStatus('Em Trânsito', '26/11/2026 08:25');
$pedido6->atualizarStatus('Entregue', '26/11/2026 11:15');

// Pedido 107: Carga Geral (120 kg), corporativo, 72 km -> Utilitário Urbano
$pedido7 = new Pedido(
    107,
    1850.00,
    $cliente5->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Sacos de Farinha de Trigo Especial (80 kg)', 'valor' => 950.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Açúcar Refinado e Fermento (40 kg)', 'valor' => 900.00, 'tipo' => 'Carga Geral']
    ],
    true,
    72.0,
    '26/11/2026 06:30',
    '26/11/2026 07:15',
    '26/11/2026 10:45',
    120
);
$pedido7->atribuirVeiculo($utilitario3);
$pedido7->atualizarStatus('Em Trânsito', '26/11/2026 07:25');
$pedido7->atualizarStatus('Entregue', '26/11/2026 10:30');

// Pedido 108: Carga Frágil (300 kg), corporativo, 95 km -> Utilitário Urbano
$pedido8 = new Pedido(
    108,
    7200.00,
    $cliente8->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Monitores LED 27 Polegadas (15 unidades)', 'valor' => 4500.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Placas-Mãe e Componentes Sensíveis', 'valor' => 2700.00, 'tipo' => 'Carga Frágil']
    ],
    true,
    95.0,
    '26/11/2026 08:15',
    '26/11/2026 09:30',
    '26/11/2026 13:30',
    300
);
$pedido8->atribuirVeiculo($utilitario5);
$pedido8->atualizarStatus('Em Trânsito', '26/11/2026 09:40');
$pedido8->atualizarStatus('Ocorrência: Parada para Inspeção de Carga', '26/11/2026 11:00');

// Pedido 109: Carga Refrigerada (450 kg), corporativo, 42 km -> Caminhão Refrigerado
$pedido9 = new Pedido(
    109,
    5300.00,
    $cliente8->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Cortes Bovinos Resfriados (250 kg)', 'valor' => 3300.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Laticínios e Queijos Especiais (200 kg)', 'valor' => 2000.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    42.0,
    '26/11/2026 06:00',
    '26/11/2026 07:00',
    '26/11/2026 09:30',
    450
);
$pedido9->atribuirVeiculo($caminhao4);
$pedido9->atualizarStatus('Em Trânsito', '26/11/2026 07:10');
$pedido9->atualizarStatus('Entregue', '26/11/2026 09:20');

// Pedido 110: Carga Geral (6 kg), não corporativo, 9 km -> Moto
$pedido10 = new Pedido(
    110,
    110.00,
    $cliente2->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Livros Técnicos de Programação', 'valor' => 75.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Cadernos e Blocos de Anotação', 'valor' => 35.00, 'tipo' => 'Carga Geral']
    ],
    false,
    9.0,
    '26/11/2026 10:00',
    '26/11/2026 10:30',
    '26/11/2026 11:15',
    6
);
$pedido10->atribuirVeiculo($moto5);
$pedido10->atualizarStatus('Em Trânsito', '26/11/2026 10:35');

// Pedido 111: Carga Frágil (85 kg), não corporativo, 29 km -> Utilitário Urbano
$pedido11 = new Pedido(
    111,
    1600.00,
    $cliente4->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Espelhos Bisotados Sob Medida', 'valor' => 1000.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Tampos de Vidro Temperado', 'valor' => 600.00, 'tipo' => 'Carga Frágil']
    ],
    false,
    29.0,
    '26/11/2026 11:00',
    '26/11/2026 12:00',
    '26/11/2026 14:30',
    85
);
$pedido11->atribuirVeiculo($utilitario4);

// Pedido 112: Carga Refrigerada (900 kg), corporativo, 140 km -> Caminhão Refrigerado
$pedido12 = new Pedido(
    112,
    9800.00,
    $cliente3->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Polpas de Frutas Congeladas (500 kg)', 'valor' => 4800.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Sorvetes e Sobremesas Geladas (400 kg)', 'valor' => 5000.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    140.0,
    '26/11/2026 05:30',
    '26/11/2026 06:45',
    '26/11/2026 12:30',
    900
);
$pedido12->atribuirVeiculo($caminhao5);
$pedido12->atualizarStatus('Em Trânsito', '26/11/2026 07:00');
$pedido12->atualizarStatus('Ocorrência: Chuva Intensa na Serra', '26/11/2026 09:30');

// Pedido 113: Carga Geral (240 kg), corporativo, 58 km -> Utilitário Urbano
$pedido13 = new Pedido(
    113,
    3100.00,
    $cliente1->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Fardos de Bebidas Não Perecíveis (150 kg)', 'valor' => 1700.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Produtos de Limpeza e Higiene (90 kg)', 'valor' => 1400.00, 'tipo' => 'Carga Geral']
    ],
    true,
    58.0,
    '26/11/2026 08:45',
    '26/11/2026 09:45',
    '26/11/2026 13:15',
    240
);
$pedido13->atribuirVeiculo($utilitario1);
$pedido13->atualizarStatus('Em Trânsito', '26/11/2026 09:55');

// Pedido 114: Carga Geral (10 kg), não corporativo, 14 km -> Moto
$pedido14 = new Pedido(
    114,
    260.00,
    $cliente7->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Caixas de Cosméticos Naturais', 'valor' => 160.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Kits de Acessórios Embalados', 'valor' => 100.00, 'tipo' => 'Carga Geral']
    ],
    false,
    14.0,
    '26/11/2026 10:15',
    '26/11/2026 11:00',
    '26/11/2026 12:15',
    10
);
$pedido14->atribuirVeiculo($moto1);
$pedido14->atualizarStatus('Em Trânsito', '26/11/2026 11:05');

// Pedido 115: Carga Frágil (160 kg), corporativo, 62 km -> Utilitário Urbano
$pedido15 = new Pedido(
    115,
    3800.00,
    $cliente6->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Frascos de Vidro Âmbar para Manipulação', 'valor' => 2300.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Ampolas Laboratoriais Esterilizadas', 'valor' => 1500.00, 'tipo' => 'Carga Frágil']
    ],
    true,
    62.0,
    '26/11/2026 09:30',
    '26/11/2026 10:30',
    '26/11/2026 14:00',
    160
);
$pedido15->atribuirVeiculo($utilitario3);
$pedido15->atualizarStatus('Em Trânsito', '26/11/2026 10:40');

// Pedido 116: Carga Refrigerada (600 kg), corporativo, 88 km -> Caminhão Refrigerado
$pedido16 = new Pedido(
    116,
    7400.00,
    $cliente8->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Filés de Peito de Frango Resfriados (350 kg)', 'valor' => 4100.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Linguiças Artesanais Resfriadas (250 kg)', 'valor' => 3300.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    88.0,
    '26/11/2026 06:15',
    '26/11/2026 07:30',
    '26/11/2026 11:45',
    600
);
$pedido16->atribuirVeiculo($caminhao2);
$pedido16->atualizarStatus('Em Trânsito', '26/11/2026 07:45');
$pedido16->atualizarStatus('Entregue', '26/11/2026 11:35');

// Pedido 117: Carga Geral (350 kg), corporativo, 33 km -> Utilitário Urbano
$pedido17 = new Pedido(
    117,
    2900.00,
    $cliente5->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Embalagens Descartáveis e Sacolas (200 kg)', 'valor' => 1700.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Caixas de Papelão para Bolos (150 kg)', 'valor' => 1200.00, 'tipo' => 'Carga Geral']
    ],
    true,
    33.0,
    '26/11/2026 08:00',
    '26/11/2026 09:00',
    '26/11/2026 11:30',
    350
);
$pedido17->atribuirVeiculo($utilitario4);
$pedido17->atualizarStatus('Em Trânsito', '26/11/2026 09:10');
$pedido17->atualizarStatus('Entregue', '26/11/2026 11:20');

// Pedido 118: Carga Frágil (14 kg), não corporativo, 21 km -> Moto
$pedido18 = new Pedido(
    118,
    620.00,
    $cliente4->getNomeRazaoSocial(),
    'Carga Frágil',
    [
        ['descricao' => 'Lentes Ópticas de Precisão', 'valor' => 400.00, 'tipo' => 'Carga Frágil'],
        ['descricao' => 'Armações em Acetato Delicado', 'valor' => 220.00, 'tipo' => 'Carga Frágil']
    ],
    false,
    21.0,
    '26/11/2026 11:20',
    '26/11/2026 12:00',
    '26/11/2026 13:40',
    14
);
$pedido18->atribuirVeiculo($moto3);

// Pedido 119: Carga Refrigerada (1200 kg), corporativo, 155 km -> Caminhão Refrigerado
$pedido19 = new Pedido(
    119,
    11500.00,
    $cliente3->getNomeRazaoSocial(),
    'Carga Refrigerada',
    [
        ['descricao' => 'Picanha Bovina Congelada Exportação (700 kg)', 'valor' => 7500.00, 'tipo' => 'Carga Refrigerada'],
        ['descricao' => 'Costela Suína Temperada Congelada (500 kg)', 'valor' => 4000.00, 'tipo' => 'Carga Refrigerada']
    ],
    true,
    155.0,
    '26/11/2026 05:00',
    '26/11/2026 06:15',
    '26/11/2026 13:00',
    1200
);
$pedido19->atribuirVeiculo($caminhao1);
$pedido19->atualizarStatus('Em Trânsito', '26/11/2026 06:30');
$pedido19->atualizarStatus('Ocorrência: Desvio de Rota por Obras', '26/11/2026 09:15');

// Pedido 120: Carga Geral (480 kg), corporativo, 78 km -> Utilitário Urbano
$pedido20 = new Pedido(
    120,
    4300.00,
    $cliente1->getNomeRazaoSocial(),
    'Carga Geral',
    [
        ['descricao' => 'Sacos de Arroz e Feijão Tipo 1 (300 kg)', 'valor' => 2500.00, 'tipo' => 'Carga Geral'],
        ['descricao' => 'Óleo de Soja e Massas Secas (180 kg)', 'valor' => 1800.00, 'tipo' => 'Carga Geral']
    ],
    true,
    78.0,
    '26/11/2026 07:45',
    '26/11/2026 08:45',
    '26/11/2026 12:45',
    480
);
$pedido20->atribuirVeiculo($utilitario5);
$pedido20->atualizarStatus('Em Trânsito', '26/11/2026 09:00');

// --- EXIBINDO OS PEDIDOS E VALORES FINAIS (UM ECHO POR ATRIBUTO) ---
$pedidos = [
    ['objeto' => $pedido1, 'valorKm' => 2.20],
    ['objeto' => $pedido2, 'valorKm' => 3.80],
    ['objeto' => $pedido3, 'valorKm' => 6.50],
    ['objeto' => $pedido4, 'valorKm' => 2.20],
    ['objeto' => $pedido5, 'valorKm' => 2.50],
    ['objeto' => $pedido6, 'valorKm' => 6.80],
    ['objeto' => $pedido7, 'valorKm' => 3.60],
    ['objeto' => $pedido8, 'valorKm' => 4.20],
    ['objeto' => $pedido9, 'valorKm' => 6.50],
    ['objeto' => $pedido10, 'valorKm' => 2.10],
    ['objeto' => $pedido11, 'valorKm' => 3.90],
    ['objeto' => $pedido12, 'valorKm' => 7.00],
    ['objeto' => $pedido13, 'valorKm' => 3.70],
    ['objeto' => $pedido14, 'valorKm' => 2.30],
    ['objeto' => $pedido15, 'valorKm' => 4.10],
    ['objeto' => $pedido16, 'valorKm' => 6.90],
    ['objeto' => $pedido17, 'valorKm' => 3.75],
    ['objeto' => $pedido18, 'valorKm' => 2.45],
    ['objeto' => $pedido19, 'valorKm' => 7.20],
    ['objeto' => $pedido20, 'valorKm' => 3.85]
];

echo "\n\n\n\n\n\n";
echo "==================================================\n";
echo "=== LISTA DE PEDIDOS E RESUMO FINANCEIRO ===\n";
echo "==================================================\n\n";

foreach ($pedidos as $registro) {
    $pedido = $registro['objeto'];
    $valorKm = $registro['valorKm'];
    $frete = $pedido->calcularFrete($valorKm);
    $totalCompra = $pedido->valorTotalCompra($valorKm);
    $ganhouDesconto = ($pedido->getCorporativo() && $pedido->getAcimaDe50Km() === 'Sim');

    echo "ID do Pedido: " . $pedido->getId() . "\n";
    echo "Valor Base do Pedido: R$ " . number_format($pedido->getValorPedido(), 2, ',', '.') . "\n";
    echo "Nome do Cliente: " . $pedido->getNome() . "\n";
    echo "Classificação: " . $pedido->getClassificacao() . "\n";
    echo "Seguro: " . $pedido->getSeguro() . "\n";
    echo "Valor do Seguro: " . $pedido->getValorSeguro() . "%\n";
    echo "Corporativo: " . ($pedido->getCorporativo() ? 'Sim' : 'Não') . "\n";
    echo "Acima de 50 km: " . $pedido->getAcimaDe50Km() . ($ganhouDesconto ? ' (Desconto de 8% aplicado)' : ' (Sem desconto de 8%)') . "\n";
    echo "Distância: " . $pedido->getDistanciaKm() . " km\n";
    echo "Data de Início do Pedido: " . $pedido->getDataInicioPedido() . "\n";
    echo "Data de Despacho: " . $pedido->getDataDespacho() . "\n";
    echo "Data de Previsão da Entrega: " . $pedido->getDataPrevisaoEntrega() . "\n";
    echo "Peso: " . $pedido->getPesoKg() . " kg\n";
    echo "Refrigerado: " . ($pedido->getRefrigerado() ? 'Sim' : 'Não') . "\n";
    echo "Veículo de Entrega: " . $pedido->getVeiculoEntrega() . "\n";
    echo "Placa do Veículo: " . $pedido->getPlacaVeiculo() . "\n";
    echo "Status Atual: " . $pedido->getStatusAtual() . "\n";

    echo "Itens do Pedido:\n";
    foreach ($pedido->getItem() as $produto) {
        echo "Descrição: " . $produto['descricao'] . "\n";
        echo "Valor: R$ " . number_format($produto['valor'], 2, ',', '.') . "\n";
    }

    echo "Histórico Cronológico de Eventos:\n";
    foreach ($pedido->getHistorico() as $registroEvento) {
        echo "Data/Hora: " . $registroEvento['dataHora'] . "\n";
        echo "Evento: " . $registroEvento['evento'] . "\n";
    }

    echo "Valor do Frete: R$ " . number_format($frete, 2, ',', '.') . "\n";
    echo "Valor Total da Compra: R$ " . number_format($totalCompra, 2, ',', '.') . "\n";
    echo "--------------------------------------------------\n\n";
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
    protected $categoria;
    protected $statusDisponibilidade;
    protected $localizacao;

    public function __construct(
        $placa,
        $modelo,
        $anoFabricacao,
        $capacidadeMaximaCargaQuilogramas,
        $categoria,
        $statusDisponibilidade = true,
        $localizacao = 'Terminal Santo Amaro'
    ) {
        $categoriasPermitidas = ['Moto', 'Utilitário Urbano', 'Caminhão Refrigerado'];
        if (!in_array($categoria, $categoriasPermitidas)) {
            throw new InvalidArgumentException("Categoria inválida. Use apenas: Moto, Utilitário Urbano ou Caminhão Refrigerado.");
        }

        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->anoFabricacao = $anoFabricacao;
        $this->capacidadeMaximaCargaQuilogramas = $capacidadeMaximaCargaQuilogramas;
        $this->categoria = $categoria;
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

    public function getCategoria() {
        return $this->categoria;
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
            'Moto',
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
            'Utilitário Urbano',
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
            'Caminhão Refrigerado',
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
    protected $email;
    protected $telefone;
    protected $documentoCpfCnpj;
    protected $enderecoColeta;

    public function __construct($nomeRazaoSocial, $email,$telefone, $documentoCpfCnpj,$enderecoColeta) {
        $this->nomeRazaoSocial =$nomeRazaoSocial;
        $this->email =$email;
        $this->telefone =$telefone;
        $this->documentoCpfCnpj =$documentoCpfCnpj;
        $this->enderecoColeta =$enderecoColeta;
    }

    public function getNomeRazaoSocial() {
        return $this->nomeRazaoSocial;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
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
    protected $acimaDe50Km;
    protected $distanciaKm;
    protected $dataInicioPedido;
    protected $dataDespacho;
    protected $dataPrevisaoEntrega;
    protected $pesoKg;
    protected $refrigerado;
    protected $veiculoEntrega;
    protected $placaVeiculo;
    protected $statusAtual;
    protected $historico = [];

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
        $this->acimaDe50Km = ($distanciaKm > 50) ? 'Sim' : 'Não';
        $this->dataInicioPedido = $dataInicioPedido;
        $this->dataDespacho = $dataDespacho;
        $this->dataPrevisaoEntrega = $dataPrevisaoEntrega;
        $this->pesoKg = $pesoKg;
        $this->refrigerado = ($classificacao === 'Carga Refrigerada');
        $this->veiculoEntrega = $veiculoEntrega;
        $this->placaVeiculo = $placaVeiculo;

        $this->configurarSeguro();
        $this->atualizarStatus('Pedido Registrado', $this->dataInicioPedido);
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
            $this->valorSeguro = 15;
        } elseif ($temFragil) {
            $this->seguro = 'Sim';
            $this->valorSeguro = 10;
        } elseif ($temRefrigerado) {
            $this->seguro = 'Sim';
            $this->valorSeguro = 5;
        } else {
            $this->seguro = 'Não';
            $this->valorSeguro = 0;
        }
    }

    protected function registrarEvento($evento, $dataHora = null) {
        $this->historico[] = [
            'dataHora' => $dataHora ?? date('d/m/Y H:i'),
            'evento' => $evento
        ];
    }

    public function atualizarStatus($novoStatus, $dataHora = null) {
        $this->statusAtual = $novoStatus;
        $this->registrarEvento($novoStatus, $dataHora);
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

    public function getAcimaDe50Km() {
        return $this->acimaDe50Km;
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

    public function getStatusAtual() {
        return $this->statusAtual;
    }

    public function getHistorico() {
        return $this->historico;
    }

    public function calcularFrete($valorKm) {
        return $this->distanciaKm * $valorKm;
    }

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

    public function valorTotalCompra($valorKm) {
        $frete = $this->calcularFrete($valorKm);
        $subtotal = $this->valorPedido + $frete;

        $taxaClassificacao = 0;
        if ($this->classificacao === 'Carga Frágil') {
            $taxaClassificacao = $subtotal * 0.12;
        } elseif ($this->classificacao === 'Carga Refrigerada') {
            $taxaClassificacao = $subtotal * 0.18;
        }

        $adicionalSeguro = $this->calcularAdicionalSeguroItens();
        $totalBruto = $subtotal + $taxaClassificacao + $adicionalSeguro;

        $temDescontoCorporativo = ($this->corporativo && $this->acimaDe50Km === 'Sim');
        $desconto = $temDescontoCorporativo ? ($totalBruto * 0.08) : 0;

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

    public function atribuirVeiculo(Veiculo $veiculo, $dataHora = null) {
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

        $momento = $dataHora ?? $this->dataDespacho;
        $this->atualizarStatus("Alocado ao Veículo {$this->veiculoEntrega} (Placa: {$this->placaVeiculo})", $momento);

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




