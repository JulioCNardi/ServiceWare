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


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of veiculo
     */ 
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * Set the value of veiculo
     *
     * @return  self
     */ 
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;

        return $this;
    }

    /**
     * Get the value of cliente
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of produto
     */ 
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set the value of produto
     *
     * @return  self
     */ 
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get the value of dataAbertura
     */ 
    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    /**
     * Set the value of dataAbertura
     *
     * @return  self
     */ 
    public function setDataAbertura($dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    /**
     * Get the value of dataFechamento
     */ 
    public function getDataFechamento()
    {
        return $this->dataFechamento;
    }

    /**
     * Set the value of dataFechamento
     *
     * @return  self
     */ 
    public function setDataFechamento($dataFechamento)
    {
        $this->dataFechamento = $dataFechamento;

        return $this;
    }

    /**
     * Get the value of valorVenda
     */ 
    public function getValorVenda()
    {
        return $this->valorVenda;
    }

    /**
     * Set the value of valorVenda
     *
     * @return  self
     */ 
    public function setValorVenda($valorVenda)
    {
        $this->valorVenda = $valorVenda;

        return $this;
    }

    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }
}

?>