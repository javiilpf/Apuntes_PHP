<?php
    // // Manejar la acción de ver lista específica utilizando POST
// if (isset($_POST['action']) && $_POST['action'] == 'viewList') {
    if (isset($_POST['listId'])) {
        $listId = intval($_POST['listId']); // Convertir el ID de la lista a número entero
        // Obtener los detalles de la lista
        $listTitle = ListRepository::getTitleOfListById($listId);

        // Obtener la lista de reproducción por ID
        $songsInList = AddRepository::GetSongsForList($listId, $_SESSION['user']->getId());

        // Mostrar los detalles de la lista de reproducción
        require_once __DIR__ . '/../views/detailListView.phtml';
        
        
        
    } else {
        echo "ID de la lista no proporcionado.";
    }
    if(isset($_POST['atras'])){
        header('Location: index.php');
        exit;
    }
// }
?>