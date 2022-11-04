"use strict"

const URL = "api/gliders/";

let gliders = [];

let form = document.querySelector('#glider-form');
form.addEventListener('submit', insertGlider);


/**
 * Obtiene todas las tareas de la API REST
 */
async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        gliders = await response.json();

        showGliders();
    } catch(e) {
        console.log(e);
    }
}

/**
 * Inserta la tarea via API REST
 */
async function insertGlider(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let glider = {
        titulo: data.get('name'),
        descripcion: data.get('description'),
        // prioridad: data.get('prioridad'),
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(glider)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nGlider = await response.json();

        // inserto la tarea nuevo
        gliders.push(nGlider);
        showGliders();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deleteGlider(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.glider;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        // eliminar la tarea del arreglo global
        gliders = gliders.filter(glider => glider.id != id);
        showGliders();
    } catch(e) {
        console.log(e);
    }
}

function showGliders() {
    let ul = document.querySelector("#glider-list");
    ul.innerHTML = "";
    for (const glider of gliders) {

        let html = `
            <li class='
                    list-group-item d-flex justify-content-between align-items-center
                    ${ glider.finalizada == 1 ? 'finalizada' : ''}
                '>
                <span> <b>${glider.name}</b> - ${glider.description} </span>
                <div class="ml-auto">
                    ${glider.finalizada != 1 ? `<a href='#' data-glider="${glider.id}" type='button' class='btn btn-success btn-finalize'>Finalizar</a>` : ''}
                    <a href='#' data-glider="${glider.id}" type='button' class='btn btn-danger btn-delete'>Borrar</a>
                </div>
            </li>
        `;

        ul.innerHTML += html;
    }


}

getAll();
