let allProducts = [];
const productsContainer = document.getElementById('productsContainer');
const searchInput = document.getElementById('searchInput');

fetch('https://fakestoreapi.com/products')
    .then(response => response.json())
    .then(data => {
        allProducts = data;
        renderProducts(allProducts);
    })
    .catch(() => {
        productsContainer.innerHTML = '<p>Error al cargar los productos.</p>';
    });

function renderProducts(products) {
    productsContainer.innerHTML = '';
    if (products.length === 0) {
        productsContainer.innerHTML = '<p>No se encontraron productos.</p>';
        return;
    }
    for (const product of products) {
        const productDiv = document.createElement('div');
        productDiv.className = 'product';
        productDiv.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <div class="product-title">${product.title}</div>
            <div class="product-category">${product.category}</div>
            <div class="product-price">$${product.price}</div>
        `;
        productsContainer.appendChild(productDiv);
    }
}

searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value.trim().toLowerCase();
    if (searchValue === '') {
        renderProducts(allProducts);
        return;
    }
    const filteredProducts = allProducts.filter(product =>
        product.category.toLowerCase().includes(searchValue)
    );
    renderProducts(filteredProducts);
});
