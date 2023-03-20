// * Botao para realizar a primeira pesquisa

const buttonSearch = document.querySelector('#search')

// Chamada para API
buttonSearch.addEventListener('click', () => {
  console.log(document.querySelector('#country').value)
})

// Botao para
const choose = document.querySelector('#choose')

choose.addEventListener('click', () => {
  const selectField = document.querySelector('#country2')
  selectField.disabled = false
  fetch('https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1')
    .then(response => response.json())
    .then(countries => {
      for (let country in countries) {
        let option = document.createElement('option')
        option.setAttribute('value', countries[country])
        option.textContent = countries[country]
        selectField.appendChild(option)
      }
    })
})

const buttonSearch2 = document.querySelector('#searchDiferentCountries')

buttonSearch2.addEventListener('click', () => {
  console.log(document.querySelector('#country2').value)
})
