<?php
namespace Dsw\Rolgame;

class Partida {
    private array $personajes = [];

    public function agregarPersonaje(Personaje $personaje): void {
        $this->personajes[] = $personaje;
    }

    public function obtenerPersonajes(): array {
        return $this->personajes;
    }

    /**
     * Elimina un personaje específico de la partida
     * 
     * Esta función remueve un personaje del array de personajes de la partida.
     * Utiliza array_filter para crear un nuevo array que excluye el personaje
     * que se desea eliminar, manteniendo todos los demás.
     * 
     * @param Personaje $personajeAEliminar El personaje que se desea eliminar
     * @return void
     */
    public function eliminarPersonaje(Personaje $personajeAEliminar): void {
        // Filtrar el array manteniendo solo los personajes que NO sean el que queremos eliminar
        // array_filter() crea un nuevo array con los elementos que pasan la condición del callback
        // La función anónima (closure) compara cada personaje con el que queremos eliminar
        // usando el operador !== que verifica identidad de objeto (no solo igualdad de valores)
        $this->personajes = array_filter($this->personajes, function($personaje) use ($personajeAEliminar) {
            return $personaje !== $personajeAEliminar; // Mantener si NO es el mismo objeto
        });
        
        // Reindexar el array para mantener índices secuenciales (0, 1, 2, ...)
        // array_filter() preserva las claves originales, lo que puede dejar huecos
        // Por ejemplo: si teníamos [0=>obj1, 1=>obj2, 2=>obj3] y eliminamos obj2,
        // quedaría [0=>obj1, 2=>obj3]. array_values() lo convierte en [0=>obj1, 1=>obj3]
        $this->personajes = array_values($this->personajes);
    }

    public function obtenerPersonajesPorClase(string $clase): array {
        return array_filter($this->personajes, function($personaje) use ($clase) {
            return $personaje instanceof $clase;
        });
    }

    public function eliminarMuertos(): void {
        $this->personajes = array_filter($this->personajes, function($personaje) {
            return $personaje->puntosDeVida > 0;
        });
        // Reindexar el array para mantener índices secuenciales
        $this->personajes = array_values($this->personajes);
    }
}