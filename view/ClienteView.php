<?php

namespace view;

use generic\View;
use template\UsuarioTemp;

class ClienteView extends View
{
    public function __construct()
    {
        parent::__construct(new UsuarioTemp());
    }
    public function listaClientes($dados)
    {
        
        $this->conteudo("public/ListaCliente.php",$dados);
    }

    public function alterarClientes($dados)
    {
        
        $this->conteudo("public/AlterarCliente.php",$dados);
    }
}
