  const createProductCard=(productName,productImageURL,productDescription)=>{
    const productCard=document.createElement('div');
    productCard.classList.add('product');
    productCard.innerHTML=`<img src="${productImageURL}" alt="" />`
    productCard.innerHTML=`<h1>${productName}</h1>`
   
    return productCard;
  }

  const renderProducts=(data)=>{
    const productList=document.getElementById('products-area');
    data.forEach((product)=>{
      const productCard=createProductCard(product.productName,product.productDescription,product.productImageURL);
      productList.appendChild(productCard);
    })
  }

  fetch('../getProducts.php')
  .then((response)=>response.json())
  .then((data)=>{
    renderProducts(data);
  })
  .catch((error)=>{
    console.error(`Error fetching products: ${error.message}`);
  });