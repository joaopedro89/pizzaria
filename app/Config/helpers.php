<?php
function carregar_view($view, $titulo = 'Pedidos', $dados = "")
{
     if (is_file(__DIR__ . "/../Views/" . $view . ".php")) {
          require_once __DIR__ . "/../Views/" . $view . ".php";
     } else {
          echo "Erro 404: Página não encontrada!";
     }
}

/** 
 * me retorna a URL padrão de acesso ao sistema
 */
function url_base($uri = '')
{
     return URL_BASE . $uri;
}
