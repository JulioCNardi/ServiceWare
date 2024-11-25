<?php

class Veiculo 
{
    private $id;
    private $placa;
    private $modelo;
    private $ano;
    private $marca;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

 
    public function getPlaca()
    {
        return $this->placa;
    }

 
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }


    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }


    public function getAno()
    {
        return $this->ano;
    }


    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
}