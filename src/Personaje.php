<?php

namespace Dsw\Rolgame;

abstract class Personaje {

    public function __construct(
        public string $nombre,
        public int $nivel,
        public int $puntosDeVida
    ) { }

    public abstract function atacar(): int;

    public abstract function defender(int $daño): int;
    
    public function subirNivel(): void {
        $this->nivel++;
    }

    public static function lucha(Personaje $personaje1, Personaje $personaje2): void {
        // Personaje1 ataca, Personaje2 se defiende
        $ataquePersonaje1 = $personaje1->atacar();
        $dañoFinalAPersonaje2 = $personaje2->defender($ataquePersonaje1);
        $personaje2->puntosDeVida -= $dañoFinalAPersonaje2;

        // Personaje2 ataca, Personaje1 se defiende
        $ataquePersonaje2 = $personaje2->atacar();
        $dañoFinalAPersonaje1 = $personaje1->defender($ataquePersonaje2);
        $personaje1->puntosDeVida -= $dañoFinalAPersonaje1;
    }

}