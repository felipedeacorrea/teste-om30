<?php

function _encrypt(string $value = null)
{
    $dirty = array("+", "/", "=");
    $clean = array("_PL_", "_SL_", "_EQ_");

    $value = base64_encode(base64_encode($value));
    return str_replace($dirty, $clean, $value);
}

function _decrypt(string $value = null)
{
    $dirty = array("+", "/", "=");
    $clean = array("_PL_", "_SL_", "_EQ_");

    $value = str_replace($clean, $dirty, $value);
    $value = base64_decode(base64_decode($value));
    return $value;
}

function _date_fmt(string $date = "now", string $format = "d/m/Y H:m:i"): string
{
    return (new DateTime($date))->format($format);
}

function _Debug($data, $die = false)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if ($die) {
        die();
    }
}

function _validaCPF($cpf)
{

    // ELIMINANDO POSSIVEIS MASCARAS
    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // VERIFICA SE O NUMERO DE DIGITOS É IGUAL A 11
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se nenhuma das sequências invalidas abaixo
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' ||
        $cpf == '11111111111' ||
        $cpf == '22222222222' ||
        $cpf == '33333333333' ||
        $cpf == '44444444444' ||
        $cpf == '55555555555' ||
        $cpf == '66666666666' ||
        $cpf == '77777777777' ||
        $cpf == '88888888888' ||
        $cpf == '99999999999') {
        return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
    } else {

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}

//FORMATAR CNPJ
function _formatCnpjCpf($value) {
    $cnpj_cpf = preg_replace("/\D/", '', $value);

    if (strlen($cnpj_cpf) === 11) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }

    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}

/* FUNÇÕES DE DATA */
function _DateBR($date,$toDB=false) {

    if(!empty($date)){
        $date = explode(' ',$date);
        $time = (array_key_exists('1',$date)?$date[1]:null);

        if($toDB){
            $date = explode('/',$date[0]);
            $date = "{$date[2]}-{$date[1]}-{$date[0]}";
        } else {
            $date = explode('-',$date[0]);
            $date = "{$date[2]}/{$date[1]}/{$date[0]}";
        }

        $date = $date." ".$time;
        $date = trim($date);
    }

    return $date;
}