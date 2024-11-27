document.getElementById('player-form').addEventListener('submit', async function (event) {
    event.preventDefault();

    console.log('form', this)
    
    const formData = new FormData(this);

    try {
        const response = await fetch('/api/v1/form-guilds', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body: formData
        });

        if (response.ok) {
            this.reset();
            
            Swal.fire({
                icon: "success",
                title: "Sucesso",
                text:   'Player cadastrado com sucesso!'
            });
        } else {
            const data = await response.json();
            console.error('Erro:', data);
            
            Swal.fire({
                title: 'Error!',
                text: 'Falha ao cadastrar. Verifique os dados e tente novamente.',
                icon: 'error',
                confirmButtonText: 'ok'
              })
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Erro na comunicação com o servidor.',
            icon: 'error',
            confirmButtonText: 'ok'
          })
    }
});