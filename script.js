const container = document.querySelector("#products");

function formatPrice(p) {
    return p.toLocaleString('hu-HU') + " Ft";
}

function renderProducts(data) {
    container.innerHTML = "";

    data.forEach(item => {
        let inStock = item.keszlet > 0;
        let badgeText = inStock ? "Készleten" : "Nincs készleten";
        let buttonText = inStock ? "Kosárba" : "Értesítést kérek";
        
        let cardDiv = document.createElement("div");
        
        cardDiv.className = inStock ? "product-card" : "product-card product-card--inactive";

        cardDiv.innerHTML = `
            <div class="product-image">
                <span class="product-badge">${badgeText}</span>
                <img src="${item.kep}" alt="${item.nev}">
            </div>
            
            <div class="product-content">
                <p class="product-category">${item.kategoria}</p>
                <h1 class="product-title">${item.nev}</h1>
                <p class="product-description">${item.leiras}</p>
                
                <div class="product-info">
                    <div>
                        <span class="info-label">Ár</span>
                        <strong>${formatPrice(item.ar)}</strong>
                    </div>
                    <div>
                        <span class="info-label">Készlet</span>
                        <strong>${item.keszlet} db</strong>
                    </div>
                </div>
                
                <button class="cart-button">${buttonText}</button>
            </div>
        `;

        container.appendChild(cardDiv);
    });
}

fetch("products.json")
    .then(res => res.json())
    .then(data => {
        renderProducts(data);
    })
    .catch(err => {
        console.log("Hiba:", err);
        container.innerHTML = "<p>Hiba történt a termékek betöltésekor.</p>";
    });