$(document).ready((function(){$(".vnexpress").append(' <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"><\/script><div class="has-text-centered"><div class="select"><select id="select"><option value="tin-moi-nhat">Tin mới nhất</option><option value="tin-noi-bat">Tin nổi bật</option><option value="thoi-su">Thời sự</option><option value="the-gioi">Thế giới</option><option value="kinh-doanh">Kinh doanh</option><option value="giai-tri">Giải trí</option><option value="the-thao">Thể thao</option><option value="phap-luat">Pháp luật</option><option value="giao-duc">Giáo dục</option><option value="suc-khoe">Sức khoẻ</option><option value="doi-song">Đời sống</option><option value="du-lich">Du lịch</option><option value="khoa-hoc">Khoa học</option><option value="so-hoa">Số hoá</option><option value="oto-xe-may">Xe</option><option value="y-kien">Ý kiến</option><option value="tam-su">Tâm sự</option><option value="cuoi">Cười</option></select></div><style>@keyframes loadbaralt{0%,to{left:0;right:80%}25%,75%{left:0;right:0}50%{left:80%;right:0}}.gg-loadbar-alt,.gg-loadbar-alt::after,.gg-loadbar-alt::before{display:block;box-sizing:border-box;height:4px;border-radius:4px}.gg-loadbar-alt{position:relative;transform:scale(var(--ggs,1));width:18px}.gg-loadbar-alt::after,.gg-loadbar-alt::before{background:currentColor;content:"";position:absolute}.gg-loadbar-alt::before{animation:loadbaralt 2s cubic-bezier(0,0,.58,1) infinite}.gg-loadbar-alt::after{width:18px;opacity:.3}</style><i class="mt-2 mx-auto gg-loadbar-alt"></i></div><div class="mt-3 columns is-multiline is-12" id="result"></div>'),$("#select").on("change",(function(){var t=$(this).val();$(".gg-loadbar-alt").show(),$.ajax({url:"https://tayninhkysu.com/hns/news.php?name="+t,method:"GET",dataType:"json",success:function(t){$("#result").empty();var o=t.items;$.each(o,(function(o,a){var i=a.title,e=a.link,n=(a.image,a.description),l=a.date,s=(a.id,"");s+='<div class="column is-one-quarter is-4"><div class="box cont" style="height:" id="capture-area">',s+='<a href="'+e+'"  target="_blank"><h1 id="title" class="title">'+i+"</h1></a>",s+='<span id="link" style="font-size:0.9rem">'+l+"</span>",s+='<div class="mt-3"><p  id="cont">'+n+"</p></div>",s+='<button style="text-decoration: none;"class="capture-btn button is-ghost"><p  style="height:0.3rem;font-size:0.7rem;">VnExpress// '+t.name+"</p></button>",s+="</div></div>",$(".gg-loadbar-alt").hide(),$("#result").append(s)})),$(".capture-btn").click((function(t){var o,a=(o=new Date).getDate()+"/"+(o.getMonth()+1)+"/"+o.getFullYear()+"_"+(1,10289,Math.floor(10289*Math.random())+1);t.stopPropagation();var i=$(this).closest(".cont")[0];html2canvas(i).then((function(t){var o=t.toDataURL("image/png"),i=document.createElement("a");i.href=o,i.download="hns_"+a+".png",i.click()}))}))}})})),$("#select").trigger("change")}));