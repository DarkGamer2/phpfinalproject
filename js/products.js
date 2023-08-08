// products.js

const createProductCard = (productName, productImageURL, productDescription, productPrice) => {
  const productCard = document.createElement('div');
  productCard.classList.add('product');
  
  // Format the price as currency
  const formattedPrice = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD'
  }).format(productPrice);

  // Concatenate the HTML content with class names
  productCard.innerHTML = `
      <img src="${productImageURL}" alt="" class="product-image" />
      <h1 class="productName">${productName}</h1>
      <h3 class="productDescription">${productDescription}</h3>
      <p class="productPrice">${formattedPrice}</p>
      <form method="POST" action="../addtocart.php">
          <input type="hidden" name="product_id" value="">
          <button class="add-to-cart-button"><i class="fa-solid fa-cart-plus"></i> Add To Cart</button>
      </form>
  `;
  
  return productCard;
}

const renderProducts = (data) => {
  const productList = document.getElementById('products-area');
  data.forEach((product) => {
      const productCard = createProductCard(
          product.productName,
          product.productImageURL,
          product.productDescription,
          product.productPrice
      );
      productList.appendChild(productCard);
  });
}

fetch('../getProducts.php')
  .then((response) => response.json())
  .then((data) => {
      renderProducts(data);
  })
  .catch((error) => {
      console.error(`Error fetching products: ${error.message}`);
  });
