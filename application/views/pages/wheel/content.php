<div id="container">
        <button class="spinBtn">>> กดเพื่อหมุน</button>
        <div class="wheelContainer">
            <svg class="wheelSVG" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" text-rendering="optimizeSpeed" preserveAspectRatio="xMidYMin meet">
                <defs>
                    <filter id="shadow" x="-100%" y="-100%" width="550%" height="550%">
                        <feOffset in="SourceAlpha" dx="0" dy="0" result="offsetOut"></feOffset>
                        <feGaussianBlur stdDeviation="9" in="offsetOut" result="drop" />
                        <feColorMatrix in="drop" result="color-out" type="matrix" values="0 0 0 0   0
              0 0 0 0   0 
              0 0 0 0   0 
              0 0 0 .3 0" />
                        <feBlend in="SourceGraphic" in2="color-out" mode="normal" />
                    </filter>
                </defs>
                <g class="mainContainer">
                    <g class="wheel">
                    </g>
                </g>
                <g class="centerCircle" />
                <g class="wheelOutline" />
                <g class="pegContainer" opacity="1">
                    <path class="peg" fill="#EEEEEE" d="M22.139,0C5.623,0-1.523,15.572,0.269,27.037c3.392,21.707,21.87,42.232,21.87,42.232 s18.478-20.525,21.87-42.232C45.801,15.572,38.623,0,22.139,0z" />
                </g>
                <g class="valueContainer" />
                <g class="centerCircleImageContainer" />
            </svg>
            <div class="toast">
                <p></p>
            </div>
        </div>
        <h5><i style="color:#F1C40F" class="fa fa-star" aria-hidden="true"></i> คะแนน : <span id="point"> 10</span></h5>
        <hr/>
        <h6 align="center">* ใช้แต้มจำนวน 3 ในการหมุน 1 ครั้ง / สามารถรับแต้มได้จากกิจกรรมต่าง ๆ บนเว็บไซต์<h6>
    </div>