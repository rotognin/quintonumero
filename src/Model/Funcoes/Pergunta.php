<?php

namespace Src\Model\Funcoes;

use Src\Model\Entidades\Perguntas;
use Lib\Funcoes;

class Pergunta
{
    public string $mensagem;
    private array $perguntas;
    private Perguntas $pergunta;
    private bool $novo;

    public function __construct()
    {
        $this->mensagem = '';
        $this->novo = false;
    }

    public function listar(bool $todos = true)
    {
        $params = '';
        $find = '';

        if (!$todos){
            $params = http_build_query(['status' => 0]);
            $find = 'status = :status';
        }

        $perguntas = (new Perguntas())->find($find, $params)->fetch(true);

        if (!$perguntas){
            $this->mensagem = 'Nenhuma pergunta cadastrada.';
            return false;
        }

        $this->perguntas = $perguntas;
        return true;
    }

    public function carregar(int $id)
    {
        $this->pergunta = (new Perguntas())->findById($id);
    }

    /**
     * Retorna o array com os objetos
     */
    public function obter()
    {
        return $this->perguntas ?? false;
    }

    /**
     * Retorna uma pergunta carregado do banco
     */
    public function objeto()
    {
        return $this->pergunta ?? false;
    }

    private function validarCampos()
    {
        $retorno = true;
        $this->mensagem = '';

        if ($this->pergunta->numero1 == ''){
            $this->mensagem .= 'Informe o primeiro número <br>';
            $retorno = false;
        }

        if (!is_numeric($this->pergunta->numero1)){
            $this->mensagem .= 'Primeiro número inválido <br>';
            $retorno = false;
        }

        if ($this->pergunta->numero2 == ''){
            $this->mensagem .= 'Informe o segundo número <br>';
            $retorno = false;
        }

        if (!is_numeric($this->pergunta->numero2)){
            $this->mensagem .= 'Segundo número inválido <br>';
            $retorno = false;
        }

        if ($this->pergunta->numero3 == ''){
            $this->mensagem .= 'Informe o terceiro número <br>';
            $retorno = false;
        }

        if (!is_numeric($this->pergunta->numero3)){
            $this->mensagem .= 'Terceiro número inválido <br>';
            $retorno = false;
        }

        if ($this->pergunta->numero4 == ''){
            $this->mensagem .= 'Informe o quarto número <br>';
            $retorno = false;
        }

        if (!is_numeric($this->pergunta->numero4)){
            $this->mensagem .= 'Quarto número inválido <br>';
            $retorno = false;
        }

        if ($this->pergunta->resposta == ''){
            $this->mensagem .= 'Informe a resposta <br>';
            $retorno = false;
        }

        if (!is_numeric($this->pergunta->resposta)){
            $this->mensagem .= 'Resposta inválida <br>';
            $retorno = false;
        }

        if ($this->pergunta->explicacao == ''){
            $this->mensagem .= 'Favor preencher a explicação <br>';
            $retorno = false;
        }

        if (!$retorno){
            $this->mensagem = substr($this->mensagem, 0, -4);
        }

        return $retorno;
    }

    /**
     * Verificar os dados que vieram do formulário
     */
    public function dados(array $dados)
    {
        if ($dados['id'] > 0){
            $this->carregar($dados['id']);
        } else {
            $this->pergunta = new Perguntas();
            $this->novo = true;
        }

        $this->pergunta->numero1  = $dados['numero1'];
        $this->pergunta->numero2  = $dados['numero2'];
        $this->pergunta->numero3  = $dados['numero3'];
        $this->pergunta->numero4  = $dados['numero4'];
        $this->pergunta->resposta = $dados['resposta'];
        $this->pergunta->explicacao = Funcoes::verificarString($dados['explicacao']);

        $this->pergunta->dificuldade = filter_var($dados['dificuldade'], FILTER_VALIDATE_INT);

        if ($this->novo){
            $this->pergunta->status = 0;
        }

        if (!$this->validarCampos()){
            return false;
        }

        return true;
    }

    public function gravar()
    {
        if (!$this->pergunta->save()){
            $this->mensagem = $this->pergunta->fail()->getMessage();
            return false;
        }

        return true;
    }

    public function alterarStatus(int $status)
    {
        $this->pergunta->status = $status;
        $this->gravar();
    }
}