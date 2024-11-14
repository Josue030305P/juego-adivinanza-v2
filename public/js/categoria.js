document.addEventListener('DOMContentLoaded', function() {
    fetchCategorias();
});

async function fetchCategorias() {
    try {
        
        const response = await fetch('/juego-v2/app/controllers/Categoria.controller.php', {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        const lista = document.getElementById('categorias-list');
        lista.innerHTML = ''; 

        data.forEach(categoria => {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '/juego-v2/app/views/niveles/seccion-nivel.php';
            li.appendChild(a);
            li.classList.add('list-group-item')
            a.textContent = categoria.categoria;
            lista.appendChild(li);
        });
    } catch (error) {
        console.error('Error al obtener categorías:', error);
        const lista = document.getElementById('categorias-list');
        lista.innerHTML = '<li class="error">Error al cargar las categorías. Por favor, intente más tarde.</li>';
    }
}