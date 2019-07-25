<?php

class contaCorrente {
    //PRIVATE: Não é mais possível acessa-lo de fora da classe,
    //apenas a própria classe pode alterá-lo.
    private $titular;
    private $agencia;
    private $numero;
    private $saldo;

    //CONSTRUTOR
    public function __construct($titular, $agencia, $numero, $saldo) {
        $this->titular = $titular;
        $this->agencia = $agencia;
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    //MÉTODOS
    public function sacar($valor) {
        $this->saldo = $this->saldo - $valor;
        return $this; //Retorna a própria classe
    }

    public function depositar($valor) {
        $this->saldo = $this->saldo + $valor;
        return $this; //Retorna a própria classe
    }

//  GETTERS
//  public function getTitular() {
//      return $this->titular;
//  }
//
//  public function getSaldo() {
//      return $this->saldo;
//  }

//  SETTERS
//  public function setNumero($numero) {
//      return $this->numero = $numero;
//  }

//  MÉTODOS MÁGICOS, GETTERS E SETTERS
    public function __get($atributo) {
        validacao::verifyAtributo($atributo); //Uso de método estático em outra classe
        //$this->verifyAtributo($atributo); Chamada de um método privado (line: 58)
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        validacao::verifyAtributo($atributo); //Uso de método estático em outra classe
        //$this->verifyAtributo($atributo); Chamada de um método privado (line: 58)
        $this->$atributo = $valor;
    }

//  MÉTODOS PRIVADOS OU ENCAPSULAMENTO DE MÉTODOS
//  private function verifyAtributo($atributo) {
//      if ($atributo == "titular" || $atributo == "saldo") {
//          throw new Exception("O atributo $atributo não pode ser acessado");
//      }
//  }

    private function formataSaldo() {
        return "R$ " .
            number_format(
                $this->saldo, 2, ",", "."
            );
    }

    public function getSaldo() {
        return $this->formataSaldo(); //Chamada de um método privado
    }

//  PASSAGEM DE PARÂMETRO POR REFERÊNCIA NULL
//  Passagem por referência nula
//  public function transferir($valor, $conta) {
//      $this->sacar($valor);
//      $conta->depositar($valor);
//      return $this;
//  }
//  Passagem por tipos definidos
    public function transferir(float $valor, ContaCorrente $conta):ContaCorrente {
        $this->sacar($valor);
        $conta->depositar($valor);
        return $this;
    }
}