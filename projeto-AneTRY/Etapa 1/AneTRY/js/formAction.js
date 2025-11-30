document.addEventListener('DOMContentLoaded', () => {
  const params = new URLSearchParams(window.location.search);
  document.getElementById('resultado-nome').textContent = params.get('nome');
  document.getElementById('resultado-nota').textContent = params.get('nota');
  document.getElementById('resultado-review').textContent = params.get('review');
});
