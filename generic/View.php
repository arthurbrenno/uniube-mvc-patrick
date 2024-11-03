<?php
namespace generic;

use template\ITemplate;

class View {
    private ITemplate $template;    
    public function __construct($template)
    {
        $this->template=$template;
    }
    public function conteudo($caminho,$param = null){
        echo $this->template->cabecalho();
        include $caminho;
        echo $this->template->rodape();
    }
}
?>