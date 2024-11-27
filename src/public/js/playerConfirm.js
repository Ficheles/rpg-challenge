// Seleciona todos os checkboxes com base no atributo "data-id"
const checkboxes = document.querySelectorAll('input[type="checkbox"][data-id]');

// Adiciona evento de "change" a cada checkbox
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', async (event) => {
    const playerId = event.target.getAttribute('data-id'); // Obtém o ID do jogador
    const isChecked = event.target.checked; // Verifica o estado do checkbox

    // Mostra feedback visual ao usuário (opcional)
    event.target.disabled = true;

    try {
      // Faz a requisição para a API para persistir a mudança
      const response = await fetch(`/api/v1/players/${playerId}/confirm`, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ confirmed: isChecked }),
      });

      if (!response.ok) {
        throw new Error('Erro ao salvar alteração!');
      }

      const data = await response.json();
      console.log(`Jogador ${playerId} atualizado com sucesso:`, data);
    } catch (error) {
      console.error('Erro ao atualizar jogador:', error);

      // Reverte o estado do checkbox em caso de erro
      event.target.checked = !isChecked;
      alert('Erro ao salvar alteração. Tente novamente!');
    } finally {
      // Reabilita o checkbox após o término da requisição
      event.target.disabled = false;
    }
  });
});
