y<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>canvas</title>
</head>
<style>
    canvas {
        
        background-color: tomato;
        
    }
</style>
<body>
    <canvas id="mycanvas" width="500" height="500">
        tu navegadore no soporta canvas


        <img src="https://placekitten.com/408/287" id="imagen"alt="">
    </canvas>

    <script type ="text/javascript">
        var cv  =null;
        var ctx  = null;
        var superX=240,superY=240;
        var player=null

        function start(){

             cv  =document.getElementById('mycanvas');
             ctx  = cv.getContext('2d');

            player =new Cuadraro(superX,superY,40,40,'red');

             paint();
        }
        // var color='red';
        // var fig='arc';
        // var press =false;    


        // document.addEventListener('keydown',function(e){
        //     // console.log(e);
        //     //arriba
        //     if(e.keyCode == 87 || e.keyCode == 38){
        //         superY-=25;

        //     }
        //     // abajo
        //     if(e.keyCode == 83 || e.keyCode == 40){
        //         superY +=25;
        //     }
        //     // derecha
        //     if(e.keyCode == 65 || e.keyCode == 37){
        //         superX -=25;
        //     }
        //     //abajo
        //     if(e.keyCode == 68 || e.keyCode == 39){
        //         superX +=25;
        //     }
        //     paint();
        // })
        function paint(){

            window.requestAnimationFrame(paint);

            ctx.fillStyle ='pink';
            ctx.fillRect(0,0,500,500);
            
            player.c=rbgaRand();
            player.dibujar(ctx);
            // ctx.fillRect(superX,superY,40,40);
            // ctx.strokeRect(superX,superY,40,40);

            update();
        }
        function update(){
            player.x +=10;
            if(player.x >= 500){
                player.x = 0;
            }
            player.y +=10;
            if(player.y >= 500){
                player.y = 0;
            }
        }
        function Cuadraro(x,y,w,n,c){
            this.x = x;
            this.y = y;
            this.w = w;
            this.n = n;
            this.c = c;

            this.dibujar = function(ctx){
                ctx.fillStyle=this.c;
                ctx.fillRect(this.x,this.y,this.w,this.n);
                ctx.strokeRect(this.x,this.y,this.w,this.n);
            }
        }
        window.addEventListener('load',start)
        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
                    window.setTimeout(callback, 17);
                };
        }());

        // ctx.strokeStyle ="white";
        // ctx.strokeRect(50,50,150,150);

        // ctx.strokeStyle ="red";
        // ctx.strokeRect(150,150,150,150);
        // ctx.fillStyle ="red";
        // ctx.fillRect(10,10,55,50)

        // ctx.fillStyle ="rgba(0,0,200,0.5)";
        // ctx.fillRect(50,50,55,50);

        // ctx.fillStyle ="rgba(100,0,200,0.5)";
        // ctx.fillRect(90,90,55,50);

        // ctx.moveTo(400,100);
        // ctx.lineTo(250,250);
        // ctx.stroke();

        // ctx.moveTo(500,200);
        // ctx.lineTo(100,50);
        // ctx.lineTo(300,300);
        // ctx.lineTo(500,200);
        // ctx.stroke();
        // ctx.fill();
        // ctx.beginPath();
        // ctx.arc(100,100,50,0,2*Math.PI);
        // ctx.stroke();

        // ctx.beginPath();
        // ctx.arc(200,200,50,0,2*Math.PI);
        // ctx.fillStyle="rgba(100,0,200,0.5)";
        // ctx.fill();

        // ctx.font ="30px Arial";
        // ctx.fillText("Jesus Emmanuel",150,30);

        // ctx.strokeText("Jesus Emmanuel",150,80);


        // gradiantre
        // var  grad = ctx.createLinearGradient(0,0,200,0);
        // grad.addColorStop(0,"red");
        // grad.addColorStop(0.5,"yellow");
        // grad.addColorStop(1,"blue");
        // ctx.fillStyle =grad;
        // ctx.fillRect(0,400,200,80);

        //greadiante con  circulo
        // grad= ctx.createRadialGradient(75,50,5,90,60,100);
        //  grad.addColorStop(0,"green");
        //  grad.addColorStop(0.5,"white");
        //  grad.addColorStop(1,"red");

        // ctx.fillStyle = grad;
        // ctx.fillRect(0,40,200,80);

        //imagen
        // var img = document.getElementById('imagen');
        // ctx.drawImage(img,100,100);

        // evento
        // cv.addEventListener('click', function(e){
        //     ctx.beginPath();
        //     ctx.arc(e.offsetX-20,e.offsetY-20,50,0,2*Math.PI);
        //     ctx.fillStyle="rgba(100,0,200,0.5)";
        //     ctx.fill();
        //     ctx.stroke();
        // });
        
        //evento con distintos colores
        // cv.addEventListener('click', function(e){
        //     // console.log(e);
        //     ctx.fillStyle=color;
        // if(fig=='rec'){
        //     ctx.fillRect(e.offsetX-20,e.offsetY-20,40,40);
        //     ctx.strokeRect(e.offsetX-20,e.offsetY-20,40,40);
        // }else{
        //     ctx.beginPath();
        //     ctx.arc(e.offsetX-20,e.offsetY-20, 30, 0, 2 * Math.PI);
        //     ctx.fill();
        //     ctx.stroke();
        // }
        // });
        
        // cv.addEventListener('mousemove',function(e){
        //     if(press){
        //         ctx.fillStyle=color;
        //         ctx.fillRect(e.offsetX-20,e.offsetY-20,10,10);
        //     }
        // });
        
        // cv.addEventListener('mousedown',function(e){
        //     press=true;
        // })
        // cv.addEventListener('mouseup',function(e){
        //     press=false;
        // })
        

        // cv.addEventListener('mouseover',function(e){
        //     color=rbgaRand();
        // });
        // cv.addEventListener('mouseout',function(e){
        //     fig=(fig=='arc')?'rec':'arc';
        // });
        function rbgaRand() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
        }
    </script>
</body> 
</html>