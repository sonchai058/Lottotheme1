//Usage

//load your JSON (you could jQuery if you prefer)
function loadJSON(callback) {

  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/json");
  xobj.open('GET', './wheel_data.json', true); 
  xobj.onreadystatechange = function() {
    if (xobj.readyState == 4 && xobj.status == "200") {
      //Call the anonymous function (callback) passing in the response
      callback(xobj.responseText);
    }
  };
  xobj.send(null);
}

//your own function to capture the spin results
function myResult(e) {
  //e is the result object
    console.log('Spin Count: ' + e.spinCount + ' - ' + 'Win: ' + e.win + ' - ' + 'Message: ' +  e.msg);

    // if you have defined a userData object...
    if(e.userData){
      
      console.log('User defined score: ' + e.userData.score);
      //e.userData.score

    }

/*  if(e.spinCount == 3){
    show the game progress when the spinCount is 3
    console.log(e.target.getGameProgress());
    restart it if you like
    e.target.restart();
  }*/  

}

//your own function to capture any errors
function myError(e) {
  //e is error object
  console.log('Spin Count: ' + e.spinCount + ' - ' + 'Message: ' +  e.msg);

}

function myGameEnd(e) {
  
  //e is gameResultsArray
  //result data
  console.log(e);
  //reset the wheel at the end of the game after 5 seconds
  /* TweenMax.delayedCall(5, function(){
    
    Spin2WinWheel.reset();

  })*/


}


function init() {

  loadJSON(function(response) {
    // Parse JSON string to an object
    var jsonData = {
      "colorArray":[ "#364C62", "#F1C40F", "#E67E22", "#8E44AD", "#CCCCCC", "#95A5A6", "#16A085", "#27AE60", "#2980B9", "#E74C3C", "#2C3E50", "#F39C12", "#D35400", "#C0392B", "#BDC3C7","#1ABC9C", "#2ECC71", "#E87AC2", "#3498DB", "#9B59B6", "#7F8C8D"],
      
      "segmentValuesArray" : [
        {"probability":10, "type": "string", "value": "รับ 1 แต้ม", "win": true, "resultText": "รับฟรี 1 แต้ม!", "userData": {"score":1}},
        {"probability":10, "type": "string", "value": "รับ 25 แต้ม", "win": true, "resultText": "รับฟรี 25 แต้ม!", "userData": {"score":25}},
        {"probability":10, "type": "string", "value": "รับ 1 แต้ม", "win": true, "resultText": "รับฟรี 1 แต้ม!", "userData": {"score":1}},
        {"probability":10, "type": "string", "value": "รับ 20 แต้ม", "win": true, "resultText": "รับฟรี 20 แต้ม!", "userData": {"score":20}},
        {"probability":10, "type": "string", "value": "รับ 1 แต้ม", "win": true, "resultText": "รับฟรี 1 แต้ม!", "userData": {"score":1}},
        {"probability":10, "type": "string", "value": "รับ 15 แต้ม", "win": true, "resultText": "รับฟรี 15 แต้ม!", "userData": {"score":15}},
        {"probability":10, "type": "string", "value": "รับ 1 แต้ม", "win": true, "resultText": "รับฟรี 1 แต้ม!", "userData": {"score":1}},
        {"probability":10, "type": "string", "value": "รับ 10 แต้ม", "win": true, "resultText": "รับฟรี 10 แต้ม!", "userData": {"score":10}},
        {"probability":50, "type": "string", "value": "ไม่ได้นะจ้ะ", "win": false, "resultText": "ไม่ได้นะจ้ะ!", "userData": {"score":0}},
        {"probability":10, "type": "string", "value": "รับ 300 แต้ม", "win": true, "resultText": "รับฟรี 300 แต้ม!", "userData": {"score":300}}
      ],
      
        "svgWidth": 1024,
        "svgHeight": 1024,
        "wheelStrokeColor": "#D0BD0C",
        "wheelStrokeWidth": 18,
        "wheelSize": 900,
        "wheelTextOffsetY": 80,
        "wheelTextColor": "#EDEDED",  
        "wheelTextSize": "2.3em",
        "wheelImageOffsetY": 40,
        "wheelImageSize": 50,
        "centerCircleSize": 360,
        "centerCircleStrokeColor": "#F1DC15",
        "centerCircleStrokeWidth": 12,
        "centerCircleFillColor": "#EDEDED",
        "centerCircleImageUrl":base_url+"/media/logo.png",
        "centerCircleImageWidth":400,
        "centerCircleImageHeight":400,  
        "segmentStrokeColor": "#E2E2E2",
        "segmentStrokeWidth": 4,
        "centerX": 512,
        "centerY": 512,  
        "hasShadows": false,
        "numSpins": 1,
        "spinDestinationArray":[],
        "minSpinDuration":3,
        "gameOverText":"หวังว่าคุณจะสนุกกับ เกมวงล้อ",
        "invalidSpinText":"INVALID SPIN. PLEASE SPIN AGAIN.",
        "introText":"วงล้อนำโชค <br/> หมุนลุ้น คะแนนฟรี",
        "hasSound":true,
        "gameId":"9a0232ec06bc431114e2a7f3aea03bbe2164f1aa",
        "clickToSpin":true,
        "spinDirection": "ccw",
        "disabledText":"คุณไม่สามารถเล่นเกมในวันนี้ได้" 
      };
    //if you want to spin it using your own button, then create a reference and pass it in as spinTrigger
    var mySpinBtn = document.querySelector('.spinBtn');
    //create a new instance of Spin2Win Wheel and pass in the vars object
    var myWheel = new Spin2WinWheel();
    
    //WITH your own button
    myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError, spinTrigger: mySpinBtn});
    
    //WITHOUT your own button
    //myWheel.init({data:jsonData, onResult:myResult, onGameEnd:myGameEnd, onError:myError});
  });
}



//And finally call it
init();
