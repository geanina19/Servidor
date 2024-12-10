<?php

class BiciElectrica
{

    // -------------------------------------
    // Atributos de Clase
    // -------------------------------------

    private $id; // Identificador de la bicicleta (entero)
    private $coordx; // Coordenada X (entero)
    private $coordy; // Coordenada Y (entero)
    private $bateria; // Carga de la batería en tanto por ciento (entero)
    private $operativa; // Estado de la bicleta ( true operativa- false no disponible)

    
    // -------------------------------------
    //   METODOS:
    // -------------------------------------

    // Constructores
    public function __construct(int $id, int $coordx, int $coordy, int $bateria, bool $operativa) {
        $this->id = $id;
        $this->coordx = $coordx;
        $this->coordy = $coordy;
        $this->bateria = $bateria;
        $this->operativa = $operativa;
    }

    // Getter
    public function __get($atributo) {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    
    // Setter
    public function __set($atributo, $valor) {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

    // Método mágico para convertir el objeto a cadena
    public function __toString() {
        return " Indentificador: ". $this->id . " Bateria " . $this->bateria . "%";
    }

    //Devuelve la distancia entre las coordenadas pasadas como parámetro y las coordenados del la bicicleta aplicando una formula.
    // sqrt -> calcula la raíz cuadrada
    // pow -> eleva al cuadrado
    public function distancia($x, $y) {
        return sqrt(pow($x - $this->coordx, 2) + pow($y - $this->coordy, 2));
    }
}
