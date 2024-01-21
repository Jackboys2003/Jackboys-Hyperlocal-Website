const products = [
    { title: 'milk', link: 'product1.html' },
    { title: 'Vegetables', link: '#vegetables' },
    { title: 'Bakery', link: '#bakery' },
    { title: 'kurkure', link: 'product2.html' },
    { title: 'Household Essentials', link: '#household' },
    { title: 'Beverages', link: '#beverages' },
    { title: 'rice', link: 'product3.html' },
];

function searchProducts() {
    const searchTerm = document.getElementById('searchBar').value.toLowerCase();
    const categorySection = document.getElementById('categories');
    categorySection.innerHTML = ''; 

    const filteredProducts = products.filter(product => product.title.toLowerCase().includes(searchTerm));

    filteredProducts.forEach(product => {
        const categoryDiv = document.createElement('div');
        categoryDiv.className = 'category';
        const categoryLink = document.createElement('a');
        categoryLink.href = product.link;
        const categoryImg = document.createElement('img');
        categoryImg.src = `./images/${product.title.toLowerCase()}.jpg`;
        categoryImg.alt = product.title;
        const categoryText = document.createElement('p');
        categoryText.textContent = product.title;

        categoryLink.appendChild(categoryImg);
        categoryLink.appendChild(categoryText);
        categoryDiv.appendChild(categoryLink);
        categorySection.appendChild(categoryDiv);
    });
}
