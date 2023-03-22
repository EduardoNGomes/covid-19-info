import {
  buttonSearch,
  buttonCompareCountries,
  chooseCountry1Field1,
  chooseCountry1Field2
} from './elements.js'

import { getAllCountries, compareCountries } from './functions.js'

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
  compareCountries(
    `http://localhost:/selecao/php/countries=${chooseCountry1Field1.value}-${chooseCountry1Field2.value}`
  )
})

buttonSearch.addEventListener('click', () => {})
