export function getInfoCountry(url) {
  fetch(url)
    .then(data => data.json())
    .then(data => console.log(data))
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

export function compareCountries(url) {
  try {
    fetch(url)
      .then(response => response.json())
      .then(data => console.log(data))
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
