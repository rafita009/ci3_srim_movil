<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ValidatesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function validarCedula($cedula)
{
    // Perform initial validations
    if (empty($cedula)) {
        return false;
    }

    // Verify that the cédula is a string of 10 digits
    if (!ctype_digit($cedula) || strlen($cedula) != 10) {
        return false;
    }

    // Validate province code (first two digits)
    $codigoProvincia = substr($cedula, 0, 2);
    if ($codigoProvincia < 0 || $codigoProvincia > 24) {
        return false;
    }

    // Validate third digit for natural person
    $tercerDigito = $cedula[2];
    if ($tercerDigito < 0 || $tercerDigito > 5) {
        return false;
    }

    // Algoritmo de validación (Módulo 10)
    $multiplos = [2, 1, 2, 1, 2, 1, 2, 1, 2];
    $suma = 0;

    for ($i = 0; $i < 9; $i++) {
        $valor = (int)$cedula[$i] * $multiplos[$i];
        
        // If the result is two digits, sum its digits
        if ($valor >= 10) {
            $valor = array_sum(str_split($valor));
        }
        
        $suma += $valor;
    }

    // Calculate verification digit
    $residuo = $suma % 10;
    $digitoVerificador = ($residuo == 0) ? 0 : 10 - $residuo;

    // Compare calculated verification digit with the last digit of the cédula
    return $digitoVerificador == (int)$cedula[9];
}
}
    