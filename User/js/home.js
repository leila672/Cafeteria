const buttons = document.getElementsByClassName("cart-btn");

for (let index = 0; index < buttons.length; index++) {
  buttons[index].addEventListener("click", () => {
    buttons[index].setAttribute("disabled", "true");

    const cartTable = document.getElementsByClassName("cart-table")[0];
    let tRow = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");

    const imgSource =
      buttons[index].parentElement.children[0].children[0].getAttribute("src");
    const nameOfProduct = buttons[index].parentElement.children[1].innerHTML;
    const priceOfProduct =
      buttons[index].parentElement.children[2].innerHTML.split("<")[0];
    const quantityElemnt = `<td class="product-quantity"><input type="number" min="0" value="1"></td>`;
    td1.innerText = "X";
    let img = document.createElement("img");
    img.setAttribute("src", imgSource);
    td2.appendChild(img);
    td3.innerText = nameOfProduct;
    td4.innerText = priceOfProduct;
    td5.innerHTML = quantityElemnt;
    td6.innerText = priceOfProduct;

    tRow.appendChild(td1);
    tRow.appendChild(td2);
    tRow.appendChild(td3);
    tRow.appendChild(td4);
    tRow.appendChild(td5);
    tRow.appendChild(td6);

    cartTable.childNodes[3].appendChild(tRow);

    const inputs = document.querySelectorAll("input[type=number]");
    inputs.forEach((input) => {
      input.addEventListener("change", () => {
        if (
          input.parentElement.parentElement.children[2].innerText == nameOfProduct) {

             const totalPriceofProduct = Number(priceOfProduct) * input.value;

          input.parentElement.parentElement.children[5].innerText = totalPriceofProduct;

            
        }
      }); 
    });


   const totalTable = document.getElementsByClassName("total-table"); 

   const totalNumberinString = totalTable[0].children[1].children[0].children[1].innerText ;

 
   totalTable[0].children[1].children[0].children[1].innerText = Number(totalNumberinString)+Number( td6.innerText ); 



       
  });
}
