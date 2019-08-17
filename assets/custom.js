
function openApp(data){
(function() {
    var app = {
      launchApp: function(data) {
        if(data==1){
        window.location.replace("gojek://gopoints/voucherbatch/91f62ad1-815f-4a6e-b6d1-ca68a52987fe");
        
        }else if(data==2){
          window.location.replace("gojek://gopoints/voucherbatch/4f016cb3-5fce-407c-a5e1-cae7579940c0");
          
        }else if(data==3){
          window.location.replace("gojek://gopoints/voucherbatch/eb572afe-a9b7-445d-add7-b27a0aca7711");
          
        }else if(data==4){
          window.location.replace("gojek://growth/promo?source=demo\u0026code=COBAINGOJEK");
          
        }else{
          alert('Voucher Tidak Ditemukan');
        }
        

      },
  
      openWebApp: function() {
        this.timer = setTimeout(this.openWebApp, 2000);
        alert('Yah, pastikan sudah install aplikasi gojek, atau coba gunakan browser lain');

      }
    };
  
    app.launchApp(data);
  })();

}