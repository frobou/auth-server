<?php

namespace Ispti;

trait Entity
{
    public function __get($name)
    {
        $methodName = $this->toMethod($name, 'get');

        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $methodName = $this->toMethod($name, 'set');

        if (method_exists($this, $methodName)) {
            return $this->$name = $this->$methodName($value);
        }
        return $this->$name = $value;
    }

    private function toMethod($string, $prefix)
    {
        $string = str_replace('_', ' ', $string);
        $string = ucwords(strtolower($string));
        $string = str_replace(' ', '', $string);
        return $prefix . $string;
    }
}

class Teste
{
    use Entity;

    protected $teste;
    protected $broba;

    public function getBroba()
    {
        return ucwords($this->broba);
    }

    public function setTeste($valor)
    {
        return $this->teste = strtoupper($valor);
    }
}

$a = new Teste;
$a->teste = "nada";
$a->broba = "broba";
$a->lberto = "dentro\n";
echo $a->teste . ' ' . $a->broba . ' ' . $a->lberto;