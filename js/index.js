import {
  body,
  buttonSearch,
  countryToSearch,
  searchResponse,
  buttonCompareCountries,
  chooseCountry1Field1,
  chooseCountry1Field2,
  footerHours,
  footerDate,
  footerCountry
} from './elements.js'

import {
  getAllCountries,
  compareCountries,
  updateFooterInf,
  getInfoCountry
} from './functions.js'

updateFooterInf(
  `http://localhost:/selecao/php/countries`,
  footerHours,
  footerDate,
  footerCountry
)

getAllCountries(
  'https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1',
  chooseCountry1Field1,
  chooseCountry1Field2
)

buttonSearch.addEventListener('click', () => {
  if (searchResponse.value !== '') {
    searchResponse.innerHTML = ''
  }
  if (countryToSearch.value === '') {
    return alert('Por favor escolha um pais')
  }
  buttonSearch.disabled = true
  body.classList.add('loading')
  getInfoCountry(
    `http://localhost:/selecao/php/countries=${countryToSearch.value}`,
    searchResponse,
    footerHours,
    footerDate,
    footerCountry,
    buttonSearch,
    body
  )
})

buttonCompareCountries.addEventListener('click', () => {
  if (chooseCountry1Field1.value == '' || chooseCountry1Field2.value == '') {
    alert('Por favor verifique se ambos os paises estao selecionados')
  } else {
    if (searchResponse.value !== '') {
      searchResponse.innerHTML = ''
    }
    buttonCompareCountries.disabled = true
    body.classList.add('loading')
    compareCountries(
      `http://localhost:/selecao/php/countries=${chooseCountry1Field1.value}-${chooseCountry1Field2.value}`,
      buttonCompareCountries,
      searchResponse,
      chooseCountry1Field1.value,
      chooseCountry1Field2.value,
      body
    )
  }
})
