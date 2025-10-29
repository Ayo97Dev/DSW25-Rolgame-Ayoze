<?php
namespace Dsw\Rolgame\models;

class Mago extends Personaje {

    public function __construct(
        string $nombre,
        int $nivel,
        int $puntosDeVida,
        public int $mana
    ) {
        parent::__construct($nombre, $nivel, $puntosDeVida);
    }

    public function atacar(): int {
        return intval($this->mana / 2);
    }

    public function defender(int $daño): int {
        $dañoReducido = $daño - intval($this->mana / 5);
        return max(0, $dañoReducido); // El daño no puede ser negativo
    }

}