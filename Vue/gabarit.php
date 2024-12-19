<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css"/>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a id="title" href="index.php"><h1 id="titre">SmartCity - Eau</h1></a>
                <nav>
                    <a href="<?= "index.php?action=capteurs" ?>">Capteurs</a>
                    <a href="<?= "index.php?action=fuites" ?>">Fuites</a>
                    <a href="<?= "index.php?action=conso" ?>">Consommation</a>
                </nav>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                &copy; 2024-2025
            </footer>
        </div> <!-- #global -->
        <canvas id="canvas"></canvas>
    </body>
</html>
<script>
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');

    canvas.width =window.innerWidth;
    canvas.height =window.innerHeight;

    let particles = [];
    
    class Particle {
        constructor(){
            this.size = Math.random()*5 + 3;
            this.radius = this.size/2;
            this.color = `rgba(35, 179, 239, ${Math.random()+ 0.1})`;
            this.x = Math.random()*canvas.width;
            this.y = Math.random()*canvas.height;
            this.speed = Math.random()*1.3 + 0.2;
        }

        draw(){
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI*2);
            ctx.fillStyle = this.color;
            ctx.fill();
        }
        update(){
            this.y += this.speed;
            if (this.y > canvas.height + this.radius){
                this.y = -this.radius;
            }
        }
    }

    function createParticles(){
        for (let i=0; i<canvas.width/10; i++){
            const particle = new Particle();
            particles.push(particle);
        }
    }

    function loop(){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(particle=>{
            particle.draw();
            particle.update();
        });
        requestAnimationFrame(loop);
    }

    
    window.addEventListener('resize', function(){
        particles = [];
        createParticles();
    });
    createParticles();
    loop();
</script>