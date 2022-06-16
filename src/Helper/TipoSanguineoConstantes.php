<?php

class TipoSanguineoConstantes
{
    public const TIPO_SANGUINEO_A_POSITIVO = 'A+';
    public const TIPO_SANGUINEO_A_NEGATIVO = 'A-';
    public const TIPO_SANGUINEO_B_POSITIVO = 'B+';
    public const TIPO_SANGUINEO_B_NEGATIVO = 'B-';
    public const TIPO_SANGUINEO_AB_POSITIVO = 'AB+';
    public const TIPO_SANGUINEO_AB_NEGATIVO = 'AB-';
    public const TIPO_SANGUINEO_O_POSITIVO = 'O+';
    public const TIPO_SANGUINEO_O_NEGATIVO = 'O-';

    public const TIPOS_COMPATIVEIS = [
        self::TIPO_SANGUINEO_A_POSITIVO => self::A_POSITIVO_RECEBE,
        self::TIPO_SANGUINEO_A_NEGATIVO => self::A_NEGATIVO_RECEBE,
        self::TIPO_SANGUINEO_B_POSITIVO => self::B_POSITIVO_RECEBE,
        self::TIPO_SANGUINEO_B_NEGATIVO => self::B_NEGATIVO_RECEBE,
        self::TIPO_SANGUINEO_AB_POSITIVO => self::AB_POSITIVO_RECEBE,
        self::TIPO_SANGUINEO_AB_NEGATIVO => self::AB_NEGATIVO_RECEBE,
        self::TIPO_SANGUINEO_O_POSITIVO => self::O_POSITIVO_RECEBE,
        self::TIPO_SANGUINEO_O_NEGATIVO => self::O_NEGATIVO_RECEBE,
    ];

    private const A_POSITIVO_RECEBE = [
        self::TIPO_SANGUINEO_A_POSITIVO,
        self::TIPO_SANGUINEO_A_NEGATIVO,
        self::TIPO_SANGUINEO_O_POSITIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const A_NEGATIVO_RECEBE = [
        self::TIPO_SANGUINEO_A_NEGATIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const B_POSITIVO_RECEBE = [
        self::TIPO_SANGUINEO_B_POSITIVO,
        self::TIPO_SANGUINEO_B_NEGATIVO,
        self::TIPO_SANGUINEO_O_POSITIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const B_NEGATIVO_RECEBE = [
        self::TIPO_SANGUINEO_B_NEGATIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const AB_POSITIVO_RECEBE = [
        self::TIPO_SANGUINEO_A_POSITIVO,
        self::TIPO_SANGUINEO_A_NEGATIVO,
        self::TIPO_SANGUINEO_B_POSITIVO,
        self::TIPO_SANGUINEO_B_NEGATIVO,
        self::TIPO_SANGUINEO_AB_POSITIVO,
        self::TIPO_SANGUINEO_AB_NEGATIVO,
        self::TIPO_SANGUINEO_O_POSITIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const AB_NEGATIVO_RECEBE = [
        self::TIPO_SANGUINEO_A_NEGATIVO,
        self::TIPO_SANGUINEO_B_NEGATIVO,
        self::TIPO_SANGUINEO_AB_NEGATIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const O_POSITIVO_RECEBE = [
        self::TIPO_SANGUINEO_O_POSITIVO,
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];

    private const O_NEGATIVO_RECEBE = [
        self::TIPO_SANGUINEO_O_NEGATIVO,
    ];
}
