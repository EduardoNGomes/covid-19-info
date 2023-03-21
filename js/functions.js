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
