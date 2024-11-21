document.addEventListener('DOMContentLoaded', function() {
    fetchCategorias();
});

async function fetchCategorias() {
    try {
        const response = await fetch('../../app/controllers/Categoria.controller.php', {
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
            a.href = '../../app/views/niveles/seccion-nivel.php';
            a.textContent = categoria.categoria;
            li.classList.add('list-group-item');
            li.appendChild(a);
            lista.appendChild(li);
        });
    } catch (error) {
        console.error('Error al obtener categorías:', error);
        const lista = document.getElementById('categorias-list');
        lista.innerHTML = '<li class="list-group-item error">Error al cargar las categorías. Por favor, intente más tarde.</li>';
    }
}
