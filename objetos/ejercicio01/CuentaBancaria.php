<?php

class CuentaBancaria
{
    // -------------------------------------
    // Atributos de Clase
    // -------------------------------------

    private $saldo;          // Saldo actual de la cuenta
    private $numMovimientos; // Número de movimientos realizados
    private static $numCuentas = 0; // Número de cuentas creadas

    
    // -------------------------------------
    //   METODOS:
    // -------------------------------------
    
    // Constructores
    public function __construct(int $saldo = 0)
    {
        $this->saldo = $saldo;
        $this->numMovimientos = 0;
        //CuentaBancaria::$numCuentas++; // Otra forma menos general
        self::$numCuentas++;
    }

    //Ingreso, incrementa el saldo en una cantidad indicada como parámetro.
    public function ingreso(int $cantidad)
    {
        $this->saldo += $cantidad;
        $this->numMovimientos++;
    }

    // Abono, decremento el saldo en la cantidad indicada como parámetro.
    public function abono(int $cantidad) {
        $this->saldo -= $cantidad;
        $this->numMovimientos++;
    }

    // Anotar gastos decrementa el saldo en 20 euros si
    // el saldo de la cuenta es menor 1000
    public function anotarGastos() {
        if ($this->saldo < 1000) {
            //forma 1
            //$this->abono(20);

            //forma 2
            $this->saldo -= 20;
        }
    }

    // Anotar Intereses incrementa la cuenta según valor de interés indicado
    // como parámetro en tanto por ciento.
    public function anotarIntereses(int $interes) {
        $this->saldo += ($this->saldo * $interes / 100);
        $this->numMovimientos++;
    }

    //Realizar transferencia a cuenta, decrementa el saldo
    // en la cantidad indicada
    // como parámetro, realizando un ingreso en la cuenta destino.
    public function transferencia(int $importe, CuentaBancaria $destino) { 
        $this->abono($importe);
        $destino->ingreso($importe);
        // $this->numMovimientos++;
    }

    // Consultar estado de la cuenta, mostrá el saldo actual y
    // el número de operaciones realizadas
    public function consultarEstado(): string
    {
        return " Saldo = " . $this->saldo .
            " Nº operaciones = " . $this->numMovimientos;
    }
}
