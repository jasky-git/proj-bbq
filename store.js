let removeCartItemButtons = document.getElementsByClassName('btn-danger');
for (let i=0; i<removeCartItemButtons.length;i++){
    let button = removeCartItemButtons[i];
    button.addEventListener('click', event => {
        let buttonClicked = event.target;
        buttonClicked.parentElement.remove();
    });
}

function addToCartClicked(event) {
    let button = event.target;
    let shopItem = button.parentElement.parentElement;
    let title = shopItem.getElementsByClassName("item-price")[0].innerText;
    console.log(title);
}

const updateCartTotal = () => {
    let foodItemContainer = document.getElementsByClassName("food-list")[0];
    let foodRows = foodItemContainer.getElementsByClassName("food-row");
}