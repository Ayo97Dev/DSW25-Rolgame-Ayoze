<?php

namespace Dsw\Rolgame\models;

abstract class Personaje {

    public function __construct(
        public string $nombre,
        public int $nivel,
        public int $puntosDeVida
    ) { }

    public abstract function atacar();

    public abstract function defender(int $daño): int;
    
    public function subirNivel() {
        $this->nivel++;
    }   


}