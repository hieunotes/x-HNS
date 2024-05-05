$(document).ready(function() {
  const info = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="80" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 2.449219 5.457031 L 26.402344 5.457031 L 26.402344 22.878906 L 2.449219 22.878906 Z M 2.449219 5.457031 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(85.488892%, 14.509583%, 11.369324%)" d="M 23.734375 5.457031 L 5.121094 5.457031 C 3.652344 5.457031 2.460938 6.65625 2.460938 8.136719 L 2.460938 20.195312 C 2.460938 21.675781 3.652344 22.878906 5.121094 22.878906 L 23.734375 22.878906 C 25.203125 22.878906 26.390625 21.675781 26.390625 20.195312 L 26.390625 8.136719 C 26.390625 6.65625 25.203125 5.457031 23.734375 5.457031 Z M 23.734375 5.457031 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="rgb(100%, 100%, 0%)" d="M 15.589844 12.851562 L 14.425781 9.238281 L 13.261719 12.851562 L 9.492188 12.851562 L 12.542969 15.085938 L 11.375 18.699219 L 14.425781 16.464844 L 17.476562 18.699219 L 16.3125 15.085938 L 19.363281 12.851562 Z 5.589844 12.851562 " fill-opacity="1" fill-rule="nonzero"/></svg><br><a href="https://vi.m.wikipedia.org/wiki/Ng%C3%A0y_Qu%E1%BB%91c_kh%C3%A1nh_(Vi%E1%BB%87t_Nam)"><strong style="color:#fe385f">Việt Nam chào mừng Quốc Khánh<br>02/9/2023 • 02/9/1945</strong></a><br><br><div><img alt="Hồ Chí Minh, Chủ tịch lâm thời nước Việt Nam dân chủ cộng hòa, đọc bản “Tuyên ngôn độc lập” ngày 2/9/1945 tại Quảng trường Ba Đình" src="https://tayninhkysu.com/hns/img/bac-ho.gif"></div><p class="is-6">Hồ Chí Minh, Chủ tịch lâm thời nước Việt Nam dân chủ cộng hòa, đọc bản “Tuyên ngôn độc lập” ngày 2/9/1945 tại Quảng trường Ba Đình</p><div><audio id="audioPlayer" src="https://tayninhkysu.com/hns/audio/tuyenngondoclap.mp3" preload="auto" autoplay="autoplay"></audio></div>';

  $("#info").append(info);

  $.getScript("https://loktar00.github.io/JQuery-Snowfall/snowfall.jquery.min.js", function() {
    $(document).ready(function() {
      $(document).snowfall({
        image: "https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg",
        minSize: 15,
        maxSize: 15,
        maxSpeed: 2,
        flakeCount: 10
      });
    });
  });
