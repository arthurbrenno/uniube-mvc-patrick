<?php
namespace template;

class UsuarioTemp implements ITemplate {
    public function cabecalho(){
        echo "<div> usuario cabecalho</div>";
    }
    public function rodape(){
        echo "<div> usuario rodape</div>";
    }

    
}
?>