document.addEventListener("DOMContentLoaded", () => {

  const form = document.querySelector('#formulario-login');
  const inputNomUser = document.querySelector('#nomuser');
  const inputPassUser =document.querySelector('#passuser');
 
  // ** Async, para que sea una función asincróna
  
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
  
    try {
      const parametros = new FormData();
      parametros.append('operation', 'login');
      parametros.append('nomuser', inputNomUser.value);
      parametros.append('passuser', inputPassUser.value);
  
      const response = await fetch('./app/controllers/Usuario.controller.php', {
        method: 'POST',
        body: parametros
      });
  
      if (!response.ok) {
        throw new Error(`Error HTTP: ${response.status}`);
      }
  
      const data = await response.json();
  
      if (!data.esCorrecto) {
        showToast(data.mensaje, 'WARNING');
      } else {
        
        showToast(`¡${data.mensaje}!`, 'SUCCESS', 2000, './app/views/modo-juego/modo-juego.php');
      }
    } catch (error) {
      console.error('Error en la petición:', error);
      showToast('Error al procesar la solicitud', 'ERROR');
    }
  });
  
});