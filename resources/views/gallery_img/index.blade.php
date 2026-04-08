@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-10 md:py-21">

        <div class="flex gap-4 justify-center mt-20">
            <button data-category="all" class="filter-btn active cursor-pointer">Všetko</button>
            <button data-category="exterier" class="filter-btn cursor-pointer">Exteriér</button>
            <button data-category="interier" class="filter-btn cursor-pointer">Interiér</button>
            <button data-category="videa" class="filter-btn cursor-pointer">Videá</button>
        </div>
        <div id="subcat-container" class="flex gap-2 justify-center mb-6 mt-5"></div>
        <div id="gallery-container" class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5 m-5">
        
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".filter-btn");
    const container = document.getElementById("gallery-container");
    const subcatContainer = document.getElementById("subcat-container");

    const subcategories = {
        interier: ['4i', '3i', '2i', '2.2i']
    };

    function loadGallery(category = 'all', subcategory = null) {
        container.classList.add('opacity-50');

        let url = `/gallery_img/filter?category=${category}`;
        if (subcategory) url += `&subcategory=${subcategory}`;

        fetch(url)
            .then(res => res.text())
            .then(data => {
                container.innerHTML = data;
                container.classList.remove('opacity-50');
                animateItems();
            });

        // 👉 передаём активную подкатегорию
        renderSubcategories(category, subcategory);
    }

    function animateItems() {
        const items = document.querySelectorAll('.gallery-item');
        items.forEach((item, index) => {
            setTimeout(() => {
                item.classList.remove('opacity-0', 'translate-y-5');
            }, index * 100);
        });
    }

    function renderSubcategories(category, activeSub = null) {
        if (subcategories[category]) {
            subcatContainer.innerHTML = '';

            subcategories[category].forEach(sub => {
                const btn = document.createElement('button');
                btn.textContent = sub;
                btn.dataset.subcategory = sub;

                btn.className = 'filter-sub-btn bg-gray-200 px-4 py-1 cursor-pointer';

                if (sub === activeSub) {
                    btn.classList.add('active');
                }

                btn.addEventListener('click', () => {
                    subcatContainer.querySelectorAll('button').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    loadGallery(category, sub);
                });

                subcatContainer.appendChild(btn);
            });
        } else {
            subcatContainer.innerHTML = '';
        }
    }
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;

            let defaultSub = null;

            if (category === 'interier') {
                defaultSub = '4i';
            }

            history.pushState(null, '', `?category=${category}`);
            loadGallery(category, defaultSub);
        });
    });

    const urlParams = new URLSearchParams(window.location.search);
    const startCategory = urlParams.get('category') || 'all';

    buttons.forEach(b => b.classList.remove('active'));
    document.querySelector(`[data-category="${startCategory}"]`)?.classList.add('active');

    let startSub = null;
    if (startCategory === 'interier') {
        startSub = '4i';
    }

    loadGallery(startCategory, startSub);
});
</script>

<style>
.filter-btn {
    padding: 8px 16px;
    background: #eee;
    transition: 0.3s;
}

.filter-btn.active {
    background: black;
    color: white;
}

.filter-sub-btn.active {
    background: black;
    color: white;
}
</style>
@endsection