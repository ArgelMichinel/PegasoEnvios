let scanner;
var cameras=[];
var audio = document.getElementById("audio_scan");
var audiomalo = document.getElementById("trompeta");

if( (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/webOS/i)) || (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/BlackBerry/i)) || (navigator.userAgent.match(/IEMobile/i)) ) {
    
    scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
    scanner.addListener('scan', function (content) {
        prepare_QRdata(content);
        //audio.play();
    });
    
} else {
    
    scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        prepare_QRdata(content);
        //audio.play();
    });
    
}
      
Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
          console.error('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
});


document.addEventListener('visibilitychange', function(cameras) {
  if (!document.hidden) {
    scanner.start(cameras[0]);
  } else {
   scanner.stop();
  }
});