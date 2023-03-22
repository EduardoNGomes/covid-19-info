import {
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

// localhost:/selecao/php/countries

// 1 pais
// http localhost:/selecao/php/countries=Angola

// 2 paises
// http localhost:/selecao/php/countries=Angola-Brazil

// updateFooterInf(
//   `http://localhost:/selecao/php/countries`,
//   footerHours,
//   footerDate,
//   footerCountry
// )

// getAllCountries(
//   'https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1',
//   chooseCountry1Field1,
//   chooseCountry1Field2
// )

buttonSearch.addEventListener('click', () => {
  getInfoCountry(
    `http://localhost:/selecao/php/countries=${countryToSearch.value}`,
    searchResponse
  )
})

buttonCompareCountries.addEventListener('click', () => {
  if (chooseCountry1Field1.value == '' || chooseCountry1Field2.value == '') {
    alert('Por favor verifique se ambos os paises estao selecionados')
  } else {
    compareCountries(
      `http://localhost:/selecao/php/countries=${chooseCountry1Field1.value}-${chooseCountry1Field2.value}`
    )
  }
})
