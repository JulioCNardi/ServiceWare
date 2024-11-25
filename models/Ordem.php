<?php
class Ordem {
    private $id = 0;
    private $veiculo='';
    private $cliente='';
    private $produto='';
    private $dataAbertura='';
    private $dataFechamento='';
    private $valorVenda= '';
    private $observacao= '';

    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getVeiculo()
    {
        return $this->veiculo;
    }

    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;

        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }


    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }


    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    public function setDataAbertura($dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }


    public function getDataFechamento()
    {
        return $this->dataFechamento;
    }

    public function setDataFechamento($dataFechamento)
    {
        $this->dataFechamento = $dataFechamento;

        return $this;
    }

    public function getValorVenda()
    {
        return $this->valorVenda;
    }


    public function setValorVenda($valorVenda)
    {
        $this->valorVenda = $valorVenda;

        return $this;
    }


    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }
}

?>