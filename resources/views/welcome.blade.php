<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍔 Cardápio Food</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
        .snap-x { scroll-snap-type: x mandatory; }
        .snap-center { scroll-snap-align: center; }
        .gradient-text { background: linear-gradient(135deg, #f97316, #dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        @media (max-width: 640px) { .container { padding: 0 0.5rem; } }
    </style>
</head>
<body class="bg-gradient-to-b from-orange-50 to-amber-50 dark:from-slate-900 dark:to-gray-800 min-h-screen text-gray-900 dark:text-gray-100">
    
    <!-- Header -->
    <header class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-md sticky top-0 z-50 shadow-md border-b border-gray-200/50 dark:border-gray-800/50">
        <div class="container py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl sm:text-3xl font-bold gradient-text">
                    <i class="fas fa-utensils mr-3"></i>Food Cardápio
                </h1>
                <div class="flex items-center gap-4">
                    <a href="/admin" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-cog mr-2"></i>Admin
                    </a>
                    <button onclick="toggleCart()" class="relative p-4 bg-orange-500 hover:bg-orange-600 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="cart-count" class="bg-red-500 text-white text-xs font-bold w-7 h-7 rounded-full flex items-center justify-center absolute -top-2 -right-2 shadow-lg">0</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="text-center py-20 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl p-12 rounded-3xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 mb-12">
                <i class="fas fa-pizza-slice text-6xl text-orange-500 mb-8 inline-block animate-bounce"></i>
                <h1 class="text-4xl sm:text-5xl font-bold mb-6 gradient-text">Cardápio Completo</h1>
                <p class="text-xl text-gray-700 dark:text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed">
                    Escolha seus pratos favoritos e peça direto no WhatsApp. Rápido e fácil!
                </p>
                <button onclick="toggleCart()" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 mx-auto flex items-center gap-3">
                    <i class="fab fa-whatsapp"></i> Ver Carrinho
                </button>
            </div>
        </div>
    </section>

    <!-- Categorias -->
    <section class="py-20 bg-white/50 dark:bg-gray-900/30 backdrop-blur-sm">
        <div class="container">
            <h2 class="text-3xl font-bold text-center mb-12 gradient-text">Categorias</h2>
            <div id="categorias" class="flex overflow-x-auto gap-4 pb-8 snap-x snap-mandatory scrollbar-hide">
                <!-- Categorias dinâmicas aqui -->
            </div>
        </div>
    </section>

    <!-- Produtos -->
    <section class="py-20">
        <div class="container">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-bold gradient-text flex items-center gap-3">
                    <i class="fas fa-list"></i>Nossos Pratos
                </h2>
                <span id="produtos-count" class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full font-semibold">Carregando...</span>
            </div>
            <div id="produtos" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Produtos aqui -->
            </div>
        </div>
    </section>

    <!-- Carrinho Modal -->
    <div id="cart-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden flex items-center justify-center p-8">
        <div class="bg-white dark:bg-gray-900 w-full max-w-2xl max-h-[90vh] rounded-3xl shadow-2xl overflow-y-auto border border-gray-200 dark:border-gray-700">
            <div class="sticky top-0 bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 rounded-t-3xl shadow-xl z-10">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold flex items-center gap-3">
                        <i class="fas fa-shopping-cart"></i>Carrinho
                    </h3>
                    <button onclick="closeCart()" class="p-3 hover:bg-white/20 rounded-xl transition-all">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div id="cart-items" class="p-8">
                <p class="text-center py-20 text-gray-500">Carrinho vazio - adicione itens acima!</p>
            </div>
            
            <div class="p-8 bg-gray-50 dark:bg-gray-800 border-t sticky bottom-0">
                <div id="cart-total-section" class="hidden mb-8 p-6 bg-white rounded-2xl shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xl font-bold">Total:</span>
                        <span id="cart-total" class="text-3xl font-black text-green-600">R$ 0,00</span>
                    </div>
                    <a id="whatsapp-btn" href="#" class="w-full block bg-green-500 hover:bg-green-600 text-white text-center py-4 px-8 rounded-2xl font-bold text-xl shadow-xl hover:shadow-2xl transition-all">
                        <i class="fab fa-whatsapp mr-3"></i>Enviar Pedido WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const WHATSAPP_PHONE = '+558388603796'; // Seu número!
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        let allProducts = [];
        let filteredProducts = [];
        let currentCategory = 0;

        // Mock data - substitua por sua API
        let categories = [{id: 0, name: 'Tudo', icon: 'fas fa-th-large'}];

        async function loadData() {
            try {
                const [produtosRes, categoriasRes] = await Promise.all([
                    fetch('/api/produtos'),
                    fetch('/api/categorias')
                ]);

                if (!produtosRes.ok || !categoriasRes.ok) {
                    throw new Error('Erro ao carregar dados');
                }

                allProducts = await produtosRes.json();
                const apiCategorias = await categoriasRes.json();
                
                // Formatar categorias API
                categories = [{id: 0, name: 'Tudo', icon: 'fas fa-th-large'}, ...apiCategorias.map(cat => ({
                    id: cat.id,
                    name: cat.nome,
                    icon: 'fas fa-tag'
                }))];

                filteredProducts = [...allProducts];
                renderCategories();
                renderProducts();
                document.getElementById('produtos-count').textContent = filteredProducts.length + ' produtos';
                
            } catch (error) {
                console.error('Erro API:', error);
                document.getElementById('produtos').innerHTML = `
                    <div class="col-span-full text-center py-20">
                        <i class="fas fa-exclamation-triangle text-6xl text-orange-500 mb-6"></i>
                        <p class="text-2xl text-gray-500 mb-4">Erro ao carregar cardápio</p>
                    </div>
                `;
            }
        }

        // Functions hoisted
       window.toggleCart = function() {
    const modal = document.getElementById('cart-modal');
    modal.classList.toggle('hidden');
    
    if (!modal.classList.contains('hidden')) {
        document.body.style.overflow = 'hidden';
        updateCartContent();
    } else {
        document.body.style.overflow = 'auto';

        // 🔥 ATUALIZA AO FECHAR
        renderProducts();
    }
}

        window.closeCart = function() {
            document.getElementById('cart-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function addToCart(productId) {
    const product = allProducts.find(p => p.id === productId);

    let cartItem = cart.find(item => item.id === productId);

    if (cartItem) {
        cartItem.quantity++;
    } else {
        cart.push({
            id: product.id,
            name: product.nome, // 🔥 CORRIGIDO
            description: product.descricao,
            price: parseFloat(product.preco) || 0,
            image: product.imagem,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
    renderProducts();
    showToast('Item adicionado ao carrinho!');
}

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-24 right-6 bg-green-500 text-white px-8 py-4 rounded-2xl shadow-2xl z-[10000] transform translate-x-full transition-transform duration-300 flex items-center gap-3';
            toast.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span>${message}</span>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }

      function updateCartContent() {
    const container = document.getElementById('cart-items');

    const total = cart.reduce((sum, item) => 
        sum + (parseFloat(item.price || 0) * item.quantity), 0
    );

    // 🛒 Carrinho vazio
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-20">
                <i class="fas fa-shopping-cart text-6xl text-gray-400 mb-6"></i>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Carrinho Vazio</h3>
                <p class="text-lg text-gray-600 mb-8">Adicione itens do menu acima</p>
                <button onclick="toggleCart()" 
                    class="px-8 py-3 bg-orange-500 text-white rounded-xl font-bold hover:bg-orange-600 transition-all">
                    Continuar Comprando
                </button>
            </div>
        `;
        document.getElementById('cart-total-section')?.classList.add('hidden');
        return;
    }

    // 💰 Total
    document.getElementById('cart-total-section')?.classList.remove('hidden');
    document.getElementById('cart-total').textContent =
        `R$ ${total.toFixed(2).replace('.', ',')}`;

    // 🧾 Itens
    container.innerHTML = cart.map(item => {
        const subtotal = (item.price * item.quantity).toFixed(2);

        const imagem = item.image
            ? (item.image.startsWith('http')
                ? item.image
                : '/storage/' + item.image)
            : '/images/no-image.png';

        return `
            <div class="flex items-center gap-4 p-4 mb-4 rounded-xl 
                        bg-white/5 hover:bg-white/10 transition border border-gray-700">

                <!-- IMAGEM -->
                <img src="${imagem}" 
                     class="w-20 h-20 object-cover rounded-lg" />

                <!-- INFO -->
                <div class="flex-1">
                    <h4 class="font-bold text-lg">${item.name}</h4>
                    <p class="text-sm text-gray-400">${item.description || ''}</p>

                    <span class="text-orange-500 font-bold">
                        R$ ${item.price.toFixed(2).replace('.', ',')}
                    </span>
                </div>

                <!-- QUANTIDADE -->
                <div class="flex items-center gap-2">
                    <button onclick="changeQuantity(${item.id}, -1)" 
                        class="w-8 h-8 bg-gray-700 hover:bg-gray-600 rounded-lg">-</button>

                    <span class="font-bold">${item.quantity}</span>

                    <button onclick="changeQuantity(${item.id}, 1)" 
                        class="w-8 h-8 bg-gray-700 hover:bg-gray-600 rounded-lg">+</button>
                </div>

                <!-- SUBTOTAL -->
                <div class="text-green-500 font-bold w-24 text-right">
                    R$ ${subtotal.replace('.', ',')}
                </div>

                <!-- REMOVER -->
                <button onclick="removeItem(${item.id})" 
                    class="text-red-500 hover:text-red-600 ml-2">
                    <i class="fas fa-trash"></i>
                </button>

            </div>
        `;
    }).join('');

    document.getElementById('whatsapp-btn').onclick = sendWhatsAppOrder;
}

        function changeQuantity(id, delta) {
            const item = cart.find(item => item.id === id);
            if (item) {
                item.quantity = Math.max(1, item.quantity + delta);
                if (item.quantity === 0) {
                    cart = cart.filter(i => i.id !== id);
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
                updateCartContent();
            }
        }

        function removeItem(id) {
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
            updateCartContent();
        }

        function sendWhatsAppOrder() {
            if (cart.length === 0) return;
            
            let message = "🛒 *PEDIDO NOVO*\n\n";
            let total = 0;
            
            cart.forEach(item => {
                const subtotal = item.price * item.quantity;
                message += `${item.quantity}x ${item.name} - R$ ${subtotal.toFixed(2).replace('.', ',')}\n`;
                total += subtotal;
            });
            
            message += `\n*Total: R$ ${total.toFixed(2).replace('.', ',')}*`;
            
            window.open(`https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(message)}`, '_blank');
        }

        // Global event listener for dynamic product buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('[data-product-id]')) {
                const btn = e.target.closest('[data-product-id]');
                const productId = parseInt(btn.dataset.productId);
                addToCart(productId);
            }
        });

        function init() {
            loadData();
            updateCartUI();
        }

       function renderCategories() {
    const container = document.getElementById('categorias');

    container.innerHTML = categories.map(cat => `
        <button 
            onclick="filterProducts('${cat.id}')" 
            data-cat="${cat.id}" 

            class="flex items-center gap-3 px-6 py-3 rounded-xl text-sm font-semibold 
                   transition-all duration-300 whitespace-nowrap mx-2 snap-center

                   ${currentCategory == cat.id 
                        ? 'bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-lg scale-105' 
                        : 'bg-white/80 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-orange-100 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-700'}"
        >

            <i class="${cat.icon} text-lg 
                ${currentCategory == cat.id ? 'text-white' : 'text-orange-500'}">
            </i>

            <span>${cat.name}</span>

        </button>
    `).join('');
}

       function filterProducts(catId) {
    currentCategory = parseInt(catId);

    // animação de saída
    const container = document.getElementById('produtos');
    container.classList.add('opacity-50', 'scale-[0.98]');

    setTimeout(() => {
        filteredProducts = currentCategory === 0
            ? [...allProducts]
            : allProducts.filter(p => parseInt(p.categoria_id) === currentCategory);

        renderCategories();
        renderProducts();

        document.getElementById('produtos-count').textContent =
            `${filteredProducts.length} produto${filteredProducts.length !== 1 ? 's' : ''}`;

        // animação de entrada
        container.classList.remove('opacity-50', 'scale-[0.98]');
    }, 150);
}

      function renderProducts() {
    const container = document.getElementById('produtos');

    if (filteredProducts.length === 0) {
        container.innerHTML = `
            <div class="col-span-full text-center py-20">
                <i class="fas fa-box-open text-6xl text-gray-400 mb-6"></i>
                <p class="text-2xl font-semibold text-gray-500">Nenhum produto encontrado</p>
                <p class="text-gray-400">Tente outra categoria</p>
            </div>
        `;
        return;
    }

    container.innerHTML = filteredProducts.map(product => {
        const cartItem = cart.find(item => item.id === product.id);

        const preco = parseFloat(product.preco) || 0;
        const precoFormatado = preco.toFixed(2).replace('.', ',');

        const imagem = product.imagem
            ? (product.imagem.startsWith('http')
                ? product.imagem
                : '/storage/' + product.imagem)
            : '/images/no-image.png';

        return `
            <div class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl 
                        rounded-2xl shadow-md hover:shadow-2xl 
                        transition-all duration-300 overflow-hidden 
                        border border-gray-200/50 dark:border-gray-700/50 
                        hover:border-orange-400 group hover:-translate-y-1">

                <!-- Badge Promo -->
                ${product.precoOriginal && product.preco < product.precoOriginal ? `
                    <div class="absolute top-3 left-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full shadow z-10">
                        Promo
                    </div>
                ` : ''}

                <!-- Imagem -->
                <div class="overflow-hidden">
                    <img 
                        src="${imagem}" 
                        alt="${product.nome}"
                        class="w-full h-44 object-cover group-hover:scale-110 transition duration-500"
                        loading="lazy"
                    >
                </div>

                <!-- Conteúdo -->
                <div class="p-5 flex flex-col h-full">

                    <h3 class="font-bold text-lg mb-1 group-hover:text-orange-500 transition">
                        ${product.nome}
                    </h3>

                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                        ${product.descricao || ''}
                    </p>

                    <div class="mt-auto">

                        <!-- Preço -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-xl font-bold text-orange-500">
                                    R$ ${precoFormatado}
                                </span>

                                ${product.precoOriginal && product.preco < product.precoOriginal ? `
                                    <span class="text-sm text-gray-400 line-through ml-2">
                                        R$ ${parseFloat(product.precoOriginal).toFixed(2).replace('.', ',')}
                                    </span>
                                ` : ''}
                            </div>

                            ${cartItem ? `
                                <span class="bg-green-500/20 text-green-400 px-2 py-1 rounded-lg text-xs font-bold backdrop-blur">
                                    ${cartItem.quantity}x
                                </span>
                            ` : ''}
                        </div>

                        <!-- Botão -->
                        <button 
                            data-product-id="${product.id}" 
                            class="w-full py-3 rounded-xl font-semibold text-white 
                                   transition-all duration-300 shadow-md hover:shadow-lg active:scale-95

                                   ${cartItem 
                                        ? 'bg-green-500 hover:bg-green-600' 
                                        : 'bg-gradient-to-r from-orange-500 to-red-500 hover:opacity-90'}">

                            <i class="fas ${cartItem ? 'fa-check' : 'fa-plus'} mr-2"></i>
                            ${cartItem ? `No Carrinho (${cartItem.quantity})` : 'Adicionar'}
                        </button>

                    </div>
                </div>
            </div>
        `;
    }).join('');
}
        function updateCartUI() {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cart-count').textContent = totalItems || 0;
            
            const cartIcon = document.querySelector('button[onclick="toggleCart()"] i');
            if (cartIcon && totalItems > 0) {
                cartIcon.classList.add('animate-bounce');
            } else if (cartIcon) {
                cartIcon.classList.remove('animate-bounce');
            }
        }

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-24 right-6 bg-green-500 text-white px-8 py-4 rounded-2xl shadow-2xl z-[10000] transform translate-x-full transition-transform duration-300 flex items-center gap-3';
            toast.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span>${message}</span>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }

        // Remove duplicate - already defined above

function changeQuantity(id, delta) {
    const item = cart.find(item => item.id === id);

    if (item) {
        item.quantity += delta;

        if (item.quantity <= 0) {
            cart = cart.filter(i => i.id !== id);
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        updateCartUI();
        updateCartContent();
        renderProducts(); // 🔥 ESSA LINHA FALTAVA
    }
}

        function removeItem(id) {
    cart = cart.filter(item => item.id !== id);

    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartUI();
    updateCartContent();
    renderProducts(); // 🔥 ESSA LINHA FALTAVA
}

       function closeCart() {
    document.getElementById('cart-modal').classList.add('hidden');
    document.body.style.overflow = 'auto';

    // 🔥 ATUALIZA A TELA
    renderProducts();
}

        function sendWhatsAppOrder() {
            if (cart.length === 0) return;
            
            let message = "🛒 *PEDIDO NOVO*\n\n";
            let total = 0;
            
            cart.forEach(item => {
                const subtotal = item.price * item.quantity;
                message += `${item.quantity}x ${item.name} - R$ ${subtotal.toFixed(2).replace('.', ',')}\n`;
                total += subtotal;
            });
            
            message += `\n*Total: R$ ${total.toFixed(2).replace('.', ',')}*`;
            
            window.open(`https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(message)}`);
        }

        init();
    </script>
</body>
</html>

