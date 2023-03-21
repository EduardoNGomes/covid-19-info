import {
  buttonSearch,
  buttonCompareCountries,
  chooseCountry1Field1,
  chooseCountry1Field2
} from './elements.js'

import { getAllCountries } from './functions.js'

// localhost:/selecao/php/countries

// 1 pais
// http localhost:/selecao/php/countries=Angola

// 2 paises
// http localhost:/selecao/php/countries=Angola-Brazil

getAllCountries(
  'https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1',
  chooseCountry1Field1,
  chooseCountry1Field2
)

buttonCompareCountries.addEventListener('click', () => {
  console.log(chooseCountry1Field1.value)
  console.log(chooseCountry1Field2.value)
})

buttonSearch.addEventListener('click', () => {
  console.log(document.querySelector('#country').value)
})
