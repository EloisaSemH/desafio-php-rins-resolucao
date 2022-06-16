<?php

$barra = '/';
if (PHP_OS == "WINNT") {
    $barra = '\\';
}
require_once "src{$barra}Helper{$barra}TipoSanguineoConstantes.php";
require_once "src{$barra}Model{$barra}Pessoa.php";
require_once "src{$barra}Controller{$barra}PessoaController.php";

$paciente = new Pessoa(
    'Lohane Vêkanandre Sthephany Smith Bueno de HA HA HA de Raio Laser bala de Icekiss',
    Pessoa::GENERO_FEMININO,
    21,
    TipoSanguineoConstantes::TIPO_SANGUINEO_A_POSITIVO,
    71.00,
    172
);

$candidato1 = new Pessoa(
    'Carlos Rato Roberto Massa Júnior',
    Pessoa::GENERO_MASCULINO,
    22,
    TipoSanguineoConstantes::TIPO_SANGUINEO_AB_POSITIVO,
    72.00,
    175
);

$candidato2 = new Pessoa(
    'Kassandra Portadora da Águia',
    Pessoa::GENERO_FEMININO,
    22,
    TipoSanguineoConstantes::TIPO_SANGUINEO_A_POSITIVO,
    67.00,
    160
);

$candidato3 = new Pessoa(
    'Arthur Morgan',
    Pessoa::GENERO_MASCULINO,
    17,
    TipoSanguineoConstantes::TIPO_SANGUINEO_O_NEGATIVO,
    80.00,
    159
);

$candidato1Controller = new PessoaController($candidato1);
$candidato1Controller->setDiagnostico($paciente);

$candidato2Controller = new PessoaController($candidato2);
$candidato2Controller->setDiagnostico($paciente);

$candidato3Controller = new PessoaController($candidato3);
$candidato3Controller->setDiagnostico($paciente);

$cards = [
    [
        'model' => $candidato1,
        'controller' => $candidato1Controller,
    ],
    [
        'model' => $candidato2,
        'controller' => $candidato2Controller,
    ],
    [
        'model' => $candidato3,
        'controller' => $candidato3Controller,
    ],
];
?>

<div class="card" style="">
    <div class="card-body">
        <h5 class="card-title"><?= $paciente->getFirstName() ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Paciente</h6>
        <p class="card-text" style="text-align: left;"><?= $paciente->getFormatedPersonalInfoStr(); ?></p>
    </div>
</div>
<hr>
<div class="row">
    <?php
    foreach ($cards as $candidato) {
        ?>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $candidato['model']->getFirstName() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Candidato <?= $candidato['controller']->getStatus() ?></h6>
                    <p class="card-text" style="text-align: left;"><?= $candidato['controller']->getDiagnosticoToString(
                        ); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
