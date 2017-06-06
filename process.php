<?php
require 'connections.php';
    $result = mysqli_query($conn, "SELECT subcatid, subcat FROM itemsubcategories WHERE catid = '{$_GET["parent"]}'");

    while(($data = mysqli_fetch_array($result)) !== false)
        echo '<option value="', $data['subcatid'],'">', $data['subcat'],'</option>'
            
?>