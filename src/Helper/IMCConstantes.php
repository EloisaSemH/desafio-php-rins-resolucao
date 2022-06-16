<?php

class IMCConstantes
{

    public const ABAIXO_DO_PESO = 'Abaixo do peso';
    public const NORMAL = 'Normal';
    public const SOBREPESO = 'Sobrepeso';
    public const OBESIDADE_GRAU_1 = 'Obesidade Grau 1';
    public const OBESIDADE_GRAU_2 = 'Obesidade Grau 2';
    public const OBESIDADE_GRAU_3 = 'Obesidade Grau';

    public const OBESIDADES = [
        self::OBESIDADE_GRAU_1,
        self::OBESIDADE_GRAU_2,
        self::OBESIDADE_GRAU_3,
    ];

    public const FAIXAS_IMC = [
        self::ABAIXO_DO_PESO => 18.5,
        self::NORMAL => 24.9,
        self::SOBREPESO => 29.9,
        self::OBESIDADE_GRAU_1 => 34.9,
        self::OBESIDADE_GRAU_2 => 39.9,
        self::OBESIDADE_GRAU_3 => 40,
    ];

    static function resultadoIMC($imc)
    {
        switch ($imc) {
            case $imc <= self::FAIXAS_IMC[self::ABAIXO_DO_PESO]:
                return self::ABAIXO_DO_PESO;
            case $imc <= self::FAIXAS_IMC[self::NORMAL]:
                return self::NORMAL;
            case $imc <= self::FAIXAS_IMC[self::SOBREPESO]:
                return self::SOBREPESO;
            case $imc <= self::FAIXAS_IMC[self::OBESIDADE_GRAU_1]:
                return self::OBESIDADE_GRAU_1;
            case $imc <= self::FAIXAS_IMC[self::OBESIDADE_GRAU_2]:
                return self::OBESIDADE_GRAU_2;
            default:
                return self::OBESIDADE_GRAU_3;
        }
    }

    static function calculaIMC(float $pesoKg, int $alturaCm): float
    {
        $alturaM = $alturaCm / 100;

        return round($pesoKg / ($alturaM ** 2), 2);
    }
}
