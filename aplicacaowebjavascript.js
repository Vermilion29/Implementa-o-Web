const firstDiv = document.querySelector('.first-step');
const secondtDiv = document.querySelector('.second-step');
const finalDiv = document.querySelector('.final-step');

function go(currentStep,nextStep)
{
    let dNone, dBlock;
    if (currentStep == 1)  
    {
        dNone = firstDiv;
    }

    else if (currentStep == 2)
    {
        dNone = secondtDiv;
    }

    else
    {
        dNone = finalDiv;
    }
    
    dNone.style.display = 'none';

    if (nextStep == 1)  
    {
        dBlock = firstDiv;
    }

    else if (nextStep == 2)
    {
        dBlock = secondtDiv;
    }

    else
    {
        dBlock = finalDiv;
    }
    dBlock.style.display = 'block';
}

function calcularGastoCalorico() 
    {
        // Captura dos dados do formulário
        const genero = document.querySelector('input[name="genero"]:checked').value;
        const idade = parseInt(document.getElementById('idade').value);
        const altura = parseInt(document.getElementById('altura').value);
        const peso = parseInt(document.getElementById('peso').value);
        const atividade = document.querySelector('input[name="atividade"]:checked').value;

        // Variável para a Taxa Metabólica Basal (TMB)
        let tmb;

        // Cálculo da TMB (Fórmula de Harris-Benedict)
        if (genero === "masculino") {
            tmb = 88.36 + (13.4 * peso) + (4.8 * altura) - (5.7 * idade);
        } else {
            tmb = 447.6 + (9.2 * peso) + (3.1 * altura) - (4.3 * idade);
        }

        // Fator de atividade
        let fatorAtividade;
        if (atividade === "sedentario") {
            fatorAtividade = 1.2;
        } else if (atividade === "moderadamente") {
            fatorAtividade = 1.55;
        } else if (atividade === "ativo") {
            fatorAtividade = 1.9;
        }
        

        // Cálculo do gasto energético total (GET)
        const gastoCalorico = tmb * fatorAtividade;

        // Exibe o resultado
        document.getElementById('resultado').innerHTML = `Seu gasto calórico diário é: ${gastoCalorico.toFixed(2)} calorias.`;

        // Exibe a div com o resultado
        
        go(2, 3)
    }