@props(['buildings'])
<div id="parkovisko" class="parking-section flex flex-col justify-center items-center mt-20">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl">Parkovacie miesta</h2>

    <div class="buttons">
        <button class="btn active" data-type="podzemne">Podzemné parkovanie</button>
        <button class="btn " data-type="dom">Parkovací dom</button>
    </div>

    <div class="sub-buttons" id="subButtons">
        <button class="sub-btn active" data-floor="a">Suterén</button>
        <button class="sub-btn " data-floor="b">Prízemie</button>
    </div>
    @php
        $podzemne = $buildings->firstWhere('name', 'Podzemne parkovanie');
        $suteren = $buildings->firstWhere('name', 'Suteren');
        $prizemie = $buildings->firstWhere('name', 'Prizemie');
    @endphp
    <div class="building-wrapper w-full md:max-w-3xl">
        <div class="svg-item" id="svg-dom-b">
            @include('svg.dom-parkovisko-a', ['building' => $prizemie])
        </div>
        
        <div class="svg-item" id="svg-dom-a" style="display:none;">
            @include('svg.dom-parkovisko-b', ['building' => $suteren])
        </div>

        <div class="svg-item" id="svg-prizemie" style="display:none;">
            @include('svg.dom-prizemie', ['building' => $podzemne])
        </div>
        <div id="mapTooltip"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    let type = "podzemne";
    let floor = "a";

    const subButtons = document.getElementById("subButtons");
    const tooltip = document.getElementById('mapTooltip');

    const showSVG = () => {

        document.querySelectorAll('.svg-item').forEach(el => {
            el.style.display = 'none';
        });

        if (type === "podzemne") {
            document.getElementById("svg-prizemie").style.display = "block";
            subButtons.style.display = "none";
        } else {
            subButtons.style.display = "block";

            if (floor === "a") {
                document.getElementById("svg-dom-a").style.display = "block";
            } else {
                document.getElementById("svg-dom-b").style.display = "block";
            }
        }
    };

    document.addEventListener('mouseover', (e) => {
        const zone = e.target.closest('.zone-park');
        if (!zone) return;

        tooltip.innerHTML = zone.dataset.info || '';
        tooltip.classList.add('active');
    });

    document.addEventListener('mousemove', (e) => {
        tooltip.style.left = e.clientX + 20 + 'px';
        tooltip.style.top = e.clientY + 20 + 'px';
    });

    document.addEventListener('mouseout', (e) => {
        const zone = e.target.closest('.zone-park');
        if (!zone) return;

        tooltip.classList.remove('active');
    });

    document.addEventListener('click', (e) => {
        const zone = e.target.closest('.zone-park');
        if (!zone) return;

        const url = zone.dataset.url;
        if (url) window.location.href = url;
    });

    document.querySelectorAll(".btn").forEach(btn => {
        btn.addEventListener("click", () => {
            type = btn.dataset.type;

            document.querySelectorAll(".btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            showSVG();
        });
    });

    document.querySelectorAll(".sub-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            floor = btn.dataset.floor;

            document.querySelectorAll(".sub-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            showSVG();
        });
    });

    showSVG();
});
</script>
<style>
.buttons,
.sub-buttons {
    margin: 5px 0;
}

button {
    padding: 8px 16px;
    border: 1px solid #ccc;
    background: white;
    cursor: pointer;
}

button.active {
    background: black;
    color: white;
}

.svg-container img {
    max-width: 100%;
}

.zone-park {
    cursor: pointer;
    transition: 0.2s;
    fill-opacity: 0.4;
}

.zone-park.available { fill: #2add638a; }
.zone-park.reserved { fill: orange; }
.zone-park.sold { fill: #FFB9B9; }

.zone-park:hover {
    fill-opacity: 0.8;
}

#mapTooltip {
    position: fixed;
    background: black;
    color: white;
    padding: 6px 10px;
    font-size: 12px;
    opacity: 0;
    pointer-events: none;
}

#mapTooltip.active {
    opacity: 1;
}
</style>


