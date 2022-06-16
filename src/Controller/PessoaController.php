<?php

$barra = '/';
if (PHP_OS == "WINNT") {
    $barra = '\\';
}

require_once "src{$barra}Model{$barra}Pessoa.php";
require_once "src{$barra}Helper{$barra}IMCConstantes.php";

class PessoaController
{
    private Pessoa $pessoa;
    private string $status = self::APROVADO;
    private array $diagnostico;

    public const APROVADO = 'Aprovado';
    public const REPROVADO = 'Reprovado';

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function setDiagnostico(Pessoa $pessoaReceber): void
    {
        $this->diagnostico = [
            'Idade' => $this->idadeDiagnostico(),
            'IMC' => $this->imcDiagnostico(),
            'Tipo Sanguíneo' => $this->tipoSanguineoDiagnostico($pessoaReceber),
        ];
    }

    public function getDiagnosticoToString(string $separator = '<br>'): string
    {
        $diagnosticoFinalStr = "<b>{$this->getStatus()}</b>$separator";
        $diagnosticoFinalStr .= $this->pessoa->getFormatedPersonalInfoStr();

        foreach ($this->diagnostico as $verificacao => $diagnostico) {
            $diagnosticoFinalStr .= "$separator $separator<b>Diagnóstico $verificacao:</b>";
            foreach ($diagnostico as $key => $value) {
                $diagnosticoFinalStr .= "$separator<b>$key:</b> $value";
            }
        }

        return $diagnosticoFinalStr;
    }

    public function setStatus(string $status): void
    {
        $this->status = ($this->status == self::REPROVADO) ? self::REPROVADO : $status;
    }

    public function getStatus(): string
    {
        return strtoupper($this->status);
    }

    private function idadeDiagnostico(): array
    {
        $idade = $this->pessoa->getIdade();
        $conclusaoIdade = $idade >= 18 ? self::APROVADO : self::REPROVADO;
        $this->setStatus($conclusaoIdade);

        return [
            'Idade' => $idade,
            'Conclusão' => $conclusaoIdade
        ];
    }

    private function imcDiagnostico(): array
    {
        $imc = IMCConstantes::calculaIMC(
            $this->pessoa->getPesoKg(),
            $this->pessoa->getAlturaCm(),
        );
        $resultadoImc = IMCConstantes::resultadoIMC($imc);
        $conclusaoImc = self::APROVADO;

        if (
            in_array($resultadoImc, IMCConstantes::OBESIDADES) ||
            $resultadoImc == IMCConstantes::ABAIXO_DO_PESO
        ) {
            $conclusaoImc = self::REPROVADO;
        }

        $this->setStatus($conclusaoImc);

        return [
            'IMC' => $imc,
            'Resultado' => $resultadoImc,
            'Conclusão' => $conclusaoImc
        ];
    }

    private function tipoSanguineoDiagnostico(Pessoa $pessoaReceber): array
    {
        $tipoSanguineoAtual = $this->pessoa->getTipoSanguineo();
        $tipoSanguineoReceber = $pessoaReceber->getTipoSanguineo();

        $compararPodeReceber = TipoSanguineoConstantes::TIPOS_COMPATIVEIS[$tipoSanguineoReceber];

        $conclusaoTipoSanguineo = self::REPROVADO;

        if (in_array($tipoSanguineoAtual, $compararPodeReceber)) {
            $conclusaoTipoSanguineo = self::APROVADO;
        }

        $this->setStatus($conclusaoTipoSanguineo);

        return [
            'Tipo sanguíneo a receber' => $tipoSanguineoReceber,
            'Tipo sanguíneo atual' => $tipoSanguineoAtual,
            'Conclusão' => $conclusaoTipoSanguineo
        ];
    }
}
