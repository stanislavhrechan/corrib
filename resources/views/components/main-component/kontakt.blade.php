<section id="kontakt" class="py-16">
  <div class="max-w-xl mx-auto text-center flex flex-col justify-center">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl">Chcete si dohodnúť obhliadku?</h2>
    <p class="text-gray-700 my-8 mx-5 md:mx-0">
      Radi vás privítame na osobnej obhliadke, kde spoločne vyberieme byt,
      ktorý najlepšie vystihuje váš životný štýl.
    </p>

    <form  action="{{ route('contact.send') }}"  method="POST" class="bg-[#FDFDFD] p-8  space-y-4">
      @csrf
      <input type="text" placeholder="Meno a priezvisko*" class="w-full border-b border-gray-300  focus:border-black outline-none py-2">
      <input type="email" placeholder="Email *" class="w-full border-b border-gray-300  focus:border-black outline-none py-2">
      <input type="tel" placeholder="Tel. číslo *" class="w-full border-b border-gray-300  focus:border-black outline-none py-2">
      <textarea placeholder="Vaša správa *" class="w-full border-b border-gray-300 focus:border-black outline-none py-2 pb-10 resize-none"></textarea>

      <label class="flex items-center space-x-2 ">
        <input type="checkbox" class="w-4 h-4 border-gray-300">
        <span>Súhlasím so spracovaním <a href="#" class="underline text-black">osobných údajov</a> *</span>
      </label>

      <button type="submit" class="w-full">Odoslať</button>

    </form>
  </div>
  <img src="../images/benardlogo.png" alt="" class="mx-5 mb-5">
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-8 text-sm mx-5 justify-center">
    <div>
      <p class="font-bold">Exkluzívny Predajca:</p>
      <p  class="font-semibold">BENARD GROUP s.r.o.</p>
      <p>Karpatská 5995/50,<br>058 01 Poprad</p>
      <p class="mt-2">Mobil: <span class="font-bold">0907 211 103</span></p>
      <p>E-mail: <a href="mailto:info@benard.sk" class="underline">info@benard.sk</a></p>
    </div>

    <div>
      <p class="font-bold">Hypotekárny špecialista:</p>
      <p class="font-semibold">Ing. Zuzana Troščáková</p>
      <p class="mt-2"><span class="font-bold">+421 907 211 103</span></p>
      <p>E-mail: <a href="mailto:info@benard.sk" class="underline">troscakova@benard.sk</a></p>
    </div>

    <div>
      <p class="font-bold">Investor:</p>
      <p class="font-semibold">Corrib development Poprad s.r.o.</p>
      <p>Okružná 52<br>064 01 Stará Ľubovňa</p>
      <p class="mt-2">IČO: 44303092</p>
      <p>IČ-DPH: SK2022654568</p>
    </div>

   

    <div>
      <p class="font-bold">Stavebník:</p>
      <p  class="font-semibold">RBG Slovakia s.r.o.</p>
      <p>Budovateľská 479/10<br>064 01 Stará Ľubovňa</p>
      <p class="mt-2">IČO: 36812251</p>
      <p>IČ-DPH: SK2022425284</p>
    </div>

    <div>
      <p class="font-bold">Architekt:</p>
      <p  class="font-semibold">PROARCH, s.r.o..</p>
      <p>Bajkalská 20 <br>058 01 Poprad</p>
      <p class="mt-2">IČO: 31709109</p>
      <p>IČ-DPH: SK2020514727</p>
    </div>

    <div>
      <p class="font-bold">Interiér & dizajn:</p>
      <p>ES Works s.r.o.</p>
      <p>INg. arch. Svetlana Sabolová
      <p>Lipová 19<br>064 01 Stará Ľubovňa</p>
      <p class="mt-2">IČO: 57461651</p>
      <p>IČ-DPH: SK2122765821</p>
    </div>
  </div>
</section>
