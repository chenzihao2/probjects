webpackJsonp([0,2],[function(t,a,i){$(function(){function t(t){var a=weui.loading();$.ajax({url:n.PHP_PATH+"pub/user/"+_uid+"/brief",dataType:"json",type:"GET",data:{token:_token},success:function(i){a.hide(),200==i.status_code?t(i.data):weui.alert(i.status_code+i.error_message)},error:function(t){a.hide(),weui.alert(""+JSON.stringify(t))}})}function a(t){var a=weui.loading("正在提现");$.ajax({url:n.PHP_PATH+"pub/withdraw/",dataType:"json",type:"POST",data:{token:_token,uid:_uid,balance:t},success:function(t){a.hide(),console.log("withdraw: ",t),200==t.status_code?window.location.href=location.href:weui.alert(t.status_code+t.error_message)},error:function(t){a.hide(),weui.alert(JSON.stringify(t))}})}function e(){var t="您有不中退款类订单需要处理， 处理完成后，才能正常使用给料",a="";a+='<div class="refund-alert">',a+='\t\t<div class="alert-wrap"></div>',a+='\t\t<div class="alert-body">',a+='\t\t\t<div class="alert-body-txt">'+t+"</div>",a+='\t\t\t<div class="alert-body-btn">去处理</div>',a+="\t\t</div>",a+="</div>",$.ajax({url:"https://yxapi.qiudashi.com/pub/source/"+_uid+"/checkbet",dataType:"json",type:"GET",data:{token:_token},success:function(t){1===t.data.is_bet&&($("body").append(a),$(".alert-body-btn").click(function(){window.location.href="http://yxm.qiudashi.com/home/sources"}))},error:function(t){console.log("err:",t)}})}var n=i(1),o=["<div>单日流水达到2000，就当日全部收入都只收取4%（针对原本收取5%的新用户）</div>","<div>单日流水达到3000，就当日全部收入都只收取3.5%</div>","<div>单日流水达到5000，就当日全部收入都只收取3%</div>","<div>单日流水达到10000，就当日全部收入都只收取2.5%</div>","<div>单日流水达到15000，就当日全部收入都只收取2%</div>","<div>单日流水达到25000，就当日全部收入都只收取1.5%</div>"].join("");$(".rate-info").on("click",function(t){weui.dialog({title:"服务费减免说明",content:o})}),t(function(t){var e="",n=$(".balance"),o=$(".info"),d=$(".drawmoney-btn");if(t.rate&&(e="，公测版提现收取"+(100*parseFloat(t.rate)).toFixed(2)+"%服务费"),n.find("i").html(t.balance),t.withdrawing&&0!==t.withdrawing)return n.addClass("active"),o.html("您有<em>"+t.withdrawing+"</em>元正在转账中...提现金额将在<em>2个工作日</em>内直接打入您的账户"+e),n.after("<p class='status-withdrawing'>提现中...</p>"),void d.html("正在提现中");var s=parseFloat(t.balance);o.html(o.html()+e),s<10||(d.addClass("active"),s>2e4&&(t.balance=2e4,n.after("<p class='extra-info'>应微信要求，每次最多提现20000元，多谢您的谅解！</p>")),"0"===t.status?i.e(1,function(e){i(2)(d,function(){a(t.balance)})}):d.on("click",function(i){console.log("直接提现"),a(t.balance)}))}),e()})},function(t,a){var i,e=!1,n="1.2.2",o="https://yxapi.qiudashi.com/";i={_isDebug:e,PHP_PATH:o,CSS_PATH:"http://s.qiudashi.com/gl-gzh/v/"+n+"/gl-gzh/css/"},"undefined"!=typeof e&&e===!0&&(i.CSS_PATH="../css/"),t.exports=i}]);