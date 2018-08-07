<?php

class Produto{
    private $barra;
    private $quantidade;
    private $codigoInterno;
    private $descricao;
    private $unidade;
    private $preco;
    
    function getBarra() {
        return $this->barra;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getCodigoInterno() {
        return $this->codigoInterno;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function getPreco() {
        return $this->preco;
    }

    function setBarra($barra) {
        $this->barra = $barra;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setCodigoInterno($codigoInterno) {
        $this->codigoInterno = $codigoInterno;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

}