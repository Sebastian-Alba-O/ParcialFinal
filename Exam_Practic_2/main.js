let allProducts = [];
const productsContainer = document.getElementById('productsContainer');
const searchInput = document.getElementById('searchInput');

// Fetch products from API
fetch('https://fakestoreapi.com/products')
    .then(res => res.json())
    .then(data => {
        allProducts = data;
        renderProducts(allProducts);
    });

// Render products
function renderProducts(products) {
    productsContainer.innerHTML = '';
    if (products.length === 0) {
        productsContainer.innerHTML = '<p>No se encontraron productos.</p>';
        return;
    }
    products.forEach(product => {
        const div = document.createElement('div');
        div.className = 'product';
        div.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <div class="product-title">${product.title}</div>
            <div class="product-category">${product.category}</div>
            <div class="product-price">$${product.price}</div>
        `;
        productsContainer.appendChild(div);
    });
}

// Filter by category
searchInput.addEventListener('input', function() {
    const value = this.value.trim().toLowerCase();
    if (value === '') {
        renderProducts(allProducts);
    } else {
        const filtered = allProducts.filter(p => p.category.toLowerCase().includes(value));
        renderProducts(filtered);
    }
});
