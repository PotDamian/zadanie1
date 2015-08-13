<?php

include_once('sesja.php');

class klasa_tylko_po_to_aby_wywolac_metode_z_sesji extends Sesja {

    public function metoda_tylko_po_to_aby_wywolac_metode_z_sesji() {
        $this->clean_session();
    }

}


$cos = new klasa_tylko_po_to_aby_wywolac_metode_z_sesji;
$cos->metoda_tylko_po_to_aby_wywolac_metode_z_sesji();
