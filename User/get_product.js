let productsContainer = document.getElementById("prod");

async function getprod() {
  let products = await (await fetch("products.php")).json();

  displaProducts(products);
}

function displaProducts(products) {
  for (const prod of products) {
    productsContainer.innerHTML += `
    <div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
      <div class="product-image">
      <img src="../Admin/images/product_image/${prod.picture}" style="width="1263px" ; height="200px" ">
      </div>
      <h3>${prod.name}</h3>
      <p class="product-price">${prod.price}<span class="a-price-symbol">EGP</span></p>
      <button href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
 
        `;
  }
}

getprod();
