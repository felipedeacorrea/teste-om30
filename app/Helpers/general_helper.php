<?php

function _encrypt(string $value = null){
    $dirty = array("+", "/", "=");
    $clean = array("_PL_", "_SL_", "_EQ_");

    $value = base64_encode(base64_encode($value));
    return str_replace($dirty, $clean, $value);
}

function _decrypt(string $value = null){
    $dirty = array("+", "/", "=");
    $clean = array("_PL_", "_SL_", "_EQ_");

    $value = str_replace($clean, $dirty, $value);
    $value = base64_decode(base64_decode($value));
    return $value;
}

function _date_fmt(string $date = "now", string $format = "d/m/Y H:m:i"): string {
    return (new DateTime($date))->format($format);
}

function _dropdown(array $data = null, $label, $value, $hasSelected = false, $distinct = false):?array {

    /* Verifica Data */
    if(empty($data)){ return null; }
    /* Checa Array Multidimencional (se não for retorna null) */
    if(empty(array_sum(array_map('is_array', (array) $data)))){ return null; }

    /* Checa Label */
    if(!is_array($label)){ $label = [$label];}

    /* Has Selected */
    if(!$hasSelected){
        $retorno = ['0' => "Selecione"];
    } else {
        $retorno = null;
    }

    /* Povoa o Drop */
    foreach ($data as $k => $item){

        /* Variavel temporaria do label */
        $itemLabel = null;
        foreach($label as $row){ $itemLabel .= "{$item[$row]} "; }

        /* Povoa o retorno */
        $itemLabel = trim($itemLabel);
        if(!empty($itemLabel)){
            if($distinct){
                if(!in_array($itemLabel, $retorno)){
                    $retorno[$item[$value]] = $itemLabel;
                }
            } else {
                $retorno[$item[$value]] = $itemLabel;
            }
        }
    }
    return $retorno;
}

function _Debug($data, $die = false){
    echo "<pre>";
        print_r($data);
    echo "</pre>";

    if($die = true){
        die();
    }

}

function _diaDaSemana($dateStart){
    $diasemana = array('domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado');
    $dataStart = new \DateTime($dateStart);
    $diasemana_numero = $dataStart->format('w');

    return $diasemana[$diasemana_numero];
}
