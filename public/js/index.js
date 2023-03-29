const inputSearch = document.getElementById('search');
const btnSearch = document.getElementById('submit');
const getCards = document.querySelectorAll('.allCards');

inputSearch.addEventListener('keyup', sortRecipes);
btnSearch.addEventListener('click', sortRecipes);

function sortRecipes(event) {

    const getValue = inputSearch.value.toLowerCase();

    getCards.forEach(function(card){
        if(card.querySelector('h5').textContent.includes(getValue)) {
            card.style.display='flex'
        } else {
            card.style.display='none'
        }
    })
}