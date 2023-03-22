export function getInfoCountry(
  url,
  searchResponseElement,
  footerHourElement,
  footerDateElement,
  footerCountryElement,
  buttonSearch
) {
  try {
    fetch(url)
      .then(data => data.json())
      .then(data => {
        let allDataOfCountry = JSON.parse(data.data)

        let numberDeath = 0
        let numberConfirmed = 0

        for (let index in allDataOfCountry) {
          numberDeath += allDataOfCountry[index].Mortos
          numberConfirmed += allDataOfCountry[index].Confirmados
        }
        const numberConfirmedText = document.createElement(`h4`)
        numberConfirmedText.innerHTML = `
        Numero de total de confirmados <span>${numberConfirmed}</span>
        `

        const numberDeathText = document.createElement(`h4`)
        numberDeathText.innerHTML = `
        Numero de total de falecidos: <span>${numberDeath}</span>
        `
        searchResponseElement.appendChild(numberDeathText)
        searchResponseElement.appendChild(numberConfirmedText)

        for (let index in allDataOfCountry) {
          const div = document.createElement('div')
          div.classList.add('infoCard')
          div.innerHTML = `
            <p>Estado: <span>${allDataOfCountry[index].ProvinciaEstado}</span></p>
            <p>Pais: <span>${allDataOfCountry[index].Pais}</span></p>
            <p>Numero de casos confirmados no estado: <span>${allDataOfCountry[index].Confirmados}</span></p>
            <p>Numero de pessoas que vieram a obito no estado: <span>${allDataOfCountry[index].Mortos}</span></p>
        `
          searchResponseElement.appendChild(div)
        }

        footerHourElement.innerHTML = data.lastCountry.hour
        footerDateElement.innerHTML = data.lastCountry.updated_at
        footerCountryElement.innerHTML = data.lastCountry.name

        buttonSearch.disabled = false
      })
  } catch (error) {
    console.log(error)
  }
}

export function getAllCountries(
  url,
  chooseCountry1Field1,
  chooseCountry1Field2
) {
  try {
    fetch(url)
      .then(response => response.json())
      .then(countries => {
        chooseCountry1Field1.disabled = false
        chooseCountry1Field2.disabled = false
        for (let country in countries) {
          let option = document.createElement('option')
          option.setAttribute('value', countries[country])
          option.textContent = countries[country]
          let option2 = option.cloneNode(true)
          chooseCountry1Field1.appendChild(option)
          chooseCountry1Field2.appendChild(option2)
        }
      })
  } catch (error) {
    console.log(error)
  }
}

export function compareCountries(
  url,
  buttonCompareCountries,
  searchResponseElement,
  fistCountry,
  secondCountry
) {
  try {
    fetch(url)
      .then(response => response.json())
      .then(data => {
        searchResponseElement.innerHTML = `
        <h4>Paises escolhidos: <span>${fistCountry} X ${secondCountry}</span> </h4>
        <h4>Diferenca entre a taxa de mortalidade: <span>${(
          data.percentageDeathFistCountry - data.percentageDeathSecondCountry
        ).toFixed(2)}%</span></h4>
          <div class="infoCard">
            <p>Pais: <span>${fistCountry}</span></p>
            <p>Numero de confirmados com covid-19: <span>${
              data.confirmedFistCountry
            }</span></p>
            <p>Numero de obitos devido ao covid-19: <span>${
              data.deadFistCountry
            }</span></p>
            <p>Taxa de mortalidade: <span>${data.percentageDeathFistCountry.toFixed(
              2
            )}%</span></p>
          </div>
          <div class="infoCard">
            <p>Pais: <span>${secondCountry}</span></p>
            <p>Numero de confirmados com covid-19: <span>${
              data.confirmedSecondCountry
            }</span></p>
            <p>Numero de obitos devido ao covid-19: <span>${
              data.deadSecondCountry
            }</span></p>
            <p>Taxa de mortalidade: <span>${data.percentageDeathSecondCountry.toFixed(
              2
            )}%</span></p>
          </div>

      `
        buttonCompareCountries.disabled = false
      })
  } catch (error) {
    console.log(error)
  }
}

export function updateFooterInf(url, hourElement, dateElement, countryElement) {
  try {
    fetch(url)
      .then(response => response.json())
      .then(data => {
        hourElement.innerHTML = data.hour
        dateElement.innerHTML = data.updated_at
        countryElement.innerHTML = data.name
      })
  } catch (error) {
    console.log(error)
  }
}
