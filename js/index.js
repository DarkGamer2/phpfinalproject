const productContainer=document.getElementsByClassName('product-container');

// Fetch data using JavaScript
fetch('../getProducts.php')
  .then(response => response.json())
  .then(data => {
    // Parse and display data
    const dataList = document.getElementById('product-row');
    data.map(item => {
      
      
     
      const image=document.createElement('img');
      const productName = document.createElement('h1');
      productName.classList.add('product-name');
      const productDescription = document.createElement('p');
      productName.textContent = item.productName;
      productDescription.textContent = item.productDescription;
      image.src=item.productImageURL;
     
      dataList.appendChild(image);
      dataList.appendChild(productName);
    });
  })
  .catch(error => console.error(error));

  document.addEventListener("DOMContentLoaded", function () {
    const darkButton = document.querySelector(".dark-button");
  
    darkButton.addEventListener("click", function () {
      document.body.classList.toggle("dark-mode");
      darkButton.classList.toggle("active");
    });
  
    // Check user's preference for dark mode (if previously set)
    const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (prefersDarkMode) {
      document.body.classList.add("dark-mode");
      darkButton.classList.add("active");
    }
  });