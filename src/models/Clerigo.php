<?php
namespace Dsw\Rolgame\models;

class Clerigo extends Personaje implements Curable {

    public function __construct(
        string $nombre,
        int $nivel,
        int $puntosDeVida,
        public int $poderCurativo
    ) {
        parent::__construct($nombre, $nivel, $puntosDeVida);
    }

    public function atacar(): int {
        return $this->poderCurativo * 2;
    }

    public function defender(int $daño): int {
        $dañoReducido = $daño - intval($this->poderCurativo / 2);
        return max(0, $dañoReducido); // El daño no puede ser negativo
    }

    public function curar(): int {
        return $this->poderCurativo * 2;
    }

}