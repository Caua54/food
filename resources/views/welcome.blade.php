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
        .gradient-text { color: #000; background: none; -webkit-text-fill-color: #000; }
        .bottom-cart-safe { padding-bottom: 7rem; }
        .cart-drawer {
            top: 0;
            right: 0;
            height: 100vh;
            width: min(88vw, 390px);
            transform: translateX(100%);
        }
        .cart-drawer.is-open {
            transform: translateX(0);
        }
        .cart-item-row {
            padding: 0.75rem;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }
        .cart-item-image {
            width: 2.5rem;
            height: 2.5rem;
        }
        .cart-qty-btn {
            width: 1.75rem;
            height: 1.75rem;
        }
        @media (max-width: 640px) { .container { padding: 0 0.5rem; } }
        @media (max-width: 640px) {
            .cart-drawer {
                top: 0;
                right: 0;
                height: 100vh;
                width: min(92vw, 360px);
                border-radius: 1.25rem 0 0 1.25rem;
            }
            .cart-item-row {
                padding: 0.5rem;
                gap: 0.5rem;
                margin-bottom: 0.4rem;
                border-radius: 0.75rem;
            }
            .cart-item-image {
                width: 2rem;
                height: 2rem;
                border-radius: 0.5rem;
            }
            .cart-qty-btn {
                width: 1.5rem;
                height: 1.5rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body class="bg-white dark:from-slate-900 dark:to-gray-800 min-h-screen text-black bottom-cart-safe">
    
    <!-- Header -->
    <header class="bg-white backdrop-blur-md sticky top-0 z-50 shadow-md border-b border-white">
        <div class="container py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl sm:text-3xl font-bold gradient-text">
                    <i class="fas fa-utensils mr-3"></i>Food Cardápio
                </h1>
                <div class="flex items-center gap-4">
                    <button onclick="focusSearch()" class="p-4 bg-orange-500 hover:bg-orange-600 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300" title="Buscar produtos">
                        <i class="fas fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="text-center py-12 sm:py-20 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-orange-50 backdrop-blur-xl p-6 sm:p-12 rounded-3xl shadow-2xl border border-orange-100 mb-8 sm:mb-12">
                <div class="mx-auto mb-4 rounded-2xl border-2 border-orange-300 bg-orange-50 flex items-center justify-center overflow-hidden" style="width: clamp(62px, 8vw, 76px); height: clamp(62px, 8vw, 76px);">
                    <img src="https://picsum.photos/120" alt="Logo de teste" class="w-full h-full object-cover">
                </div>
                <i class="fas fa-pizza-slice text-5xl sm:text-6xl text-orange-500 mb-5 sm:mb-8 inline-block animate-bounce"></i>
                <h1 class="text-3xl sm:text-5xl font-bold mb-4 sm:mb-6 gradient-text">Cardápio Completo</h1>
                <p class="text-base sm:text-xl text-black mb-8 sm:mb-12 max-w-2xl mx-auto leading-relaxed">
                    Escolha seus pratos favoritos e peça direto no WhatsApp. Rápido e fácil!
                </p>
                <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 mb-6 sm:mb-8 px-6 py-3 rounded-2xl border-2 border-blue-200 bg-gradient-to-br from-blue-50 to-cyan-50 hover:from-blue-100 hover:to-cyan-100 text-blue-700 font-semibold shadow-sm hover:shadow-md transition-all duration-200">
                    <i class="fas fa-map-marker-alt"></i>
                    Nos Encontre
                </a>
                <button onclick="toggleCart()" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-8 sm:px-12 py-4 sm:py-6 rounded-3xl font-bold text-lg sm:text-xl shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 mx-auto flex items-center gap-3">
                    <i class="fab fa-whatsapp"></i> Ver Carrinho
                </button>

                <!-- Divisória -->
                <div class="flex items-center gap-3 mt-10 mb-2 px-4">
                    <div class="flex-1 h-px bg-orange-100"></div>
                    <span class="text-xs text-gray-400 font-medium whitespace-nowrap">nos siga</span>
                    <div class="flex-1 h-px bg-orange-100"></div>
                </div>

                <!-- Redes Sociais -->
                <div class="flex items-center justify-center gap-3 mt-4 flex-wrap">
                    <a href="https://instagram.com" target="_blank"
                       class="flex items-center gap-2 px-4 py-2 rounded-2xl border-2 border-pink-200 bg-gradient-to-br from-pink-50 to-orange-50 hover:from-pink-100 hover:to-orange-100 hover:border-pink-400 transition-all duration-200 group shadow-sm hover:shadow-md">
                        <i class="fab fa-instagram text-lg" style="color:#e1306c;"></i>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-pink-600 transition">Instagram</span>
                    </a>
                    <a href="https://wa.me/5583998465703" target="_blank"
                       class="flex items-center gap-2 px-4 py-2 rounded-2xl border-2 border-green-200 bg-gradient-to-br from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 hover:border-green-400 transition-all duration-200 group shadow-sm hover:shadow-md">
                        <i class="fab fa-whatsapp text-lg" style="color:#25d366;"></i>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-green-600 transition">WhatsApp</span>
                    </a>
                    <a href="mailto:seuemail@email.com"
                       class="flex items-center gap-2 px-4 py-2 rounded-2xl border-2 border-orange-200 bg-gradient-to-br from-orange-50 to-amber-50 hover:from-orange-100 hover:to-amber-100 hover:border-orange-400 transition-all duration-200 group shadow-sm hover:shadow-md">
                        <i class="fas fa-envelope text-lg" style="color:#f97316;"></i>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-orange-600 transition">E-mail</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorias -->
    <section class="py-12 sm:py-20 bg-orange-50">
        <div class="container">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-8 sm:mb-12 gradient-text">Categorias</h2>
            <div id="categorias" class="flex overflow-x-auto gap-4 pb-8 snap-x snap-mandatory scrollbar-hide">
                <!-- Categorias dinâmicas aqui -->
            </div>
        </div>
    </section>

    <!-- Produtos -->
    <section class="py-12 sm:py-20">
        <div class="container">
            <!-- Banner Combos -->
            <div class="flex items-center justify-between bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl px-5 py-4 mb-8 shadow-md">
                <div class="flex items-center gap-3 text-white">
                    <i class="fas fa-box-open text-2xl"></i>
                    <div>
                        <p class="font-bold text-sm sm:text-base leading-tight">Temos Combos Especiais!</p>
                        <p class="text-orange-100 text-xs sm:text-sm">Veja nossas ofertas exclusivas</p>
                    </div>
                </div>
                <a href="#section-combos" class="flex-shrink-0 bg-white text-orange-600 font-bold text-sm px-4 py-2 rounded-xl hover:bg-orange-50 transition shadow">
                    <i class="fas fa-arrow-down mr-1"></i>Ver Combos
                </a>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sm:gap-6 mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold gradient-text flex items-center gap-3">
                    <i class="fas fa-list"></i>Nossos Pratos
                </h2>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="relative w-full sm:w-80">
                        <i class="fas fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-orange-500"></i>
                        <input id="search-input" type="text" placeholder="Buscar produto..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-orange-200 bg-white/90 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>
                    <span id="produtos-count" class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full font-semibold whitespace-nowrap">Carregando...</span>
                </div>
            </div>
            <div id="produtos" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-8">
                <!-- Produtos aqui -->
            </div>
        </div>
    </section>

    <!-- Combos -->
    <section id="section-combos" class="py-12 sm:py-20 bg-orange-50">
        <div class="container">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sm:gap-6 mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold gradient-text flex items-center gap-3">
                    <i class="fas fa-box-open text-orange-500"></i>Combos Especiais
                </h2>
                <span id="combos-count" class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full font-semibold whitespace-nowrap">Carregando...</span>
            </div>
            <div id="combos" class="flex overflow-x-auto gap-5 pb-4 snap-x snap-mandatory scrollbar-hide" style="-webkit-overflow-scrolling:touch;">
                <!-- Combos aqui -->
            </div>
        </div>
    </section>

    <!-- Barra Carrinho Inferior -->
    <div id="cart-bottom-bar" class="hidden fixed bottom-4 left-1/2 -translate-x-1/2 z-40 w-[calc(100%-1.5rem)] sm:w-[min(720px,95vw)]">
        <button onclick="toggleCart()" class="w-full bg-white text-black rounded-2xl shadow-2xl px-5 py-4 flex items-center justify-between gap-4 hover:opacity-95 transition-all duration-300 border border-white">
            <div class="flex items-center gap-3">
                <span id="bottom-cart-count" class="bg-white/25 px-3 py-1 rounded-full text-sm font-bold">0 itens</span>
                <span class="font-semibold">Ver carrinho</span>
            </div>
            <span id="bottom-cart-total" class="text-lg font-black text-red-700" style="color: #dc2626;">R$ 0,00</span>
        </button>
    </div>

    <!-- Carrinho Modal -->
    <!-- Overlay do carrinho -->
    <button id="cart-overlay" type="button" class="hidden fixed inset-0 bg-slate-900/35 backdrop-blur-[2px] z-40 opacity-0 transition-opacity duration-300" aria-label="Fechar carrinho" onclick="closeCart()" onkeydown="if(event.key === 'Enter' || event.key === ' ' || event.key === 'Escape'){ closeCart(); }"></button>

    <!-- Drawer lateral direito -->
    <div id="cart-modal" class="cart-drawer fixed z-50 transition-transform duration-300 ease-in-out flex flex-col rounded-3xl border border-orange-200/70 bg-white backdrop-blur-xl shadow-[0_20px_60px_rgba(0,0,0,0.28)] overflow-hidden">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-4 sm:px-5 py-3 sm:py-4 border-b border-orange-100/80 bg-white backdrop-blur flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-500 via-red-500 to-amber-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="fas fa-shopping-bag text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="font-bold text-black text-base leading-tight">Meu Carrinho</h3>
                    <p id="cart-header-count" class="text-xs text-black">0 itens</p>
                </div>
            </div>
            <button onclick="closeCart()" class="w-9 h-9 flex items-center justify-center rounded-xl bg-white hover:bg-orange-200/70 transition text-orange-700 border border-orange-100">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- LISTA DE ITENS -->
        <div id="cart-items" class="flex-1 overflow-y-auto px-3 sm:px-4 py-2 sm:py-3 space-y-2">
            <div class="text-center py-16">
                <div class="w-16 h-16 rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shopping-bag text-2xl text-orange-300"></i>
                </div>
                <p class="font-semibold text-black mb-1">Carrinho vazio</p>
                <p class="text-sm text-black">Adicione itens do cardápio</p>
            </div>
        </div>

        <!-- RODAPÉ COM TOTAL -->
        <div id="cart-total-section" class="hidden flex-shrink-0 border-t border-orange-100/80 bg-white px-4 sm:px-5 py-3 sm:py-4">
            <div class="flex justify-between items-center mb-3">
                <span class="text-sm text-black font-medium">Total do pedido</span>
                <span id="cart-total" class="text-xl sm:text-2xl font-black text-red-700" style="color: #dc2626;">R$ 0,00</span>
            </div>
            <button id="whatsapp-btn" type="button" onclick="openCheckoutForm()" class="w-full flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 active:scale-95 text-white py-3 sm:py-4 rounded-2xl font-bold text-sm sm:text-base shadow-lg transition-all duration-200">
                <i class="fab fa-whatsapp text-xl"></i>Enviar pelo WhatsApp
            </button>
        </div>

    </div>

    <!-- Modal Dados do Pedido -->
    <button id="checkout-overlay" type="button" onclick="closeCheckoutForm()" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.45); z-index:9998;" aria-label="Fechar formulário de pedido"></button>
    <div id="checkout-modal" style="display:none; position:fixed; z-index:9999; left:50%; top:50%; transform:translate(-50%,-50%); width:min(92vw,560px); max-height:90vh; overflow-y:auto; background:#fff; border-radius:1.5rem; box-shadow:0 25px 60px rgba(0,0,0,0.25); border:1px solid #fed7aa; padding:1.5rem;">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg sm:text-xl font-bold text-black">Dados para Entrega</h3>
            <button type="button" onclick="closeCheckoutForm()" class="w-9 h-9 rounded-xl bg-orange-50 hover:bg-orange-100 text-orange-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="checkout-form" class="space-y-4">
            <div>
                <label for="checkout-name" class="block text-sm font-semibold text-black mb-1">Nome</label>
                <input id="checkout-name" type="text" required class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Seu nome completo">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label for="checkout-street" class="block text-sm font-semibold text-black mb-1">Rua</label>
                    <input id="checkout-street" type="text" required class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Rua do endereço">
                </div>
                <div>
                    <label for="checkout-number" class="block text-sm font-semibold text-black mb-1">Número</label>
                    <input id="checkout-number" type="text" required class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Número da casa">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label for="checkout-cep" class="block text-sm font-semibold text-black mb-1">CEP</label>
                    <input id="checkout-cep" type="text" required class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="00000-000">
                </div>
                <div>
                    <label for="checkout-payment" class="block text-sm font-semibold text-black mb-1">Método de Pagamento</label>
                    <select id="checkout-payment" required class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400 bg-white">
                        <option value="">Selecione</option>
                        <option value="Pix">Pix</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="checkout-notes" class="block text-sm font-semibold text-black mb-1">Observações (opcional)</label>
                <textarea id="checkout-notes" rows="3" class="w-full px-4 py-3 rounded-xl border border-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Ex.: ponto de referência, troco para..."></textarea>
            </div>

            <div class="bg-orange-50 rounded-xl px-4 py-3 flex items-center justify-between">
                <span class="font-semibold text-black">Total do pedido</span>
                <span id="checkout-total" class="text-lg font-black text-red-700" style="color: #dc2626;">R$ 0,00</span>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3.5 rounded-2xl shadow-lg transition-all">
                Confirmar e Enviar no WhatsApp
            </button>
        </form>
    </div>

    <script>
        const WHATSAPP_PHONE = '5583998465703';
        let cart = JSON.parse(localStorage.getItem('cart') || '[]').map(item => ({
            ...item,
            quantity: Math.max(1, Number(item.quantity) || 1),
            price: Number(item.price) || 0,
        }));
        localStorage.setItem('cart', JSON.stringify(cart));
        let allProducts = [];
        let filteredProducts = [];
        let allCombos = [];
        let currentCategory = 0;
        let searchTerm = '';

        // Mock data - substitua por sua API
        let categories = [{id: 0, name: 'Tudo', icon: 'fas fa-th-large'}];

        async function loadData() {
            try {
                const [produtosRes, categoriasRes, combosRes] = await Promise.all([
                    fetch('/api/produtos'),
                    fetch('/api/categorias'),
                    fetch('/api/combos')
                ]);

                if (!produtosRes.ok || !categoriasRes.ok) {
                    throw new Error('Erro ao carregar dados');
                }

                allProducts = await produtosRes.json();
                const apiCategorias = await categoriasRes.json();
                allCombos = combosRes.ok ? await combosRes.json() : [];

                // Formatar categorias API
                categories = [{id: 0, name: 'Tudo', icon: 'fas fa-th-large'}, ...apiCategorias.map(cat => ({
                    id: cat.id,
                    name: cat.nome,
                    icon: 'fas fa-tag'
                }))];

                syncCartWithCurrentCatalog();

                applyFilters();
                renderCategories();
                renderProducts();
                renderCombos();
                updateCartUI();
                document.getElementById('produtos-count').textContent = filteredProducts.length + ' produtos';
                
            } catch (error) {
                console.error('Erro API:', error);
                document.getElementById('produtos').innerHTML = `
                    <div class="col-span-full text-center py-20">
                        <i class="fas fa-exclamation-triangle text-6xl text-orange-500 mb-6"></i>
                        <p class="text-2xl text-black mb-4">Erro ao carregar cardápio</p>
                    </div>
                `;
            }
        }

        function syncCartWithCurrentCatalog() {
            if (!Array.isArray(allProducts) || allProducts.length === 0 || !Array.isArray(cart) || cart.length === 0) {
                return;
            }

            let changed = false;

            cart = cart.map(item => {
                const current = allProducts.find(product => Number(product.id) === Number(item.id));
                if (!current) {
                    return item;
                }

                const nextPrice = parseFloat(current.preco) || 0;
                const normalizedItem = {
                    ...item,
                    name: current.nome ?? item.name,
                    description: current.descricao ?? item.description,
                    image: current.imagem ?? item.image,
                    price: nextPrice,
                    quantity: Math.max(1, Number(item.quantity) || 1),
                };

                if (
                    normalizedItem.name !== item.name ||
                    normalizedItem.description !== item.description ||
                    normalizedItem.image !== item.image ||
                    Number(normalizedItem.price) !== Number(item.price) ||
                    Number(normalizedItem.quantity) !== Number(item.quantity)
                ) {
                    changed = true;
                }

                return normalizedItem;
            });

            if (changed) {
                localStorage.setItem('cart', JSON.stringify(cart));
            }
        }

        async function refreshCartPricesFromApi() {
            try {
                const response = await fetch('/api/produtos');
                if (!response.ok) {
                    return;
                }

                allProducts = await response.json();
                syncCartWithCurrentCatalog();
                applyFilters();
                renderProducts();

                const countEl = document.getElementById('produtos-count');
                if (countEl) {
                    countEl.textContent = `${filteredProducts.length} produto${filteredProducts.length !== 1 ? 's' : ''}`;
                }
            } catch (error) {
                console.error('Erro ao atualizar promoções do carrinho:', error);
            }
        }

        // Functions hoisted
        window.toggleCart = async function() {
            const modal = document.getElementById('cart-modal');
            const overlay = document.getElementById('cart-overlay');
            const isOpen = modal.classList.contains('is-open');

            if (isOpen) {
                modal.classList.remove('is-open');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
                document.body.style.overflow = 'auto';
                renderProducts();
            } else {
                await refreshCartPricesFromApi();
                updateCartUI();
                overlay.classList.remove('hidden');
                requestAnimationFrame(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                });
                modal.classList.add('is-open');
                document.body.style.overflow = 'hidden';
                updateCartContent();
            }
        }

        window.closeCart = function() {
            const modal = document.getElementById('cart-modal');
            const overlay = document.getElementById('cart-overlay');
            modal.classList.remove('is-open');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
            document.body.style.overflow = 'auto';
            renderProducts();
        }

        function addToCart(productId) {
    const product = allProducts.find(p => p.id === productId);

    let cartItem = cart.find(item => item.id === productId);

    if (cartItem) {
        cartItem.quantity = (Number(cartItem.quantity) || 0) + 1;
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
            <div class="text-center py-10 sm:py-20">
                <i class="fas fa-shopping-cart text-6xl text-black mb-6"></i>
                <h3 class="text-2xl font-bold text-black mb-4">Carrinho Vazio</h3>
                <p class="text-lg text-black mb-8">Adicione itens do menu acima</p>
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
            <div class="cart-item-row flex items-center rounded-xl bg-white hover:bg-orange-50/90 transition border border-orange-100 shadow-sm">

                <!-- IMAGEM -->
                <img src="${imagem}" class="cart-item-image object-cover rounded-lg flex-shrink-0" />

                <!-- INFO + CONTROLES -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <h4 class="font-bold text-sm leading-tight truncate">${item.name}</h4>
                            <span class="text-red-700 font-bold text-sm" style="color: #dc2626;">R$ ${item.price.toFixed(2).replace('.', ',')}</span>
                        </div>
                        <button onclick="removeItem(${JSON.stringify(item.id)})" class="text-red-500 hover:text-red-400 flex-shrink-0 p-1">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <div class="flex items-center gap-1">
                            <button onclick="changeQuantity(${JSON.stringify(item.id)}, -1)" class="cart-qty-btn bg-orange-100 text-orange-700 hover:bg-orange-200 rounded-md text-sm font-bold transition">-</button>
                            <span class="font-bold text-xs sm:text-sm w-6 text-center">${item.quantity}</span>
                            <button onclick="changeQuantity(${JSON.stringify(item.id)}, 1)" class="cart-qty-btn bg-orange-100 text-orange-700 hover:bg-orange-200 rounded-md text-sm font-bold transition">+</button>
                        </div>
                        <span class="text-red-700 font-bold text-xs sm:text-sm" style="color: #dc2626;">R$ ${subtotal.replace('.', ',')}</span>
                    </div>
                </div>

            </div>
        `;
    }).join('');

}

        function changeQuantity(id, delta) {
            const item = cart.find(item => String(item.id) === String(id));
            if (item) {
                item.quantity = Math.max(1, item.quantity + delta);
                if (item.quantity === 0) {
                    cart = cart.filter(i => String(i.id) !== String(id));
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
                updateCartContent();
                renderCombos();
            }
        }

        function removeItem(id) {
            cart = cart.filter(item => String(item.id) !== String(id));
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
            updateCartContent();
            renderCombos();
        }

        window.openCheckoutForm = async function() {
            if (cart.length === 0) {
                showToast('Seu carrinho está vazio.');
                return;
            }

            await refreshCartPricesFromApi();
            updateCartUI();
            updateCartContent();

            // Fecha o carrinho
            closeCart();

            // Atualiza total
            const total = cart.reduce((sum, item) => sum + ((parseFloat(item.price) || 0) * (Number(item.quantity) || 0)), 0);
            document.getElementById('checkout-total').textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;

            // Exibe modal
            document.getElementById('checkout-overlay').style.display = 'block';
            document.getElementById('checkout-modal').style.display = 'block';
            document.body.style.overflow = 'hidden';

            setTimeout(() => document.getElementById('checkout-name')?.focus(), 150);
        }

        window.closeCheckoutForm = function() {
            document.getElementById('checkout-overlay').style.display = 'none';
            document.getElementById('checkout-modal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function sendWhatsAppOrder(customerData) {
            if (cart.length === 0) return;

            let total = 0;
            let itensMensagem = '';

            cart.forEach((item, index) => {
                const subtotal = (parseFloat(item.price) || 0) * (Number(item.quantity) || 0);
                total += subtotal;
                itensMensagem += `${index + 1}. ${item.quantity}x ${item.name} - R$ ${subtotal.toFixed(2).replace('.', ',')}\n`;
            });

            const observacoes = customerData.notes ? `\n📝 *Observações:* ${customerData.notes}` : '';

            const message =
`🛒 *PEDIDO NOVO*\n\n` +
`👤 *Cliente:* ${customerData.name}\n\n` +
`📍 *Endereço de entrega*\n` +
`Rua: ${customerData.street}\n` +
`Número: ${customerData.number}\n` +
`CEP: ${customerData.cep}\n\n` +
`💳 *Pagamento:* ${customerData.payment}\n\n` +
`🧾 *Itens do pedido*\n${itensMensagem}\n` +
`💰 *Total:* R$ ${total.toFixed(2).replace('.', ',')}` +
`${observacoes}`;

            const phoneDigits = WHATSAPP_PHONE.replace(/\D/g, '');
            window.open(`https://wa.me/${phoneDigits}?text=${encodeURIComponent(message)}`, '_blank');
        }

        // Global event listener for dynamic product buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('[data-product-id]')) {
                const btn = e.target.closest('[data-product-id]');
                const productId = parseInt(btn.dataset.productId);
                addToCart(productId);
            }
            if (e.target.closest('[data-combo-id]')) {
                const btn = e.target.closest('[data-combo-id]');
                const comboId = parseInt(btn.dataset.comboId);
                addComboToCart(comboId);
            }
        });

        function init() {
            loadData();
            updateCartUI();

            const checkoutForm = document.getElementById('checkout-form');
            if (checkoutForm) {
                checkoutForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const name = document.getElementById('checkout-name')?.value.trim() || '';
                    const street = document.getElementById('checkout-street')?.value.trim() || '';
                    const number = document.getElementById('checkout-number')?.value.trim() || '';
                    const cep = document.getElementById('checkout-cep')?.value.trim() || '';
                    const payment = document.getElementById('checkout-payment')?.value || '';
                    const notes = document.getElementById('checkout-notes')?.value.trim() || '';

                    if (!name || !street || !number || !cep || !payment) {
                        showToast('Preencha todos os campos obrigatórios.');
                        return;
                    }

                    sendWhatsAppOrder({ name, street, number, cep, payment, notes });
                    closeCheckoutForm();
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCheckoutForm();
                }
            });
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
        applyFilters();

        renderCategories();
        renderProducts();

        document.getElementById('produtos-count').textContent =
            `${filteredProducts.length} produto${filteredProducts.length !== 1 ? 's' : ''}`;

        // animação de entrada
        container.classList.remove('opacity-50', 'scale-[0.98]');
    }, 150);
}

        function applyFilters() {
            const normalized = searchTerm.trim().toLowerCase();

            filteredProducts = allProducts.filter(product => {
                const inCategory = currentCategory === 0 || parseInt(product.categoria_id) === currentCategory;
                if (!inCategory) return false;

                if (!normalized) return true;

                const name = (product.nome || '').toLowerCase();
                const description = (product.descricao || '').toLowerCase();
                return name.includes(normalized) || description.includes(normalized);
            });
        }

            function formatPriceBRL(value) {
        const numeric = Number(value);
        const safe = Number.isFinite(numeric) ? numeric : 0;
        return safe.toFixed(2).replace('.', ',');
}

      function renderProducts() {
    const container = document.getElementById('produtos');

    if (filteredProducts.length === 0) {
        container.innerHTML = `
            <div class="col-span-full text-center py-20">
                <i class="fas fa-box-open text-6xl text-black mb-6"></i>
                <p class="text-2xl font-semibold text-black">Nenhum produto encontrado</p>
                <p class="text-black">Tente outra categoria</p>
            </div>
        `;
        return;
    }

    container.innerHTML = filteredProducts.map(product => {
        const cartItem = cart.find(item => Number(item.id) === Number(product.id));

        const precoAtual = Number(product.preco);
        const precoOriginal = Number(product.precoOriginal);
        const precoSeguro = Number.isFinite(precoAtual) ? precoAtual : (Number.isFinite(precoOriginal) ? precoOriginal : 0);
        const precoFormatado = formatPriceBRL(precoSeguro);
        const temPromo = Number.isFinite(precoOriginal) && precoSeguro < precoOriginal;

        const imagem = product.imagem
            ? (product.imagem.startsWith('http')
                ? product.imagem
                : '/storage/' + product.imagem)
            : '/images/no-image.png';

        return `
            <div class="relative bg-white backdrop-blur-xl 
                        rounded-2xl shadow-md hover:shadow-2xl 
                        transition-all duration-300 overflow-hidden 
                        border border-white flex flex-col
                        hover:border-orange-400 group hover:-translate-y-1">

                <!-- Badge Promo -->
                ${temPromo ? `
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
                <div class="p-5 flex flex-col flex-1">

                    <h3 class="font-bold text-lg mb-1 group-hover:text-black transition text-black">
                        ${product.nome}
                    </h3>

                    <p class="text-black text-sm mb-4 line-clamp-2">
                        ${product.descricao || ''}
                    </p>

                    <div class="mt-auto" style="margin-top:auto; border-top:1px solid #f1f5f9; padding-top:12px;">
                        <div style="display:flex; align-items:center; justify-content:space-between; gap:8px; margin-bottom:12px;">
                            <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                                <span style="display:inline-block; color:#dc2626; font-size:1.125rem; font-weight:800; line-height:1;">
                                    R$ ${precoFormatado}
                                </span>
                                ${temPromo ? `
                                    <span style="color:#ef4444; font-size:0.875rem; text-decoration:line-through;">
                                        R$ ${formatPriceBRL(precoOriginal)}
                                    </span>
                                ` : ''}
                            </div>

                            ${cartItem ? `
                                <span style="background:#dcfce7; color:#166534; padding:2px 8px; border-radius:999px; font-size:12px; font-weight:700;">
                                    ${cartItem.quantity}x
                                </span>
                            ` : ''}
                        </div>

                        <button
                            data-product-id="${product.id}"
                            type="button"
                            style="display:block; width:100%; border:none; border-radius:12px; padding:12px; color:#fff; font-weight:700; cursor:pointer; background:${cartItem ? '#16a34a' : 'linear-gradient(90deg,#f97316,#ef4444)'};">
                            <i class="fas ${cartItem ? 'fa-check' : 'fa-plus'}" style="margin-right:8px;"></i>
                            ${cartItem ? `No Carrinho (${cartItem.quantity})` : 'Adicionar'}
                        </button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

        function renderCombos() {
            const container = document.getElementById('combos');
            const countEl = document.getElementById('combos-count');

            if (!Array.isArray(allCombos) || allCombos.length === 0) {
                container.innerHTML = `
                    <div class="w-full text-center py-12">
                        <i class="fas fa-box-open text-5xl text-orange-300 mb-4"></i>
                        <p class="text-lg font-semibold text-gray-500">Nenhum combo disponivel no momento</p>
                    </div>
                `;
                if (countEl) countEl.textContent = '0 combos';
                return;
            }

            if (countEl) countEl.textContent = allCombos.length + ' combo' + (allCombos.length !== 1 ? 's' : '');

            container.innerHTML = allCombos.map(combo => {
                const cartItem = cart.find(item => Number(item.id) === Number('c_' + combo.id) || item.comboId === combo.id);
                const precoFormatado = formatPriceBRL(combo.preco);

                const imagem = combo.imagem
                    ? (combo.imagem.startsWith('http') ? combo.imagem : '/storage/' + combo.imagem)
                    : '/images/no-image.png';

                return `
                    <div class="relative bg-white rounded-2xl shadow-md hover:shadow-2xl
                                transition-all duration-300 overflow-hidden flex flex-col
                                border-2 border-orange-200 hover:border-orange-400 group hover:-translate-y-1
                                flex-shrink-0 snap-center w-64 sm:w-72">

                        <!-- Badge Combo -->
                        <div class="absolute top-3 left-3 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs px-3 py-1 rounded-full shadow z-10 font-bold">
                            <i class="fas fa-box-open mr-1"></i>Combo
                        </div>

                        <!-- Imagem -->
                        <div class="overflow-hidden">
                            <img
                                src="${imagem}"
                                alt="${combo.nome}"
                                class="w-full h-44 object-cover group-hover:scale-110 transition duration-500"
                                loading="lazy"
                            >
                        </div>

                        <!-- Conteudo -->
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="font-bold text-lg mb-1 text-black group-hover:text-orange-600 transition">
                                ${combo.nome}
                            </h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                                ${combo.descricao || ''}
                            </p>

                            <div style="margin-top:auto; border-top:1px solid #fed7aa; padding-top:12px;">
                                <div style="display:flex; align-items:center; justify-content:space-between; gap:8px; margin-bottom:12px;">
                                    <span style="display:inline-block; color:#ea580c; font-size:1.125rem; font-weight:800; line-height:1;">
                                        R$ ${precoFormatado}
                                    </span>
                                    ${cartItem ? `
                                        <span style="background:#dcfce7; color:#166534; padding:2px 8px; border-radius:999px; font-size:12px; font-weight:700;">
                                            ${cartItem.quantity}x
                                        </span>
                                    ` : ''}
                                </div>

                                <button
                                    data-combo-id="${combo.id}"
                                    type="button"
                                    style="display:block; width:100%; border:none; border-radius:12px; padding:12px; color:#fff; font-weight:700; cursor:pointer; background:${cartItem ? '#16a34a' : 'linear-gradient(90deg,#ea580c,#f97316)'};">
                                    <i class="fas ${cartItem ? 'fa-check' : 'fa-plus'}" style="margin-right:8px;"></i>
                                    ${cartItem ? 'No Carrinho (' + cartItem.quantity + ')' : 'Adicionar Combo'}
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function addComboToCart(comboId) {
            const combo = allCombos.find(c => c.id === comboId);
            if (!combo) return;

            let cartItem = cart.find(item => item.comboId === comboId);
            if (cartItem) {
                cartItem.quantity = (Number(cartItem.quantity) || 0) + 1;
            } else {
                cart.push({
                    id: 'c_' + comboId,
                    comboId: comboId,
                    name: combo.nome,
                    description: combo.descricao,
                    price: parseFloat(combo.preco) || 0,
                    image: combo.imagem,
                    quantity: 1,
                    isCombo: true,
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
            renderCombos();
            showToast('Combo adicionado ao carrinho!');
        }

        function updateCartUI() {
            const totalItems = cart.reduce((sum, item) => sum + (Number(item.quantity) || 0), 0);
            const totalValue = cart.reduce((sum, item) => sum + ((parseFloat(item.price) || 0) * item.quantity), 0);
            const bottomBar = document.getElementById('cart-bottom-bar');
            const bottomCount = document.getElementById('bottom-cart-count');
            const bottomTotal = document.getElementById('bottom-cart-total');

            if (bottomCount) {
                bottomCount.textContent = `${totalItems} item${totalItems !== 1 ? 's' : ''}`;
            }

            if (bottomTotal) {
                bottomTotal.textContent = `R$ ${totalValue.toFixed(2).replace('.', ',')}`;
            }

            if (bottomBar) {
                if (totalItems > 0) {
                    bottomBar.classList.remove('hidden');
                } else {
                    bottomBar.classList.add('hidden');
                }
            }
        }

        window.focusSearch = function() {
            const input = document.getElementById('search-input');
            if (!input) return;

            input.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(() => input.focus(), 250);
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



        init();

        const searchInput = document.getElementById('search-input');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                searchTerm = e.target.value;
                applyFilters();
                renderProducts();
                document.getElementById('produtos-count').textContent =
                    `${filteredProducts.length} produto${filteredProducts.length !== 1 ? 's' : ''}`;
            });
        }
    </script>
</body>
</html>

