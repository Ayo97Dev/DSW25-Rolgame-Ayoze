<?php
namespace Dsw\Rolgame;

class Guerrero extends Personaje {

    public function __construct(
        string $nombre,
        int $nivel,
        int $puntosDeVida,
        public int $fuerza
    ) {
        parent::__construct($nombre, $nivel, $puntosDeVida);
    }

    public function atacar(): int {
        return $this->nivel * $this->fuerza;
    }

    public function defender(int $daño): int {
        $dañoReducido = $daño - ($this->fuerza / 2);
        return max(0, $dañoReducido); // El daño no puede ser negativo
    }

}