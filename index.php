<?php

$barra = '/';
if(PHP_OS == "WINNT") {
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

echo $paciente->getFormatedPersonalInfoStr('Paciente');

echo '<br><br><hr><br>';

$candidato1Controller = new PessoaController($candidato1);
$candidato1Controller->setDiagnostico($paciente);
echo $candidato1Controller->getDiagnosticoToString();

echo '<br><br><hr><br>';

$candidato2Controller = new PessoaController($candidato2);
$candidato2Controller->setDiagnostico($paciente);
echo $candidato2Controller->getDiagnosticoToString();

echo '<br><br><hr><br>';

$candidato3Controller = new PessoaController($candidato3);
$candidato3Controller->setDiagnostico($paciente);
echo $candidato3Controller->getDiagnosticoToString();
