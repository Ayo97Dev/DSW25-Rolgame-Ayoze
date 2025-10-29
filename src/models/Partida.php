<?php
namespace Dsw\Rolgame\models;

class Partida {
    private array $personajes = [];

    public function agregarPersonaje(Personaje $personaje): void {
        $this->personajes[] = $personaje;
    }

    public function obtenerPersonajes(): array {
        return $this->personajes;
    }

    public function eliminarPersonaje(Personaje $personajeAEliminar): void {
        $this->personajes = array_filter($this->personajes, function($personaje) use ($personajeAEliminar) {
            return $personaje !== $personajeAEliminar;
        });
        // Reindexar el array para mantener índices secuenciales
        $this->personajes = array_values($this->personajes);
    }

    public function obtenerPersonajesPorClase(string $clase): array {
        return array_filter($this->personajes, function($personaje) use ($clase) {
            return $personaje instanceof $clase;
        });
    }

    public function eliminaMuertos(): void {
        $this->personajes = array_filter($this->personajes, function($personaje) {
            return $personaje->puntosDeVida > 0;
        });
        // Reindexar el array para mantener índices secuenciales
        $this->personajes = array_values($this->personajes);
    }
}