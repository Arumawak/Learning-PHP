<?php

namespace classes\abstratas;

use classes\abstratas\Funcionario;

class AutenticaSenha extends Funcionario {

    public $senha;

    public function autenticar($senha) {
        return ($senha == $this->senha)?true:false;
//      if($senha == $this->senha) {
//          return true;
//      }
//      return false;
    }
}