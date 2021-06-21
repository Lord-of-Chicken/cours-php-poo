<?php 



function render(string $path, array $variables = []){
    extract($variables);

    ob_start();
    require($path);
    $pageContent = ob_get_clean();
    
    require('/templates/layout.html.php');
}