<?php
spl_autoload_register(function ( $fileName ){
    if (file_exists( './'.$fileName.'.php')) {
        require_once './'.$fileName.'.php';
    }

});
