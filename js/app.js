"use strict"

const URL = "api/gliders/";

let gliders = [];

let form = document.querySelector('#glider-form');
form.addEventListener('submit', insertGlider);

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

async function insertGlider(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let glider = {
        titulo: data.get('name'),
        descripcion: data.get('description'),
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

        gliders = gliders.filter(glider => glider.id != id);
        showGliders();
    } catch(e) {
        console.log(e);
    }
}

getAll();
