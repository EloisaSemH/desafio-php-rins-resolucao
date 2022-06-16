<?php

class Pessoa
{
    private string $nome;
    private string $genero;
    private int $idade;
    private string $tipoSanguineo;
    private float $pesoKg;
    private int $alturaCm;

    public const GENERO_FEMININO = 'Feminino';
    public const GENERO_MASCULINO = 'Masculino';
    public const GENERO_OUTRO = 'Outro';

    public function __construct(
        string $nome,
        string $genero,
        int $idade,
        string $tipoSanguineo,
        float $pesoKg,
        int $alturaCm
    ) {
        $this->nome = $nome;
        $this->genero = $genero;
        $this->idade = $idade;
        $this->tipoSanguineo = $tipoSanguineo;
        $this->pesoKg = $pesoKg;
        $this->alturaCm = $alturaCm;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     */
    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    /**
     * @return int
     */
    public function getIdade(): int
    {
        return $this->idade;
    }

    /**
     * @param int $idade
     */
    public function setIdade(int $idade): void
    {
        $this->idade = $idade;
    }

    /**
     * @return string
     */
    public function getTipoSanguineo(): string
    {
        return $this->tipoSanguineo;
    }

    /**
     * @param string $tipoSanguineo
     */
    public function setTipoSanguineo(string $tipoSanguineo): void
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }

    /**
     * @return float
     */
    public function getPesoKg(): float
    {
        return $this->pesoKg;
    }

    /**
     * @param float $pesoKg
     */
    public function setPesoKg(float $pesoKg): void
    {
        $this->pesoKg = $pesoKg;
    }

    /**
     * @return int
     */
    public function getAlturaCm(): int
    {
        return $this->alturaCm;
    }

    /**
     * @param int $alturaCm
     */
    public function setAlturaCm(int $alturaCm): void
    {
        $this->alturaCm = $alturaCm;
    }

    public function getFirstName(): string
    {
        $nameArray = explode(' ', $this->getNome());
        return array_shift($nameArray);
    }

    public function getFormatedPersonalInfoStr(string $tipoPessoa = 'Candidato', string $separator = '<br>'): string
    {
        $personalDataStr = "<b>$tipoPessoa {$this->getFirstName()}</b>";

        $personalData = [
            'Nome completo' => $this->getNome(),
            'Idade' => $this->getIdade() . ' anos',
            'Tipo Sanguíneo' => $this->getTipoSanguineo(),
            'Peso' => $this->getPesoKg() . 'kg',
            'Altura' => $this->getAlturaCm() . 'cm',
        ];

        foreach ($personalData as $description => $information) {
            $personalDataStr .= "$separator<b>$description:</b> $information";
        }

        return $personalDataStr;
    }
}
