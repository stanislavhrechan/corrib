<style>
  .zone.available:hover {
      fill: #00FF51;
      fill-opacity: .26;
  }

  .zone.reserved:hover {
      fill: #FFD700;
      fill-opacity: .26;
  }

  .zone.sold:hover {
      fill: #FF0000;
      fill-opacity: .26;
  }
</style>
<svg class="w-full h-full" viewBox="0 0 1161 626" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <image 
      href="../images/house.webp"
      width="1161"
      height="626"
    />

    <path class="zone {{ $floorStatuses[10] ?? 'sold' }}"  data-url="/floor/10" data-info="10NP • {{ $floorData[10]['text'] ?? 'vypredané' }}" d="M369.518 80H259L288.389 101.497H259.414V129.664H373.244L376.969 133H762.335L767.716 129.664L901 128.923V101.497H863.747L901 80.3706H767.716L762.749 84.8182H377.383L369.518 80Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[9] ?? 'sold' }}"  data-url="/floor/9"  data-info="9NP • {{ $floorData[9]['text'] ?? 'vypredané' }}" d="M373.726 128.725H260L289.362 145.754V150.464H260V175.826H309.212L313.761 178H846.825L853.442 175.826L900.586 175.101V148.652H870.397V142.855L901 128L767.837 128.725L762.461 131.986H377.448L373.726 128.725Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[8] ?? 'sold' }}"  data-url="/floor/8"  data-info="8NP • {{ $floorData[8]['text'] ?? 'vypredané' }}" d="M309.167 175.759H260L288.922 188.664V198.533H260V225.861H309.167L313.712 227H846.288L852.899 225.861H900V197.774H869.839V186.766L900 175L852.899 175.759L846.288 178.036H313.712L309.167 175.759Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[7] ?? 'sold' }}"  data-url="/floor/7"  data-info="7NP • {{ $floorData[7]['text'] ?? 'vypredané' }}" d="M288.922 246.902H260.826V271.773L269.503 272.906H309.167L313.712 274H845.875L853.312 273.258H899.587V247.273H870.252V230.939L900 225H852.899L846.288 226.114H313.712L309.167 225H260L288.922 232.795V246.902Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[6] ?? 'sold' }}"  data-url="/floor/6"  data-info="6NP • {{ $floorData[6]['text'] ?? 'vypredané' }}" d="M309.372 273H269.682L289.941 275.909V295.182H261V319.909H305.238L314.333 321H846.426H901V294.818H870.819V275.545L900.173 273.364H853.455L846.84 274.091H313.92L309.372 273Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[5] ?? 'sold' }}"  data-url="/floor/5"  data-info="5NP • {{ $floorData[5]['text'] ?? 'vypredané' }}" d="M261.413 342.758V367.258H309.315L314.27 366.515H845.73L852.75 368H899V342.758L875.875 340.53H869.681V320.114H314.27L305.185 319H261L289.08 320.114V337.932L261.413 342.758Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[4] ?? 'sold' }}"  data-url="/floor/4"  data-info="4NP • {{ $floorData[4]['text'] ?? 'vypredané' }}" d="M288 414.185V367.726H308.295L313.266 367H846.327L853.368 368.452H870.764V382.864L900.586 389.867V409.732L901 409.83V415.637L853.368 416L846.327 414.185H288Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[3] ?? 'sold' }}"  data-url="/floor/3"  data-info="3NP • {{ $floorData[3]['text'] ?? 'vypredané' }}" d="M288 460.691V414H846.327L853.368 415.838L870.764 415.712V432.382H886.503L900.586 437.529L900.172 458.118H901V464H853.368L848.812 460.691H288Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[2] ?? 'sold' }}"  data-url="/floor/2"  data-info="2NP • {{ $floorData[2]['text'] ?? 'vypredané' }}" d="M288 507.043V461H848.812L853.368 464.237H870.764V472.511L900.586 485.101V504.885H901V511H853.368L846.327 506.683H297.112L296.698 507.043H288Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[1] ?? 'sold' }}"  data-url="/floor/1"  data-info="1NP • {{ $floorData[1]['text'] ?? 'vypredané' }}" d="M293 550V507.374H297.553L297.966 507H846.756L853.792 511.487H860V548.878H601.332V550H574.017V548.878H503.659V549.626H482.138L481.31 544.391H434.543L433.715 549.626H374.946L374.532 549.252H306.658L305.83 550H293Z" fill="#00FF51" fill-opacity="0.26"/>
    <path class="zone {{ $floorStatuses[11] ?? 'sold' }}"  data-url="/floor/11"  data-info="11NP • {{ $floorData[11]['text'] ?? 'vypredané' }}" d="M490.799 24H259.414L259 80.2515H369.518L377.383 85H762.749L767.716 80.6168H901V53.2216H871.197L901 32.0359V24.3653H686.172L683.275 29.8443H490.799V24Z" fill="#00FF51" fill-opacity="0.26"/>
    
</svg>



